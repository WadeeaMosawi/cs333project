#!/bin/sh
# run.sh

# Copy your project folder into htdocs
cp -r Project-ITCS-333 htdocs/

# Create redirect to MainPage.html
echo '<meta http-equiv="refresh" content="0; url=/Project-ITCS-333/MainPage.html" />' > htdocs/index.html

# Remove conflicting PHP files (if needed)
rm -f htdocs/index.php