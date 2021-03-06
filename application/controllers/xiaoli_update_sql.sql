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
	cellphone varchar(16) not null,
	email varchar(64) not null,
	parent_id varchar(128) not null,
	CONSTRAINT `xl_accountplanvote_ibfk_100` FOREIGN KEY (`parent_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

);

create table xl_impressitem
	(
		id varchar(128) not null primary key,
		target_id varchar(128) not null,
		operator_id varchar(128) not null,
		impresscontent varchar(512) not null,
		updatetime timestamp not null default current_timestamp(),
		likenum int(8) not null default 0,
		commentnum int(8) not null default 0,
		is_hidden_user tinyint(1) not null default 0,
		CONSTRAINT `xl_impresssitem_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
		CONSTRAINT `xl_impresssitem_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

);

create table xl_impressitemref
(
	id varchar(128) not null primary key,
	operator_id varchar(128) not null,
	impress_id varchar(128) not null,
	CONSTRAINT `xl_impressitemref_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `xl_impressitemref_ibfk_2` FOREIGN KEY (`impress_id`) REFERENCES `xl_impressitem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

);

create table xl_impresscomment
	(
		id varchar(128) not null primary key,
		operator_id varchar(128) not null,
		impress_id varchar(128) not null,
		content varchar(512) not null,
	CONSTRAINT `xl_impresscomment_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `xl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `xl_impresscomment_ibfk_2` FOREIGN KEY (`impress_id`) REFERENCES `xl_impressitem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
		);