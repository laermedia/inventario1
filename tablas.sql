CREATE DATABASE inventario;
USE inventario;

create table usuario(
id smallint unsigned NOT NULL auto_increment,
cargo varchar(30),
departamento varchar(30),
nombre varchar(20),
apellidos varchar(30),
correo varchar(20),
nacimiento date,
contrasenya varchar(100),

primary key (id)
) engine=Innodb;

create table item(
id smallint unsigned NOT NULL auto_increment,
categoria varchar(30),
modelo varchar(30),
color varchar(15),
precio float(6.2),
existencias int(4),
fecha datetime NOT NULL,

primary key (id)
) engine = Innodb;