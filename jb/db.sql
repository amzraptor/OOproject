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
    banner	VARCHAR(200)	,
    logo	VARCHAR(200)	,
    background	VARCHAR(200) 	,
    address1	VARCHAR(50)	NOT NULL,
    address2	VARCHAR(50)	,
    city	VARCHAR(50)	NOT NULL,
    state	VARCHAR(2)	NOT NULL,
    zipcode	VARCHAR(10)	NOT NULL,
    telephone	VARCHAR(50)	NOT NULL,
    email	VARCHAR(50)	NOT NULL,
    shipping	DOUBLE(12,2)	NOT NULL,
    local_tax	DOUBLE(12,2)	NOT NULL,
    inv_note	VARCHAR(200)	DEFAULT 'Thanks For Your Business',
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

CREATE TABLE IF NOT EXISTS invoice (
    invoice_id	MEDIUMINT	AUTO_INCREMENT PRIMARY KEY,
    store_id	MEDIUMINT	NOT NULL,
    product_id	MEDIUMINT	NOT NULL,
    order_date	TIMESTAMP	DEFAULT NOW(),
    b_address1	VARCHAR(50)	NOT NULL,
    b_address2	VARCHAR(50)	,
    b_city	VARCHAR(50)	NOT NULL,
    b_state	VARCHAR(2)	NOT NULL,
    b_zipcode	VARCHAR(10)	NOT NULL,
    b_telephone	VARCHAR(50)	NOT NULL,
    b_email	VARCHAR(50)	NOT NULL,
    s_address1	VARCHAR(50)	NOT NULL,
    s_address2	VARCHAR(50)	,
    s_city	VARCHAR(50)	NOT NULL,
    s_state	VARCHAR(2)	NOT NULL,
    s_zipcode	VARCHAR(10)	NOT NULL,
    FOREIGN KEY (store_id) REFERENCES store(store_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
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


INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Mary\'s Store','img','a cool store','1','#000000', 1, '1234 Sweet st', 'Sugertown', 'MA', '24689', '123-765-5342', 'MaryMadhouse@gmail.com', 5.00, 2.2);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Mark\'s Store','img','a cool store too','1','#ffffff', 1, '460 Keene', 'Columbia', 'mo', '65203', '573-678-0001', 'MarkTheMan@gmail.com', 2.95, 5.95);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Carl\'s Store','img','a cool store also','1','#4A3991', 2, '123 main st', 'queen city', 'mo', '12457', '573-268-8645', 'Carl@qcfd.org', 9.99, 1.75);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Redneck\'s Store','img','a red store','1','#000000', 5, 'some gravel road', 'Redneckville', 'ky', '97532', '123-456-7890', 'bigtruck@yahoo.com', .99, 0.0);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Mark\'s Other Store','img','a cool store two','1','#ffffff', 1, '460 Keene', 'Columbia', 'mo', '65203', '573-678-0001', 'MarkTheMan@gmail.com', 2.95, 5.95);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Supper Awesome Store','img','Best stuff to own','1','#4A3991',5, '4324 Germantown', 'Greentop', 'ca', '10923', '612-732-7501', 'Bestthanmost@gmail.com', 12.95, 9.32);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Prison Store','img','hide from the guards','1','#4A3991', 10, '1 main street', 'San Quentin', 'ca', '94964', '415-454-1460', 'inmate178334@cdc.gov', 7.38, 7.35);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Crazy 88 Store','img','a fighting store','1','#000000', 5, '543 loony', 'Crazytown', 'wa', '61947', '638-862-9683', 'insaneinthebrain@lol.com', 3.33, 3.33);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('Doom\'s Day Store','img','The World Is Ending Soon','1','#ffffff', 1, 'way out in the woods', 'the woods', 'mn', '13579', '329-849-7387', 'orderofthestick@woodppl.com', 5.99, 0.0);

INSERT INTO store(name,img1,description,template,color,user_id, address1, city, state, zipcode, telephone, email, shipping, local_tax)
VALUES('I need money','img','Buy My Stuff NOW!!!!','8','#4A3991', 2, '444 very poor', 'poorberg', 'pa', '95463', '000-000-0000', 'poorcauseigotamac@gmail.com', 22, 6.91);


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

