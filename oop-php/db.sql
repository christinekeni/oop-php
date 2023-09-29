DROP DATABASE IF EXISTS memberdb;
CREATE DATABASE IF NOT EXISTS memberdb;
USE memberdb;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
	userId bigint(11) not null auto_increment,
	fullname VARCHAR(50) not null DEFAULT '',
	email VARCHAR(50) not null DEFAULT '',
	postaladdress VARCHAR(50) not null DEFAULT '',
	password VARCHAR(60) not null DEFAULT '',
	userTypeId bigint(11) not null DEFAULT 0,
	PRIMARY KEY (userId),
	UNIQUE KEY email (email)

);



