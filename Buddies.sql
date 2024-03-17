CREATE DATABASE PeerPal

USE PeerPal;

CREATE TABLE Buddies(
ID            int auto_increment ,
UserName        VARCHAR(50) NOT NULL, 
EmailAddress    VARCHAR(100) NOT NULL,
Password        VARCHAR(200) NOT NULL,
RegistrationDate datetime NOT NULL,
primary key(ID)
);
