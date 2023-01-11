CREATE TABLE aluno (id integer, nome varchar(50), endereco varchar(200), telefone varchar(40), cidade varchar(50));

INSERT INTO aluno VALUES(1,'Amadeu Weirich','Rua do Amadeu Weirich','(16) 5555-3333','São Carlos');
INSERT INTO aluno VALUES(2,'Andrigo Dametto','Rua do Andrigo Dametto','(16) 5555-2222','Araraquara');
INSERT INTO aluno VALUES(3,'Enio Silveira','Rua do Enio Silveira','(16) 5555-1111','Ibaté');
INSERT INTO aluno VALUES(4,'Ari Stopassola Junior','Rua do Ari Stopassola Junior','(16) 5555-7777','Itirapina');
INSERT INTO aluno VALUES(5,'Daline Dall Oglio','Rua da Conceição','(16) 5555-4477','São Carlos');
INSERT INTO aluno VALUES(6,'willian Scatolla','Rua de Fátima','(16) 5555-3399','Ribeirão Preto');
INSERT INTO aluno VALUES(7,'Alex Teodoro','Rua da Luz','(16) 5555-0055','Ibaté');
INSERT INTO aluno VALUES(8,'Rodrio Fontes Messias','Rua de Baixo','(16) 5555-9955','Ibaté');
INSERT INTO aluno VALUES(9,'Kleber Gonzaga','Rua do Baião','(16) 5555-2288','São Carlos');
INSERT INTO aluno VALUES(10,'Bruno Pitteli Gonçalves','Rua do Bruno Pitteli Gonçalves','(16) 5555-9999','Ribeirão Preto');
INSERT INTO aluno VALUES(11,'Carlos Eduardo Ranzi','Rua do Carlos Eduardo Ranzi','(16) 5555-4444','São Carlos');
INSERT INTO aluno VALUES(12,'Cesar Brod','Rua do Cesar Brod','(16) 5555-6666','Araraquara');
INSERT INTO aluno VALUES(13,'Edson Funke','Rua do Edson Funke','(16) 5555-8888','Ibaté');
INSERT INTO aluno VALUES(14,'Fabio Elias Locatelli','Rua do Fabio Elias Locatelli','(16) 5555-0000','Itirapina');
INSERT INTO aluno VALUES(15,'Fabrício Pretto','Rua do Fabrício Pretto','(16) 5555-1122','Ribeirão Preto');
INSERT INTO aluno VALUES(16,'Felipe Cortez','Rua do Felipe Cortez','(16) 5555-2233','São Carlos');
INSERT INTO aluno VALUES(17,'João Pablo Silva','Rua do João Pablo Silva','(16) 55555-3344','Araraquara');
INSERT INTO aluno VALUES(18,'Cândido Fonseca da Silva','Rua do Cândido Fonseca da Silva','(16) 5555-4455','Ibaté');
INSERT INTO aluno VALUES(19,'Mouriac Diemer','Rua do Mouriac Diemer','(16) 5555-5566','Itirapina');
INSERT INTO aluno VALUES(20,'Leonardo Lemes','Rua do Leonardo Lemes','(16) 5555-6677','Ribeirão Preto');
INSERT INTO aluno VALUES(21,'Luciano Greiner Dos Santos','Rua do Luciano Greiner Dos Santos','(16) 5555-7788','São Carlos');
INSERT INTO aluno VALUES(22,'Matheus Agnes Dias','Rua do Matheus Agnes Dias','(16) 5555-8899','Araraquara');
INSERT INTO aluno VALUES(23,'Mauricio de Castro','Rua do Mauricio de Castro','(16) 5555-9900','Ibaté');
INSERT INTO aluno VALUES(24,'Nataniel Rabaioli','Rua do Nataniel Rabaioli','(16) 5555-0011','Itirapina');
INSERT INTO aluno VALUES(25,'Paulo Roberto Mallmann','Rua do Paulo Roberto Mallmann','(16) 5555-0022','Ribeirão Preto');
INSERT INTO aluno VALUES(26,'Rubens Prates','Rua do Rubens Prates','(16) 5555-0033','São Carlos');
INSERT INTO aluno VALUES(27,'Rubens Queiroz de Almeida','Rua do Rubens Queiroz de Almeida','(16) 5555-0044','Araraquara');
INSERT INTO aluno VALUES(28,'Sergio Crespo Pinto','Rua do Sergio Crespo Pinto','(16) 5555-0055','Ibaté');
INSERT INTO aluno VALUES(29,'Silvio Cesar Cazella','Rua do Silvio Cesar Cazella','(16) 5555-0066','Araraquara');
INSERT INTO aluno VALUES(30,'William Prigol Lopes','Rua do William Prigol Lopes','(16) 5555-0077','São Carlos');


CREATE TABLE inscricao (id serial, ref_aluno integer, ref_turma integer, nota float, frequencia float,cancelada boolean, concluida boolean);

INSERT INTO inscricao VALUES(1,1,1,10,100,false,true);
INSERT INTO inscricao VALUES(2,2,1,9,100,false,true);
INSERT INTO inscricao VALUES(3,3,1,8,100,false,true);
INSERT INTO inscricao VALUES(4,4,1,7,100,false,true);
INSERT INTO inscricao VALUES(5,5,1,6,95,false,true);
INSERT INTO inscricao VALUES(6,6,1,5,95,false,false);
INSERT INTO inscricao VALUES(7,7,1,4,95,false,false);
INSERT INTO inscricao VALUES(8,8,1,3,95,false,false);
INSERT INTO inscricao VALUES(9,9,1,2,80,false,false);
INSERT INTO inscricao VALUES(10,10,1,10,80,false,false);
INSERT INTO inscricao VALUES(11,11,2,9,80,false,true);
INSERT INTO inscricao VALUES(12,12,2,8,80,false,true);
INSERT INTO inscricao VALUES(13,13,2,7,75,false,true);
INSERT INTO inscricao VALUES(14,14,2,6,75,false,true);
INSERT INTO inscricao VALUES(15,15,2,5,75,false,true);
INSERT INTO inscricao VALUES(16,16,2,4,75,true,false);
INSERT INTO inscricao VALUES(17,17,2,3,60,true,false);
INSERT INTO inscricao VALUES(18,18,2,2,60,true,false);
INSERT INTO inscricao VALUES(19,19,2,1,60,true,false);
INSERT INTO inscricao VALUES(20,20,3,10,60,true,false);
INSERT INTO inscricao VALUES(21,21,3,9,50,false,true);
INSERT INTO inscricao VALUES(22,22,3,8,50,false,false);
INSERT INTO inscricao VALUES(23,23,3,7,50,true,false);
INSERT INTO inscricao VALUES(24,24,3,6,50,true,false);
INSERT INTO inscricao VALUES(25,25,3,5,30,false,true);
INSERT INTO inscricao VALUES(26,26,3,4,30,false,false);
INSERT INTO inscricao VALUES(27,27,3,3,30,true,false);
INSERT INTO inscricao VALUES(28,28,3,2,30,true,false);
INSERT INTO inscricao VALUES(29,29,3,1,85,false,true);
INSERT INTO inscricao VALUES(30,30,4,10,85,false,true);
INSERT INTO inscricao VALUES(31,30,4,10,100,false,true);
INSERT INTO inscricao VALUES(32,29,4,9,100,false,true);
INSERT INTO inscricao VALUES(33,28,4,8,100,false,true);
INSERT INTO inscricao VALUES(34,27,4,7,100,false,true);
INSERT INTO inscricao VALUES(35,26,4,6,95,false,true);
INSERT INTO inscricao VALUES(36,25,4,5,95,false,false);
INSERT INTO inscricao VALUES(37,24,4,4,95,false,false);
INSERT INTO inscricao VALUES(38,23,4,3,95,false,false);
INSERT INTO inscricao VALUES(39,22,4,2,80,false,false);
INSERT INTO inscricao VALUES(40,21,4,10,80,false,false);


CREATE TABLE turma (id integer,  dia_semana integer, turno char(1), professor varchar(50), sala varchar(20), data_inicio date, encerrada boolean, ref_curso integer);

INSERT INTO turma  VALUES(1,1,'M','Pablo Dall Oglio','100','2023-01-10',false,1);
INSERT INTO turma  VALUES(2,2,'T','Fabio Locatelli','200','2023-01-10',false,2);
INSERT INTO turma  VALUES(3,3,'N','Gustavo Guanabara','300','2023-01-10',false,3);
INSERT INTO turma  VALUES(4,4,'M','Fabio Bosson','400','2023-01-10',false,4);



CREATE TABLE curso (id integer, descricao varchar(50), duracao integer);

INSERT INTO curso VALUES(1,'Desenvolvimento em PHP_GTK', 32);
INSERT INTO curso VALUES(2,'Javascript Básico', 24);
INSERT INTO curso VALUES(3,'Banco de Dados Relacionais Básico', 32);
INSERT INTO curso VALUES(4,'Sistemas Operacionas Linux', 24);







