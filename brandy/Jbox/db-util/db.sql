-- mysql --user=root --password=root < db.sql
-- db.sql - this is the database configuration file
DROP DATABASE IF EXISTS jewelry_box;
CREATE DATABASE IF NOT EXISTS jewelry_box;
USE jewelry_box;

CREATE TABLE IF NOT EXISTS USER
(
	id 		VARCHAR(24)	NOT NULL,
	fname 		VARCHAR(100)	NOT NULL,
	lname		VARCHAR(100)	NOT NULL,
	username	VARCHAR(24) 	NOT NULL,
	password	VARCHAR(32)	NOT NULL,
	email		VARCHAR(100)	NOT NULL,

	PRIMARY KEY 	(id),
	UNIQUE KEY	(email)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS TEMPUSER
(
	id 		VARCHAR(32)	NOT NULL,
	fname 		VARCHAR(100)	NOT NULL,
	lname		VARCHAR(100)	NOT NULL,
	username	VARCHAR(24) 	NOT NULL,
	password	VARCHAR(32)	NOT NULL,
	email		VARCHAR(100)	NOT NULL,

	PRIMARY KEY 	(id),
	UNIQUE KEY	(email)
)ENGINE = InnoDB;

INSERT USER set id='bpoag', fname='Brandy', lname='Poag', username='bdpoag1', 
password='pass8888', email='bdpoag1@gmail.com';



