create table xl_impresstype
(
	id int(8) not null primary key auto_increment,
	impress_type varchar(32) not null



create table xl_impress 
(
	id varchar(128) not null primary key,
	target_id varchar(128) not null,
	operator_id varchar(128) not null,
	impress_type_id int(8) not null,
	impresscontent
);

create table xl_friendrelation
(
	id int(9) not null primary key auto_increment,
	name varchar(32) not null,
	email varchar(64) not null,
	parent_id varchar(128) not null,
	CONSTRAINT `xl_accountplanvote_ibfk_100` FOREIGN KEY (`parent_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

);