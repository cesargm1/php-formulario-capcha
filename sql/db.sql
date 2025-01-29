DROP DATABASE IF EXISTS schools;
CREATE DATABASE schools;
USE schools;

CREATE TABLE persons (
    dni CHAR(9) NOT NULL PRIMARY KEY,
    name VARCHAR(50),
    phone CHAR(9)
);
/*conserge*/

CREATE TABLE janitors (
    janitor_id BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dni CHAR(9) NOT NULL,
    category VARCHAR(50),
    FOREIGN KEY (dni) REFERENCES persons (dni) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE technicians (
    technician_id BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dni CHAR(9) NOT NULL,
    months ENUM('January', 'February', 'March', 'April', 'May', 'June', 
               'July', 'August', 'September', 'October', 'November', 'December') NOT NULL,
    FOREIGN KEY (dni) REFERENCES persons (dni) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE teachers (
    teacher_id BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dni CHAR(9) NOT NULL,
    trienniums VARCHAR(30),
    FOREIGN KEY (dni) REFERENCES persons (dni) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE departments (
    department_id BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    teacher_id BIGINT UNSIGNED NOT NULL,
    trienniums VARCHAR(30),
    FOREIGN KEY (teacher_id) REFERENCES teachers (teacher_id) ON DELETE CASCADE ON UPDATE CASCADE
);
