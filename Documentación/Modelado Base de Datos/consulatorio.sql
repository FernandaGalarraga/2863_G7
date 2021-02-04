/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     03/02/2021 20:31:20                          */
/*==============================================================*/


drop table if exists CITAMEDICA;

drop table if exists DIRECCION;

drop table if exists HORARIOATENCION;

drop table if exists MEDICO;

drop table if exists PACIENTE;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: CITAMEDICA                                            */
/*==============================================================*/
create table CITAMEDICA
(
   MED_CODIGOUSUARIO    char(8) not null,
   CODIGOUSUARIO        char(8) not null,
   CODIGOCITAMEDICA     char(8) not null,
   TIPOCONSULTA         char(8) not null,
   FECHACITAMEDICA      date not null,
   HORACITAMECIA        time not null,
   primary key (MED_CODIGOUSUARIO, CODIGOUSUARIO, CODIGOCITAMEDICA)
);

/*==============================================================*/
/* Table: DIRECCION                                             */
/*==============================================================*/
create table DIRECCION
(
   CODIGOUSUARIO        char(8) not null,
   CODIGODIRECCION      char(8) not null,
   CIUDADDIRECCION      char(16) not null,
   CALLEDIRECCION       varchar(32),
   NUMERODIRECCION      char(8),
   primary key (CODIGOUSUARIO, CODIGODIRECCION)
);

/*==============================================================*/
/* Table: HORARIOATENCION                                       */
/*==============================================================*/
create table HORARIOATENCION
(
   CODIGOUSUARIO        char(8) not null,
   CODIGOHORARIO        char(8) not null,
   HORAINICIO           char(8) not null,
   HORAFIN              char(8) not null,
   DIASATENCIONHORARIO  char(8),
   primary key (CODIGOUSUARIO, CODIGOHORARIO)
);

/*==============================================================*/
/* Table: MEDICO                                                */
/*==============================================================*/
create table MEDICO
(
   CODIGOUSUARIO        char(8) not null,
   NOMBREMEDICO         char(16) not null,
   APELLIDOMEDICO       varchar(16) not null,
   ESPECIALIDADMEDICO   varchar(16) not null,
   primary key (CODIGOUSUARIO)
);

/*==============================================================*/
/* Table: PACIENTE                                              */
/*==============================================================*/
create table PACIENTE
(
   CODIGOUSUARIO        char(8) not null,
   NOMBREPACIENTE       char(16) not null,
   APELLIDOPATERNO      char(16) not null,
   APELLIDOMATERNO      char(16) not null,
   FECHANACIMIENTOPACIENTE date not null,
   TELEFONOPACIENTE     char(8),
   GENEROPACIENTE       char(8),
   primary key (CODIGOUSUARIO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   CODIGOUSUARIO        char(8) not null,
   NOMBREUSUARIO        varchar(32) not null,
   PASSWORDUSUARIO      varchar(32) not null,
   TIPOUSUARIO          char(8) not null comment 'Medico
            Paciente',
   primary key (CODIGOUSUARIO)
);

alter table CITAMEDICA add constraint FK_CITAMEDICA foreign key (MED_CODIGOUSUARIO)
      references MEDICO (CODIGOUSUARIO) on delete restrict on update restrict;

alter table CITAMEDICA add constraint FK_CITAMEDICA2 foreign key (CODIGOUSUARIO)
      references PACIENTE (CODIGOUSUARIO) on delete restrict on update restrict;

alter table DIRECCION add constraint FK_PACIENTEDIRECCION foreign key (CODIGOUSUARIO)
      references PACIENTE (CODIGOUSUARIO) on delete restrict on update restrict;

alter table HORARIOATENCION add constraint FK_TIENE foreign key (CODIGOUSUARIO)
      references MEDICO (CODIGOUSUARIO) on delete restrict on update restrict;

alter table MEDICO add constraint FK_ES foreign key (CODIGOUSUARIO)
      references USUARIO (CODIGOUSUARIO) on delete restrict on update restrict;

alter table PACIENTE add constraint FK_ES2 foreign key (CODIGOUSUARIO)
      references USUARIO (CODIGOUSUARIO) on delete restrict on update restrict;

