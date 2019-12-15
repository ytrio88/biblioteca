create database biblioteca;

use biblioteca;

drop table pessoa;

create table pessoa
(
    id int PRIMARY KEY,
    nome varchar(100) not null,
    dtnasc date not null,
    cpf varchar(15) not null,
    rg varchar(15) not null,
    tel1 varchar(15) not null,
    tel2 varchar(15) not null,
    email varchar(100) not null,
    cep varchar(9) not null,
    cidade varchar(50) not null,
    estado varchar(2) not null,
    endereco varchar(100) not null,
    numero varchar(5) not null,
    complemento varchar(100) not null,
    bairro varchar(100) not null,
    status varchar(1) not null,
    dtcad date not null
) engine = myisam;

create table funcionario
(
    id int PRIMARY KEY,
    nome varchar(100) not null,
    dtnasc date not null,
    cpf varchar(15) not null,
    rg varchar(15) not null,
    cargo varchar(1) not null,
    tel1 varchar(15) not null,
    tel2 varchar(15) not null,
    email varchar(100) not null,
    cep varchar(9) not null,
    cidade varchar(50) not null,
    estado varchar(2) not null,
    end varchar(100) not null,
    numero varchar(5) not null,
    comp varchar(100) not null,
    bairro varchar(100) not null,
    status varchar(1) not null,
    dtcad date not null
) engine = myisam;

drop table livro;

create table livro
(
    id int PRIMARY KEY,
    nome varchar(100) not null,
    autor varchar(100) not null,
    editora varchar(50) not null,
    isbn varchar(15) not null,
    cdd varchar(3) not null,
    versao varchar(2) not null,
    ano varchar(4) not null,
    descricao varchar(250) not null,
    status varchar(1) not null
) engine = myisam;

drop table copia;

create table copia
(
    id int PRIMARY KEY,
    idlivro int not null,
    status varchar(4) not null,
    obs varchar(250) not null,
    data date 
) engine = myisam;

create table emprestimo
(
    id int PRIMARY KEY,
    idaluno int not null,
    idcopia int not null,
    idfun int not null,
    dtemp date not null,
    dtdev date not null,
    trenov varchar(3) not null,
    status varchar(1) not null
) engine = myisam;

update usuario set senha = sha1(concat(md5(curdate()),md5('145236'),md5(curdate())))