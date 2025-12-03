async function saveDraft(mode) {
    const form = new FormData(document.getElementById('editorForm'));
    const result = {};

    for (let [key, val] of form) {
        const [section, field] = key.split("__");
        if (!result[section]) result[section] = {};
        result[section][field] = val;
    }

    try {
        const response = await fetch('../api/save.php?mode=' + mode, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(result)
        });

        if (response.ok) {
            alert(mode === 'publish' ? "Published successfully!" : "Draft saved successfully.");
        } else {
            alert("Error saving: " + await response.text());
        }
    } catch (e) {
        alert("Network error: " + e.message);
    }
}

document.getElementById('saveDraft').onclick = (e) => { e.preventDefault(); saveDraft('draft'); };
document.getElementById('publish').onclick = (e) => { 
    e.preventDefault(); 
    if(confirm('Are you sure you want to publish changes to the live site?')) {
        saveDraft('publish'); 
    }
};

document.getElementById('previewDraft').onclick = (e) => {
    e.preventDefault();
    window.open('../index.php?preview=1', '_blank');
};

document.getElementById('backup').onclick = (e) => {
    e.preventDefault();
    window.location.href = '../api/backup.php';
};

// Image upload
document.querySelectorAll('.image-upload').forEach(input => {
    input.addEventListener('change', async () => {
        const targetName = input.dataset.target;
        const file = input.files[0];
        if (!file) return;

        const fd = new FormData();
        fd.append('image', file);

        try {
            input.disabled = true;
            const r = await fetch('../api/upload.php', {
                method: 'POST',
                body: fd
            });

            if (r.ok) {
                const path = await r.text();
                
                // Update hidden input
                const hidden = document.querySelector(`input[name="${targetName}"]`);
                if (hidden) hidden.value = path;

                // Update preview
                const container = input.closest('.image-upload-container');
                const img = container.querySelector('.preview-img');
                if (img) {
                    img.src = "../" + path;
                    img.style.display = 'block';
                }
            } else {
                alert("Upload failed: " + await r.text());
            }
        } catch (e) {
            alert("Upload error: " + e.message);
        } finally {
            input.disabled = false;
        }
    });
});
