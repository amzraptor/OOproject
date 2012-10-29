-- mysql --user=root --password=root < db.sql
-- db.sql - this is the database configuration file

DROP DATABASE IF EXISTS jewelry_box;
CREATE DATABASE IF NOT EXISTS jewelry_box;
USE jewelry_box;


CREATE TABLE IF NOT EXISTS user(
    user_id	MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fname       VARCHAR(100)    NOT NULL,
    lname 	VARCHAR(100)    NOT NULL,
    username 	VARCHAR(32)     NOT NULL,
    password 	VARCHAR(32)     NOT NULL,
    email 	VARCHAR(100)    NOT NULL,
    valid 	VARCHAR(100)    NOT NULL,
    UNIQUE KEY     (username)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS store (
    store_id	MEDIUMINT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name     	VARCHAR(50)     NOT NULL,
    img1     	VARCHAR(200)    NOT NULL,
    description VARCHAR(500)    ,
    template    VARCHAR(50)     NOT NULL,
    color     	VARCHAR(7)    	NOT NULL,
    user_id     MEDIUMINT    	NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product (
    product_id	MEDIUMINT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    store_id    MEDIUMINT       NOT NULL,
    name        VARCHAR(50)     NOT NULL,
    category    VARCHAR(50)     NOT NULL,
    gender    	VARCHAR(50)     NOT NULL,
    price       DOUBLE(12,2)    NOT NULL,
    img1        VARCHAR(200)    NOT NULL,
    qty        	MEDIUMINT       NOT NULL,
    material    VARCHAR(50)     ,
    size        VARCHAR(50)     ,
    color       VARCHAR(50)     ,
    theme       VARCHAR(50)     ,
    description VARCHAR(500)    ,
    img2        VARCHAR(200)    ,
    img3        VARCHAR(200)    ,
    img4        VARCHAR(200)    ,
    img5        VARCHAR(200)    ,
    FOREIGN KEY (store_id) REFERENCES store(store_id)
)ENGINE = InnoDB;



INSERT user set fname='guest', lname='guest', username='guest',
password='guest', email='guest', valid='-99';

INSERT user set fname='Brandy', lname='Poag', username='bdpoag1',
password='pass8888', email='bdpoag1@gmail.com', valid='-99';

INSERT user set fname='Donald', lname='Duck', username='The feather Man', password='pass888', email='DDuck@gmail.com', valid='-99';

INSERT user set fname='Billy', lname='The Kid', username='IShootTheSheriff', password='pass8888', email='theshooter@gmail.com', valid='-99';

INSERT user set fname='Billbob', lname='Billbob', username='I am my uncle', password='pass888', email='nonforkingfamilytree@gmail.com', valid='-99';

INSERT user set fname='Sally', lname='McNeal', username='Silly Sally Sue', password='pass8888', email='SSS@gmail.com', valid='-99';

INSERT user set fname='Judo', lname='Chop', username='The King of combat', password='pass888', email='judochop@gmail.com', valid='-99';

INSERT user set fname='Milly', lname='The Adult', username='Sue', password='pass8888', email='theshooter@gmail.com', valid='-99';

INSERT user set fname='Bobbilly', lname='BobBilly', username='I am my father', password='pass888', email='nonforkingfamilytree391@gmail.com', valid='-99';

INSERT user set fname='Bubba', lname='J', username='Beer Lover', password='pass8888', email='morebeer@gmail.com', valid='-99';


INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Mary\'s Store','img','a cool store','1','#000000', 1);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Mark\'s Store','img','a cool store too','1','#ffffff', 1);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Carl\'s Store','img','a cool store also','1','#4A3991', 2);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Redneck\'s Store','img','a red store','1','#000000', 5);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Mark\'s Other Store','img','a cool store two','1','#ffffff', 1);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Supper Awesome Store','img','Best stuff to own','1','#4A3991',5);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Prion\'s Store','img','hide from the guards','1','#4A3991', 10);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Crazy 88 Store','img','a fighting store','1','#000000', 5);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('Doom\'s Day Store','img','The World Is Ending Soon','1','#ffffff', 1);

INSERT INTO store(name,img1,description,template,color,user_id)
VALUES('I need money','img','Buy My Stuff NOW!!!!','8','#4A3991', 2);


INSERT INTO product (name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Men\'s necklace','necklaces','bronze','large','male',899.99,'/var/www/html/Default_Pic.png',20,'A cool necklace for men to wear. You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Women\'s ring','rings','gold','small','female',3899.99,'/var/www/html/Default_Pic.png',20,'A cool ring for women to wear. You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Child\'s necklace', 'necklaces', 'silver', 'small', 'unisex', 8.99, '/var/www/html/Default_Pic.png', 20, 'You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('prison shank', 'other', 'other', 'large', 'unisex', 11.99, '/var/www/html/Default_Pic.png', 2, 'A cool shank for men to get people. You want one!', 7);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Men\'s ring', 'ring', 'gold', 'large', 'male', 899.99, '/var/www/html/Default_Pic.png', 20, 'just like Mr T wears', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Women\'s necklace','necklaces','wood','18','woman',19.98,'/var/www/html/Default_Pic.png',20,'A cool necklace for women to wear. You want one!',1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Kids\'s tongue stud', 'body jewelry', 'silver', 'large', 'unisex', 4.20, '/var/www/html/Default_Pic.png',200, 'A cool thing for you kid. You want one!', 1);

