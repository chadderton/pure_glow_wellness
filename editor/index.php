<?php
require_once "../api/auth.php";
require_login();

$schema = json_decode(file_get_contents("../content/schema.json"), true);
$draft = json_decode(file_get_contents("../content/draft.json"), true);
?>
<!DOCTYPE html>
<html>
<head>
<title>Site Editor</title>
<link rel="stylesheet" href="editor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="editor-header">
    <h1>Site Editor</h1>
    <div class="editor-actions">
        <button id="saveDraft" class="btn-primary">Save Draft</button>
        <button id="previewDraft" class="btn-secondary">Preview Draft</button>
        <button id="publish" class="btn-danger">Publish Live</button>
        <button id="backup" class="btn-secondary" style="margin-left: auto;">Download Backup</button>
        <a href="../api/logout.php" class="btn-text">Logout</a>
    </div>
</header>

<main class="editor-main">
    <form id="editorForm">

    <?php foreach ($schema['sections'] as $key => $section): ?>
    <section class="editor-section">
        <h2><?= $section['title'] ?></h2>

        <?php foreach ($section['fields'] as $fieldKey => $field): ?>
            <div class="form-group">
                <label><?= $field['label'] ?></label>

                <?php
                $value = $draft[$key][$fieldKey] ?? "";
                ?>

                <?php if ($field['type'] === 'text'): ?>
                    <input type="text" name="<?= $key ?>__<?= $fieldKey ?>" value="<?= htmlspecialchars($value) ?>">

                <?php elseif ($field['type'] === 'textarea'): ?>
                    <textarea name="<?= $key ?>__<?= $fieldKey ?>" rows="5"><?= htmlspecialchars($value) ?></textarea>

                <?php elseif ($field['type'] === 'image'): ?>
                    <div class="image-upload-container">
                        <input type="file" class="image-upload" data-target="<?= $key ?>__<?= $fieldKey ?>">
                        <input type="hidden" name="<?= $key ?>__<?= $fieldKey ?>" value="<?= htmlspecialchars($value) ?>">
                        <div class="preview-container">
                            <?php if ($value): ?>
                                <img src="../content/<?= $value ?>" class="preview-img">
                            <?php else: ?>
                                <img src="" class="preview-img" style="display:none">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </section>
    <?php endforeach; ?>

    </form>
</main>

<script src="editor.js"></script>
</body>
</html>
