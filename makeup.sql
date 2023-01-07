drop database if exists makeup;

create database makeup ;

use makeup;

create table productosUtilizar(            /* Inicio de creación de mi tabla productos a utilizar*/
    id_productos int (8) not null primary key auto_increment, /* Creacion del id_producto a utilizar */
    correctores varchar (255) not null,
    delineadores varchar (255) not null,
    rimel varchar (255) not null,
    labiales varchar (255) not null 
);

create table paqueteMakeup(                      /* Inicio de creacion de mi tabla paquete_make_up */
    id_makeup int (8) not null primary key auto_increment,   /* Creacion del id_paquete_make_up */
    cejas varchar (255) not null,
    ojos varchar (255) not null,
    labios varchar (255) not null   
);

create table planUsuario(                 /* Inicio de creación de mi tabla plan de usuarios */
    id_plan_usuario int (8) not null primary key auto_increment, /* Creacion del id_plan_usuario */
    tipo_de_piel varchar (255) not null,
    id_produc int (8) not null,
    id_paque int (8) not null,
    foreign key (id_produc) references productosutilizar (id_productos), /* Es una de las claves foraneas de mi tabla usuario */
    foreign key  (id_paque) references paquetemakeup (id_makeup)   /* Es otra clave foranea de mi tabla usuario */
);


create table usuarios(                    /* Inicio de creacion de mi tabla usuarios */
    id_usuario int (8) not null primary key auto_increment,  /* Creacion del id_usuario */
    nombres varchar (255) not null,
    apellidos varchar (255) not null,
    edad varchar (255) not null, 
    correo_electronico varchar (255) not null,
    id_plan int (8) not null,
    foreign key (id_plan) references planusuario (id_plan_usuario) /* Es la clave foranea de mi tabla */

);

