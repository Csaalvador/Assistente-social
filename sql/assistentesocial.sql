CREATE DATABASE assistentesocial;

USE assistentesocial;

CREATE TABLE CadastroAssistenteSocial (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    rg VARCHAR(15) NOT NULL,
    endereco TEXT NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    renda_familiar DECIMAL(10, 2) NOT NULL,
    composicao_familiar TEXT NOT NULL,
    beneficios_recebidos TEXT,
    situacao_habitacional TEXT NOT NULL,
    nivel_escolaridade VARCHAR(100) NOT NULL,
    situacao_emprego TEXT NOT NULL,
    historico_atendimentos TEXT,
    notas_assistentes_social TEXT,
    comprovante_renda BLOB,
    comprovante_residencia BLOB,
    geracao_relatorios TEXT,
    agendamento_visitas DATE,
    alertas_prioritarios TEXT
)