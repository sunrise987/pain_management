DROP USER 'php_app'@'localhost';
CREATE USER 'php_app'@'localhost' IDENTIFIED BY 'admin000';

GRANT SELECT, INSERT, UPDATE, DELETE ON patient_management.* TO 'php_app'@'localhost';


