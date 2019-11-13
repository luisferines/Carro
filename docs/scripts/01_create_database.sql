CREATE SCHEMA `carro` ;
CREATE USER 'carro'@'127.0.0.1' IDENTIFIED WITH mysql_native_password BY 'luis12345';
GRANT ALL ON carro.* TO 'carro'@'127.0.0.1';
