CREATE TABLE aluno (id integer, nome varchar(50), endereco varchar(200), telefone varchar(40), cidade varchar(50));

CREATE TABLE inscricao (id serial, ref_aluno integer, ref_turma integer, nota float, frequencia float,cancelada boolean, concluida boolean);

CREATE TABLE turma (id integer,  dia_semana integer, turno char(1), professor varchar(50), sala varchar(20), data_inicio date, encerrada boolean, ref_curso integer);

CREATE TABLE corso (id integer, descricao varchar(50), duracao integer);