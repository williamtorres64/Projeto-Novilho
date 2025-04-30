/* Script SQL para criação das tabelas e relacionamentos */

-- limpa tabelas existentes para recriação
 drop table if exists clienteCarrinho;
 drop table if exists compraProduto;
 drop table if exists compra;
 drop table if exists formaPagamento;
 drop table if exists produto;
 drop table if exists tipoQuantidade;
 drop table if exists categoria;
 drop table if exists cliente;

-- tabela cliente
 create table cliente (
     id int auto_increment primary key,
     cpf char(11) not null unique,
     nome varchar(100) not null,
     endereco varchar(100) not null,
     complemento varchar(100) not null,
     cep char(8) not null,
     email varchar(100) not null unique,
     senha varchar(100) not null,
     telefone char(11) not null
 );

-- tabela categoria
 create table categoria (
     id int auto_increment primary key,
     nome varchar(20) not null
 );

-- tabela tipoQuantidade
 create table tipoQuantidade (
     id int auto_increment primary key, -- 1 = unitário, 2 = decimal
     tipo varchar(10)
 );

-- tabela produto
 create table produto (
     id int auto_increment primary key,
     nome varchar(100) not null,
     categoriaId int not null,
     estoque float(24) not null,
     estoqueTipoQuantidadeId int not null,
     valor float(24) not null,
     descricao varchar(500),
     nomeImagem varchar(100),
     foreign key (categoriaId) references categoria(id),
     foreign key (estoqueTipoQuantidadeId) references tipoQuantidade(id)
 );

-- tabela formaPagamento
 create table formaPagamento (
     id int auto_increment primary key,
     nome varchar(100) not null
 );

-- tabela compra
 create table compra (
     id int auto_increment primary key,
     clienteId int not null,
     data date not null,
     formaPagamentoId int not null,
     foreign key (clienteId) references cliente(id),
     foreign key (formaPagamentoId) references formaPagamento(id)
 );

-- tabela compraProduto
 create table compraProduto (
     id int auto_increment primary key,
     idCompra int not null,
     idProduto int not null,
     valor float(24) not null,
     quantidade float(24) not null,
     tipoQuantidadeId int not null,
     foreign key (idCompra) references compra(id),
     foreign key (idProduto) references produto(id),
     foreign key (tipoQuantidadeId) references tipoQuantidade(id)
 );

-- tabela clienteCarrinho
 create table clienteCarrinho (
     id int auto_increment primary key,
     clienteId int not null,
     produtoId int not null,
     quantidade float(24) not null,
     tipoQuantidadeId int not null,
     foreign key (clienteId) references cliente(id),
     foreign key (produtoId) references produto(id),
     foreign key (tipoQuantidadeId) references tipoQuantidade(id)
 );
