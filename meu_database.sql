-- Por favor, siga os passos a ser executado.
-- 1° crie as tabelas

create table associado(
    idAssociado serial primary key not null,
    nome varchar(60) not null,
    email varchar(60) not null,
    cpf varchar(11) not null,
    dataAssociacao date not null,
    datacheckout date
);

create table anuidade(
    idAnuidade serial primary key not null,
    valor int not null,
    ano int not null
);

create table pagamento(
    idPagamento serial primary key not null,
    idAssociado int not null,
    idAnuidade int not null,
    pago varchar(3)
);

-- 2° adicionando as FK das tabelas anuidade e associado na tabela pagamento
ALTER TABLE
    pagamento
ADD
    CONSTRAINT fk_pagamento_associado FOREIGN KEY (idAssociado) REFERENCES associado(idAssociado) ON DELETE CASCADE;

ALTER TABLE
    pagamento
ADD
    CONSTRAINT fk_pagamento_anuidade FOREIGN KEY (idAnuidade) REFERENCES anuidade(idAnuidade) ON DELETE CASCADE;

-- 3° crie a Trigger adicionar_pagamentos() para auto preenchimento da tabela pagamento ao adicionar novos
-- usuários quando o ano não for o atual (tbm funciona pro ano atual)

CREATE OR REPLACE FUNCTION adicionar_pagamentos_antigos()
RETURNS TRIGGER AS $$
DECLARE
    v_ano_anuidade int;
    v_ano_associado int;
BEGIN
    v_ano_associado := extract(year from NEW.dataassociacao);
    FOR v_ano_anuidade IN SELECT idanuidade FROM Anuidade WHERE extract(year from CAST('01-01-' || ano AS date)) >= v_ano_associado AND extract(year from CAST('01-01-' || ano AS date)) <= extract(year from current_date) LOOP
        INSERT INTO Pagamento (idassociado, idanuidade, pago)
        VALUES (NEW.idassociado, v_ano_anuidade, 'não');
    END LOOP;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER adicionar_pagamentos_antigos_trigger
AFTER INSERT ON Associado
FOR EACH ROW
WHEN (NEW.datacheckout IS NULL)
EXECUTE FUNCTION adicionar_pagamentos_antigos();


-- 4° crie outra Trigger para auto pagamento quando fizer o checkout

CREATE OR REPLACE FUNCTION atualizar_pagamento()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.datacheckout IS NOT NULL AND OLD.datacheckout IS DISTINCT FROM NEW.datacheckout THEN
        UPDATE Pagamento
        SET pago = 'sim'
        WHERE idassociado = NEW.idassociado
          AND pago = 'não';
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER atualizar_pagamento_trigger
AFTER UPDATE ON Associado
FOR EACH ROW
EXECUTE FUNCTION atualizar_pagamento();

-- 5° Adicione os valores da tabela anuidade

insert into  anuidade(valor, ano) values(100, 2018),
(110, 2019),
(120, 2020),
(130,2021),
(140,2022),
(150, extract(year from current_date)) -- ano atual

-- 6° adicione os associados - o preenchimento da tabela pagamento será automatico

insert into
    associado(nome, email, cpf, dataassociacao)
values
    (
        'Rodrigo s ',
        'rodrigo@email',
        '32154876542',
        '2020-03-18'
    ),
    (
        'roberto c',
        'roberto@email.com',
        '59632154785',
        '2023-01-01'
    ),
    (
        'rudson a',
        'rudson@email.com',
        '85423147896',
        '2019-02-01'
    ),
    (
        'jeniffer b',
        'jeniffer@email.com',
        '65413214795',
        '2021-02-01'
    ),
    (
        'rosa f',
        'rosa@email.com',
        '65487312457',
        '2022-08-30'
    ),
    (
        'jussara a',
        'jussara@email.com',
        '96323698532',
        '2018-08-30'
    ),
    (
        'jefferson j',
        'jefferson@email.com',
        '89745213467',
        '2023-01-25'
    ),
    (
        'aluisio k',
        'aluisio@email.com',
        '6457891233',
        '2022-05-02'
    ),
    (
        'bernadete h',
        'bernadete@email.com',
        '98732174132',
        '2021-12-25'
    ),
    (
        'hemilly p',
        'hemilly@email.com',
        '65412398745',
        '2020-12-25'
    )



-- Com isso o banco esta pronto