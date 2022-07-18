CREATE SCHEMA `demopro` DEFAULT CHARACTER SET utf8mb4 ;

use demopro;

create table usuarios(
				id_usuario int auto_increment,
				nome varchar(50),
				sobrenome varchar(50),
				email varchar(50),
				password text(50),
				fechaCaptura date,
				primary key(id_usuario)
					);

create table categorias (
				id_categoria int auto_increment,
				id_usuario int not null,
				nomeCategoria varchar(150),
				fechaCaptura date,
				primary key(id_categoria)
						);

create table imagens(
				id_imagem int auto_increment,
				id_categoria int not null,
				nome varchar(500),
				ruta varchar(500),
				fechaSubida date,
				primary key(id_imagem)
					);
create table articulos(
				id_produto int auto_increment,
				id_categoria int not null,
				id_imagem int not null,
				id_usuario int not null,
				nome varchar(50),
				descricao varchar(500),
				quantidade int,
				preco float,
				fechaCaptura date,
				primary key(id_produto)

						);