CREATE SCHEMA agenda DEFAULT CHARACTER SET utf8;
USE agenda;

CREATE TABLE estado (
  idestado INT NOT NULL AUTO_INCREMENT,
  estado VARCHAR(45) NULL,
  sigla VARCHAR(2) NULL,
  PRIMARY KEY (idestado)
);

CREATE TABLE  categoria (
  idcategoria INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NULL,
  PRIMARY KEY (idcategoria)
);

CREATE TABLE contato (
  idcontato INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NULL,
  telefone VARCHAR(45) NULL,
  email VARCHAR(45) NULL,
  cidade VARCHAR(45) NULL,
  idestado INT NULL,
  informacao VARCHAR(150) NULL,
  idcategoria INT NULL,
  PRIMARY KEY (idcontato),
  CONSTRAINT fk_contato_estado
    FOREIGN KEY (idestado)
    REFERENCES estado (idestado),
  CONSTRAINT fk_contato_categoria
    FOREIGN KEY (idcategoria)
    REFERENCES categoria (idcategoria)
);

INSERT INTO estado(estado,sigla) VALUES('Rio Grande do Sul','RS');
INSERT INTO estado(estado,sigla) VALUES('Santa Catarina','SC');
INSERT INTO estado(estado,sigla) VALUES('Paraná','PR');
INSERT INTO estado(estado,sigla) VALUES('São Paulo','SP');
INSERT INTO estado(estado,sigla) VALUES('Rio de Janeiro','RJ');

INSERT INTO categoria(descricao) VALUES('Cliente');
INSERT INTO categoria(descricao) VALUES('Fornecedor');
INSERT INTO categoria(descricao) VALUES('Funcionário');