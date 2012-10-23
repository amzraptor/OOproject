-- mysql --user=root --password=root < db.sql
-- db.sql - this is the database configuration file
DROP DATABASE IF EXISTS box;
CREATE DATABASE IF NOT EXISTS box;
USE box;

CREATE TABLE IF NOT EXISTS PAGE
(
	id		VARCHAR(24)	NOT NULL,
	header 		VARCHAR(100)	NULL,
	subheader	VARCHAR(100)	NULL,
	body		VARCHAR(100)	NULL,
	footer		VARCHAR(100)	NULL,
	info		VARCHAR(1000)	NULL,

	PRIMARY KEY 	(id)
)ENGINE = InnoDB;



INSERT PAGE set id='p1', header='header_1.php';
INSERT PAGE set id='p2', header='header_1.php', body='body1.php';

INSERT PAGE set id='guesthomepage', header='header1.php', subheader='subheader1.php', body='body1.php', footer='footer1.php';

INSERT PAGE set id='userhomepage', header='header3.php', subheader='subheader1.php', body='body1.php', footer='footer1.php';

INSERT PAGE set id='validationpage', header='header2.php', subheader='subheader2.php', body='body3.php', footer='footer1.php';

INSERT PAGE set id='signinsignuppage', header='header1.php', subheader='subheader2.php', body='body2.php', footer='footer1.php';



