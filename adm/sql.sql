create table usuario (
	codigo int auto_increment not null primary key, 
	usuario varchar (50) not null,
	senha varchar (50) not null
);

insert into usuario (USUARIO, SENHA) values('midiamix','midiamix');


drop table agenda;
create table agenda(
	id int auto_increment not null primary key auto_increment, 
	imagem varchar (255),
	video varchar (255),
	facebook varchar (255),
	curtir varchar (255),
	data_evento varchar (255),
	titulo varchar (255),
	conteudo blob
);

drop table bar;
create table bar(
	id int auto_increment not null primary key auto_increment, 
	imagem varchar (255),
	titulo varchar (255)
);

drop table video;
create table video(
	id int auto_increment not null primary key auto_increment, 
	video varchar (255),
	data_evento varchar (255),
	titulo varchar (255),
	conteudo blob
);



drop table parceiros;
create table parceiros(
	id int auto_increment not null primary key, 
	imagem varchar (255),
	data_evento date not null,
	titulo varchar (255),
	link varchar (255)
);

drop table cardapio;
create table cardapio(
	id int auto_increment not null primary key auto_increment, 
	imagem varchar (255),
	titulo varchar (255),
	conteudo blob
);

drop table newsletter;
create table newsletter(
	id int auto_increment not null primary key, 
	e_mail varchar (255),
	data_cadastro date not null
);


drop table cervejas;
create table cervejas(
	id int auto_increment not null primary key auto_increment, 
	imagem varchar (100),
	obs varchar (100)
);

create table categoria_fotos (
	id int auto_increment not null primary key auto_increment, 
	data_evento varchar (255),
	titulo varchar (255),
	conteudo blob
);

drop table fotos;
create table fotos(
	id int auto_increment not null primary key auto_increment, 
	id_categoria_fotos int not null,
	imagem varchar (100),
	obs varchar (100)
);

alter table fotos
add constraint fk_fotos_categoria_fotos
foreign key (id_categoria_fotos)
references categoria_fotos(id);
