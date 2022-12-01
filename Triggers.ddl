--Script de triggers

CREATE OR REPLACE TRIGGER verifica_valor_anuncio
BEFORE UPDATE OF VALOR ON ANUNCIO FOR EACH ROW
BEGIN
IF (:NEW.VALOR<=0) THEN
Raise_Application_Error (-20001, 'Nao e permitido anuncios com precos menores ou iguais a zero');
END IF;
END;

CREATE OR REPLACE TRIGGER verifica_ano_carro
BEFORE UPDATE OF ANO ON CARRO FOR EACH ROW
BEGIN
IF (:NEW.ANO>2023) THEN
Raise_Application_Error (-20002, 'Nao e permitido carros com ano de fabricacao no futuro');
END IF;
END;

CREATE OR REPLACE TRIGGER verifica_valor_transacao
BEFORE UPDATE OF VALOR ON TRANSACAO FOR EACH ROW
BEGIN
IF (:NEW.VALOR<=0) THEN
Raise_Application_Error (-20003, 'Nao e permitido transacoes com precos menores ou iguais a zero');
END IF;
END;
