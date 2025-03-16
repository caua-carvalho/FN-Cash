CREATE DATABASE fncash;
USE fncash;

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
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cartoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    bandeira VARCHAR(50) NOT NULL,
    tipo ENUM('credito', 'debito', 'multiplo') NOT NULL,
    numero_final VARCHAR(4) NOT NULL,
    data_validade DATE NOT NULL,
    limite DECIMAL(10,2) DEFAULT NULL,
    dia_fechamento INT DEFAULT NULL,
    dia_vencimento INT DEFAULT NULL,
    cor VARCHAR(7) DEFAULT '#CCCCCC',
    ativo TINYINT(1) DEFAULT 1,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
