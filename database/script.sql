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
    dt_post DATE,
    autor INT,
    FOREIGN KEY (autor) REFERENCES adm (cd)
);

CREATE VIEW vwPostagem AS 
    SELECT p.cd AS cd, p.titulo AS titulo, p.conteudo AS conteudo, p.imagem AS imagem, p.dt_post AS dt_post, p.autor AS id_autor, 
    a.nm_adm AS nm_adm, a.email_adm AS email_adm
        FROM post p, adm a
            WHERE p.autor = a.cd;

CREATE TABLE selecao(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(130),
    conteudo LONGTEXT,
    imagem VARCHAR(100),
    dt_post DATE,
    autor INT,
    FOREIGN KEY (autor) REFERENCES adm (cd)
);

CREATE TABLE selecao_aluno(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    id_selecao INT,
    id_aluno INT,
    FOREIGN KEY (id_selecao) REFERENCES selecao (cd),
    FOREIGN KEY (id_aluno) REFERENCES aluno (rm)
);

CREATE VIEW vwSelecao AS 
    SELECT s.cd AS cd, s.titulo AS titulo, s.conteudo AS conteudo, s.imagem AS imagem, s.dt_post AS dt_post, s.autor AS id_autor, 
    a.nm_adm AS nm_adm, a.email_adm AS email_adm
        FROM selecao s, adm a
            WHERE s.autor = a.cd;

INSERT INTO adm VALUES (null, "admin", "admin@admin", md5("admin"));

CREATE VIEW vwSelecaoAluno AS   
    SELECT sa.id_aluno AS id_aluno, sa.id_selecao AS id_selecao, a.nm_aluno AS nm_aluno
        FROM selecao_aluno sa, aluno a
            WHERE sa.id_aluno = a.rm;

INSERT INTO post VALUES 
(1, "Novo site para Etec de Peruíbe", "A Etec de Peruíbe é conhecida por oferecer uma educação de alta qualidade para seus estudantes e, além disso, por promover atividades extracurriculares que auxiliam no desenvolvimento dos alunos. Entre essas atividades, os jogos escolares (interclasse) são uma das mais populares. No entanto, organizar esses jogos pode ser uma tarefa desafiadora. É preciso coordenar horários, definir as modalidades esportivas, escolher os times, criar tabelas de jogos e muito mais. Pensando em tornar esse processo mais fácil e eficiente, a Etec de Peruíbe lançou um novo site de organização de jogos escolares.", "1.jpeg", CURDATE(), 1),
(2, "Os Jogos Escolares (JEESP) estão chegando!", "A chegada dos Jogos Escolares do Estado de São Paulo é sempre um momento de grande expectativa para os estudantes e para toda a comunidade escolar. O clima de competição saudável e o espírito de união entre os participantes fazem dos jogos um evento único e especial, que reforça a importância do esporte e da educação na formação dos jovens. Que venham os jogos escolares e que a união e o respeito prevaleçam durante toda a competição!", "2.jpeg", CURDATE(), 1),
(3, "Vem aí o campeonato de E-Sports", "A Etec de Peruíbe tem uma novidade emocionante para os estudantes aficionados por jogos eletrônicos: a chegada do campeonato de E-Sports, com jogos como LoL (League of Legends) e Valorant. O evento promete reunir jovens apaixonados por games e que desejam competir e demonstrar suas habilidades e estratégias no mundo dos jogos virtuais. O campeonato de E-Sports na Etec de Peruíbe tem como objetivo não apenas promover a competição, mas também estimular o trabalho em equipe, o desenvolvimento da criatividade, o pensamento estratégico e o raciocínio rápido dos estudantes. Essas habilidades são importantes para a vida acadêmica e profissional dos jovens, e podem ser aprimoradas através da prática dos jogos eletrônicos.", "3.jpeg", CURDATE(), 1);

INSERT INTO selecao VALUES
(1, "Inscrições para o time de futsal", "Estão abertas as inscrições para os times de futsal que jogaram no interclasse que ocorrerá em em Junho, durante duas semanas, dos dias 5 ao 16. Se inscreva para participar de um dos times! ", "1.jpeg", CURDATE(), 1),
(2, "Primeira etapa da seleção de duplas para o Ping-Pong", "A seleção de duplas para o Ping-Pong está começando e é a sua chance de mostrar que é o melhor! Seja ao lado do seu amigo ou de um novo parceiro, venha participar da nossa primeira etapa e se prepare para uma competição emocionante.", "2.jpeg", CURDATE(), 1),
(3, "Ultima semana de inscrição para o time de vôlei", "Chegou a hora de fazer parte do nosso time de vôlei! A última semana de inscrições está aberta e estamos procurando por jogadores de todos os níveis e idades. Venha mostrar seu talento e se divertir com a gente em quadra. Garanta sua vaga agora e prepare-se para uma temporada incrível!", "3.jpeg", CURDATE(), 1);
