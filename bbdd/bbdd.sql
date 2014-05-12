CREATE TABLE `myaerolog`.`rescaixa` (
    `Ds_Date` VARCHAR( 10 ) NULL ,
    `Ds_Hour` VARCHAR( 5 ) NULL ,
    `Ds_Amount` BIGINT( 12 ) NULL ,
    `Ds_Currency` INT( 4 ) NULL ,
    `Ds_Order` VARCHAR( 12 ) NULL ,
    `Ds_MerchantCode` BIGINT( 9 ) NULL ,
    `Ds_Terminal` VARCHAR( 3 ) NULL ,
    `Ds_Signature` VARCHAR( 40 ) NULL ,
    `Ds_Response` VARCHAR( 4 ) NULL ,
    `Ds_MerchantData` TEXT NULL ,
    `Ds_SecurePayment` INT( 1 ) NULL ,
    `Ds_TransactionType` VARCHAR( 1 ) NULL ,
    `Ds_Card_Country` INT( 3 ) NULL ,
    `Ds_AuthorisationCode` VARCHAR( 6 ) NULL ,
    `Ds_ConsumerLanguage` INT( 3 ) NULL ,
    `Ds_Card_Type` VARCHAR( 1 ) NULL ,
    `id` SERIAL NOT NULL AUTO_INCREMENT ,
    PRIMARY KEY ( `id` )
) ENGINE = MYISAM ;



CREATE TABLE `myaerolog`.`respuestas` (
    `id` INT NOT NULL ,
    `descripcion` VARCHAR( 200 ) NULL
    ) ENGINE = MYISAM ;
ALTER TABLE `respuestas` ADD PRIMARY KEY(`id`)



CREATE TABLE `myaerolog`.`correo` (
    `id` SERIAL NOT NULL AUTO_INCREMENT ,
    `nombre` VARCHAR( 200 ) NULL ,
    `correo` VARCHAR( 200 ) NULL ,
    `precio` DECIMAL NULL ,
    `moneda` VARCHAR( 200 ) NULL ,
    `datos` TEXT NULL ,
    `fecha` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
    `fichero` VARCHAR( 200 ) NULL ,
    `idioma` VARCHAR( 200 ) NULL ,
    PRIMARY KEY ( `id` )
    ) ENGINE = MYISAM ;

INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('101','Tarjeta caducada');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('102','Tarjeta en excepción transitoria o bajo sospecha de fraude');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('104','Operación no permitida para esa tarjeta o terminal');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('106','Intentos de PIN excedidos');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('116','Disponible insuficiente');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('118','Tarjeta no registrada');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('125','Tarjeta no efectiva');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('129','Código de seguridad (CVV2/CVC2) incorrecto');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('180','Tarjeta ajena al servicio');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('184','Error en la autenticación del titular');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('190','Denegación sin especificar Motivo');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('191','Fecha de caducidad errónea');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('202','Tarjeta en excepción transitoria o bajo sospecha de fraude con retirada de tarjeta');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('0900','Transacción autorizada para devoluciones y confirmaciones');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('904','Comercio no registrado en FUC');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('912','Emisor no disponible');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9912','Emisor no disponible');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9064','Número de posiciones de la tarjeta incorrecto');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9078','No existe método de pago válido para esa tarjeta');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9093','Tarjeta no existente');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9218','El comercio no permite op. seguras por entrada /operaciones');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9253','Tarjeta no cumple el check-digit');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9256','El comercio no puede realizar preautorizaciones');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9257','Esta tarjeta no permite operativa de preautorizaciones');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9261','Operación detenida por superar el control de restricciones en la entrada al SIS');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9913','Error en la confirmación que el comercio envía al Cyberpac (solo aplicable en la opción de sincronización SOAP)');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9914','Confirmación “KO” del comercio (solo aplicable en la opción de sincronización SOAP)');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9928','Anulación de autorización en diferido realizada por el SIS (proceso batch)');
INSERT INTO `myaerolog`.`respuestas` (`id` ,`descripcion`) VALUES ('9929','Anulación de autorización en diferido realizada por el comercio');