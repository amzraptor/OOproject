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
    valid 	VARCHAR(100)    DEFAULT 'notvalid',
    active	VARCHAR(20)    DEFAULT 'true',
    UNIQUE KEY     (username)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS store (
    store_id	MEDIUMINT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sname     	VARCHAR(50)     DEFAULT 'none',
    description VARCHAR(500)    DEFAULT 'none',
    user_username   VARCHAR(32)    	NOT NULL,
    lfont      VARCHAR(50)	DEFAULT 'none',
    sfont      VARCHAR(50)	DEFAULT 'none',
    banner_color VARCHAR(50)	DEFAULT 'none',
    background_color VARCHAR(50)	DEFAULT 'none',
    foreground_color VARCHAR(50)	DEFAULT 'none',
    sfont_color VARCHAR(50)	DEFAULT 'none',
    lfont_color VARCHAR(50)	DEFAULT 'none',
    specialty VARCHAR(50)	DEFAULT 'none',
    owner VARCHAR(50)	DEFAULT 'none',
    semail VARCHAR(50)	DEFAULT 'none',
    phone_number VARCHAR(50)	DEFAULT 'none',
    street_address VARCHAR(200)	DEFAULT 'none',
    city VARCHAR(200)	DEFAULT 'none',
    state VARCHAR(50)	DEFAULT 'none',
    zip VARCHAR(20)	DEFAULT 'none',
    img1 VARCHAR(50)	DEFAULT 'none',
    img2 VARCHAR(50)	DEFAULT 'none',
    img3 VARCHAR(50)	DEFAULT 'none',
    shipping VARCHAR(50)	DEFAULT 'none',
    cat1 VARCHAR(200)	DEFAULT 'none',
    cat2 VARCHAR(200)	DEFAULT 'none',
    cat3 VARCHAR(200)	DEFAULT 'none',
    cat4 VARCHAR(200)	DEFAULT 'none',
    cat5 VARCHAR(200)	DEFAULT 'none',
    publish VARCHAR(10)	DEFAULT 'false',
    active	VARCHAR(20)    DEFAULT 'true',

    FOREIGN KEY (user_username) REFERENCES user(username)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product (
    product_id	MEDIUMINT	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    store_id    MEDIUMINT       NOT NULL,
    name        VARCHAR(50)     NOT NULL,
    category    VARCHAR(50)     NOT NULL,
    store_category    VARCHAR(200)     NOT NULL,
    gender    	VARCHAR(50)     NOT NULL,
    price       DOUBLE(12,2)    NOT NULL,
    img1        VARCHAR(200)    NOT NULL,
    qty        	MEDIUMINT       NOT NULL,
    material    VARCHAR(50)     NULL,
    size        VARCHAR(50)     NULL,
    color       VARCHAR(50)     NULL,
    theme       VARCHAR(50)     NULL,
    description VARCHAR(500)    NULL,
    img2        VARCHAR(200)    NULL,
    img3        VARCHAR(200)    NULL,
    img4        VARCHAR(200)    NULL,
    img5        VARCHAR(200)    NULL,
    likes        MEDIUMINT    NOT NULL DEFAULT 0,
    dislikes        MEDIUMINT    NOT NULL DEFAULT 0,
    active	VARCHAR(20)    DEFAULT 'true',

    FOREIGN KEY (store_id) REFERENCES store(store_id)
)ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS cart(
    	cart_id	MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id         MEDIUMINT       NOT NULL,
        product_id  MEDIUMINT    NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS invoice(
    invoice_id	MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    status	VARCHAR(20)    DEFAULT 'pending',
	name    VARCHAR(200)       DEFAULT 'none',
    user_id    MEDIUMINT       DEFAULT 1,
    street_address VARCHAR(200)	DEFAULT 'none',
    city VARCHAR(200)	DEFAULT 'none',
    state VARCHAR(50)	DEFAULT 'none',
    zip VARCHAR(20)	DEFAULT 'none',
    attention VARCHAR(200)	DEFAULT 'none',
    active	VARCHAR(20)    DEFAULT 'true',
    dt    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES user(user_id)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product_invoice(
    product_invoice_id	MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
    store_id  MEDIUMINT       NOT NULL,
    invoice_id  MEDIUMINT       NOT NULL,
    product_id  MEDIUMINT       NOT NULL,
    product_name       VARCHAR(50)   NOT  NULL,
    price       DOUBLE(12,2)    NOT NULL,
    qty        	MEDIUMINT       NOT NULL,
    active	VARCHAR(20)    DEFAULT 'true',

    FOREIGN KEY (store_id) REFERENCES store(store_id),
    FOREIGN KEY (invoice_id) REFERENCES invoice(invoice_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
)ENGINE = InnoDB;


INSERT user set fname='guest', lname='guest', username='guest',
password='guest', email='guest', valid='-99';

INSERT user set fname='Brandy', lname='Poag', username='bdpoag1',
password='pass8888', email='bdpoag1@gmail.com', valid='-99';

INSERT user set fname='Ahmad', lname='Zaki', username='amzraptor',
password='mewtwo', email='aelhedek1@cougars.ciss.com', valid='-99';

INSERT user set fname='Donald', lname='Duck', username='thefeatherman', password='pass888', email='DDuck@gmail.com', valid='-99';

INSERT user set fname='Billy', lname='The Kid', username='ishootthesheriff', password='pass8888', email='theshooter@gmail.com', valid='-99';

INSERT user set fname='Billbob', lname='Billbob', username='myuncle', password='pass888', email='glee@gmail.com', valid='-99';

INSERT user set fname='Sally', lname='McNeal', username='SillySallySue', password='pass8888', email='SSS@gmail.com', valid='-99';

INSERT user set fname='Judo', lname='Chop', username='TheKingofcombat', password='pass888', email='judochop@gmail.com', valid='-99';

INSERT user set fname='Milly', lname='=Milt', username='Sue', password='pass8888', email='theshooter@gmail.com', valid='-99';

INSERT user set fname='Bob', lname='Billy', username='afather', password='pass888', email='nonfork391@gmail.com', valid='-99';

INSERT user set fname='Bubba', lname='J', username='Lover', password='pass8888', email='mobee@gmail.com', valid='-99';


INSERT INTO store(user_username)
VALUES('bdpoag1');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Mark\'s Store','img','a cool store too','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Carl\'s Store','img','a cool store also','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Redneck\'s Store','img','a red store','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Mark\'s Other Store','img','a cool store two','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Supper Awesome Store','img','Best stuff to own','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Niffty Nacks','img','Homemade brooches.','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Crazy 88 Store','img','Ring from the 80s','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('The Jems','img','Lovely earings','Sue');

INSERT INTO store(sname,img1,description,user_username)
VALUES('Neck Magic','img','Buy cool necklaces NOW!!!!','Sue');

INSERT INTO product (name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Men\'s necklace','necklaces','bronze','large','male',899.99,'../images/Default_Pic.png',20,'A cool necklace for men to wear. You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Women\'s ring','rings','gold','small','female',3899.99,'../images/Default_Pic.png',20,'A cool ring for women to wear. You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Child\'s necklace', 'necklaces', 'silver', 'small', 'unisex', 8.99, '../images/Default_Pic.png', 20, 'You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Bracelet', 'other', 'other', 'large', 'unisex', 11.99, '/var/www/html/Default.png', 2, 'A nice bracelet to get friends. You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Men\'s ring', 'ring', 'gold', 'large', 'male', 899.99, '../images/Default_Pic.png', 20, 'just like Mr T wears', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Women\'s necklace','necklaces','wood','18','woman',19.98,'../images/Default_Pic.png',20,'A cool necklace for women to wear. You want one!',1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Kids\'s rings', 'rings', 'silver', 'small', 'unisex', 4.20, '../images/Default_Pic.png',200, 'A cool ring for you kid. You want one!', 1);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Women\'s necklace','necklaces','wood','18','woman',19.98,'../images/Default_Pic.png',20,'A cool necklace for women to wear. You want one!',2);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Kids\'s rings', 'rings', 'silver', 'small', 'unisex', 4.20, '../images/Default_Pic.png',200, 'A cool ring for you kid. You want one!', 2);

INSERT INTO product(name,category,material,size,gender,price,img1,qty,description,store_id)
VALUES('Kid\'s jewelry', 'body jewelry', 'silver', 'large', 'unisex', 4.20, '../images/Default_Pic.png',200, 'A cool thing for you kid. You want one!', 1);


INSERT invoice set street_address='1 Main St.', city='Columbia', state='MO.';
INSERT invoice set street_address='120 10th St.', city='Dallas', state='TX.';
INSERT invoice set street_address='198 Rodeo St.', city='L.A.', state='CA.';
INSERT invoice set street_address='128 1st St.', city='St. Louis', state='MO.';






INSERT product_invoice set store_id=2, invoice_id=1, product_id=5, product_name='Kids\'s rings',price=4.20, qty='2';
INSERT product_invoice set store_id=2, invoice_id=1, product_id=4, product_name='Women\'s necklace',price=19.98, qty='1';
INSERT product_invoice set store_id=2, invoice_id=2, product_id=5, product_name='Kids\'s rings',price=4.20, qty='2';
INSERT product_invoice set store_id=2, invoice_id=2, product_id=4, product_name='Women\'s necklace',price=19.98, qty='1';
INSERT product_invoice set store_id=2, invoice_id=2, product_id=2, product_name='Bracelet',price=11.99, qty='2';
INSERT product_invoice set store_id=2, invoice_id=2, product_id=3, product_name='Men\'s ring',price=899.99, qty='1';

INSERT product_invoice set store_id=3, invoice_id=3, product_id=4, product_name='Women\'s necklace',price=19.98, qty='1';
INSERT product_invoice set store_id=3, invoice_id=3, product_id=5, product_name='Kids\'s rings',price=4.20, qty='2';
INSERT product_invoice set store_id=3, invoice_id=4, product_id=4, product_name='Women\'s necklace',price=19.98, qty='1';
INSERT product_invoice set store_id=4, invoice_id=4, product_id=2, product_name='Bracelet',price=11.99, qty='2';
INSERT product_invoice set store_id=4, invoice_id=4, product_id=3, product_name='Men\'s ring',price=899.99, qty='1';






