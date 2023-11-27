-- Borra la base de datos si existe y la crea devuelta

DROP DATABASE IF EXISTS EStock;

create schema EStock;

USE EStock;

CREATE TABLE USUARIO(
    user_email VARCHAR(100) PRIMARY KEY, 
    nombre VARCHAR(100) NOT null unique,
    clave_pub VARCHAR(255)  default null,
    clave_priv VARCHAR(255) default null,
    hashContra VARCHAR(255) default null
);

CREATE TABLE INICIA(
    sesion_id INT PRIMARY KEY,
    user_email VARCHAR(100),
    FOREIGN KEY (user_email) REFERENCES USUARIO(user_email)
);

CREATE TABLE SESION(
    sesion_id INT PRIMARY KEY not null unique auto_increment,
    estado enum('abierta','cerrada') not null default 'abierta',
    fecha_inicio DATE,
    fecha_cad DATE
);

CREATE TABLE POSEE(
    user_email VARCHAR(100),
    codigo INT 
);

CREATE TABLE TIENE(
    user_email VARCHAR(100),
    movimiento_id INT
);

CREATE TABLE PRODUCTO(
    tipo VARCHAR(100),
    codigo INT PRIMARY KEY auto_increment,
    nombre_producto VARCHAR(255),
    rutaIMG VARCHAR(255)
);

CREATE TABLE SUFRE(
    codigo INT,
    movimiento_id INT 
);

CREATE TABLE MOVIMIENTO(
    tipo ENUM('entrada','salidaVendido','salidaDescartado'),
    cant INT,
    fecha_mov DATE default date(current_timestamp),
    movimiento_id INT PRIMARY KEY auto_increment  
);



ALTER TABLE SESION ADD FOREIGN KEY (sesion_id) REFERENCES INICIA(sesion_id); 

ALTER TABLE POSEE ADD FOREIGN KEY (user_email) REFERENCES USUARIO(user_email);

ALTER TABLE POSEE ADD FOREIGN KEY (codigo) REFERENCES PRODUCTO(codigo);

ALTER TABLE TIENE ADD FOREIGN KEY (movimiento_id) REFERENCES MOVIMIENTO(movimiento_id);

ALTER TABLE TIENE ADD FOREIGN KEY (user_email) REFERENCES USUARIO(user_email);

ALTER TABLE SUFRE ADD FOREIGN KEY (codigo) REFERENCES PRODUCTO(codigo);

ALTER TABLE SUFRE ADD FOREIGN KEY (movimiento_id) REFERENCES MOVIMIENTO(movimiento_id);

delimiter //
    drop procedure if exists agregarProducto //
    drop procedure if exists agregarMovimiento
//


    DELIMITER //
    CREATE PROCEDURE agregarMovimiento(
        IN tipo_mov ENUM('entrada','salidaVendido','salidaDescartado'), 
        IN pCant INT, 
        IN pFecha DATE, 
        IN Email VARCHAR(255), 
        IN pcodigo INT)

    BEGIN
        DECLARE movimientoID INT;

        INSERT INTO movimiento(tipo, cant, fecha_mov) VALUES (tipo_mov, pCant, pFecha);
        SELECT last_insert_id() INTO movimientoID;

      INSERT INTO tiene (user_email, movimiento_id) VALUES (Email, movimientoID);
        INSERT INTO sufre (codigo, movimiento_id) VALUES (pcodigo, movimientoID); 
 
    END //

delimiter ; 

delimiter //

    CREATE PROCEDURE agregarProducto(
        IN Ptipo VARCHAR(255),
        IN pNombre VARCHAR(255),
        IN prutaIMG VARCHAR(255)
        IN Email VARCHAR(255)
        )
        
    
    BEGIN 
        DECLARE pcodigo INT;
        /* DECLARE movimientoID INT; */
    
        INSERT INTO producto (tipo, nombre_producto, rutaIMG) VALUES (Ptipo, pNombre, prutaIMG);
       SELECT last_insert_id() INTO pcodigo;

        INSERT INTO posee (user_email, codigo) VALUES (Email, pcodigo);
 
    END //

    delimiter ;


/*FUNCIONAAAAAAA PIPIPIPIPI*/
