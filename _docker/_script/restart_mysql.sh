#!/bin/sh
while true; do
  # Check if mariadb is running by looking for the process
  if ! ps aux | grep -v grep | grep -q mysqld; then
    # Restart MariaDB service inside Docker container and suppress output
    service mariadb restart > /dev/null 2>&1
    # Show a message when MariaDB is restarted
    echo "[WARNING] MariaDB service has been restarted unexpectedly. Please check if this message repeats."
  fi
  sleep 120
done
