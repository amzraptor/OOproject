-- mysql --user=root --password=root < db.sql
-- db.sql - this is the database configuration file

DROP DATABASE IF EXISTS jewelry_box;
CREATE DATABASE IF NOT EXISTS jewelry_box;
USE jewelry_box;

CREATE TABLE IF NOT EXISTS USER
(
user_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_fname VARCHAR(100)	NOT NULL,
user_lname	VARCHAR(100)	NOT NULL,
user_username	VARCHAR(24) NOT NULL,
user_password	VARCHAR(32)	NOT NULL,
user_email	VARCHAR(100)	NOT NULL,
user_validated VARCHAR(100)	NOT NULL,

UNIQUE KEY	(user_username)
)ENGINE = InnoDB;


CREATE TABLE STORE (
store_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
store_name	VARCHAR(50)	NOT NULL,
store_img1 VARCHAR(200)	NOT NULL,
store_description	VARCHAR(500)	NULL,
store_template	VARCHAR(50)	NOT NULL,
store_color	VARCHAR(7)	NOT NULL,
user_id	MEDIUMINT NOT NULL,
FOREIGN KEY (user_id) REFERENCES USER(user_id)
)ENGINE = InnoDB;

CREATE TABLE PRODUCT (
product_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
product_name	VARCHAR(50)	NOT NULL,
product_category	VARCHAR(50)	NOT NULL,
product_material	VARCHAR(50)	NULL,
product_sizes	VARCHAR(50)	NULL,
product_gender	VARCHAR(50)	NOT NULL,
product_gemstone	VARCHAR(50)	NULL,
product_price	DOUBLE(12,2) NOT NULL,
product_img1 VARCHAR(200)	NOT NULL,
product_img2 VARCHAR(200) NULL,
product_img3 VARCHAR(200) NULL,
product_img4 VARCHAR(200) NULL,
product_img5 VARCHAR(200)	NULL,
product_qty	MEDIUMINT	NOT NULL,
product_description	VARCHAR(500)	NULL,
store_id	MEDIUMINT	NOT NULL,
FOREIGN KEY (store_id) REFERENCES STORE(store_id)
)ENGINE = InnoDB;

INSERT USER set user_fname='guest', user_lname='guest', user_username='guest', user_password='guest', user_email='guest', user_validated='valid';

INSERT USER set user_fname='Brandy',user_lname='Poag', user_username='bp', user_password='pass8888', user_email='mail', user_validated='true';

##STORE
INSERT INTO STORE(store_name,store_img1,store_description,store_template,store_color,user_id)
VALUES('Mary\'s Store','img','a cool store','1','#000000',1);
/*
INSERT INTO STORE(store_name,store_img1,store_description,store_template,store_color,user_id)
VALUES('Mark\'s Store','img','a cool store too','1','#ffffff',1);

INSERT INTO STORE(store_name,store_img1,store_description,store_template,store_color,user_id)
VALUES('Carl\'s Store','img','a cool store also','1','#4A3991',2);

*/
##PRODUCTS
INSERT INTO PRODUCT(product_name,product_category,product_material,product_sizes,product_gender,product_price,product_img1,product_qty,product_description,store_id)
VALUES('Men\'s necklace','necklaces','bronze','large','male',899.99,'/var/www/html/Default_Pic.png',20,'A cool necklace for men to wear. You want one!',1);

INSERT INTO PRODUCT(product_name,product_category,product_material,product_sizes,product_gender,product_price,product_img1,product_qty,product_description,store_id)
VALUES('Women\'s ring','rings','gold','small','female',3899.99,'/var/www/html/Default_Pic.png',20,'A cool ring for women to wear. You want one!',1);

INSERT INTO PRODUCT(product_name,product_category,product_material,product_sizes,product_gender,product_price,product_img1,product_qty,product_description,store_id)
VALUES('Child\'s necklace','necklaces','silver','small','unisex',8.99,'/var/www/html/Default_Pic.png',20,'You want one!',1);
