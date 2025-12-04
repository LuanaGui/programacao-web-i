-- =======================================
-- BANCO DE DADOS: trattoria
-- Sistema de Avaliação de Qualidade
-- =======================================

-- Cria o banco
CREATE DATABASE trattoria;
\c trattoria;

-- =======================================
-- Tabela de setores
-- =======================================
CREATE TABLE setores (
    id_setor SERIAL PRIMARY KEY,
    nome_setor VARCHAR(100) NOT NULL
);

-- Inserir setores do restaurante
INSERT INTO setores (nome_setor) VALUES
('Geral'),
('Banheiros'),
('Estacionamento'),
('Delivery'),
('Mesas');

-- =========================================
-- Tabela de dispositivos (tablets)
-- =========================================
CREATE TABLE dispositivos (
    id_dispositivo SERIAL PRIMARY KEY,
    nome_dispositivo VARCHAR(100) NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    id_setor INT REFERENCES setores(id_setor)
);

INSERT INTO dispositivos (nome_dispositivo, status, id_setor) VALUES
('Tablet Entrada', TRUE, 1),  -- setor 1 = Geral
('Tablet Caixa', TRUE, 2);     -- setor 2 = Banheiros

--Apenas para teste
INSERT INTO dispositivos (nome_dispositivo, status) VALUES
('Tablet Entrada', TRUE),
('Tablet Caixa', TRUE);

-- ===========================================
-- Tabela de perguntas
-- ===========================================
CREATE TABLE perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    status BOOLEAN DEFAULT TRUE
);

-- ===========================================
-- Tabela de avaliações
-- ===========================================
CREATE TABLE avaliacoes (
    id_avaliacao SERIAL PRIMARY KEY,

    id_setor INT REFERENCES setores(id_setor),
    id_pergunta INT REFERENCES perguntas(id_pergunta),
    id_dispositivo INT REFERENCES dispositivos(id_dispositivo),

    resposta INT CHECK (resposta BETWEEN 0 AND 10) NOT NULL,
    feedback TEXT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

-- ============================================
-- Tabela de usuários administradores
-- ============================================
CREATE TABLE admin (
    id_admin SERIAL PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Usuário Teste (senha = admin123)
INSERT INTO admin (usuario, senha)
VALUES ('admin', crypt('admin123', gen_salt('bf')));

-- ===============================================
-- Inserindo perguntas iniciais
-- ===============================================
INSERT INTO perguntas (texto_pergunta, status) VALUES
('Como você avalia o atendimento dos garçons?', TRUE),
('Como você avalia o sabor dos pratos servidos?', TRUE),
('Como você avalia o tempo de espera pelo pedido?', TRUE),
('Como você avalia o atendimento da equipe?', TRUE),
('Como você avalia o estacionamento?', TRUE),
('Você considera que o banheiro estava limpo e organizado?', TRUE),
('Qual é o seu nível de satisfação geral com o restaurante?', TRUE);
