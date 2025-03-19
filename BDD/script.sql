CREATE DATABASE Wealthy;

USE Wealthy;

CREATE TABLE Limite(
    ID INT auto_increment PRIMARY KEY,
    Budget float NOT NULL
);

CREATE TABLE Categorie(
    ID INT auto_increment PRIMARY KEY,
    Libelle Varchar(250) NOT NULL,
    Id_limite int,
    FOREIGN KEY (Id_limite) REFERENCES LIMITE(ID)
);

CREATE TABLE Depense(
    ID INT auto_increment PRIMARY KEY,
    Montant float NOT NULL,
    Date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Commentaire Varchar(500),
    Cat_id int,
    FOREIGN KEY (Cat_id) REFERENCES CATEGORIE (ID)
);

