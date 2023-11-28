delimiter //
    drop procedure if exists agregarProducto ;
    drop procedure if exists agregarMovimiento ;
//
/*     create procedure agregarMovimiento(
        /* ...y sus datos de entrada (parámetros) */
        IN tipo_mov ENUM('entrada','salidaVendido','salidaVencido'),
        IN cant int
    )
    BEGIN
        update usuarios.sesion
        set estado='cerrada'
        where id in
        (select sesion_id from usuarios.inicia
        where usuario_nombre=usuario_nom);
        
    END// */

    DELIMITER //
    CREATE PROCEDURE agregarMovimiento(
        IN tipo_mov ENUM('entrada','salidaVendido','salidaDescartado'), 
        IN pCant INT, 
        IN pFecha DATE, 
        IN Email VARCHAR(255), 
        IN pcodigo INT)

    BEGIN
        DECLARE movimientoID INT;

        INSERT INTO movimiento (tipo, cant, fecha_mov) VALUES (tipo_mov, pCant, pFecha);
        SELECT last_insert_id() INTO movimientoID;

        INSERT INTO tiene (user_email, movimiento_id) VALUES (Email, movimientoID);
        INSERT INTO sufre (codigo, movimiento_id) VALUES (pcodigo, movimientoID);
 
    END //

delimiter ; 

delimiter //

    CREATE PROCEDURE agregarProducto(
        IN pNombre VARCHAR(255),
        IN Ptipo VARCHAR(255),
        IN rutaIMG VARCHAR(255),
        
        IN tipo_mov ENUM('entrada','salidaVendido','salidaDescartado'), 
        IN pCant INT, 
        IN pFecha DATE, 
        IN Email VARCHAR(255) 
        )
    
    BEGIN 
        DECLARE pcodigo INT;
        DECLARE movimientoID INT;
    
        INSERT INTO producto (tipo, nombre_producto, rutaIMG) VALUES (Ptipo, pNombre, rutaIMG);
       -- SELECT last_insert_id() INTO pcodigo;

       -- INSERT INTO posee (user_email, codigo) VALUES (Email, pcodigo);


       -- INSERT INTO movimiento (tipo, cant, fecha_mov) VALUES (tipo_mov, pCant, pFecha);
       -- SELECT last_insert_id() INTO movimientoID;

       -- INSERT INTO tiene (user_email, movimiento_id) VALUES (Email, movimientoID);
       -- INSERT INTO sufre (codigo, movimiento_id) VALUES (pcodigo, movimientoID);

    END //

    delimiter ;