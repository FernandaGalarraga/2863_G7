/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     04/02/2021 13:01:01                          */
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
   MED_CODIGOUSUARIO    int not null,
   CODIGOUSUARIO        int not null,
   CODIGOCITAMEDICA     int not null,
   TIPOCONSULTA         char(16) not null,
   FECHACONSULTA        date not null,
   HORACONSULTA         time not null,
   primary key (MED_CODIGOUSUARIO, CODIGOUSUARIO)
);

/*==============================================================*/
/* Table: DIRECCION                                             */
/*==============================================================*/
create table DIRECCION
(
   CODIGOUSUARIO        int not null,
   CODIGODIRECCION      int not null,
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
   CODIGOUSUARIO        int not null,
   CODIGOHORARIO        int not null,
   HORAINICIO           time not null,
   HORAFIN              time not null,
   DIAATENCIONHORARIO   char(16) not null,
   primary key (CODIGOUSUARIO, CODIGOHORARIO)
);

/*==============================================================*/
/* Table: MEDICO                                                */
/*==============================================================*/
create table MEDICO
(
   CODIGOUSUARIO        int not null,
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
   CODIGOUSUARIO        int not null,
   NOMBREPACIENTE       char(16) not null,
   APELLIDOPATERNO      char(16) not null,
   APELLIDOMATERNO      char(16) not null,
   FECHANACIMIENTOPACIENTE date not null,
   TELEFONOPACIENTE     char(12),
   GENEROPACIENTE       char(16),
   primary key (CODIGOUSUARIO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   CODIGOUSUARIO        int not null,
   NOMBREUSUARIO        varchar(32) not null,
   PASSWORDUSUARIO      varchar(32) not null,
   TIPOUSUARIO          char(16) not null comment 'Medico
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

