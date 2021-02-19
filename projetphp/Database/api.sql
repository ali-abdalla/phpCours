DROP DATABASE IF EXISTS api;
CREATE DATABASE api;
CREATE TABLE api.user(
  id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  password VARCHAR(100) NOT NULL
);
CREATE TABLE api.product(
  id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR (100) NOT NULL
);

INSERT INTO api.user VALUE (NULL , 'admin','$argon2i$v=19$m=16,t=2,p=1$ZFlhSmNWbzU0NldiMDVaTA$Bgft0Tv++Jcd+lxIhoharQ');
INSERT INTO
  api.product VALUES
  (NULL, 'Iphone'),
  (NULL, 'Nokia'),
  (NULL, 'Samsung'),
  (NULL, 'Huawei')
;