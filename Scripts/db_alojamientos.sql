create database if not exists alojamientos;
use alojamientos;
/*tabla usuarios*/
create table usuarios(
	id_usuario int auto_increment primary key,
	administrador boolean default 0,
	nombre varchar(20) not null,
	apellido varchar(20) not null,
	email varchar(100) not null,
	/*Password es una palabra reservada por eso le puse passwrd*/
	passwrd varchar(255) not null
);
/*tabla tipo_alojamiento*/
create table tipo_alojamientos(
	id_tipo_alojamiento int auto_increment primary key,
	nombre varchar(20) not null
);
/*tabla alojamientos*/
create table alojamientos(
	id_alojamiento int auto_increment primary key,
	nombre_alojamiento varchar(20) not null,
	imagen varchar(255),
	descripcion text,
	ubicacion varchar(100) not null,
	precio decimal(10,2),
	estado boolean,
	id_tipo_alojamiento int,
    foreign key (id_tipo_alojamiento) references tipo_alojamientos(id_tipo_alojamiento)
);
/*tabla reservaciones*/
create table reservaciones(
	id_reservacion int auto_increment primary key,
	id_usuario int,
	id_alojamiento int,
	fecha_entrada date,
	fecha_salida date,
	cantidad_personas int,
	comentarios text,
	estado boolean default 1,
    foreign key (id_usuario) references usuarios(id_isuario),
    foreign key (id_alojamiento) references alojamientos(id_alojamiento)
);