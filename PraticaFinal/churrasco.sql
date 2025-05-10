/* CREATE DATABASE churrasco; */

CREATE DATABASE IF NOT EXISTS churrasco;
USE churrasco;

CREATE TABLE IF NOT EXISTS lista_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS convidados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    dependentes INT
);

ALTER TABLE lista_itens ADD COLUMN tipo ENUM('solido', 'liquido') DEFAULT 'solido';


/*

-- Inserindo itens
INSERT INTO lista_itens (nome) VALUES
('Carne'),
('Frango'),
('Cerveja'),
('Refrigerante'),
('Carvão');

-- Inserindo convidados
INSERT INTO convidados (nome, dependentes) VALUES
('Paula', 2),
('João', 0),
('Carlos', 1),
('Fernanda', 3);

*/
