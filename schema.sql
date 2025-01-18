set sql_mode= "no_auto_value_on_zero";
START TRANSACTION;

drop DATABASE if EXISTS `blog`;

create DATABASE  `blog`;

USE   `blog`;

create table IF NOT EXISTS  `news`(
	idn int not null auto_increment PRIMARY KEY,
    title varchar(100),
    content varchar(100),
    author varchar(100),
    date date,
    image varchar(200)
);

create table IF NOT EXISTS  `users`(
	idn int not null auto_increment PRIMARY KEY,
    lastname varchar(100),
    firstname varchar(100),
    email varchar(100) unique,
    pwd varchar(500)
);

