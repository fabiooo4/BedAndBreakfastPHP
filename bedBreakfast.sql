CREATE DATABASE DB_Bed_and_Breakfast;

CREATE TABLE
    Clienti (
        Codice varCHAR(6),
        Cognome varCHAR(20) NOT NULL,
        Nome varCHAR(20) NOT NULL,
        Indirizzo varCHAR(60),
        Telefono varCHAR(15) NOT NULL,
        Email varCHAR(30),
        PRIMARY KEY (Codice)
    );

CREATE TABLE
    Camere (
        Numero INTEGER,
        Descrizione varCHAR(100),
        Posti INTEGER NOT NULL,
        PRIMARY KEY (Numero)
    );

CREATE TABLE
    Prenotazioni(
        id integer,
        Cliente varchar(6),
        Camera integer,
        DataArrivo DATE,
        DataPartenza DATE,
        Disdetta BIT DEFAULT 0,
        PRIMARY KEY (ID),
        FOREIGN KEY (Cliente) REFERENCES Clienti(Codice),
        FOREIGN KEY (Camera) REFERENCES Camere(Numero)
    );

CREATE TABLE
    Soggiorni (
        Prenotazione INTEGER,
        Cliente varCHAR(6),
        Documento varCHAR(60),
        PRIMARY KEY (Prenotazione, Cliente),
        FOREIGN KEY (Cliente) REFERENCES Clienti(Codice),
        FOREIGN KEY (Prenotazione) REFERENCES Prenotazioni(ID)
    );

INSERT INTO
    `clienti`(
        `Cognome`,
        `Nome`,
        `Indirizzo`,
        `Telefono`,
        `Email`
    )
VALUES (
        "Bottari",
        "Barbara",
        "Via Moretto 13",
        "123123123",
        "barbara@bottari.it"
    );

INSERT INTO
    `clienti`(
        `Cognome`,
        `Nome`,
        `Indirizzo`,
        `Telefono`,
        `Email`
    )
VALUES (
        "Tobia",
        "Donato",
        "Via del Risorgimento 12",
        "111222333",
        "tobia@donato.it"
    );

INSERT INTO
    `clienti`(
        `Cognome`,
        `Nome`,
        `Indirizzo`,
        `Telefono`,
        `Email`
    )
VALUES (
        "Baudo",
        "Giuseppe",
        "Via del Mare 77",
        "6767676767",
        "pippo@baudo.it"
    );

INSERT INTO
    `camere`(
        `Descrizione`,
        `Posti`,
        `Occupato`
    )
VALUES ("Ciclamini", 3, 0), ("Rose", 2, 0), ("Girasoli", 4, 0), ("Peonie", 2, 0);

INSERT INTO
    `prenotazioni`(
        `id`,
        `Cliente`,
        `Camera`,
        `DataArrivo`,
        `DataPartenza`
    )
VALUES (
        1,
        1,
        1,
        "2021-07-15",
        "2021-07-31"
    ), (
        2,
        2,
        2,
        "2021-07-01",
        "2021-07-31"
    ), (
        3,
        3,
        3,
        "2021-06-25",
        "2021-07-25"
    ), (
        4,
        1,
        1,
        "2021-12-01",
        "2021-12-31"
    );