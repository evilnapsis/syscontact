/* 
@author: evilnapsis
@brief: updated 2018 
*/
create database syscontact;
use syscontact;

create table user(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	username varchar(50),
	email varchar(255),
	password varchar(60),
	image varchar(255),
	status int default 1,
	kind int default 1,
	created_at datetime
);

/**
* password: encrypted using sha1(md5("mypassword"))
* status: 1. active, 2. inactive, 3. other, ...
* kind: 1. root, 2. other, ...
**/

insert into user (name,username,password,created_at) value ("Administrator","admin",sha1(md5("admin")),NOW());


create table contact(
	id int not null auto_increment primary key,
	fullname varchar(50),
	email varchar(255),
	subject varchar(255),
	message varchar(255),
	created_at datetime
);
