CREATE DATABASE OWLProject;
USE OWLProject;

CREATE TABLE curso(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nm_curso VARCHAR(40),
    ano INT,
    ds_curso LONGTEXT
);

INSERT INTO curso VALUES
(null, "MDS", 1, "Médio em Desenvolvimento de Sistemas"),
(null, "MDS", 2, "Médio em Desenvolvimento de Sistemas"),
(null, "MDS", 3, "Médio em Desenvolvimento de Sistemas"),
(null, "JODI", 1, "Programação em Jogos Digitais"),
(null, "JODI", 2, "Programação em Jogos Digitais"),
(null, "JODI", 3, "Programação em Jogos Digitais"),
(null, "MAD", 1, "Administração"),
(null, "MAD", 2, "Administração"),
(null, "MAD", 3, "Administração");


CREATE TABLE aluno(
    rm INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nm_aluno VARCHAR(60),
    email_aluno VARCHAR(100),
    senha VARCHAR(100),
    id_curso INT,
    FOREIGN KEY (id_curso) REFERENCES curso(cd)
);

CREATE TABLE adm(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nm_adm VARCHAR(60),
    email_adm VARCHAR(100),
    senha VARCHAR(100)
);

CREATE TABLE post(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200),
    conteudo LONGTEXT,
    imagem VARCHAR(100),
    autor INT,
    FOREIGN KEY (autor) REFERENCES adm (cd),
    diretorio VARCHAR(100)
);