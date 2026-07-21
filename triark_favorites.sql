CREATE DATABASE triark_db;

USE triark_db;

CREATE TABLE triark_favorites (
  id         INT(12)      NOT NULL AUTO_INCREMENT,
  host       VARCHAR(64)  NOT NULL,
  url        TEXT,
  comment    TEXT,
  created_at DATETIME     NOT NULL,
  PRIMARY KEY (id)
);