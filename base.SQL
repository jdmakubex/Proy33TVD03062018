create database oxxo;
	use oxxo;

create table contacto (
id int not null  AUTO_INCREMENT,
name varchar(30) not null,
email varchar(15) not null,
phone varchar(15) not null,
message varchar(300) not null,
primary key (id)
);