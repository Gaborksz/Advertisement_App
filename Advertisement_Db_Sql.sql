
DROP USER IF EXISTS  'advertisementDb_admin'@'localhost';
DROP DATABASE IF EXISTS advertisement_Db;

CREATE DATABASE advertisement_Db;
CREATE USER 'advertisementDb_admin'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON advertisement_Db.* TO 'advertisementDb_admin'@'localhost';

USE advertisement_Db;


CREATE TABLE users(
	id		INT NOT NULL AUTO_INCREMENT,
	`name` 	VARCHAR(40) DEFAULT NULL,
    
	PRIMARY KEY (id)
    
)ENGINE=InnoDB AUTO_INCREMENT=1 CHAR SET=latin1;


INSERT INTO users (`name`) 
VALUES 
		('Peter'),
		('Arnold'),
		('Piedone'),
		('IronMan');

    

CREATE TABLE advertisements(
	id		INT NOT NULL AUTO_INCREMENT,
	userId	INT DEFAULT NULL,
	title	VARCHAR(40) DEFAULT NULL,
    
	PRIMARY KEY (id),
	CONSTRAINT FK_user_id FOREIGN KEY (userId) REFERENCES users(id)
    
)ENGINE=InnoDB AUTO_INCREMENT=1 CHAR SET=latin1;




INSERT INTO advertisements (`userId`, `title`) 
VALUES 
		(1, 'Buy my Fish'),
		(2, 'Come to my Gym'),
		(3, 'Go to Honkong'),
		(4, 'Buy my BodySuit');


select * from mysql.user;