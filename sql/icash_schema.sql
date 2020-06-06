DROP DATABASE IF EXISTS icash_db;

CREATE DATABASE IF NOT EXISTS icash_db;

USE icash_db;

CREATE TABLE tbl_empresa (
  empr_nit varchar(15) PRIMARY KEY,
  empr_nom text NOT NULL,
  empr_des varchar(100) NOT NULL,
  empr_cor varchar(80),
  empr_tel varchar(12),
  empr_log text NOT NULL,
  empr_ubi varchar(25) NOT NULL
);

CREATE TABLE tbl_usuario (
  usua_cod int(5) AUTO_INCREMENT PRIMARY KEY,
  usua_ced varchar(12) NOT NULL UNIQUE, -- Numero de cedula del usuario
  usua_nom varchar(50) NOT NULL,  -- Nombre del usuario
  usua_cor varchar(50) NOT NULL UNIQUE, -- Correo electronico del usuario
  usua_pas text NOT NULL, -- Contraseña del usuario
  usua_fot text NOT NULL, -- Foto de perfil del usuario
  usua_dir varchar(50) NOT NULL,  -- Dirección del usuario
  usua_rol varchar(20) NOT NULL,  -- Rol del usuario
  usua_est varchar(15) NOT NULL,  -- Estado del usuario
  usua_empr_fk varchar(15) NOT NULL,  -- ID de Empresa al que pertenece el usuario
  FOREIGN KEY (usua_empr_fk) REFERENCES tbl_empresa(empr_nit) 
    ON DELETE NO ACTION ON UPDATE NO ACTION
);
CREATE TABLE tbl_categoria(
  cate_cod int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador de la categoria
  cate_nom varchar(50) NOT NULL, -- Nombre de la categoria
  cate_des text NOT NULL
);
CREATE TABLE tbl_producto(
	prod_cod int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador del producto
	prod_nom varchar(50) NOT NULL, -- Nombre del producto
  prod_des text NOT NULL, -- Descripcón del producto
  prod_pve varchar(15) NOT NULL, -- Precio de venta del producto
  prod_sto varchar(10) NOT NULL, -- Stock del producto
  prod_pco varchar(15) NOT NULL, -- Precio de compra del producto
  prod_cate_fk int(5) NOT NULL,
  FOREIGN KEY (prod_cate_fk) REFERENCES tbl_categoria(cate_cod) 
    ON DELETE NO ACTION ON UPDATE NO ACTION
);
CREATE TABLE tbl_cliente_proveedor(
	clpr_cod int(10) AUTO_INCREMENT PRIMARY KEY, -- Identificador del clienteo proveedor
	clpr_doc varchar(15) NOT NULL, -- Numero de documento de de identificación de la persona
  clpr_cel varchar(11), -- Numero de celular de la persona
  clpr_cor varchar(35), -- Correo electronico de la persona
  clpr_nit varchar(15), -- Numero de identificación tributaria
  clpr_nom varchar(50) NOT NULL, -- Nombre del cliente o proveerdor
  clpr_emp varchar(50), -- Nombre de la empresa a la que pertenece la persona
  clpr_tip varchar(10) NOT NULL -- Tipo de persona (Cliente / Proveedor)
);
CREATE TABLE tbl_tipo(
  tipo_cod int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador del tipo
  tipo_nom varchar(50) NOT NULL -- Nombre del tipo
);

CREATE TABLE tbl_comprobante(
	comp_ref int(6) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY, -- Identificador del sistema para el comprobante
  comp_val varchar(20) NOT NULL, -- Valor total del comprobante
  comp_des text NOT NULL, -- Descripción del comprobante
  comp_fec date NOT NULL, -- Fecha de creación del comprobante
  comp_tipo_fk int(5) NOT NULL, -- Tipo de comprobante
	comp_clpr_fk int(10) NULL, -- Llave foranea del cliente o proveedor
	comp_usua_fk int(5) NOT NULL, -- Llave foranea del usuario creador del comprobante
  comp_comp_fk int(6)  UNSIGNED ZEROFILL NULL, -- Llave foranea del usuario creador del comprobante
  FOREIGN KEY (comp_comp_fk) REFERENCES tbl_comprobante(comp_ref) 
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (comp_tipo_fk) REFERENCES tbl_tipo(tipo_cod) 
    ON DELETE NO ACTION ON UPDATE NO ACTION,
	FOREIGN KEY (comp_clpr_fk) REFERENCES tbl_cliente_proveedor(clpr_cod) 
		ON DELETE NO ACTION ON UPDATE NO ACTION,
	FOREIGN KEY (comp_usua_fk) REFERENCES tbl_usuario(usua_cod) 
		ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE tbl_comprobante_detalle(
  code_ref int(5) AUTO_INCREMENT PRIMARY KEY, -- Identificador del sistema para el detalle de comprobante
  code_can varchar(5) NOT NULL, -- Cantidad de productos
  code_prt varchar(20) NOT NULL, -- Precio total de la cantidad de productos
  code_comp_fk int(6) UNSIGNED ZEROFILL NOT NULL, -- Llave foranea del comprobante al que pertenece
  code_prod_fk int(5) NOT NULL, -- Llave foranea del producto
  FOREIGN KEY (code_comp_fk) REFERENCES tbl_comprobante(comp_ref) 
    ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (code_prod_fk) REFERENCES tbl_producto(prod_cod) 
    ON DELETE NO ACTION ON UPDATE NO ACTION
);
