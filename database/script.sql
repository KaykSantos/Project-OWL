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
    diretorio VARCHAR(100),
    dt_post DATE,
    autor INT,
    FOREIGN KEY (autor) REFERENCES adm (cd)
);

CREATE VIEW vwPostagem AS 
    SELECT p.cd AS cd, p.titulo AS titulo, p.conteudo AS conteudo, p.imagem AS imagem, p.diretorio AS diretorio, p.dt_post AS dt_post, p.autor AS id_autor, 
    a.nm_adm AS nm_adm, a.email_adm AS email_adm
        FROM post p, adm a
            WHERE p.autor = a.cd;