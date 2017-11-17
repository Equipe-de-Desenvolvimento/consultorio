-- FACILITANDO A EXCLUSÃO E CRIAÇÃO DE AGENDAS
-- DOIS IDS ADICIONADOS. UM PARA CASO O USUÁRIO EXCLUA A AGENDA INTEIRA E OUTRO PARA CASO ELE EXCLUA APENAS O HORÁRIO NA TABELA.

-- 19/05/2017

ALTER TABLE ponto.tb_agenda_exames ADD COLUMN horario_id integer;


-- 06/07/2017

CREATE TABLE ponto.tb_empresa_impressao
(
  empresa_impressao_id serial NOT NULL,

  cabecalho text,
  rodape text,
  paciente boolean DEFAULT false,
  procedimento boolean DEFAULT false,
  convenio boolean DEFAULT false,
  ativo boolean DEFAULT true,
  empresa_id integer,
  data_cadastro timestamp without time zone,
  operador_cadastro integer,
  data_atualizacao timestamp without time zone,
  operador_atualizacao integer,
  CONSTRAINT tb_empresa_impressao_pkey PRIMARY KEY (empresa_impressao_id)
);

ALTER TABLE ponto.tb_ambulatorio_laudo ADD COLUMN alergias character varying(40000);
ALTER TABLE ponto.tb_ambulatorio_laudo ADD COLUMN cirurgias character varying(40000);


ALTER TABLE ponto.tb_paciente ADD COLUMN alergias character varying(40000);
ALTER TABLE ponto.tb_paciente ADD COLUMN cirurgias character varying(40000);
ALTER TABLE ponto.tb_paciente ADD COLUMN observacoes character varying(40000);
ALTER TABLE ponto.tb_empresa ADD COLUMN listadeespera boolean DEFAULT false;

-- Dia 02/10/2017
ALTER TABLE ponto.tb_agenda_exames ADD COLUMN indicacao integer;

ALTER TABLE ponto.tb_agenda_exames ADD COLUMN valor_medico numeric(10,2);
ALTER TABLE ponto.tb_agenda_exames ADD COLUMN percentual_medico boolean;


-- Dia 03/10/2017

ALTER TABLE ponto.tb_agenda_exames ADD COLUMN valor_promotor numeric(10,2);
ALTER TABLE ponto.tb_agenda_exames ADD COLUMN percentual_promotor boolean DEFAULT false;


ALTER TABLE ponto.tb_procedimento_tuss ADD COLUMN valor_promotor numeric(10,2);
ALTER TABLE ponto.tb_procedimento_tuss ADD COLUMN percentual_promotor boolean DEFAULT false;

-- Dia 22/06/2017

CREATE TABLE ponto.tb_procedimento_percentual_promotor
(
  procedimento_percentual_promotor_id serial,
  procedimento_tuss_id integer,
  promotor integer,
  valor numeric(10,2),
  ativo boolean DEFAULT true,
  data_cadastro timestamp without time zone,
  operador_cadastro integer,
  data_atualizacao timestamp without time zone,
  operador_atualizacao integer,
  CONSTRAINT tb_procedimento_percentual_promotor_pkey PRIMARY KEY (procedimento_percentual_promotor_id )
);


CREATE TABLE ponto.tb_procedimento_percentual_promotor_convenio
(
  procedimento_percentual_promotor_convenio_id serial,
  procedimento_percentual_promotor_id integer,
  promotor integer,
  valor numeric(10,2),
  percentual boolean DEFAULT true,
  ativo boolean DEFAULT true,
  data_cadastro timestamp without time zone,
  operador_cadastro integer,
  data_atualizacao timestamp without time zone,
  operador_atualizacao integer,
  CONSTRAINT tb_procedimento_percentual_promotor_convenio_pkey PRIMARY KEY (procedimento_percentual_promotor_convenio_id )
);
