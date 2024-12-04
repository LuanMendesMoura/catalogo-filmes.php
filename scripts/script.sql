create database filmesdb;
use filmesdb;

create table filme (
	id int auto_increment primary key,
    nome varchar(255) not null,
    ano int not null,
    descricao text
);

alter table filme add urlIMG text;

update filme 
set urlIMG = "https://br.web.img3.acsta.net/c_310_420/medias/nmedia/18/90/16/48/20083748.jpg"
where id = 1;
