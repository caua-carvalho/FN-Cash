create database fncash;
use fncash;

select * from usuario;

create table usuario (
	id_usuario int primary key auto_increment,
    nm_usuario varchar(100),
    email_usuario varchar(200),
    senha_usuario varchar(100)
);

create table contas (
	id_conta int primary key auto_increment,
    nome varchar(250),
    tipo varchar(250),
    instituicao varchar(250),
    valor double(8,2),
    descricao MEDIUMTEXT,
    categoria int(2)
);


    
    