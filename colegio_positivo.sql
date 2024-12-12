create database colegio_positivo;
use Colegio_positivo;

create table usuario(
id int primary key auto_increment,
nome varchar(200),
senha varchar(200),
email varchar(200),
tipo enum ("aluno","professor")
);