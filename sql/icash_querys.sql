	INSERT INTO tbl_empresa (empr_nom, empr_nit, empr_cor, empr_tel, empr_des, empr_log, empr_ubi) VALUES
	('iCash', '1234567890', 'admin@icash.com', '8765784','Sistema contable', 'public/img/entity/iCash-logo.png', 'Fusagasugá,Colombia');
	INSERT INTO tbl_usuario (usua_ced, usua_nom, usua_cor, usua_pas, usua_fot, usua_dir, usua_rol, usua_est, usua_empr_fk) VALUES
	('1069756463', 'Andres Torres', 'andrestorres@develtec.net', 'caf1a3dfb505ffed0d024130f58c5cfa', 'public/img/user/1234567.jpg', 'Centro, Fusa', 'Administrador', 'Activo', '1234567890'),
	('1069748151', 'Tatiana Vargas	',  'tatavargas88@gmail.com', 'f003d700b79a7b82279ac294382fb14d', 'public/img/user/1069748151.jpg', '', 'Administrador', 'Activo', '1234567890'),
	('1069758458', 'Marlin Meneses', 'marlinmenesesb@hotmail.com', '2efbe256e9d8a5c7209ad76d14a8e85c', 'public/img/user/1069758458.jpg', '', 'Operario', 'Activo', '1234567890'),
	('1067123345', 'Camilo Garzon', 'bcgarzon@ucundinamarca.edu.co', '589b3a5d7b03ee28edc027952fc533d2', 'public/img/user/1067123345.jpg', '', 'Operario', 'Activo', '1234567890');
INSERT INTO tbl_categoria (cate_nom, cate_des) VALUES
('Pastillas', 'Repuesto para motos y  carros'),
('Filtro de aceite', 'Estás en Filtro de aceite. Si quieres encontrar recambios de Filtro de aceite, tendrás que escoger en el buscador de abajo tu marca, modelo y tipo de coche y te mostraremos todos los productos de Filtro de aceite adecuados para tu coche.'),
('Iluminación', 'Accesorios de iluminación para vehículos y motos'),
('Plumillas', 'Accesorios y repuesto de vehiculos'),
('Categoría de prueba', 'Esta es una prueba'),
('Llantas', 'La llanta, rin o aro es una parte de la rueda de la mayoría de vehículos terrestres, una pieza metálica cuya forma varía en relación al tipo y tamaño del vehículo, y su función es sostener el neumático para que conserve la forma al rodar.');

INSERT INTO tbl_producto (prod_nom, prod_des, prod_pve, prod_sto, prod_pco, prod_cate_fk) VALUES
('L11-10210 GAMAX','chevrolet alto 99','73000','10','63080',1),
('L4-10261 NOVE','ASTRA BRAZILERO 2002/2005','90000','1','82118',1),
('L14-10235 NOVEX','CORSA EVOLUTION','74000','7','61028',1),
('L4-7936 NOVEX','EPICA DEL.04-06','110000','6','91200',1),
('L4-7250 GAMAX','SAMURAI/SUZUKI SJ413','65000','10','53200',1),
('L5-7376 GAMAX','ACCEN/VERN/GIRO','66000','12','54500',1),
('L6-10243 EXTRA','MEG/CLIOII/SYB06/TW 02.../LOGAN','49000','7','38000',1),
('COS3593A','Chev Aveo, Chev Blazer','25000','15','17024',2),
('COS7317','Nissan Frontier Gas 2.4, Nissan Juke 1.6','75000','3','60040',2),
('COS3387A','Daewoo Lanos, Leganza','54000','7','49400',2),
('iluminacion 9003','cualquier auto','73000','6','63900',3), 
('iluminacion 9007','cualquier auto','58000','8','48716',3), 
('iluminacion 9005','cualquier auto','53118','6','41116',3), 
('iluminacion 7443','cualquier auto','30000','7','22150',3), 
('iluminacion 17916','cualquier auto','15000','12','7220',3), 
('CAP10470','Kia cerato forte2,0L','73000','4','63900',4),
('CAP8729','Daewoo Lanos','70000','9','61674',4),
('CAP8731','Daewoo Leganza','80000','9','74100',4),
('CAP8970','Hyundai Accent 2003','45000','15','40000',4),
('T-22-UB','cualquier auto','87000','10','81700',5),
('T-18-UB','cualquier auto','87000','4','81700',5),
('T-14-UB','cualquier auto','80000','7','76000',5),
('T-24-UB','cualquier auto','100000','10','91200',5),
('T-28-UB','cualquier auto','100000','5','91200',5),
('Eagle F1 Asymmetric 2', '265/50r19', '129000', '14', '100000', 6),
('Potenza S001 RFT', '225/50R17', '257000', '17', '245000', 6),
('Pirelli Cinturato P7', '225/50R17', '779867', '4', '584900', 6),
('Pilot Sport 3', '225/50R17', '987000', '5', ' 700900', 6),
('ContiCrossContact LX Sport', '225/50R17', '1574000', '7', '1477000', 6);



INSERT INTO tbl_cliente_proveedor (clpr_doc, clpr_nit, clpr_nom, clpr_cel, clpr_cor, clpr_emp, clpr_tip) VALUES
('1003519867', '', 'Andrea Katherin Rubio Perez', '3121585647', 'andrearubio@gmail.com', '', 'Cliente'),
('1025458685', '10575555547', 'Jose Albaro Rivera', '8764759', 'joserivera@gmail.com', 'gmail', 'Proveedor'),
('1069748147', '', 'Miguel Angel Rueda', '3225471517', 'miguelrueda@gmail.com', '', 'Cliente'),
('1005782475', '125485844', 'Ana Maria Forero', '8674857', 'anaforero@gmail.com', 'Bikerfull', 'Proveedor'),
('1004781571', '100256845', 'Marco Andres Lopez T', '3215748561', 'marcolopez@gmail.com', 'Renault', 'Proveedor'),
('1069758468', '100057488', 'Carlos Alvarado', '8679784', 'carlosalvarado@gmail.com', 'Kenda', 'Proveedor'),
('1069758426', '', 'Katherin Acosta Perez', '3165817496', 'katherinacosta@gmail.com', '', 'Cliente'),
('36584151', '100248598', 'Julian Pineda', '8676985', 'julianpineda@gmail.com', 'chevrolet', 'Proveedor'),
('36874845', '', 'Mario Martinez Alvarez', '313475697', 'mariomatinez@gmail.com', '', 'Cliente'),
('36859841', '104485599', 'Monica Andrea Torres', '8673245', 'monicatorres@champion.com', 'Champion', 'Proveedor');

INSERT INTO tbl_tipo (tipo_nom) VALUES
('Stock incial'),
('Compra'),
('Venta'),
('Devolución');

INSERT INTO tbl_comprobante ( comp_fec, comp_des, comp_val, comp_tipo_fk, comp_usua_fk, comp_clpr_fk) VALUES
('2020-01-01', 'INVENTARIO INICIAL','46358230',1,1,NULL),
('2020-01-10', 'COMPRA # 1','3078740',2,1,2),
('2020-01-15', 'VENTA # 1','1027796',3,1,1),
('2020-01-15', 'COMPRA # 2','1535640',2,1,4),
('2020-01-18', 'VENTA # 2','706720',3,1,3),
('2020-01-25', 'VENTA # 3','7387532',3,1,7),
('2020-01-28', 'COMPRA # 3','22303880',2,1,5),
('2020-02-08', 'VENTA # 4','195472',3,1,3),
('2020-02-12', 'VENTA # 5','11737467',3,1,7),
('2020-02-15', 'VENTA # 6','1459486',3,1,9),
('2020-02-18', 'VENTA # 7','1663500',3,1,1),
('2020-02-22', 'VENTA # 8','7580142',3,1,3),
('2020-02-25', 'COMPRA # 4','1042000',2,1,6),
('2020-02-29', 'COMPRA # 5','841976',2,1,8),
('2020-03-01', 'VENTA # 9','4561360',3,1,10);

	
INSERT INTO tbl_comprobante_detalle (code_can, code_prt, code_prod_fk, code_comp_fk) VALUES
('10','630800',1,000001),
('10','821180',2,000001),
('10','610280',3,000001),
('10','912000',4,000001),
('10','532000',5,000001),
('10','545000',6,000001),
('10','380000',7,000001),
('10','170240',8,000001),
('10','600400',9,000001),
('10','494000',10,000001),
('10','639000',11,000001),
('10','487160',12,000001),
('10','411160',13,000001),
('10','221500',14,000001),
('10','72200',15,000001),
('10','639000',16,000001),
('10','616740',17,000001),
('10','741000',18,000001),
('10','400000',19,000001),
('10','817000',20,000001),
('10','817000',21,000001),
('10','760000',22,000001),
('10','912000',23,000001),
('10','912000',24,000001),
('10','4729000',25,000001),
('10','5859570',26,000001),
('10','5849000',27,000001),
('10','7009000',28,000001),
('10','8770000',29,000001),

('10','802000',2,000002),
('20','1844000',4,000002),
('5','272500',6,000002),
('10','160240',8,000002),

('3','183084',3,000003),
('6','327000',6,000003),
('7','420280',9,000003),
('2','97432',12,000003),

('6','492696',2,000004), 
('6','547800',4,000004), 
('6','333000',6,000004), 
('6','162144',8,000004),

('3','228000',22,000005),
('5','308370',17,000005),
('1','22150',14,000005),
('3','148200',10,000005),

('2','82232',13,000006),
('3','2631000',29,000006),
('5','3504500',28,000006),
('2','1169800',27,000006),

('10','4619000',25,000007),
('20','11718880',26,000007),
('10','5849000',27,000007),
('3','117000',19,000007),

('2','82232',13,000008),
('2','44300',14,000008),
('2','14440',15,000008),
('1','54500',6,000008),

('6','2837400',25,000009),
('7','4101699',26,000009),
('8','4679200',27,000009),
('7','119168',8,000009),

('5','410590',2,00010),
('9','820800',4,00010),
('4','68096',8,00010),
('4','160000',19,00010),

('6','547200',4,000011),
('4','255600',11,000011),
('5','370500',18,000011),
('6','490200',21,000011),

('6','327000',6,0000012),
('6','228000',7,0000012),
('6','3515742',26,0000012),
('6','3509400',27,0000012),

('3','117000',7,000013),
('4','218000',6,000013),
('5','461000',4,000013),
('6','246000',19,000013),

('4','296400',18,0000014),
('4','258696',17,0000014),
('4','254000',16,0000014),
('4','32880',15,0000014),

('20','1642360',2,0000015),
('20','1824000',4,0000015),
('10','639000',16,0000015),
('5','456000',24,0000015);



