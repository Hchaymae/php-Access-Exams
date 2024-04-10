CREATE DATABASE `concours`;
CREATE TABLE `concours`.`etud3a` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(30) NOT NULL,
    `prenom` VARCHAR(30) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `naissance` DATE NOT NULL,
    `diplome` VARCHAR(10) NOT NULL,
    `niveau` VARCHAR(10) NOT NULL,
    `etablissement` VARCHAR(30) NOT NULL,
    `photo` VARCHAR(100) NOT NULL,
    `cv` VARCHAR(100) NOT NULL,
    `login` VARCHAR(100) NOT NULL,
    `mdp` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `concours`.`etud4a` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(30) NOT NULL,
    `prenom` VARCHAR(30) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `naissance` DATE NOT NULL,
    `diplome` VARCHAR(10) NOT NULL,
    `niveau` VARCHAR(10) NOT NULL,
    `etablissement` VARCHAR(30) NOT NULL,
    `photo` VARCHAR(100) NOT NULL,
    `cv` VARCHAR(100) NOT NULL,
    `log` VARCHAR(100) NOT NULL,
    `mdp` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `concours`.`admin` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(30) NOT NULL,
    `log` VARCHAR(100) NOT NULL,
    `mdp` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;