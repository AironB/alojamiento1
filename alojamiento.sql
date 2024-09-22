create database if not exists alojamientos;
use alojamientos;
create table usuarios(
	id_usuario int auto_increment primary key,
	administrador boolean default 0,
	nombre varchar(20) not null,
	apellido varchar(20) not null,
	email varchar(100) not null,
/*Password es una palabra reservada por eso le puse passwrd*/
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
nombre varchar(20) not null);

INSERT INTO `alojamientos`.`usuarios`
(`id_usuario`,
`administrador`,
`nombre`,
`apellido`,
`email`,
`passwrd`)
VALUES
(default,
default,
"Airon Mauricio",
"Bautista Majano",
"d17ex02@outlook.es",
"Subaru209$$");
INSERT INTO `alojamientos`.`usuarios`
(`id_usuario`,
`administrador`,
`nombre`,
`apellido`,
`email`,
`passwrd`)
VALUES
(default,
default,
"Christian",
"Martinez",
"alfred_dev@gmail.com",
"Subaru209$$");
INSERT INTO `alojamientos`.`usuarios`
(`id_usuario`,
`administrador`,
`nombre`,
`apellido`,
`email`,
`passwrd`)
VALUES
(default,
default,
"Isaac",
"Castillo",
"icastillo@hotmail.com",
"Subaru209$$");
SELECT `usuarios`.`id_usuario`,
    `usuarios`.`administrador`,
    `usuarios`.`nombre`,
    `usuarios`.`apellido`,
    `usuarios`.`email`,
    `usuarios`.`passwrd`
FROM `alojamientos`.`usuarios`;
UPDATE `alojamientos`.`usuarios`
SET
`administrador` = 1
WHERE `id_usuario` = 2;
INSERT INTO `alojamientos`.`tipo_alojamientos`
(`id_tipo_alojamiento`,
`nombre`)
VALUES
(default,
"individual");
SELECT `id_tipo_alojamiento`,
`nombre`
FROM `alojamientos`.`tipo_alojamientos`;
INSERT INTO `alojamientos`.`alojamientos`
(`id_alojamiento`,
`nombre_alojamiento`,
`imagen`,
`descripcion`,
`ubicacion`,
`precio`,
`estado`,
`id_tipo_alojamiento`)
VALUES
(default,
"Playa",
"https://a0.muscache.com/im/pictures/e1e59d29-9c6a-4f81-9a73-7b805470ad84.jpg?im_w=720",
"Habitacion para 1 persona",
"La costa del sol",
100.00,
default,
1);
select `id_alojamiento`,
`nombre_alojamiento`,
`imagen`,
`descripcion`,
`ubicacion`,
`precio`,
`estado`,
`id_tipo_alojamiento` from `alojamientos`.`alojamientos`;
INSERT INTO `alojamientos`.`reservaciones`
(`id_reservacion`,
`id_usuario`,
`id_alojamiento`,
`fecha_entrada`,
`fecha_salida`,
`cantidad_personas`,
`comentarios`,
`estado`)
VALUES
(default,
1,
1,
now(),
now(),
1,
"Habitacion con cable",
1);
select `id_reservacion`,
`id_usuario`,
`id_alojamiento`,
`fecha_entrada`,
`fecha_salida`,
`cantidad_personas`,
`comentarios`,
`estado` from `alojamientos`.`reservaciones`
