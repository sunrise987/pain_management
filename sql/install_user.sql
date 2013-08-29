CREATE USER 'php_app'@'localhost' IDENTIFIED BY 'admin000';

GRANT SELECT, INSERT ON patient_management.* TO 'php_app'@'localhost';


