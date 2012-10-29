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
	valid		VARCHAR(100)	NOT NULL,

	PRIMARY KEY 	(username),
	UNIQUE KEY	(id)
)ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS SESSIONS
(
	id 		VARCHAR(24)	NOT NULL,
	username	VARCHAR(24) 	NOT NULL,
	time		TIMESTAMP	NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY 	(id),
	FOREIGN KEY	(username) REFERENCES USER(username)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)ENGINE = InnoDB;



INSERT USER set id='bpoag', fname='Brandy', lname='Poag', username='bdpoag1', 
password='pass8888', email='bdpoag1@gmail.com', valid='false';


