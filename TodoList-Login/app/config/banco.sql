create database todoLogin;
use todoLogin;

create table usuario(
    id int primary key auto_increment,
    nome varchar(45) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null
);

create table tarefas(
    id int primary key auto_increment,
    descricao varchar(255) not null,
    concluida tinyint(1) default 0,
    data_criacao timestamp default current_timestamp,
    usuario_id int not null,
    constraint fk_tarefas_usuarios
        foreign key(usuario_id)
        references usuario(id)
        on delete cascade
        on update cascade
);
