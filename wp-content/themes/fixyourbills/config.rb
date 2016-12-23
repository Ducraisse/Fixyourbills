# Compass configuration file.

http_path = "."
css_dir = ""
sass_dir = "scss"
images_dir = "images"
javascripts_dir = "js"
relative_assets = false

require 'bootstrap-sass'

line_comments = false
output_style = :expanded
environment = :development

sourcemap = (environment == :production) ? false : true