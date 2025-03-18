CREATE DATABASE fncash;
USE fncash;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE contas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data DATE NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    forma_pagamento VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL,
    observacao TEXT,
    tipo VARCHAR(20) NOT NULL COMMENT 'despesa, receita ou transferencia',
    recorrente VARCHAR(3) DEFAULT 'nao',
    comprovante VARCHAR(3) DEFAULT 'nao',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    icone varchar(100)
);

create table metas (
    id_metas int primary key auto_increment,
		titulo varchar(250) not null,
		descricao text not null,
		icone varchar(250) not null,
		data_criacao timestamp default current_timestamp,
		data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

