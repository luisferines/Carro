CREATE TABLE `carro`(
  `idcarro` BIGINT(13) NOT NULL AUTO_INCREMENT,
  `carroNombre` VARCHAR(45) NULL,
  `carroPeso` DECIMAL(10,2) NULL,
  `carroModelo` CHAR(3) NULL,
  PRIMARY KEY (`idcarro`));
