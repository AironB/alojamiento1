create database alojamientos;
use alojamientos;
create table usuarios(
id_usuario int auto_increment primary key,
administrador boolean default 0,
/*Agregue esta columna de aca por que pensemos en el usuario Juan Perez, cuantas personas se pueden registrar con ese usuario y por eso lo deje como unico*/
user_name varchar(255) not null unique,
nombre varchar(20) not null,
apellido varchar(20) not null,
email varchar(100) not null,
/*Password es una palbra reservada por eso le puse passwrd*/
passwrd varchar(255) not null);
create table reservaciones(
id_reservacion int auto_increment primary key,
id_usuario int,
id_alojamiento int,
fecha_entrada date,
fecha_salida date,
cantidad_personas int,
comentarios text,
estado boolean default 1);
create table alojamientos(
id_alojamiento int auto_increment primary key,
nombre_alojamiento varchar(20) not null,
imagen varchar(255),
descripcion text,
ubicacion varchar(100) not null,
precio decimal(10,2),
estado boolean,
id_tipo_alojamiento int);
create table tipo_alojamientos(
id_tipo_alojamiento int auto_increment primary key,
nombre varchar(20) not null)
