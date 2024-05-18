#!/bin/bash

backup="/home/jlozano/Project/RecipeManager/backup"
log="/home/jlozano/Project/RecipeManager/log"
project="/home/jlozano/Project/RecipeManager/Project254"
database="recipes"
db_user="root"
db_password="Nintendo64!"

perform_db_backup() {

    mkdir -p "$backup"
    
    backup_file="$backup/db_backup_$(date +'%Y-%m-%d_%H-%M-%S').sql"
    mysqldump -u "$db_user" -p"$db_password" "$database" > "$backup_file"
    
    if [[ $? -eq 0 ]]; then
        echo "Database backup completed successfully."
    else
        echo "Database backup failed."
    fi
}

manage_logs() {
    find "$log" -type f -mtime +30 -exec rm {} \;
    
    echo "Log files cleaned up."
}

update_application() {
    cd "$project" || exit
    
    git pull origin main
    
    systemctl restart apache2
    
    echo "Application updated and restarted."
}

perform_system_maintenance() {
    apt update && apt upgrade -y
    
    apt autoclean
    
    echo "System maintenance completed."
}

main() {
    perform_db_backup
    manage_logs
    update_application
    perform_system_maintenance
}

main
