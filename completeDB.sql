CREATE DATABASE IF NOT EXISTS peer-pal;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE profile (
id INT(11) NOT NULL AUTO_INCREMENT,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
date_of_birth  DATE NOT NULL,
Gender  VARCHAR (6),
Nationality  VARCHAR(30) NOT NULL,
photo_path VARCHAR(255),
PRIMARY KEY (first_name, last_name, data_of_birth),
CONSTRAINT fk_profile FOREIGN KEY(id) REFERENCES  users(id)
);

CREATE TABLE school (
student_id INT(7) NOT NULL,
faculty VARCHAR(50) NOT NULL,
course_type VARCHAR(30) NOT NULL,
id INT(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(student_id),
CONSTRAINT fk_school  FOREIGN KEY(id) REFERENCES  users(id)
);