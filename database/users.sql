-- Active: 1785850134834@@127.0.0.1@3306@aula

SET @pass = PASSWORD('senha123');

CREATE TABLE usuarios (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nome, email, senha) VALUES
  ('Ana Silva', 'ana@example.test', @pass),
  ('Carlos Oliveira', 'carlos@example.test', @pass),
  ('Bruno Souza', 'bruno@example.test', @pass),
  ('Carla Lima', 'carla@example.test', @pass);