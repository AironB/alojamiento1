create database alojamientos;
use alojamientos;
create table empleados(
IdEmpleado int auto_increment primary key,
nombre varchar(15) not null,
apellido varchar(15) not null,
Telefono varchar(15) not null,
email varchar(15) not null,
correo varchar(20) not null,
cargo varchar(15) not null,
activo boolean default 1)
create table usuarios(
IdUsuario int auto_increment primary key,
UserName varchar(10) not null,
Passwd varchar(10) not null,
TipoUsr varchar(8) not null,
IdEmpleado int,
IdCliente int,
activo boolean default 1)
create table clientes(
IdCliente int auto_increment primary key,
nombre varchar(15) not null,
apellido varchar(15) not null,
telefono varchar(15) not null,
correo varchar(20) not null
)
create table productos(
IdProducto int auto_increment primary key,
NameProducto varchar(25) not null,
activo boolean default 1)
