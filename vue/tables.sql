-- creation de la base de donnees
create database gestioncommerciale;

-- Table client
create table clients (
numclient int(11) AUTO_INCREMENT PRIMARY KEY,
nomclient varchar(64),
raisonsocial varchar(64),
adresseclient text ,
pays varchar(64),
telephone varchar(64)
    );

-- table commande
CREATE TABLE commande
(numcommande INTEGER NOT NULL AUTO_INCREMENT,
 datecommande DATE NOT NULL,
 numclient INTEGER NOT NULL,
 PRIMARY KEY (numcommande),
 FOREIGN KEY (numclient) REFERENCES clients (numclient)
);

-- table produit 
CREATE TABLE produit
(refproduit INT(11) NOT NULL AUTO_INCREMENT,
 nomproduit VARCHAR(64),
 prixunitaire int(11) DEFAULT 0 NOT NULL CHECK ( prixunitaire>= 0),
 qtestock INT(11) DEFAULT 0 NOT NULL
CHECK ( qtestock >= 0),
 indisponible enum('0','1') DEFAULT 1 ,
 PRIMARY KEY (refproduit));


-- table ligne_commande
CREATE TABLE lignecommande
(numcommande INTEGER NOT NULL,
refproduit INTEGER NOT NULL,
 quantite INTEGER NOT NULL
CHECK (quantite > 0),
 FOREIGN KEY (numcommande) REFERENCES commande (numcommande),
 FOREIGN KEY (refproduit) REFERENCES produit   (refproduit) 
);