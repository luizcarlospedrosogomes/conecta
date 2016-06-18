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
*/
create table usuario_turma(
	id serial,
	id_usuario varchar(40) not null, 
	id_turma integer not null,
	unique(id_usuario, id_turma)
);
alter table usuario_turma
add constraint usuario_turma_pkey primary key(id);
alter table usuario_turma
add constraint usuario_turma_usuario foreign key(id_usuario)
references usuario(id);
alter table usuario_turma 
add constraint usuario_turma_turma foreign key(id_turma)
references turma(id);

--drop table usuario_turma
alter table usuario_turma add column id_usuario varchar(40) not null, unique(id_usuario, id_turma)
alter table usuario_turma drop column id_usuario
select * from usuario_turma
select * from usuario
/*=============SELECT=============================================================================
./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Application/src/ --generate-annotations=true^C

./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Album/src/ --generate-annotations=true

select * from usuario_turma
select * from turma
select * from instituicao
select * from usuario
select * from post
insert into usuario (id, nome, foto, instituicao) values ('12323131231324243', 'Teste Vida Loka', '<img src=http://>', 1);
insert into instituicao (descricao) values ('UTFPR');
insert into turma(usuario, instituicao, nome, data_criacao, ativo) values('12323131231324243', 1, 'ASD16', '30/07/2016', 1);
usuario
select DISTINCT	ON(i.id) i.id
					, t.nome  as nome_turma
					, t.data_criacao
					, t.ativo
					, u.nome as nome_usuario
					, u.foto
					, i.descricao
				 from turma t
		   inner join usuario u
				   on t.usuario = u.id
		   inner join instituicao i
				   on u.instituicao = i.id
			 group by i.id, t.nome 
					, t.data_criacao
					, t.ativo
					, u.nome
					, u.foto
					, i.descricao
select * from usuario
select * from turma

select * 
	from usuario u
 inner join instituicao i
 on u.instituicao = i.id
 where u.id = '1034389293319874'
 
 select * from turma
 /*
 CREATE TRIGGER inserir_usuario_turma
AFTER INSERT
ON turma
FOR EACH ROW
EXECUTE PROCEDURE inserir_usuario_turma_prc();

CREATE OR REPLACE FUNCTION inserir_usuario_turma_prc() 
RETURNS trigger AS
$$
BEGIN
	insert into usuario_turma (id_usuario, id_turma) values(new.usuario, new.id);
RETURN NULL;
END;
$$
LANGUAGE 'plpgsql'

*/
 select * from usuario_turma ut
 inner join usuario u
 on u.id = ut.id_usuario
 inner join turma t
 on  t.id = ut.id_turma
 inner join instituicao i
 on i.id = t.instituicao
  where u.id = '1034389293319874'