-- Gerado por Oracle SQL Developer Data Modeler 22.2.0.165.1149
--   em:        2022-11-23 21:38:37 BRT
--   site:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE anuncio (
    descricao VARCHAR2(100),
    numero    NUMBER NOT NULL,
    data      DATE NOT NULL,
    valor     NUMBER NOT NULL,
    carro     VARCHAR2(7) NOT NULL,
    vendedor  NUMBER NOT NULL
)
LOGGING;

ALTER TABLE anuncio ADD CONSTRAINT anuncio_pk PRIMARY KEY ( numero );

CREATE TABLE carro (
    placa  VARCHAR2(7) NOT NULL,
    modelo VARCHAR2(20) NOT NULL,
    ano    NUMBER(4) NOT NULL,
    cor    VARCHAR2(20) NOT NULL,
    marca  VARCHAR2(20) NOT NULL
)
LOGGING;

ALTER TABLE carro ADD CONSTRAINT carro_pk PRIMARY KEY ( placa );

CREATE TABLE feedback (
    comentario VARCHAR2(200),
    avaliacao  CHAR(1) NOT NULL,
    id         NUMBER NOT NULL
)
LOGGING;

ALTER TABLE feedback ADD CONSTRAINT feedback_pk PRIMARY KEY ( id );

CREATE TABLE transacao (
    valor       NUMBER NOT NULL,
    data        DATE NOT NULL,
    comprador   NUMBER NOT NULL,
    vendedor    NUMBER NOT NULL,
    anuncio     NUMBER NOT NULL,
    feedback_id NUMBER NOT NULL
)
LOGGING;

ALTER TABLE transacao
    ADD CONSTRAINT transacao_pk PRIMARY KEY ( comprador,
                                              vendedor,
                                              data,
                                              anuncio );

CREATE TABLE usuario (
    email    VARCHAR2(30) NOT NULL,
    telefone NUMBER NOT NULL,
    userid   NUMBER NOT NULL,
    endereco VARCHAR2(100) NOT NULL,
    nome     VARCHAR2(50) NOT NULL
)
LOGGING;

ALTER TABLE usuario ADD CONSTRAINT usuario_pk PRIMARY KEY ( userid );

ALTER TABLE anuncio
    ADD CONSTRAINT anuncio_carro_fk FOREIGN KEY ( carro )
        REFERENCES carro ( placa )
    NOT DEFERRABLE;

ALTER TABLE anuncio
    ADD CONSTRAINT anuncio_usuario_fk FOREIGN KEY ( vendedor )
        REFERENCES usuario ( userid )
    NOT DEFERRABLE;

ALTER TABLE transacao
    ADD CONSTRAINT transacao_anuncio_fk FOREIGN KEY ( anuncio )
        REFERENCES anuncio ( numero )
    NOT DEFERRABLE;

ALTER TABLE transacao
    ADD CONSTRAINT transacao_feedback_fk FOREIGN KEY ( feedback_id )
        REFERENCES feedback ( id )
    NOT DEFERRABLE;

ALTER TABLE transacao
    ADD CONSTRAINT transacao_usuario_fk FOREIGN KEY ( comprador )
        REFERENCES usuario ( userid )
    NOT DEFERRABLE;

ALTER TABLE transacao
    ADD CONSTRAINT transacao_usuario_fkv2 FOREIGN KEY ( vendedor )
        REFERENCES usuario ( userid )
    NOT DEFERRABLE;



-- Relatório do Resumo do Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             5
-- CREATE INDEX                             0
-- ALTER TABLE                             11
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
