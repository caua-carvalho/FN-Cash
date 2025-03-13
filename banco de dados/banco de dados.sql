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

drop table contas;
    
 create table categoria(
 id_categoria int primary key auto_increment,
 nome varchar(100) not null,
 tipo enum('despesa', 'receita', 'transferencia')
 );
 
create table contas_banco(
id_contas_banco int primary key auto_increment,
nm varchar(100),
tipo enum('despesa', 'receita', 'transferencia')
);

create table status_transacao(
id_status int primary key auto_increment,
tipo enum('pendende', 'efetivada')
);

create table transacoes(
id_transacao int primary key auto_increment,
descricao varchar(100),
valor decimal(10,2),
data_transacao date,
id_categoria int,
id_contas_banco int,
id_status int,
observacoes varchar(100),
foreign key(id_categoria) references categoria (id_categoria),
foreign key(id_contas_banco) references contas_banco (id_contas_banco),
foreign key(id_status) references status_transacao (id_status)
);

create table transacoes_recorrentes(
id_transacoes_recorrentes int primary key auto_increment,
data_transacao_recorrente date,
id_transacao int,
foreign key (id_transacao) references transacoes (id_transacao)
);