create database if not exists habit_you_db; 
use habit_you_db;
create table if not exists usuario (
	nome_usuario VARCHAR(100) primary key not null,
    senha VARCHAR(30) not null,
    email VARCHAR(255) not null unique,
	telefone VARCHAR(16) not null unique
); 