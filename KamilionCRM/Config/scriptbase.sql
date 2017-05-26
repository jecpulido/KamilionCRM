CREATE TABLE Diagnostico (
  diag_id INTEGER NOT NULL AUTO_INCREMENT,
  diag_Tipificacion1 VARCHAR(500) NULL,
  diag_Tipificacion2 VARCHAR(500) NULL,
  diag_Tipificacion3 VARCHAR(100) NULL,
  diag_Tipificacion4 VARCHAR(50) NULL,
  diag_Cod_diagnostico VARCHAR(10) NULL,
  diag_Pertenece VARCHAR(50) NULL,
  PRIMARY KEY(diag_id)
);

CREATE TABLE Division_Politica (
  divp_if INTEGER NOT NULL,
  divp_Region VARCHAR(80) NOT NULL,
  divp_IdDepartamento NUMERIC NOT NULL,
  divp_Departamento VARCHAR(50) NOT NULL,
  divp_IdCiudad NUMERIC NOT NULL,
  divp_Ciudad VARCHAR(50) NOT NULL,
  PRIMARY KEY(divp_if)
);

CREATE TABLE Perfil (
  perf_id INTEGER NOT NULL AUTO_INCREMENT,
  perf_descripcion VARCHAR(50) NULL,
  perf_permisos VARCHAR(20) NULL,
  PRIMARY KEY(perf_id)
);

CREATE TABLE Complemento_Admin (
  ca_id INTEGER NOT NULL AUTO_INCREMENT,
  ca_descripcion VARCHAR(50) NULL,
  PRIMARY KEY(ca_id)
);

CREATE TABLE Complemento_datos (
  comd_id INTEGER NOT NULL AUTO_INCREMENT,
  comd_Descripcion VARCHAR(100) NULL,
  comd_Pertenece VARCHAR(50) NULL,
  PRIMARY KEY(comd_id)
);

CREATE TABLE Cargo (
  carg_id INTEGER NOT NULL AUTO_INCREMENT,
  carg_descripcion VARCHAR(50) NULL,
  carg_seccion VARCHAR(50) NULL,
  PRIMARY KEY(carg_id)
);

CREATE TABLE Personal (
  per_codigo VARCHAR(6) NOT NULL,
  Complemento_Admin_ca_id INTEGER NOT NULL,
  Cargo_carg_id INTEGER NOT NULL,
  per_documento VARCHAR(20) NOT NULL,
  per_nombre VARCHAR(80) NOT NULL,
  per_apellidos VARCHAR(80) NOT NULL,
  per_telefono VARCHAR(10) NULL,
  per_celular VARCHAR(10) NULL,
  per_direccion VARCHAR(150) NOT NULL,
  per_correo VARCHAR(150) NULL,
  per_profesion VARCHAR(50) NOT NULL,
  per_fechaNacimeinto DATE NOT NULL,
  per_estado BIT NOT NULL,
  PRIMARY KEY(per_codigo),
  FOREIGN KEY(Cargo_carg_id)
    REFERENCES Cargo(carg_id),
  FOREIGN KEY(Complemento_Admin_ca_id)
    REFERENCES Complemento_Admin(ca_id)
);

CREATE TABLE Usuarios (
  usu_id VARCHAR(30) NOT NULL,
  Personal_per_codigo VARCHAR(6) NOT NULL,
  Perfil_perf_id INTEGER NOT NULL,
  usu_pass VARCHAR(50) NOT NULL,
  usu_jefe VARCHAR(60) NOT NULL,
  PRIMARY KEY(usu_id),
  FOREIGN KEY(Perfil_perf_id)
    REFERENCES Perfil(perf_id),
  FOREIGN KEY(Personal_per_codigo)
    REFERENCES Personal(per_codigo)
);

CREATE TABLE Inbound (
  inb_Caso BIGINT NOT NULL,
  Usuarios_usu_id VARCHAR(30) NOT NULL,
  inb_IdLlamada VARCHAR(20) NOT NULL,
  inb_FechaIngreso DATETIME NOT NULL,
  inb_Estado VARCHAR(20) NOT NULL,
  inb_NombreCliente VARCHAR(100) NULL,
  inb_MinCliente VARCHAR(10) NULL,
  inb_MinAlternoCliente VARCHAR(10) NULL,
  inb_Ciudad VARCHAR(50) NULL,
  inb_UsuarioReporta VARCHAR(8) NULL,
  PRIMARY KEY(inb_Caso),
  FOREIGN KEY(Usuarios_usu_id)
    REFERENCES Usuarios(usu_id)
);

CREATE TABLE Falla_Servicio (
  fallas_id BIGINT NOT NULL AUTO_INCREMENT,
  Inbound_inb_Caso BIGINT NOT NULL,
  Usuarios_usu_id VARCHAR(30) NOT NULL,
  fallas_FechaRegistro DATETIME NULL,
  fallas_SD VARCHAR(10) NULL,
  fallas_EstadoSD VARCHAR(20) NULL,
  fallas_ObservacionSD VARCHAR(2000) NULL,
  fallas_TipoFalla VARCHAR(100) NULL,
  fallas_APN VARCHAR(50) NULL,
  PRIMARY KEY(fallas_id),
  FOREIGN KEY(Usuarios_usu_id)
    REFERENCES Usuarios(usu_id),
  FOREIGN KEY(Inbound_inb_Caso)
    REFERENCES Inbound(inb_Caso)
);

CREATE TABLE CRM_inbound (
  crm_id BIGINT NOT NULL AUTO_INCREMENT,
  Division_Politica_divp_if INTEGER NOT NULL,
  Inbound_inb_Caso BIGINT NOT NULL,
  Usuarios_usu_id VARCHAR(30) NOT NULL,
  crm_FechaRegistro DATETIME NOT NULL,
  crm_Servicio INTEGER NOT NULL,
  crm_Solicitud INTEGER NOT NULL,
  crm_CausaRaiz INTEGER NOT NULL,
  crm_CategoriaCierre INTEGER NOT NULL,
  crm_Tipificacion VARCHAR(20) NOT NULL,
  crm_Observacion VARCHAR(2000) NOT NULL,
  crm_MinAlterno VARCHAR(10) NULL,
  crm_Escalamiento VARCHAR(30) NULL,
  crm_FechaProgra DATETIME NULL,
  crm_PQR VARCHAR(15) NULL,
  crm_Equipo VARCHAR(50) NULL,
  crm_Barrio VARCHAR(100) NULL,
  crm_Inconsistencia VARCHAR(100) NULL,
  PRIMARY KEY(crm_id),
  FOREIGN KEY(Usuarios_usu_id)
    REFERENCES Usuarios(usu_id),
  FOREIGN KEY(Inbound_inb_Caso)
    REFERENCES Inbound(inb_Caso),
  FOREIGN KEY(Division_Politica_divp_if)
    REFERENCES Division_Politica(divp_if)
);

CREATE TABLE Falla_Tecnica (
  fallat_id BIGINT NOT NULL AUTO_INCREMENT,
  Division_Politica_divp_if INTEGER NOT NULL,
  Inbound_inb_Caso BIGINT NOT NULL,
  Usuarios_usu_id VARCHAR(30) NOT NULL,
  fallat_Cliente VARCHAR(100) NOT NULL,
  fallat_minContacto VARCHAR(10) NOT NULL,
  fallat_Tiempo VARCHAR(10) NOT NULL,
  fallat_Tipo VARCHAR(100) NOT NULL,
  fallat_FechaRegistro DATETIME NOT NULL,
  fallat_Vereda VARCHAR(80) NULL,
  falat_Direccion VARCHAR(100) NULL,
  fallat_Barrio VARCHAR(100) NULL,
  fallat_Coordenada VARCHAR(30) NULL,
  fallat_Equipo VARCHAR(50) NULL,
  fallat_Cpd VARCHAR(12) NOT NULL,
  fallat_EstadoCpd VARCHAR(20) NOT NULL,
  fallat_ObsCpd VARCHAR(2000) NULL,
  fallat_FechaCpd DATETIME NULL,
  PRIMARY KEY(fallat_id),
  FOREIGN KEY(Usuarios_usu_id)
    REFERENCES Usuarios(usu_id),
  FOREIGN KEY(Inbound_inb_Caso)
    REFERENCES Inbound(inb_Caso),
  FOREIGN KEY(Division_Politica_divp_if)
    REFERENCES Division_Politica(divp_if)
);

ALTER TABLE `personal` ADD `per_genero` ENUM('M','F') NOT NULL AFTER `per_fechaNacimeinto`, ADD `per_rutaFoto` VARCHAR(200) NOT NULL AFTER `per_genero`;
ALTER TABLE `personal` ADD `per_tipoDocumento` VARCHAR(3) NOT NULL AFTER `per_documento`;
ALTER TABLE `personal` CHANGE `per_estado` `per_estado` INT(1) NOT NULL;
ALTER TABLE `complemento_admin` ADD `ca_grupo` VARCHAR(20) NOT NULL AFTER `ca_descripcion`;
ALTER TABLE `complemento_admin` ADD `ca_estado` INT(1) NOT NULL AFTER `ca_grupo`;

--CONSULTAS
--No tiene usuarios
SELECT * FROM personal LEFT JOIN usuarios on per_codigo= Personal_per_codigo where usu_id is null

ALTER TABLE `usuarios` CHANGE `usu_pass` `usu_pass` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `crm_inbound` ADD `crm_TPQR` INT(20) NOT NULL AFTER `crm_PQR`;

CREATE TABLE EquipoStandar ( eq_equipo VARCHAR(100) NOT NULL , eq_marca VARCHAR(100) NOT NULL , primary key(equipo,marca))

Insert into EquipoStandar (eq_equipo,eq_marca) values('A50C','Azumi');
Insert into EquipoStandar (eq_equipo,eq_marca) values('A50C Plus','Azumi');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Acer Spire One','Acer');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel 3065','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel 4015a Pop C1','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol 2','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol Hero','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol mini 2','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol S','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol ultra','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Idol x','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel M Pop','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 101A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 157A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 203A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('alcatel OT 207A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 208A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 211A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 215A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 216A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 217A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 221A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 227A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 252A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 255A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 260A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 296A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 303A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 305A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 306A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 308A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 310A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 315A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 316A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 321A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 355A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 360A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 363A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 365A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 383A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 385A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 401A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 506A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 520A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 521A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 530A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 545A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 560A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 570A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 600A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 601A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 602A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 610A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 620A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 630A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 639A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 650A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 660A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 665A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 670A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 701A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 702A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 706A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 708A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 710A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 717A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 718A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 720A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 770A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 800A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 801A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 802A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 803A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 810A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 818A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 838A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 853A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 880A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 890A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 900A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 901A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 908A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 909A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 910A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 916A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 917A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 918A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 919A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel Ot 990A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel OT 995A','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop  M','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop 2 (4,5)','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop 4030s  ','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop C3','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop C5','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop C7','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel pop S3','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel t pop','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Alcatel x pop','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 105','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 265','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 292','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 295','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 299','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 360','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 401','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 410','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 501','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 505','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 510c','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 511','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 515','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 519','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 660','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 760','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 765','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 768','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 775','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 778','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 778c','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 780','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 785','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 790','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 792','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 793','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 795','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 801','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 821','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 831','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 910','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 921','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio 938','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio Ns50','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio Qs – 150','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio Qs 200','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Avvio SN50','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX510','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX512','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX515','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX520','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX525','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX530','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX535','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX540','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX610','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX650','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('AX690','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Benq Siemens','Siemens');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 7100','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 7290','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8020','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8100','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8110','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8120','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8130','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8200','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8220','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8225','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8300','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8310','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8320','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8330','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8360','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8500','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8520','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8530','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8550','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8700','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8800','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8820','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8900','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8920','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8930','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 8990','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9000','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9003','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9033','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9085','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9100','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9105','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9110','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9120','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9200','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9203','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9210','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9220','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9230','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9260','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9280','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9300','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9310','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9320','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9330','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9350','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9360','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9370','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9380','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9390','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9400','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9420','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9500','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9520','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9530','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9550','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9560','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9580','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9600','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9620','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9630','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9650','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9660','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9680','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9700','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9720','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9730','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9760','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9780','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9790','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9800','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9810','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9820','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9830','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9850','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9860','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9880','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9900','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9910','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9920','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9981','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry 9983','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry Q10','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry Q5','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry Z10','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blackberry Z30','Blackberry');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blu','Blu');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Blu Dash','Blu');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Ace','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Ace 2','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Ace 3','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Ace style','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Chat','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Core','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Core Plus DS','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Duos','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Fame','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Grand','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Grand 2','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Grand Neo','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Mega','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Note','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Note 2','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Note 4','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Pro','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 2','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 3','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 3 Mini','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 4','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 4 Mini','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 5','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S 5 Mini','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy S4 Zoom 3G','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Tab 2','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Tab 3','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Tab 4','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Y','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Young','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Galaxy Young 2','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HP 1155','HP');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HP 510','HP');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HP 610','HP');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Desire','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Desire 320','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Desire 500','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Desire 510','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Desire c','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Diamond','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Dream','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Emotion','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Excalibur','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC G1','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC G2','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Inspire','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Magic','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC One','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC One (M8)','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC One mini','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC One s','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC One v','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC One x','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Rider','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Status','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Touch','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('HTC Xcalibur','HTC');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei 8180','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend  G620','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend D2','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G510','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G525','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G526','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G6','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G610','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G630','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G700','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G730','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend G740','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend P2','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend P6','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend P7','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend W2','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y220','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y221','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y300','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y320','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y330','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y511','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y520','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y530','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y550','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Ascend Y600','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Boulder','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei G6150','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei G6608','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Gaga','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Mate','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei Mate 2 (4G)','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei U7010','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei U7520','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei U8185','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Huawei U8650','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPad','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Ipad 2','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPad 3','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPhone 3GS','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPhone 4','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPhone 4S','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPhone 5','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPhone 6','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('iPhone 6 Plus','Apple');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Ipro','Ipro');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Ipro I7','Ipro');
Insert into EquipoStandar (eq_equipo,eq_marca) values('K325','Bmobile');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Kyocera E4600','Kyocera');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Kyocera S1600','Kyocera');
Insert into EquipoStandar (eq_equipo,eq_marca) values('L2n','Azumi');
Insert into EquipoStandar (eq_equipo,eq_marca) values('L500','Avvio');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix E7','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix LX1','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix LX5','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix LX7','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix S120','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix S220','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix S700','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix W30','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lanix W31','Lanix');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lenovo A369i','Lenovo');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lenovo S820','Lenovo');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lenovo S960 Vibe X','Lenovo');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG  500G','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG 400','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG C195','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG C365','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG C900','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Chatter','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Conect','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Connect','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Cookie','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Cookie Smart','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG GT 300','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG GT 360 ','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG GW300','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG MS25','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Nexus 4','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lg Optimus 3D','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lg Optimus Black','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus F3','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G F3 Pro','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G Flex','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L30','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L40','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L50','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L60','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L70','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L80','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G L90','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G Pad','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G2','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G2 Mini','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus G3','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L3','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L3 II','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L4','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L4II','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L5','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L5II','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L7','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L7 II','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus L9','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus LG optimus','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus Me','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Lg Optimus One','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Optimus Pro','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG OT 395','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG T375','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG Times','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG W 300','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG W350','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('LG W360','LG');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Message Phone QS150','Message Phone');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Modem Alcatel','Alcatel');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Modem Huawei','Huawei');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Modem ZTE','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola 5233','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola 680','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola A1200','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola A3100','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola A45','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Atrix','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola C115','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola C156','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Defy','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Dext','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX 118','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX 225','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX105','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX106','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX108','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX109','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX115','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX116','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX118','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX119','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX19','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX223','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX225','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX226','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Ex303','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EX320','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Ex890','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola EXT 118','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Flipout','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola K1','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola L6','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Me','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto E','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto G','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto G (Segunda generacion)','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto G Ferrari','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto X','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto X (Segunda generacion)','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Moto X Acabados en madera','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Motokey','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Motosmart','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Photon','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Pro','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Q1','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Q9','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Razr','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Razr D1','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Razr D3','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Razr HD','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Smart Me','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Spice','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola TX109','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola U6','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola V220','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola V8','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola W320','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola W321','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola W375','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola W396','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Xoom','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola XT 316 ','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola XT 615','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Motorola Z6','Motorola');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 100','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 101','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 1108','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 111','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 1200','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 1208','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 1600','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 1616','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 1680','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 201','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 202','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 203','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 205','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2220','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2330','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2600','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2610','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2630','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2690','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2710','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2730','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2760','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 2770','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 300','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 301','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 302','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 303','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3030','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 306','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 311','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3120','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3131','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 320','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3200','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3220','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 330','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3500','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3590','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3595','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 3650','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5000','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 502','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 503','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5070','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5130','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5200','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5220','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5230','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5233','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5250','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5300','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5310','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5320','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5530','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5610','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 5800','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 601','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6010','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6020','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6030','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6061','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6070','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6080','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 610','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6101','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6103','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6120','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6131','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6200','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6210','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6230','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6300','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6310','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6360','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6555','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6620','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 6800','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 7250','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 7610','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 8801','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia 9500','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C1','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C2','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C3','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C4','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C5','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C6','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia C7','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E5','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E6','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E61','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E62','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E63','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E65','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E7','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E70','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E71','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia E72','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 1020','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 1520','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 505','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 510','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 520','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 610','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 625','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 635','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 710','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 720','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 730','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 735','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 800','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 820','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 830','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 900','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 920','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 925','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 930','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia Lumia 990','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N72','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N73','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N78','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N8','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N85','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N95','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia N97','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia U','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia X2','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia X3','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Nokia X6','Nokia');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Palm','Palm');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Palm Treo','Palm');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Qbex','Qbex');
Insert into EquipoStandar (eq_equipo,eq_marca) values('QS150','Message Phone');
Insert into EquipoStandar (eq_equipo,eq_marca) values('QS200','Message Phone');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Qtek 600','Qtek');
Insert into EquipoStandar (eq_equipo,eq_marca) values('QTEK 91','Qtek');
Insert into EquipoStandar (eq_equipo,eq_marca) values('QTEK 9100','Qtek');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sagem ','Sagem');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sagem 301','Sagem');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sagem XT','Sagem');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Beat','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Blackjack','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Chat 335','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Chat 527','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Corby','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Galaxy Music','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Keystone','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Omnia W','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Star','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Samsung Star II','Samsung');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Siemens A56i','Siemens');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Siemens S56','Siemens');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sky Patrol T8750','Skypatrol');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sky Patrol TT8000','Skypatrol');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Live','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson TXT','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia  E3','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia  E3 Dual','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia  Go','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia  T3','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Acro s','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Arc','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia C3 Dual','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia E','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia E Dual','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia E1','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Ion','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Ion LTE','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia J','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia L','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Live with Walkman','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia M','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia M2','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Mini','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Miro','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Neo','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Neo L','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Neo V','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia P','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Pro','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Ray','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia S','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia SOLA','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia SP','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia T','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia T2 Ultra','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Tipo','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Tx','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Txt Pro','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia U','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia V','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia X10','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia X8','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z1','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z1 Compact','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z1 Ultra','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z2','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z3','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z3 compact','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia Z3 Dual','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony Ericsson Xperia ZL','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony EricssonW380','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Sony TXT','Sony Ericsson');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Synchronica QS200','Message Phone');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Verykool ','Verykool');
Insert into EquipoStandar (eq_equipo,eq_marca) values('Verykool I200','Verykool');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE Blade','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE Grand','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE N280','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE R228','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE Racer','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE S226','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE X850','ZTE');
Insert into EquipoStandar (eq_equipo,eq_marca) values('ZTE X990','ZTE');