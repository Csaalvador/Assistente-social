CREATE TABLE PESSOA (
    id_pessoa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    rg VARCHAR(15) NOT NULL,
    endereco TEXT NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    renda_familiar DECIMAL(10, 2) NOT NULL,
    composicao_familiar TEXT NOT NULL,
    beneficios_recebidos TEXT,
    situacao_habitacional TEXT NOT NULL,
    nivel_escolaridade VARCHAR(100) NOT NULL,
    situacao_emprego TEXT NOT NULL
);

CREATE TABLE RELATORIO (
    id_relatorio INT AUTO_INCREMENT PRIMARY KEY,
    pessoa_id INT NOT NULL,
    motivo_relatorio VARCHAR(150),
    observacoes VARCHAR(250),
    comprovante_renda TEXT,
    comprovante_residencia TEXT,
    agendamento_visita DATE,
    prioridade VARCHAR(8),
    FOREIGN KEY (pessoa_id) REFERENCES PESSOA(id_pessoa)
);