/*
create table instituicao(
		id serial,
		descricao varchar(150) not null
);

ALTER TABLE instituicao
ADD CONSTRAINT instituicao_pkey  PRIMARY KEY (id);

create table usuario(
	id varchar(40) not null,
	nome varchar(240) not null,
	foto text,
	instituicao integer
);
ALTER TABLE usuario
ADD CONSTRAINT usuario_pkey  PRIMARY KEY (id);
ALTER TABLE usuario
ADD CONSTRAINT instituicao_usuario_fk FOREIGN KEY (instituicao)
REFERENCES instituicao(id);

create table turma(
		id serial,
		usuario varchar(40) not null,
		instituicao integer
		
);
ALTER TABLE turma
ADD CONSTRAINT turma_pkey  PRIMARY KEY (id);
ALTER TABLE turma
ADD CONSTRAINT turma_usuario_fk FOREIGN KEY (usuario)
REFERENCES usuario(id);
ALTER TABLE turma
ADD CONSTRAINT turma_instituicao_fk FOREIGN KEY (instituicao)
REFERENCES instituicao(id);

create table post(
	id serial,
	instituicao integer,
	usuario varchar(40) not null,
	titulo varchar(50) not null,
	conteudo text not null,
	data_post varchar(10) not null
);
ALTER TABLE post
ADD CONSTRAINT post_pkey  PRIMARY KEY (id);
ALTER TABLE post
ADD CONSTRAINT post_usuario_fk FOREIGN KEY (usuario)
REFERENCES usuario(id);
ALTER TABLE post
ADD CONSTRAINT post_instituicao_fk FOREIGN KEY (instituicao)
REFERENCES instituicao(id);

create table comentario(
	id serial,
	usuario varchar(40) not null,
	instituicao integer,
	conteudo text
);
ALTER TABLE comentario
ADD CONSTRAINT comentario_pkey  PRIMARY KEY (id);
ALTER TABLE post
ADD CONSTRAINT comentario_usuario_fk FOREIGN KEY (usuario)
REFERENCES usuario(id);
ALTER TABLE comentario
ADD CONSTRAINT comentario_instituicao_fk FOREIGN KEY (instituicao)
REFERENCES instituicao(id);


alter table turma add column nome varchar(20);
alter table turma add column data_criacao varchar(10);
alter table turma add column ativo integer;

select * from turma
select * from instituicao
select * from usuario
select * from post
insert into usuario (id, nome, foto, instituicao) values ('12323131231324243', 'Teste Vida Loka', '<img src=http://>', 1);
insert into instituicao (descricao) values ('UTFPR');
insert into turma(usuario, instituicao, nome, data_criacao, ativo) values('12323131231324243', 1, 'ASD16', '30/07/2016', 1);
usuario

select DISTINCT	ON(i.id) i.id
     , t.nome 
     , t.data_criacao
     , t.ativo
     , u.nome
     , u.foto
     , i.descricao
     from turma t
inner join instituicao i
on t.instituicao = i.id
inner join usuario u
on u.instituicao = i.id
group by i.id, t.nome 
     , t.data_criacao
     , t.ativo
     , u.nome
     , u.foto
     , i.descricao
 */