#!/bin/bash
# This script should set up a CRON job to run cron.php every 24 hours.
# You need to implement the CRON setup logic here.

# For testing cron job:- 
# 1. cd to src folder---------> cd /d/xampp/htdocs/saltycomics/src or cd src
# 2. then run the batch file--> ./run_setup_cron.bat
# 3. In order to automate the cron.php I created a task from windows task scheduler that the runs 'setup_cron.sh' file,
#    through a batch file named 'run_setup_cron.bat'(running this batch file in git bash directly will execute the cron job once),
#    every 24 hours.

PHP_PATH="/d/xampp/php/php.exe"
SCRIPT_PATH="/d/xampp/htdocs/saltycomics/src/cron.php"
echo "Running cron.php once..."
"$PHP_PATH" "$SCRIPT_PATH"
echo "Done, cron.php executed."