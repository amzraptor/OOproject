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


CREATE TABLE STORE (
id 		VARCHAR(24) 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
name		VARCHAR(50)	NOT NULL,
img1 		VARCHAR(200)	NOT NULL,
description	VARCHAR(500)	,
template	VARCHAR(50)	NOT NULL,
color		VARCHAR(7)	NOT NULL,
user_id		VARCHAR(24) 	NOT NULL,
FOREIGN KEY (user_id) REFERENCES USER(id)
)

CREATE TABLE PRODUCT (
id 		VARCHAR(24) 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
name		VARCHAR(50)	NOT NULL,
category	VARCHAR(50)	NOT NULL,
material	VARCHAR(50)	,
sizes		VARCHAR(50)	,
gender		VARCHAR(50)	NOT NULL,
gemstone	VARCHAR(50)	,
price		DOUBLE(12,2) 	NOT NULL,
img1 		VARCHAR(200)	NOT NULL,
img2 		VARCHAR(200) 	,
img3 		VARCHAR(200) 	,
img4 		VARCHAR(200) 	,
img5 		VARCHAR(200)	,
qty		MEDIUMINT	NOT NULL,
description	VARCHAR(500)	,
store_id		MEDIUMINT	NOT NULL,
FOREIGN KEY (store_id) REFERENCES STORE(id)
)

INSERT USER set id='guest', fname='guest', lname='guest', username='guest', 
password='guest', email='guest', valid='false';

INSERT USER set id='bpoag', fname='Brandy', lname='Poag', username='bdpoag1', 
password='pass8888', email='bdpoag1@gmail.com', valid='false';

##STORE
INSERT INTO STORE(name,img1,description,template,color,user_id)
VALUES('Mary\'s Store','img','a cool store','1','#000000','guest');
/*
INSERT INTO STORE(name,img1,description,template,color,user_id)
VALUES('Mark\'s Store','img','a cool store too','1','#ffffff',1);

INSERT INTO STORE(name,img1,description,template,color,user_id)
VALUES('Carl\'s Store','img','a cool store also','1','#4A3991',2);

*/
##PRODUCTS
INSERT INTO PRODUCT(name,category,material,sizes,gender,price,img1,qty,description,store_id)
VALUES('Men\'s necklace','necklaces','bronze','large','male',899.99,'/var/www/html/Default_Pic.png',20,'A cool necklace for men to wear. You want one!',1);

INSERT INTO PRODUCT(name,category,material,sizes,gender,price,img1,qty,description,store_id)
VALUES('Women\'s ring','rings','gold','small','female',3899.99,'/var/www/html/Default_Pic.png',20,'A cool ring for women to wear. You want one!',1);

INSERT INTO PRODUCT(name,category,material,sizes,gender,price,img1,qty,description,store_id)
VALUES('Child\'s necklace','necklaces','silver','small','unisex',8.99,'/var/www/html/Default_Pic.png',20,'You want one!',1);

