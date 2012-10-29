CREATE TABLE Users (
user_id			MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_auth		BOOLEAN 	NOT NULL,
user_fname		VARCHAR(50)	NOT NULL,
user_lname		VARCHAR(50)	NOT NULL,
user_username		VARCHAR(50)	NOT NULL,
user_email		VARCHAR(50)	NOT NULL,
user_password		VARCHAR(50)	NOT NULL,
user_img1		VARCHAR(200),
user_has_store		BOOLEAN		NOT NULL
)

CREATE TABLE Stores (
store_id 		MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
store_name		VARCHAR(50)	NOT NULL,
store_img1 		VARCHAR(200)	NOT NULL,
store_description	VARCHAR(500)	,
store_template		VARCHAR(50)	NOT NULL,
store_color		VARCHAR(7)	NOT NULL,
user_id			MEDIUMINT	NOT NULL,
FOREIGN KEY (user_id) REFERENCES Users(user_id)
)

CREATE TABLE Products (
product_id 		MEDIUMINT 	NOT NULL AUTO_INCREMENT PRIMARY KEY,
product_name		VARCHAR(50)	NOT NULL,
product_category	VARCHAR(50)	NOT NULL,
product_material	VARCHAR(50)	,
product_size		VARCHAR(50)	,
product_gender		VARCHAR(50)	NOT NULL,
product_gemstone	VARCHAR(50)	,
product_price		DOUBLE(12,2) 	NOT NULL,
product_img1 		VARCHAR(200)	NOT NULL,
product_img2 		VARCHAR(200) 	,
product_img3 		VARCHAR(200) 	,
product_img4 		VARCHAR(200) 	,
product_img5 		VARCHAR(200)	,
product_qty		MEDIUMINT	NOT NULL,
product_description	VARCHAR(500)	,
store_id		MEDIUMINT	NOT NULL,
FOREIGN KEY (store_id) REFERENCES Stores(store_id)
)



##USERS
INSERT INTO Users(user_auth,user_fname,user_lname,user_username,user_email,user_password,user_img1)
VALUES(1,'Mark','Vaughn','markvaughn','markw.vaughn@gmail.com','password','/var/www/html/Default_Pic.png');

INSERT INTO Users(user_auth,user_fname,user_lname,user_username,user_email,user_password,user_img1)
VALUES(1,'Carl','Roe','carlroe','carl@example.com','password','/var/www/html/Default_Pic.png');

INSERT INTO Users(user_auth,user_fname,user_lname,user_username,user_email,user_password,user_img1)
VALUES(1,'Mary','Higgens','maryhiggens','mary@example.com','password','/var/www/html/Default_Pic.png');

##STORE
INSERT INTO Stores(store_name,store_img1,store_description,store_template,store_color,user_id)
VALUES('Mary\'s Store','img','a cool store','1','#000000',3);

INSERT INTO Stores(store_name,store_img1,store_description,store_template,store_color,user_id)
VALUES('Mark\'s Store','img','a cool store too','1','#ffffff',1);

INSERT INTO Stores(store_name,store_img1,store_description,store_template,store_color,user_id)
VALUES('Carl\'s Store','img','a cool store also','1','#4A3991',2);


##PRODUCTS
INSERT INTO Products(product_name, product_category,product_material,product_size,product_gender,product_price,product_img1,product_qty,product_description,store_id)
VALUES('Men\'s necklace','necklaces','bronze','large','male',899.99,'/var/www/html/Default_Pic.png',20,'A cool necklace for men to wear. You want one!',1);

INSERT INTO Products(product_name, product_category,product_material,product_size,product_gender,product_price,product_img1,product_qty,product_description,store_id)
VALUES('Women\'s ring','rings','gold','small','female',3899.99,'/var/www/html/Default_Pic.png',20,'A cool ring for women to wear. You want one!',3);

INSERT INTO Products(product_name, product_category,product_material,product_size,product_gender,product_price,product_img1,product_qty,product_description,store_id)
VALUES('Child\'s necklace','necklaces','silver','small','unisex',8.99,'/var/www/html/Default_Pic.png',20,'You want one!',2);

