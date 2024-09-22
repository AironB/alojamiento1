use alojamientos;
select * from usuarios
/* consulta de insercion base INSERT INTO usuarios (administrador, nombre, apellido, email, passwrd) VALUES(?,?,?,?,?);*/
/* consulta de insercion base INSERT INTO alojamientos (nombre_alojamiento, imagen, descripcion, ubicacion, precio, estado, id_tipo_alojamiento) VALUES (?,?,?,?,?,?,?);*/
/* editar alojamientos UPDATE alojamientos SET nombre_alojamiento = 'Nuevo Nombre', imagen = 'nueva_imagen.jpg', descripcion = 'Nueva descripción del alojamiento.', ubicacion = 'Nueva ubicación del alojamiento', precio = 250.00, estado = 1, id_tipo_alojamiento = 2  -- Cambiar el tipo de alojamiento (por ejemplo a Hostal) WHERE id_alojamiento = 1;  -- Cambiar este ID por el del alojamiento que quieres editar */
/* cambiar el estado de alojamiento UPDATE alojamientos SET estado = 0  -- Cambia el valor a 1 para activar o a 0 para desactivar WHERE id_alojamiento = 8;  -- Cambia este ID por el alojamiento específico que deseas modificar */
/* consulta de insercion base INSERT INTO reservaciones (id_usuario, id_alojamiento, fecha_entrada, fecha_salida, cantidad_personas, comentarios, estado) VALUES(?,?,?,?,?,?,?);*/
/*UPDATE reservaciones SET id_alojamiento = ?, fecha_entrada = '?',fecha_salida = '?',cantidad_personas = ?,comentarios = '?',estado = ? WHERE id_usuario = 4 and id_reservacion = 1; */
/*cambiar reservacionEstado  UPDATE reservaciones SET estado = ? WHERE id_usuario = 4 AND id_reservacion = 1; */
/*mostrar reservaciones general */
-- select 
-- 	usuarios.nombre, 
-- 	usuarios.apellido, 
-- 	usuarios.email, 
--     alojamientos.imagen, 
--     alojamientos.nombre_alojamiento, 
--     alojamientos.ubicacion, 
--     tipo_alojamientos.nombre, 
--     alojamientos.precio, 
--     reservaciones.fecha_entrada, 
--     reservaciones.fecha_salida, 
--     reservaciones.cantidad_personas, 
--     reservaciones.comentarios, case when reservaciones.estado = 1 then 'Confirmada' else 'Cancelada' end as estado_reservacion 
--     from reservaciones 
--     inner join usuarios on reservaciones.id_usuario = usuarios.id_usuario 
--     inner join alojamientos on reservaciones.id_alojamiento = alojamientos.id_alojamiento 
--     inner join tipo_alojamientos on alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento;


/*query para mostrar las reservaciones del cliente en sesion */
-- select 
--  	usuarios.nombre, 
--  	usuarios.apellido, 
--  	usuarios.email, 
--      alojamientos.imagen, 
--      alojamientos.nombre_alojamiento, 
--      alojamientos.ubicacion, 
--      tipo_alojamientos.nombre, 
--      alojamientos.precio, 
--      reservaciones.fecha_entrada, 
--      reservaciones.fecha_salida, 
--      reservaciones.cantidad_personas, 
--      reservaciones.comentarios, case when reservaciones.estado = 1 then 'Confirmada' else 'Cancelada' end as estado_reservacion 
--      from reservaciones 
--      inner join usuarios on reservaciones.id_usuario = usuarios.id_usuario 
--      inner join alojamientos on reservaciones.id_alojamiento = alojamientos.id_alojamiento 
--      inner join tipo_alojamientos on alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento where usuarios.id_usuario = 4;



-- INSERT INTO usuarios (administrador, nombre, apellido, email, passwrd) VALUES
-- (1, 'Admin1', 'Apellido1', 'admin1@example.com', 'password1'),  -- Administrador
-- (1, 'Admin2', 'Apellido2', 'admin2@example.com', 'password2'),  -- Administrador
-- (1, 'Admin3', 'Apellido3', 'admin3@example.com', 'password3'),  -- Administrador
-- (0, 'Cliente1', 'Apellido1', 'cliente1@example.com', 'password4'),  -- Cliente
-- (0, 'Cliente2', 'Apellido2', 'cliente2@example.com', 'password5'),  -- Cliente
-- (0, 'Cliente3', 'Apellido3', 'cliente3@example.com', 'password6'),  -- Cliente
-- (0, 'Cliente4', 'Apellido4', 'cliente4@example.com', 'password7'),  -- Cliente
-- (0, 'Cliente5', 'Apellido5', 'cliente5@example.com', 'password8'),  -- Cliente
-- (0, 'Cliente6', 'Apellido6', 'cliente6@example.com', 'password9'),  -- Cliente
-- (0, 'Cliente7', 'Apellido7', 'cliente7@example.com', 'password10');  -- Cliente
-- INSERT INTO tipo_alojamientos (nombre) VALUES
-- ('Hotel'),
-- ('Hostal'),
-- ('Apartamento'),
-- ('Casa'),
-- ('Cabaña'),
-- ('Resort'),
-- ('Villa'),
-- ('Bed & Breakfast'),
-- ('Motel'),
-- ('Pensión');


-- INSERT INTO alojamientos (nombre_alojamiento, imagen, descripcion, ubicacion, precio, estado, id_tipo_alojamiento) VALUES
-- ('Hotel Central', 'hotel_central.jpg', 'Hotel de lujo en el centro de la ciudad.', 'Calle Principal 123, Ciudad', 150.00, 1, 1),  -- Tipo: Hotel
-- ('Hotel Playa', 'hotel_playa.jpg', 'Hotel con vista al mar y acceso directo a la playa.', 'Avenida Marítima 45, Playa', 200.00, 1, 1),  -- Tipo: Hotel
-- ('Hotel Montaña', 'hotel_montana.jpg', 'Hotel acogedor en la montaña con vistas impresionantes.', 'Carretera Montaña 12, Montaña', 175.00, 1, 1),  -- Tipo: Hotel

-- ('Hostal Amistad', 'hostal_amistad.jpg', 'Hostal económico en el centro de la ciudad.', 'Calle Amistad 33, Ciudad', 40.00, 1, 2),  -- Tipo: Hostal
-- ('Hostal Juvenil', 'hostal_juvenil.jpg', 'Hostal juvenil con ambiente moderno y zonas comunes.', 'Calle Juventud 9, Ciudad', 30.00, 1, 2),  -- Tipo: Hostal
-- ('Hostal Familiar', 'hostal_familiar.jpg', 'Hostal familiar acogedor y tranquilo.', 'Calle Familiar 22, Ciudad', 50.00, 1, 2),  -- Tipo: Hostal

-- ('Apartamento Centro', 'apartamento_centro.jpg', 'Apartamento moderno en pleno centro.', 'Plaza Central 5, Ciudad', 120.00, 1, 3),  -- Tipo: Apartamento
-- ('Apartamento Playa', 'apartamento_playa.jpg', 'Apartamento frente al mar con balcón.', 'Paseo Marítimo 7, Playa', 180.00, 1, 3),  -- Tipo: Apartamento
-- ('Apartamento Montaña', 'apartamento_montana.jpg', 'Apartamento en la montaña con vistas panorámicas.', 'Camino Montaña 19, Montaña', 130.00, 1, 3);


-- INSERT INTO reservaciones (id_usuario, id_alojamiento, fecha_entrada, fecha_salida, cantidad_personas, comentarios, estado) VALUES
-- (4, 1, '2024-10-01', '2024-10-05', 2, 'Primera reserva en Hotel Central.', 1),  -- Cliente 1 en Hotel Central
-- (5, 2, '2024-10-10', '2024-10-12', 1, 'Segunda reserva en Hotel Playa.', 1),  -- Cliente 2 en Hotel Playa
-- (6, 3, '2024-11-01', '2024-11-04', 3, 'Tercera reserva en Hotel Montaña.', 1),  -- Cliente 3 en Hotel Montaña
-- (7, 4, '2024-11-15', '2024-11-20', 4, 'Reserva en Hostal Amistad.', 1),  -- Cliente 4 en Hostal Amistad
-- (8, 5, '2024-12-01', '2024-12-03', 2, 'Reserva en Hostal Juvenil.', 1),  -- Cliente 5 en Hostal Juvenil
-- (9, 6, '2024-12-15', '2024-12-17', 2, 'Reserva en Hostal Familiar.', 1),  -- Cliente 6 en Hostal Familiar
-- (10, 7, '2025-01-05', '2025-01-10', 3, 'Reserva en Apartamento Centro.', 1),  -- Cliente 7 en Apartamento Centro
-- (4, 8, '2025-01-20', '2025-01-25', 4, 'Reserva en Apartamento Playa.', 1),  -- Cliente 1 en Apartamento Playa
-- (5, 9, '2025-02-01', '2025-02-05', 2, 'Reserva en Apartamento Montaña.', 1),  -- Cliente 2 en Apartamento Montaña
-- (6, 1, '2025-02-15', '2025-02-20', 1, 'Segunda reserva en Hotel Central.', 1);  -- Cliente 3 en Hotel Central


-- UPDATE reservaciones
-- SET 
--     id_alojamiento = 2,  -- Nuevo alojamiento
--     fecha_entrada = '2024-12-01',
--     fecha_salida = '2024-12-05',
--     cantidad_personas = 2,
--     comentarios = 'Comentario actualizado de la reserva.',
--     estado = 1  -- Confirmada
-- WHERE id_reservacion = 1;  -- Cambiar por el ID de la reservación específica


-- UPDATE reservaciones
-- SET estado = 0  -- Cambia a 1 para confirmar, 0 para cancelar
-- WHERE id_usuario = 4 AND id_reservacion = 1;  -- Cambia estos valores por el usuario y la reservación correspondiente
-- Select alojamientos.nombre_alojamiento, alojamientos.imagen, alojamientos.descripcion, alojamientos.ubicacion, alojamientos.precio, case when alojamientos.estado = 1 then 'Disponible' else 'No esta disponible' end as estado_alojamiento, tipo_alojamientos.nombre from alojamientos inner join tipo_alojamientos on alojamientos.id_tipo_alojamiento = tipo_alojamientos.id_tipo_alojamiento;