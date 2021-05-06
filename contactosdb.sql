drop database if exists contactosdb;
create database if not exists contactosdb;

use contactosdb;

drop table if exists contactos;
create table if not exists contactos (
    id int primary key auto_increment,
    nombre varchar(40) not null,
    apellidos varchar(40) not null,
    direccion varchar(100) not null,
    telefono varchar(20) not null
);


insert into contactos (nombre, apellidos, direccion, telefono) values 
("Nestor", "Batista Diaz", "C/ obispo Pildain", "626272047"),
("Gonzalo", "Santana Santana", "Las Palmas", "657542141"),
("Sergio", "Peñate Alejo", "Las Palmas", "684212233")