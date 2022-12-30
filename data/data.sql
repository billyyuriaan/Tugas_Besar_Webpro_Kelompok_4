CREATE TABLE IF NOT EXISTS user (
    userId INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) ,
    picture VARCHAR(255),
    password VARCHAR(255),
    userType INT NOT NULL,
    PRIMARY KEY (userId)
);

-- the user type has type of int
-- 1 is admin
-- 2 ordinary user

CREATE TABLE IF NOT EXISTS donate (
  userId INT NOT NULL,
  donateTo VARCHAR(255),
  ammout INT,
  message VARCHAR(255),
  alias VARCHAR(255),
  payMethode VARCHAR(255),
  donateDate datetime,
  FOREIGN KEY (userId) REFERENCES user(userId)
);

ALTER TABLE user ADD UNIQUE (email);


INSERT INTO user (userId,email,password, picture, userType) VALUES (1,"dummy@email.com", "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8", "http://localhost:8000/assets/uploads/gif.gif", 1);
INSERT INTO user (userId,email,password, picture, userType) VALUES (2,"wow@email.com", "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8", "http://localhost:8000/assets/uploads/gif.gif", 2);

INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (1, "wow", 20000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (1, "dia", 50000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (1, "he", 100000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (1, "she", 200000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());

INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (2, "she", 20000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (2, "he", 50000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (2, "dia", 100000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
INSERT INTO donate (userId, donateTo, ammout, message, alias, payMethode, donateDate) VALUES (2, "wow", 200000,"SALAM DARI AKU", "kamu", "GOPAY", curdate());
