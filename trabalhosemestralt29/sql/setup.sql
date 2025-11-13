-- =======================================
-- BANCO DE DADOS: trattoria
-- Sistema de Avaliação de Qualidade
-- =======================================

-- Cria o banco
CREATE DATABASE trattoria;
\c trattoria;

-- Tabela de perguntas
CREATE TABLE perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    status BOOLEAN DEFAULT TRUE
);

-- Tabela de avaliações
CREATE TABLE avaliacoes (
    id_avaliacao SERIAL PRIMARY KEY,
    id_setor INT,                         -- futuro uso (FK)
    id_pergunta INT REFERENCES perguntas(id_pergunta),
    id_dispositivo INT,                   -- futuro uso (FK)
    resposta INT CHECK (resposta BETWEEN 0 AND 10) NOT NULL,
    feedback TEXT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

-- Inserindo perguntas iniciais
INSERT INTO perguntas (texto_pergunta, status) VALUES
('Como você avalia o atendimento dos garçons?', TRUE),
('Como você avalia o sabor dos pratos servidos?', TRUE),
('Como você avalia o tempo de espera pelo pedido?', TRUE),
('Como você avalia o atendimento da equipe?', TRUE),
('Como você avalia o estacionamento?', TRUE),
('Você considera que o banheiro estava limpo e organizado?', TRUE),
('Qual é o seu nível de satisfação geral com o restaurante?', TRUE);
