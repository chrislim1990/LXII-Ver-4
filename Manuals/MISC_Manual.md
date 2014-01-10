# Upload to Server

## Core-script at outside of public folder

1. Move the `index.php` at the root inside the `public_html`
2. Change the `system path` to `../CI_2.1.4`
3. Change the `application path` to `../application`
4. Change `asset_url` function in `applications -> helpers -> utility helper.php` to `return base_url().'public_html/';`
4. Create a new folder at the server, ie: `ci_tpl`
5. Upload the files into the folder you just create
6. Create a sub-domain for it and set the root to `folder_you_create/public_html` 
7. Create this htaccess file and put inside the `public_html`

```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule .* index.php/$0 [PT,L] 
```