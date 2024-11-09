CREATE TABLE Anunciante (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(256) NOT NULL,
    CPF CHAR(11) UNIQUE NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    SenhaHash VARCHAR(255) NOT NULL,
    Telefone VARCHAR(20)
);

CREATE TABLE Anuncio (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Marca VARCHAR(50) NOT NULL,
    Modelo VARCHAR(50) NOT NULL,
    Ano YEAR NOT NULL,
    Cor VARCHAR(20),
    Quilometragem INT,
    Descricao TEXT,
    Valor DECIMAL(10, 2) NOT NULL,
    DataHora DATETIME NOT NULL,
    Estado CHAR(2) NOT NULL,
    Cidade VARCHAR(50) NOT NULL,
    IdAnunciante INT,
    FOREIGN KEY (IdAnunciante) REFERENCES Anunciante(Id)
);

CREATE TABLE Interesse (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20) NOT NULL,
    Mensagem TEXT,
    DataHora DATETIME NOT NULL,
    IdAnuncio INT,
    FOREIGN KEY (IdAnuncio) REFERENCES Anuncio(Id)
);

CREATE TABLE Foto (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    IdAnuncio INT,
    NomeArqFoto VARCHAR(255) NOT NULL,
    FOREIGN KEY (IdAnuncio) REFERENCES Anuncio(Id)
);
