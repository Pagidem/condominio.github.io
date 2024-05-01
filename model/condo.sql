drop database condominio;
create database condominio;
use condominio;

create table tUsuario(
    idtusuario int not null PRIMARY key auto_increment,
    nomtusuario varchar(90) not null
);
INSERT INTO `tusuario` (`idtusuario`, `nomtusuario`) VALUES (NULL, 'administrador');


create table usuario(
    idusuario int not null PRIMARY KEY auto_increment,
    usuario varchar(60) not null unique,
    clave varchar(60) not null,
    estado int not null,
    tipo int not null,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modificado_en varchar(60) not null,
    FOREIGN KEY(tipo) REFERENCES tUsuario(idtusuario)
);

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `estado`, `creado_en`, `modificado_en`, `tipo`) VALUES (NULL, 'admin', '123456', '1', current_timestamp(), '2024-4-23 22:26','1');

create table documento(
    idd int not null primary key auto_increment,
    cid varchar(60) not null unique,
    extension varchar(10) not null,
    tipo varchar(30)
);

INSERT INTO `documento` (`idd`, `cid`, `extension`, `tipo`) VALUES (NULL, '11223344', 'sc', 'ci');

create table persona(
    idp int not null primary key auto_increment,
    nombres varchar(120) not null,
    apaterno varchar(60) not null,
    amaterno varchar(60) not null,
    celular int not null,
    ci int not null,
    FOREIGN KEY(ci) REFERENCES documento(idd)
);

INSERT INTO `persona` (`idp`, `nombres`, `apaterno`, `amaterno`, `celular`, `ci`) VALUES (NULL, 'Geranio Arsenico', 'Gil', 'Coimbra', '78546523', '1');

create table vehiculo(
    idv int not null PRIMARY key auto_increment,
    placa varchar(10),
    letras varchar(10),
    ocupantes int,
    tipo varchar(60),
    marca varchar(60),
    foto mediumblob
);

INSERT INTO `vehiculo` (`idv`, `placa`, `letra`, `ocupantes`, `tipo`, `marca`, `foto`) VALUES (NULL, 's/p', 's/l', 's/o', 's/t', 's/m', 's/f');

create table visita(
    idvisita int not null primary key auto_increment,
    tipovi varchar(60) not null,
    empresa varchar(60) not null,
    fingreso varchar(12) not null,
    hingreso varchar(12) not null,
    fsalida varchar(12) not null,
    hsalida varchar(12) not null,
    casa int not null,
    bloque varchar(10) not null,
    observacion varchar(255),
    estadov int not null,
    persona int not null,
    veh int not null,
    responsable int not null,
    FOREIGN KEY(persona) REFERENCES persona(idp),
    FOREIGN KEY(veh) REFERENCES vehiculo(idv),
    FOREIGN KEY(responsable) REFERENCES usuario(idusuario)
);

INSERT INTO 
`visita` (`idvisita`, 
`tipovi`, `empresa`, `fingreso`, `hingreso`, `fsalida`, `hsalida`,
`casa`, `bloque`, `observacion`, `estadov`, 
`persona`, `veh`, `responsable`) 
VALUES (NULL, 
'Mantenimiento', 'Prolimpio', '2023-04-28', '10:50', '2023-04-28', '11:00',
'1', 'A', 'Entraton a revisar las luminarias', '1',
'1', '1', '1');



