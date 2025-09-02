CREATE DATABASE consultarcnpjgratis
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- 1. Tabela de Domínio: Naturezas Jurídicas
CREATE TABLE naturezas_juridicas (
    codigo INT PRIMARY KEY,
    descricao VARCHAR(255)
);

-- 2. Tabela de Domínio: Qualificações de Sócios
CREATE TABLE qualificacoes_socios (
    codigo INT PRIMARY KEY,
    descricao VARCHAR(255)
);

-- 3. Tabela de Domínio: Países
CREATE TABLE paises (
    codigo INT PRIMARY KEY,
    descricao VARCHAR(255)
);

-- 4. Tabela de Domínio: Municípios
CREATE TABLE municipios (
    codigo INT PRIMARY KEY,
    descricao VARCHAR(255)
);

-- 5. Tabela de Domínio: CNAEs
CREATE TABLE cnaes (
    codigo INT PRIMARY KEY,
    descricao VARCHAR(255)
);

-- 6. Tabela Principal: Empresas
CREATE TABLE empresas (
    cnpj_basico VARCHAR(8) PRIMARY KEY,
    razao_social VARCHAR(255),
    natureza_juridica INT,
    qualificacao_responsavel INT,
    capital_social DECIMAL(18, 2),
    porte_empresa INT,
    ente_federativo_responsavel VARCHAR(255),

    -- Definição das Chaves Estrangeiras
    FOREIGN KEY (natureza_juridica) REFERENCES naturezas_juridicas(codigo),
    FOREIGN KEY (qualificacao_responsavel) REFERENCES qualificacoes_socios(codigo)
);

-- 7. Tabela Principal: Estabelecimentos
CREATE TABLE estabelecimentos (
    cnpj_basico VARCHAR(8),
    cnpj_ordem VARCHAR(4),
    cnpj_dv VARCHAR(2),
    identificador_matriz_filial INT,
    nome_fantasia VARCHAR(255),
    situacao_cadastral INT,
    data_situacao_cadastral DATE,
    motivo_situacao_cadastral INT,
    nome_cidade_exterior VARCHAR(255),
    pais INT,
    data_inicio_atividade DATE,
    cnae_fiscal_principal INT,
    cnae_fiscal_secundaria TEXT,
    tipo_logradouro VARCHAR(100),
    logradouro VARCHAR(255),
    numero VARCHAR(20),
    complemento VARCHAR(255),
    bairro VARCHAR(100),
    cep VARCHAR(8),
    uf VARCHAR(2),
    municipio INT,
    ddd1 VARCHAR(4),
    telefone1 VARCHAR(15),
    ddd2 VARCHAR(4),
    telefone2 VARCHAR(15),
    ddd_fax VARCHAR(4),
    fax VARCHAR(15),
    correio_eletronico VARCHAR(255),
    situacao_especial VARCHAR(255),
    data_situacao_especial DATE,

    -- Chave Primária Composta
    PRIMARY KEY (cnpj_basico, cnpj_ordem, cnpj_dv),

    -- Definição das Chaves Estrangeiras
    FOREIGN KEY (cnpj_basico) REFERENCES empresas(cnpj_basico) ON DELETE CASCADE,
    FOREIGN KEY (pais) REFERENCES paises(codigo),
    FOREIGN KEY (municipio) REFERENCES municipios(codigo),
    FOREIGN KEY (cnae_fiscal_principal) REFERENCES cnaes(codigo)
);

-- 8. Tabela de Dados do Simples Nacional
CREATE TABLE simples (
    cnpj_basico VARCHAR(8) PRIMARY KEY,
    opcao_pelo_simples CHAR(1),
    data_opcao_pelo_simples DATE,
    data_exclusao_do_simples DATE,
    opcao_pelo_mei CHAR(1),
    data_opcao_pelo_mei DATE,
    data_exclusao_do_mei DATE,

    -- Definição da Chave Estrangeira
    FOREIGN KEY (cnpj_basico) REFERENCES empresas(cnpj_basico) ON DELETE CASCADE
);

-- 9. Tabela de Sócios
CREATE TABLE socios (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Adicionada uma chave primária simples
    cnpj_basico VARCHAR(8),
    identificador_socio INT,
    nome_socio VARCHAR(255),
    cnpj_cpf_socio VARCHAR(14),
    qualificacao_socio INT,
    data_entrada_sociedade DATE,
    pais INT,
    representante_legal VARCHAR(11),
    nome_representante VARCHAR(255),
    qualificacao_representante_legal INT,
    faixa_etaria INT,

    -- Definição das Chaves Estrangeiras
    FOREIGN KEY (cnpj_basico) REFERENCES empresas(cnpj_basico) ON DELETE CASCADE,
    FOREIGN KEY (qualificacao_socio) REFERENCES qualificacoes_socios(codigo),
    FOREIGN KEY (qualificacao_representante_legal) REFERENCES qualificacoes_socios(codigo),
    FOREIGN KEY (pais) REFERENCES paises(codigo)
);

-- Índice para busca por CNAE Fiscal Principal
CREATE INDEX idx_estab_cnae ON estabelecimentos(cnae_fiscal_principal);

-- Índice para busca por UF
CREATE INDEX idx_estab_uf ON estabelecimentos(uf);

-- Índice para busca por Município
CREATE INDEX idx_estab_municipio ON estabelecimentos(municipio);

-- Índice para busca combinada por UF e CNAE
CREATE INDEX idx_estab_uf_cnae ON estabelecimentos(uf, cnae_fiscal_principal);

-- Índice para busca combinada por Município e CNAE
CREATE INDEX idx_estab_municipio_cnae ON estabelecimentos(municipio, cnae_fiscal_principal);

-- Índice para busca combinada por Situação Cadastral e CNAE
CREATE INDEX idx_estab_situacao_cnae ON estabelecimentos(situacao_cadastral, cnae_fiscal_principal);

-- Índice para busca combinada por Situação Cadastral e UF
CREATE INDEX idx_estab_situacao_uf ON estabelecimentos(situacao_cadastral, uf);

-- Índice para busca combinada por Situação Cadastral, UF e Município
CREATE INDEX idx_estab_situacao_uf_municipio ON estabelecimentos(situacao_cadastral, uf, municipio);