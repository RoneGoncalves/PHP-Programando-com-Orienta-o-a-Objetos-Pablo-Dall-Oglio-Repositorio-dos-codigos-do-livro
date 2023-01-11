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
INSERT INTO inscricao VALUES(2,2,2,9,100,false,true);
INSERT INTO inscricao VALUES(3,3,3,8,100,false,true);
INSERT INTO inscricao VALUES(4,4,4,7,100,false,true);
INSERT INTO inscricao VALUES(5,5,5,6,95,false,true);
INSERT INTO inscricao VALUES(6,6,6,5,95,false,false);
INSERT INTO inscricao VALUES(7,7,7,4,95,false,false);
INSERT INTO inscricao VALUES(8,8,8,3,95,false,false);
INSERT INTO inscricao VALUES(9,9,9,2,80,false,false);
INSERT INTO inscricao VALUES(10,10,10,10,80,false,false);
INSERT INTO inscricao VALUES(11,11,11,9,80,true,true);
INSERT INTO inscricao VALUES(12,12,12,8,80,true,true);
INSERT INTO inscricao VALUES(13,13,13,7,75,true,true);
INSERT INTO inscricao VALUES(14,14,14,6,75,true,true);
INSERT INTO inscricao VALUES(15,15,15,5,75,true,true);
INSERT INTO inscricao VALUES(16,16,1,4,75,true,false);
INSERT INTO inscricao VALUES(17,17,2,3,60,true,false);
INSERT INTO inscricao VALUES(18,18,3,2,60,true,false);
INSERT INTO inscricao VALUES(19,19,4,1,60,true,false);
INSERT INTO inscricao VALUES(20,20,5,10,60,true,false);
INSERT INTO inscricao VALUES(21,21,6,9,50,false,true);
INSERT INTO inscricao VALUES(22,22,7,8,50,false,false);
INSERT INTO inscricao VALUES(23,23,8,7,50,true,true);
INSERT INTO inscricao VALUES(24,24,9,6,50,true,false);
INSERT INTO inscricao VALUES(25,25,10,5,30,false,true);
INSERT INTO inscricao VALUES(26,26,11,4,30,false,false);
INSERT INTO inscricao VALUES(27,27,12,3,30,true,true);
INSERT INTO inscricao VALUES(28,28,13,2,30,true,false);
INSERT INTO inscricao VALUES(29,29,14,1,85,false,true);
INSERT INTO inscricao VALUES(30,30,15,10,85,false,true);



CREATE TABLE turma (id integer,  dia_semana integer, turno char(1), professor varchar(50), sala varchar(20), data_inicio date, encerrada boolean, ref_curso integer);

INSERT INTO turma  VALUES(1,1,'M','Pablo Dall Oglio','100','2023-01-10',false,1);
INSERT INTO turma  VALUES(2,2,'T','Fabio Locatelli','200','2023-01-10',false,2);
INSERT INTO turma  VALUES(3,3,'N','Gustavo Guanabara','300','2023-01-10',false,3);
INSERT INTO turma  VALUES(4,4,'M','Fabio Bosson','400','2023-01-10',false,4);
INSERT INTO turma  VALUES(5,3,'T','Gustavo Guanabara','300','2023-01-10',false,5);
INSERT INTO turma  VALUES(6,2,'N','Fabio Locatelli','200','2023-01-10',false,6);
INSERT INTO turma  VALUES(7,1,'M','Pablo Dall Oglio','100','2023-01-10',false,7);
INSERT INTO turma  VALUES(8,4,'T','Fabio Bosson','400','2023-01-10',false,8);
INSERT INTO turma  VALUES(9,1,'N','Pablo Dall Oglio','100','2022-01-10',true,9);
INSERT INTO turma  VALUES(10,2,'M','Fabio Locatelli','200','2022-01-10',true,10);
INSERT INTO turma  VALUES(11,3,'T','Gustavo Guanabara','300','2022-01-10',true,11);
INSERT INTO turma  VALUES(12,4,'N','Fabio Bosson','400','2022-01-10',true,12);
INSERT INTO turma  VALUES(13,1,'M','Pablo Dall Oglio','100','2022-01-10',true,13);
INSERT INTO turma  VALUES(14,3,'T','Gustavo Guanabara','300','2022-01-10',true,14);
INSERT INTO turma  VALUES(15,4,'N','Fabio Bosson','400','2022-01-10',true,15);



CREATE TABLE corso (id integer, descricao varchar(50), duracao integer);

INSERT INTO curso VALUES(1,'Desenvolvimento em PHP_GTK', 32);
INSERT INTO curso VALUES(2,'Orientação à objetos com PHP', 32);
INSERT INTO curso VALUES(3,'Orientação à objetos com Java', 32);
INSERT INTO curso VALUES(4,'Orientação à objetos com Python', 32);
INSERT INTO curso VALUES(5,'Javascript Básico', 32);
INSERT INTO curso VALUES(6,'Javascript Avançado', 24);
INSERT INTO curso VALUES(7,'Algoritmos de Programação com Python Básico', 32);
INSERT INTO curso VALUES(8,'Algoritmos de Programação com Python Avançado', 28);
INSERT INTO curso VALUES(9,'Programação WEB com PHP Básico', 32);
INSERT INTO curso VALUES(10,'Programação WEB com PHP Avançado', 24);
INSERT INTO curso VALUES(11,'Banco de Dados Relacionais Básico', 32);
INSERT INTO curso VALUES(12,'Banco de Dados não Relacionais Básico', 28);
INSERT INTO curso VALUES(13,'Banco de Dados Relacionais Avançaado', 32);
INSERT INTO curso VALUES(14,'Banco de Dados não Relacionais Avançado', 28);
INSERT INTO curso VALUES(15,'Sistemas Operacionai', 24);

