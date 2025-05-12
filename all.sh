#!/bin/sh
# all.sh

# Step 1: Prepare project files with run.sh
echo "Running run.sh..."
h run.sh

# Step 2: Run the startup script (uncomment if needed)
echo "Running startup.sh..."
sh startup.sh

# Step 3: Start PHP server (serves from htdocs)
echo "Starting PHP server..."
php -S 0.0.0.0:8000 -t htdocs &