CREATE DATABASE rango;
USE rango;

CREATE TABLE genero(
	id_genero INT(4) AUTO_INCREMENT NOT NULL,
	nombre_g  VARCHAR(50) NOT NULL, 
CONSTRAINT pk_genero PRIMARY KEY(id_genero)
)ENGINE=InnoDb;

CREATE TABLE actor(
	id_actor INT(4) AUTO_INCREMENT NOT NULL, 
	nombre_a  VARCHAR(50) NOT NULL,
	edad  INT(3) NOT NULL, 
	biografia MEDIUMTEXT NOT NULL,
	CONSTRAINT pk_actor PRIMARY KEY(id_actor)
)ENGINE=InnoDb;

CREATE TABLE usuario(
	id_user INT(4) AUTO_INCREMENT NOT NULL,
	usuario VARCHAR(20) NOT NULL, 
	password VARCHAR(20) NOT NULL,
	CONSTRAINT pk_usuario PRIMARY KEY(id_user)
)ENGINE=InnoDb;

CREATE TABLE pelicula(
	id_pelicula INT(4) AUTO_INCREMENT NOT NULL, 
	user_id_p INT(4) NOT NULL,
	nombre_p VARCHAR(50) NOT NULL,
	año YEAR NOT NULL,
	pais VARCHAR(100) NOT NULL, 
	sinopsis LONGTEXT NOT NULL,
	calificacion INT(2) NOT NULL, 
	CONSTRAINT pk_pelicula PRIMARY KEY(id_pelicula),
	CONSTRAINT fk_usuario_pelicula FOREIGN KEY(user_id_p) REFERENCES usuario(id_user)
)ENGINE=InnoDb;

CREATE TABLE serie(
	id_serie INT(4) AUTO_INCREMENT NOT NULL,
	user_id_s INT(4) NOT NULL,
	nombre_s VARCHAR(50) NOT NULL,
	año YEAR NOT NULL,
	pais VARCHAR(100) NOT NULL,
	sinopsis LONGTEXT NOT NULL,
	temporadas INT(2) NOT NULL,
	calificacion INT(2) NOT NULL,
	CONSTRAINT pk_serie PRIMARY KEY(id_serie),
	CONSTRAINT fk_usuario_serie FOREIGN KEY(user_id_s) REFERENCES usuario(id_user)
)ENGINE=InnoDb;

CREATE TABLE peliculaGeneros(
	genero_id_p INT(4)  NOT NULL,
	pelicula_id_g INT(4) NOT NULL,
	CONSTRAINT fk_genero_pelicula FOREIGN KEY(genero_id_p) REFERENCES genero(id_genero),
	CONSTRAINT fk_pelicula_genero FOREIGN KEY(pelicula_id_g) REFERENCES pelicula(id_pelicula)
)ENGINE=InnoDb;

CREATE TABLE peliculaActores(
	actor_id_p INT(4) NOT NULL,
	pelicula_id_a INT(4) NOT NULL,
	CONSTRAINT fk_actor_pelicula FOREIGN KEY(actor_id_p) REFERENCES actor(id_actor), 
	CONSTRAINT fk_pelicula_actor FOREIGN KEY(pelicula_id_a) REFERENCES pelicula(id_pelicula)
)ENGINE=InnoDb;

CREATE TABLE serieGeneros(
	genero_id_s INT(4) NOT NULL,
	serie_id_g INT(4) NOT NULL, 
	CONSTRAINT fk_genero_serie FOREIGN KEY(genero_id_s) REFERENCES genero(id_genero),
	CONSTRAINT fk_serie_genero FOREIGN KEY(serie_id_g) REFERENCES serie(id_serie)
)ENGINE=InnoDb;

CREATE TABLE serieActores(
	actor_id_s INT(4) NOT NULL,
	serie_id_a INT(4) NOT NULL,
	CONSTRAINT fk_actor_serie FOREIGN KEY(actor_id_s) REFERENCES actor(id_actor),
	CONSTRAINT fk_serie_actor FOREIGN KEY(serie_id_a) REFERENCES serie(id_serie)
)ENGINE=InnoDb;
