#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Activite
#------------------------------------------------------------

CREATE TABLE Activite(
        idAct  int (11) Auto_increment  NOT NULL ,
        libAct Varchar (255) ,
        PRIMARY KEY (idAct )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Centre aere
#------------------------------------------------------------

CREATE TABLE Centre_aere(
        idCentre      int (11) Auto_increment  NOT NULL ,
        nomCentre     Varchar (50) NOT NULL ,
        horaireCentre Varchar (50) ,
        idBateau      Int NOT NULL ,
        PRIMARY KEY (idCentre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Surveillant responsable
#------------------------------------------------------------

CREATE TABLE Surveillant_responsable(
        dateNaissance Date NOT NULL ,
        PRIMARY KEY (dateNaissance )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        idGroupe       int (11) Auto_increment  NOT NULL ,
        libGroupe      Varchar (50) ,
        ageMoyenGroupe Varchar (2) ,
        PRIMARY KEY (idGroupe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Enfant
#------------------------------------------------------------

CREATE TABLE Enfant(
        idEnfant              int (11) Auto_increment  NOT NULL ,
        nomEnfant             Varchar (25) NOT NULL ,
        prenomEnfant          Varchar (25) ,
        dateDeNaissanceEnfant Date ,
        PRIMARY KEY (idEnfant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Responsable legal
#------------------------------------------------------------

CREATE TABLE Responsable_legal(
        idResp        int (11) Auto_increment  NOT NULL ,
        nomResp       Varchar (25) NOT NULL ,
        prenomResp    Varchar (25) ,
        adresseL1Resp Varchar (50) NOT NULL ,
        adresseL2Resp Varchar (50) ,
        cpResp        Char (5) ,
        villeResp     Varchar (25) ,
        PRIMARY KEY (idResp )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Bateau
#------------------------------------------------------------

CREATE TABLE Bateau(
        idBateau       int (11) Auto_increment  NOT NULL ,
        nomBateau      Varchar (25) ,
        capaciteBateau Int ,
        PRIMARY KEY (idBateau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Date
#------------------------------------------------------------

CREATE TABLE Date(
        dateGeneral Date NOT NULL ,
        PRIMARY KEY (dateGeneral )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: estResponsableDe
#------------------------------------------------------------

CREATE TABLE estResponsableDe(
        idResp   Int NOT NULL ,
        idEnfant Int NOT NULL ,
        PRIMARY KEY (idResp ,idEnfant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: surveille
#------------------------------------------------------------

CREATE TABLE surveille(
        idGroupe      Int NOT NULL ,
        dateNaissance Date NOT NULL ,
        PRIMARY KEY (idGroupe ,dateNaissance )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartient
#------------------------------------------------------------

CREATE TABLE appartient(
        dateNaissance Date NOT NULL ,
        idCentre      Int NOT NULL ,
        PRIMARY KEY (dateNaissance ,idCentre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ActiviteProposeParCentre
#------------------------------------------------------------

CREATE TABLE ActiviteProposeParCentre(
        idAct       Int NOT NULL ,
        dateGeneral Date NOT NULL ,
        idCentre    Int NOT NULL ,
        PRIMARY KEY (idAct ,dateGeneral ,idCentre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VaFaire
#------------------------------------------------------------

CREATE TABLE VaFaire(
        idAct       Int NOT NULL ,
        idEnfant    Int NOT NULL ,
        dateGeneral Date NOT NULL ,
        idCentre    Int NOT NULL ,
        PRIMARY KEY (idAct ,idEnfant ,dateGeneral ,idCentre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ComposeUnGroupeDansUnCentre
#------------------------------------------------------------

CREATE TABLE ComposeUnGroupeDansUnCentre(
        idGroupe    Int NOT NULL ,
        idEnfant    Int NOT NULL ,
        idCentre    Int NOT NULL ,
        dateGeneral Date NOT NULL ,
        idAct       Int NOT NULL ,
        PRIMARY KEY (idGroupe ,idEnfant ,idCentre ,dateGeneral ,idAct )
)ENGINE=InnoDB;

ALTER TABLE Centre_aere ADD CONSTRAINT FK_Centre_aere_idBateau FOREIGN KEY (idBateau) REFERENCES Bateau(idBateau);
ALTER TABLE estResponsableDe ADD CONSTRAINT FK_estResponsableDe_idResp FOREIGN KEY (idResp) REFERENCES Responsable_legal(idResp);
ALTER TABLE estResponsableDe ADD CONSTRAINT FK_estResponsableDe_idEnfant FOREIGN KEY (idEnfant) REFERENCES Enfant(idEnfant);
ALTER TABLE surveille ADD CONSTRAINT FK_surveille_idGroupe FOREIGN KEY (idGroupe) REFERENCES Groupe(idGroupe);
ALTER TABLE surveille ADD CONSTRAINT FK_surveille_dateNaissance FOREIGN KEY (dateNaissance) REFERENCES Surveillant_responsable(dateNaissance);
ALTER TABLE appartient ADD CONSTRAINT FK_appartient_dateNaissance FOREIGN KEY (dateNaissance) REFERENCES Surveillant_responsable(dateNaissance);
ALTER TABLE appartient ADD CONSTRAINT FK_appartient_idCentre FOREIGN KEY (idCentre) REFERENCES Centre_aere(idCentre);
ALTER TABLE ActiviteProposeParCentre ADD CONSTRAINT FK_ActiviteProposeParCentre_idAct FOREIGN KEY (idAct) REFERENCES Activite(idAct);
ALTER TABLE ActiviteProposeParCentre ADD CONSTRAINT FK_ActiviteProposeParCentre_dateGeneral FOREIGN KEY (dateGeneral) REFERENCES Date(dateGeneral);
ALTER TABLE ActiviteProposeParCentre ADD CONSTRAINT FK_ActiviteProposeParCentre_idCentre FOREIGN KEY (idCentre) REFERENCES Centre_aere(idCentre);
ALTER TABLE VaFaire ADD CONSTRAINT FK_VaFaire_idAct FOREIGN KEY (idAct) REFERENCES Activite(idAct);
ALTER TABLE VaFaire ADD CONSTRAINT FK_VaFaire_idEnfant FOREIGN KEY (idEnfant) REFERENCES Enfant(idEnfant);
ALTER TABLE VaFaire ADD CONSTRAINT FK_VaFaire_dateGeneral FOREIGN KEY (dateGeneral) REFERENCES Date(dateGeneral);
ALTER TABLE VaFaire ADD CONSTRAINT FK_VaFaire_idCentre FOREIGN KEY (idCentre) REFERENCES Centre_aere(idCentre);
ALTER TABLE ComposeUnGroupeDansUnCentre ADD CONSTRAINT FK_ComposeUnGroupeDansUnCentre_idGroupe FOREIGN KEY (idGroupe) REFERENCES Groupe(idGroupe);
ALTER TABLE ComposeUnGroupeDansUnCentre ADD CONSTRAINT FK_ComposeUnGroupeDansUnCentre_idEnfant FOREIGN KEY (idEnfant) REFERENCES Enfant(idEnfant);
ALTER TABLE ComposeUnGroupeDansUnCentre ADD CONSTRAINT FK_ComposeUnGroupeDansUnCentre_idCentre FOREIGN KEY (idCentre) REFERENCES Centre_aere(idCentre);
ALTER TABLE ComposeUnGroupeDansUnCentre ADD CONSTRAINT FK_ComposeUnGroupeDansUnCentre_dateGeneral FOREIGN KEY (dateGeneral) REFERENCES Date(dateGeneral);
ALTER TABLE ComposeUnGroupeDansUnCentre ADD CONSTRAINT FK_ComposeUnGroupeDansUnCentre_idAct FOREIGN KEY (idAct) REFERENCES Activite(idAct);
