CREATE DATABASE FlyMan;

USE flyman;

CREATE TABLE Lugares(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(255) NOT NULL
);


CREATE TABLE Personas(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	apellido VARCHAR(255) NOT NULL,
	fecha_nacimiento DATE,
	numero_tarjeta CHAR(16),
	id_recidencia INT,
	id_usuario VARCHAR(255),
	FOREIGN KEY (id_recidencia) REFERENCES Lugares(id),
	FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE
);

CREATE TABLE Usuarios
	 (
	 id INT AUTO_INCREMENT PRIMARY KEY,
	 email VARCHAR(255) NOT NULL UNIQUE,
	 password CHAR(60) NOT NULL
);

CREATE TABLE Pasajes(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	estado ENUM('Disponible',
				'Reservado',
				'Comprado'),
	id_vuelo INT,
	id_tipo_pasaje INT,
	id_persona INT,
	FOREIGN KEY (id_vuelo) REFERENCES Vuelos(id) ON DELETE CASCADE,
	FOREIGN KEY (id_tipo_pasaje) REFERENCES TiposPasajes(id),
	FOREIGN KEY (id_persona) REFERENCES Personas(id)
);
CREATE TABLE Reservas(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_persona INT NOT NULL,
	fecha_reserva DATE,
	id_pasaje INT,
	FOREIGN KEY (id_persona) REFERENCES Personas(id) ON DELETE CASCADE,
	FOREIGN KEY (id_pasaje) REFERENCES Pasajes(id) ON DELETE CASCADE
);

CREATE TABLE TiposPasajes(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	descuento DOUBLE NOT NULL
);

CREATE TABLE CodigosDescuento(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	codigo CHAR(60) NOT NULL,
	descuento INT NOT NULL,
	id_vuelo INT, 
	FOREIGN KEY (id_vuelo) REFERENCES Vuelos(id) ON DELETE CASCADE
);
CREATE TABLE Vuelos(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	precio DOUBLE NOT NULL,
	fecha_salida DATE NOT NULL,
	fecha_llegada DATE NOT NULL,
	id_origen INT NOT NULL,
	id_destino INT NOT NULL,
	FOREIGN KEY (id_origen) REFERENCES Lugares(id),
	FOREIGN KEY (id_destino) REFERENCES Lugares(id)
);