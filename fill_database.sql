-- Inserir registros na tabela CARRO
select * from carro;

insert into carro (placa, modelo, ano, cor, marca) values ('AAA0000','Uno',1990,'Prata','Fiat');
insert into carro (placa, modelo, ano, cor, marca) values ('BBB1111','Gol',2000,'Branco','Volkswagen');
insert into carro (placa, modelo, ano, cor, marca) values ('CCC2222','Palio',2010,'Preto','Fiat');
insert into carro (placa, modelo, ano, cor, marca) values ('DDD3333','Onix',2020,'Vermelho','Chevrolet');
insert into carro (placa, modelo, ano, cor, marca) values ('EEE5555','HB20',2022,'Azul','Hyundai');

select * from carro;

-- Inserir registros na tabela USUARIO
select * from usuario;

insert into usuario (email, telefone, userid, endereco, nome) values ('atreus@sony.com',31999999999, 1,'Rua Jotunheim','Atreus');
insert into usuario (email, telefone, userid, endereco, nome) values ('kratos@sony.com',31999990000, 2,'Rua Esparta','Kratos');
insert into usuario (email, telefone, userid, endereco, nome) values ('zeus@sony.com',31990005555, 3,'Rua Olimpo','Zeus');
insert into usuario (email, telefone, userid, endereco, nome) values ('odin@sony.com',31970007777, 4,'Rua Asgard','Odin');
insert into usuario (email, telefone, userid, endereco, nome) values ('freya@sony.com',31950003333, 5,'Rua Vanahein','Freya');

select * from usuario;

-- Inserir registros na tabela ANUNCIO
select * from anuncio;

insert into anuncio (descricao, numero, data, valor, carro, vendedor) values ('Uno do Atreus',1,'15/03/2022',5000.00,'AAA0000',1);
insert into anuncio (descricao, numero, data, valor, carro, vendedor) values ('Gol do Kratos',2,'05/05/2022',7200.25,'BBB1111',2);
insert into anuncio (descricao, numero, data, valor, carro, vendedor) values ('Palio do Zeus',3,'11/07/2022',23001.13,'CCC2222',3);
insert into anuncio (descricao, numero, data, valor, carro, vendedor) values ('Onix do Odin',4,'23/08/2022',42350.50,'DDD3333',4);
insert into anuncio (descricao, numero, data, valor, carro, vendedor) values ('HB20 da Freya',5,'31/10/2022',55000.90,'EEE5555',5);

select * from anuncio;

--Inserir registros na tabela FEEDBACK
select * from feedback;

insert into feedback (comentario, avaliacao, id) values ('Muito bom, recomendo',1,1);
insert into feedback (comentario, avaliacao, id) values ('Caloteiro',0,2);
insert into feedback (comentario, avaliacao, id) values ('Motor fundiu na primeira volta',0,3);
insert into feedback (comentario, avaliacao, id) values ('Justo.',1,4);
insert into feedback (comentario, avaliacao, id) values ('OK',1,5);

select * from feedback;

--Inserir registros na tabela TRANSACAO
select * from transacao;

insert into transacao (valor, data, comprador, vendedor, anuncio, feedback_id) values (5000.00,'21/03/2022',5,1,1,1);
insert into transacao (valor, data, comprador, vendedor, anuncio, feedback_id) values (42350.50,'30/08/2022',3,4,4,2);
insert into transacao (valor, data, comprador, vendedor, anuncio, feedback_id) values (23000.00,'15/08/2022',4,3,3,3);
insert into transacao (valor, data, comprador, vendedor, anuncio, feedback_id) values (7000.00,'05/05/2022',1,2,2,4);
insert into transacao (valor, data, comprador, vendedor, anuncio, feedback_id) values (55000.90,'23/11/2022',2,5,5,5);

select * from transacao;

commit;