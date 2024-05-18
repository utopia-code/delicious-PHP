#!/bin/bash

input_file="public/scss"
output_file="public/style.css"

compile_scss() {
    echo "Compiling SCSS..."
    php compile_scss.php
    echo "SCSS compiled"
}

compile_scss


fswatch -o "$input_file" | while read -r event; do
    compile_scss
done
