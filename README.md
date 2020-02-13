# Testimonial CPT and Carousel Post type

This plugin, when installed, will programmatically create a custom post type called "testimonials" (but you can change that to whatever you like).

The purpose is to make it easier to install and customize the look and behaviour of a testimonial (or other CPT). This plugin includes an archive template, a single post template, and a carousel template. The carousel is intended to be included via shortcode - `[testimonials_slider]`

This plugin is built on the classic editor - not Gitenberg - and styles are done with sass, compiled by Gulp.

To begin working with the project, install at /wp-content/plugins, cd into the /wp-content/plugins/this-plugin's directory, and run `npm install` to install dependencies.

Once complete, run `gulp watchSass`, to compile the sass into the testimonial_styles.css plugin at the root of the directory.

** Please note: when working with this plugin in a live environment, don't just edit the root .css file, because if anyone happens to run the sass compile, it'll overwrite your changes.