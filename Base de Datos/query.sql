alter table usuarios MODIFY cliente VARCHAR(11);

alter table orden_servicio ADD COLUMN tipoServicio TINYINT DEFAULT 0;

alter table equipo ADD COLUMN tipoServicio TINYINT DEFAULT 0;


-- 0 = Mantenimiento, 1 = Calibracion 


CREATE TABLE `servicio` (
  `IdServicio` int NOT NULL AUTO_INCREMENT,
  `IdCliente` int NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Recoge` text DEFAULT NULL,
  `Prioridad` TINYINT DEFAULT 0,
  `Requerimiento` text DEFAULT NULL,
  `RazonSocial` text DEFAULT NULL,
  PRIMARY KEY (`IdServicio`),
  FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`)
);


CREATE TABLE `servicio_process` (
  `IdServicio` int NOT NULL AUTO_INCREMENT,
  `ConteoFecha` date NOT NULL,
  `ConteoHora` date DEFAULT NULL,
  `tiempo` text DEFAULT NULL,
  PRIMARY KEY (`IdServicio`),
  FOREIGN KEY (`IdServicio`) REFERENCES `servicio` (`IdServicio`)
);

CREATE TABLE `equipo_tipo_servicio` (
  `IdEquipoServicio` int NOT NULL AUTO_INCREMENT,
  `IdEquipo` int NOT NULL,
  `IdOrden` int,
  `Servicio` int DEFAULT 0,
  PRIMARY KEY (`IdEquipoServicio`),
  FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`IdEquipo`),
  FOREIGN KEY (`IdOrden`) REFERENCES `orden_servicio` (`IdOrden`)
);


CREATE TABLE `equipo_servicio` (
  `IdServicioEquipo` int NOT NULL AUTO_INCREMENT,
  `IdServicio` int NOT NULL,
  `IdEquipo` int NOT NULL,
  `FechaIni` date DEFAULT NULL,
  `FechaOut` date DEFAULT NULL,
  `HoraIni` TIME DEFAULT NULL,
  `HoraOut` TIME DEFAULT NULL,
  `Dano` text NOT NULL,
  `Ns` text NOT NULL,
  `Completo` TINYINT NOT NULL,
  `Observaciones` text NOT NULL,
  `Insumo` text NOT NULL,
  `Completo` TINYINT NOT NULL,
  PRIMARY KEY (`IdServicioEquipo`),
  FOREIGN KEY (`IdEquipo`) REFERENCES `equipo` (`IdEquipo`),
  FOREIGN KEY (`IdServicio`) REFERENCES `servicio` (`IdServicio`)
);

alter table equipo_servicio ADD COLUMN HoraOut TIME;
alter table equipo_servicio ADD COLUMN HoraIni TIME;

ALTER TABLE `equipo_servicio` CHANGE `HoraIni` `HoraIni` TIME NULL DEFAULT NULL;
ALTER TABLE `equipo_servicio` CHANGE `HoraOut` `HoraOut` TIME NULL DEFAULT NULL;

