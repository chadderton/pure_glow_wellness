# Pure Glow Wellness CMS

A lightweight, schema-based CMS built with PHP and JSON.

## Folder Structure

```
/site-root/
│
├── index.php                   # Main entry point (renders content)
├── page.php                    # Placeholder for multi-page support
├── .htaccess                   # URL rewriting and security
│
├── content/                    # Data storage (JSON)
│   ├── schema.json             # Defines editor fields
│   ├── data.json               # Live content
│   ├── draft.json              # Draft content
│   └── uploads/                # User uploads
│
├── templates/                  # HTML Templates
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   └── components/             # Reusable sections
│
├── editor/                     # CMS Admin Interface
│   ├── index.php
│   ├── login.php
│   ├── editor.js
│   └── editor.css
│
├── api/                        # Backend Logic
│   ├── save.php                # Save/Publish handler
│   ├── upload.php              # Image upload handler
│   ├── auth.php                # Authentication logic
│   └── logout.php
│
└── assets/                     # Static Assets
    ├── css/
    ├── js/
    └── images/
```

## Deployment Instructions

1.  **Upload Files**: Upload all files to your web server (Apache recommended for .htaccess support).
2.  **Permissions**: Ensure the `content/` directory and its subdirectories are writable by the web server (chmod 775 or 777 depending on your host).
    *   `content/`
    *   `content/uploads/`
    *   `content/uploads/images/`
    *   `content/data.json`
    *   `content/draft.json`
3.  **Security**:
    *   Open `editor/login.php` and change the placeholder password `"YOUR_EDITOR_PASSWORD"` to a strong password.
    *   Ensure `.htaccess` is active to protect the `content/` and `api/` directories from direct access.
4.  **Access Editor**: Navigate to `/editor` in your browser.
5.  **Login**: Use the password you set.
6.  **Edit & Publish**:
    *   Make changes in the editor.
    *   Click "Save Draft" to save changes without publishing.
    *   Click "Preview Draft" to see how it looks (opens `/?preview=1`).
    *   Click "Publish Live" to push changes to the live site.

## Customization

*   **Schema**: Edit `content/schema.json` to add or remove fields. The editor will automatically adjust.
*   **Templates**: Edit files in `templates/` to change the frontend layout.
*   **Styles**: Edit `assets/css/style.css`.

## Requirements

*   PHP 7.4 or higher
*   Apache Web Server (for .htaccess)
*   GD Library (for image resizing)
