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