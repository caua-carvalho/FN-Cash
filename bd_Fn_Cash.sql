create database fncash;
use fncash;

create table tb_cadastro(
id_cadastro int primary key auto_increment,
nm_cadastro varchar(45) not null,
nm_email varchar(255) not null,
senha_cadastro varchar(45) not null
);

create table tb_login(
id_login int primary key auto_increment,
email_login varchar(255) not null,
senha_login varchar(45) not null
);

create table tb_despesa(
id_despesa int primary key auto_increment,
valor_despesa decimal(10,2) not null,
dt_despesa date not null,
dt_vencimento date not null,
descricao_despesa varchar(255) not null,
categoria_despesa enum('1', '2', '3', '4', '5'),
pagamento_despesa enum('1', '2', '3', '4', '5') default 'pix',
tipo_despesa enum('fixa', 'variavel') default 'fixa'
);

create table tb_pacela(
id_parcela int primary key auto_increment,
num_parcela decimal not null,
vl_parcela decimal(10,2) not null,
dt_vencimento date,
dt_pagamento date,
id_despesa int,
foreign key(id_despesa) references tb_despesa(id_despesa)
);

create table tb_receita(
id_receita int primary key auto_increment,
vl_receita decimal(10,2) not null,
dt_recebimento date,
descricao_receita varchar(255) not null,
categoria_receita enum('1', '2', '3', '4', '5'),
meio_recebimento enum('1', '2', '3', '4', '5')
);

create table tb_despesa_credito(
);