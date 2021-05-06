# Beaver Builder PDF.js viewer
This module generates shortcodes for the [PDF.js Viewer plugin](https://wordpress.org/plugins/pdfjs-viewer-shortcode/)

What sets this Module apart is that it uses the WP Media Manager to browse for the PDF file. I created a custom fieldtype for this that is loaded in the plugin.

---
## Release Info

|Version|Date|Updates|
|---|---|--|
|1.1.1|2021-05-06|Moved a function from frontend.php to incc\BBPDFField.php because it was redeclared that function when modules used twice or more
|1.1.0|2021-04-28|Added GithubUpdater, added fullscreen_target in new tab, edit fullscreen_text open text, added custom_field connector
|1.0.0|2021-04-27|Inital Commit|