CREATE DATABASE OWLProject;
USE OWLProject;

CREATE TABLE curso(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nm_curso VARCHAR(40),
    ano INT,
    ds_curso LONGTEXT
);

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