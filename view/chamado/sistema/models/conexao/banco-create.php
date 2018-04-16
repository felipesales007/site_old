<?php
	// Criação de banco de dados caso não exista
	mysqli_query($conexao,
	"CREATE DATABASE IF NOT EXISTS chamado DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;");

	// Seleciona o banco de dados para utilização
	mysqli_select_db($conexao, "chamado");

	

	# //////////////////////////////////////
	# Tabelas do banco de dados de usuários
	# /////////////////////////////////////
	
	// Tabela permissões
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS permissoes (
		permissoes_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		permissoes_permissao VARCHAR(255) NOT NULL UNIQUE
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela status
	mysqli_query($conexao,
	"CREATE TABLE IF NOT EXISTS status (
		status_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		status_nome VARCHAR(255) NOT NULL UNIQUE
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela setores
	mysqli_query($conexao,
	"CREATE TABLE IF NOT EXISTS setores (
		setores_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		setores_setor VARCHAR(255) NOT NULL UNIQUE,
		setores_status_id INT NOT NULL,

		FOREIGN KEY (setores_status_id) REFERENCES status (status_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela usuários
	mysqli_query($conexao,
	"CREATE TABLE IF NOT EXISTS usuarios (
		usuarios_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		usuarios_usuario VARCHAR(255) NOT NULL UNIQUE,
		usuarios_senha VARCHAR(255) NOT NULL,
		usuarios_nome VARCHAR(255) NOT NULL,
		usuarios_sobrenome VARCHAR(255) NOT NULL,
		usuarios_matricula INT NOT NULL UNIQUE,
		usuarios_setor_id INT NOT NULL,
		usuarios_email VARCHAR(255),
		usuarios_cpf VARCHAR(255) NOT NULL UNIQUE,
		usuarios_telefone VARCHAR(255) NOT NULL,
		usuarios_celular VARCHAR(255),
		usuarios_data_nascimento VARCHAR(255),
		usuarios_data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
		usuarios_sexo VARCHAR(255) NOT NULL,
		usuarios_imagem VARCHAR(255),
		usuarios_permissao_id INT NOT NULL,
		usuarios_status_id INT NOT NULL,
		
		FOREIGN KEY (usuarios_setor_id) REFERENCES setores (setores_id),
		FOREIGN KEY (usuarios_permissao_id) REFERENCES permissoes (permissoes_id),
		FOREIGN KEY (usuarios_status_id) REFERENCES status (status_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");



	# //////////////////////////////////////
	# Tabelas do banco de dados de chamados
	# /////////////////////////////////////

	// Tabela prioridades de serviços
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS prioridades (
		prioridades_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		prioridades_nome VARCHAR(255) NOT NULL UNIQUE
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela situações de serviços
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS situacoes (
		situacoes_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		situacoes_nome VARCHAR(255) NOT NULL UNIQUE
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela setores de serviços
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS setores_servicos (
		setores_servicos_id INT NOT NULL UNIQUE,
		setores_servicos_nome VARCHAR(255) NOT NULL UNIQUE,
		setores_servicos_status_id INT NOT NULL,

		FOREIGN KEY (setores_servicos_status_id) REFERENCES status (status_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela ocorrências (categoria)
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS ocorrencias (
		ocorrencias_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ocorrencias_ocorrencia VARCHAR(255) NOT NULL UNIQUE,
		ocorrencias_setor_id INT NOT NULL,
		ocorrencias_status_id INT NOT NULL,
	  
		FOREIGN KEY (ocorrencias_setor_id) REFERENCES setores_servicos (setores_servicos_id),
		FOREIGN KEY (ocorrencias_status_id) REFERENCES status (status_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela chamados
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS chamados (
		chamados_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		chamados_usuario_id INT NOT NULL,
		chamados_ocorrencia_id INT NOT NULL,
		chamados_problema LONGTEXT,
		chamados_prioridade_id INT NOT NULL,
		chamados_anexo VARCHAR(255),
		chamados_data_abertura TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
		chamados_data_fechamento VARCHAR(255),
		chamados_usuario_enviou_id INT,
		chamados_setor_servico_id INT NOT NULL,
		chamados_solucao LONGTEXT,
		chamados_responsavel_id INT,
		chamados_situacao_id INT NOT NULL,
	  
		FOREIGN KEY (chamados_usuario_id) REFERENCES usuarios (usuarios_id),
		FOREIGN KEY (chamados_ocorrencia_id) REFERENCES ocorrencias (ocorrencias_id),
		FOREIGN KEY (chamados_prioridade_id) REFERENCES prioridades (prioridades_id),
		FOREIGN KEY (chamados_usuario_enviou_id) REFERENCES usuarios (usuarios_id),
		FOREIGN KEY (chamados_setor_servico_id) REFERENCES setores_servicos (setores_servicos_id),
		FOREIGN KEY (chamados_responsavel_id) REFERENCES usuarios (usuarios_id),
		FOREIGN KEY (chamados_situacao_id) REFERENCES situacoes (situacoes_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela histórico de chamados (log para auditoria)
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS historico_chamados (
		historico_chamados_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		historico_chamados_chamado_id INT NOT NULL,
		historico_chamados_usuario_id INT NOT NULL,
		historico_chamados_data TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
		historico_chamados_ocorrencia VARCHAR(255) NOT NULL,
		historico_chamados_acao LONGTEXT NOT NULL,

		FOREIGN KEY (historico_chamados_chamado_id) REFERENCES chamados (chamados_id),
		FOREIGN KEY (historico_chamados_usuario_id) REFERENCES usuarios (usuarios_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela histórico de perfil (log para auditoria)
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS historico_perfil (
		historico_perfil_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		historico_perfil_usuario_id INT NOT NULL,
		historico_perfil_data TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
		historico_perfil_ocorrencia VARCHAR(255) NOT NULL,
		historico_perfil_acao VARCHAR(255) NOT NULL,

		FOREIGN KEY (historico_perfil_usuario_id) REFERENCES usuarios (usuarios_id)
	) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");

	// Tabela feedbacks
	mysqli_query($conexao, 
	"CREATE TABLE IF NOT EXISTS feedbacks (
		feedbacks_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		feedbacks_chamado_id INT NOT NULL,
		feedbacks_usuario_id INT NOT NULL,
		feedbacks_feedback LONGTEXT,
		feedbacks_data TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
		feedbacks_status_id INT NOT NULL,
		feedbacks_notificacao_status_id INT NOT NULL,
	  
		FOREIGN KEY (feedbacks_chamado_id) REFERENCES chamados (chamados_id),
		FOREIGN KEY (feedbacks_usuario_id) REFERENCES usuarios (usuarios_id),
		FOREIGN KEY (feedbacks_status_id) REFERENCES status (status_id),
		FOREIGN KEY (feedbacks_notificacao_status_id) REFERENCES status (status_id)
	  ) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;");



	# ////////////////////
	# Criação de triggers
	# ///////////////////

	// Insere na tabela de histórico o log de novo feedbacks
	mysqli_query($conexao,
	"CREATE TRIGGER IF NOT EXISTS novo_feedback
	AFTER INSERT ON feedbacks
	FOR EACH ROW
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.feedbacks_chamado_id, 
	historico_chamados_usuario_id = NEW.feedbacks_usuario_id, 
	historico_chamados_ocorrencia = 'Postagem de feedback', 
	historico_chamados_acao = NEW.feedbacks_feedback;");

	// Insere na tabela de histórico o log de exclusão de feedback 
	mysqli_query($conexao,
	"CREATE TRIGGER IF NOT EXISTS delete_feedback
	AFTER UPDATE ON feedbacks
	FOR EACH ROW
	IF NEW.feedbacks_status_id = '2' 
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.feedbacks_chamado_id, 
	historico_chamados_usuario_id = NEW.feedbacks_usuario_id, 
	historico_chamados_ocorrencia = 'Exclusão de feedback', 
	historico_chamados_acao = NEW.feedbacks_feedback;
	END IF;");

	// Insere na tabela de histórico o log de novo chamados
	mysqli_query($conexao, 
	"CREATE TRIGGER IF NOT EXISTS novo_chamado 
	AFTER INSERT ON chamados
	FOR EACH ROW
	BEGIN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura de chamado',
	historico_chamados_acao = CONCAT('Chamado nº ', NEW.chamados_id);

	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura de status',
	historico_chamados_acao = (
	SELECT situacoes_nome 
	FROM situacoes 
	WHERE situacoes_id = NEW.chamados_situacao_id);

	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura para o setor',
	historico_chamados_acao = (
	SELECT setores_servicos_nome 
	FROM setores_servicos 
	WHERE setores_servicos_id = NEW.chamados_setor_servico_id);

	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura de ocorrência',
	historico_chamados_acao = (
	SELECT ocorrencias_ocorrencia 
	FROM ocorrencias 
	WHERE ocorrencias_id = NEW.chamados_ocorrencia_id);

	IF NEW.chamados_problema <> ''
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura do problema',
	historico_chamados_acao = NEW.chamados_problema;
    END IF;

	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura de prioridade',
	historico_chamados_acao = (
	SELECT prioridades_nome 
	FROM prioridades 
	WHERE prioridades_id = NEW.chamados_prioridade_id);

	IF NEW.chamados_anexo <> ''
    THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id,
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Abertura de anexo',
	historico_chamados_acao = NEW.chamados_anexo;
    END IF;
	END;");

	// Insere na tabela de histórico o log das alterações de chamados
	mysqli_query($conexao,
	"CREATE TRIGGER IF NOT EXISTS alterar_chamado 
	AFTER UPDATE ON chamados
	FOR EACH ROW
	BEGIN
	IF NEW.chamados_problema <> OLD.chamados_problema && NEW.chamados_problema <> ''
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Alteração do problema', 
	historico_chamados_acao = NEW.chamados_problema;
	END IF;
    
    IF NEW.chamados_problema <> OLD.chamados_problema && NEW.chamados_problema <=> ''
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Alteração do problema', 
	historico_chamados_acao = 'Dados deletado';
	END IF;

	IF NEW.chamados_prioridade_id <> OLD.chamados_prioridade_id
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Alteração de prioridade', 
	historico_chamados_acao = (
	SELECT prioridades_nome 
	FROM prioridades 
	WHERE prioridades_id = NEW.chamados_prioridade_id);
	END IF;

	IF NEW.chamados_anexo <> OLD.chamados_anexo && NEW.chamados_anexo <> ''
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Alteração de anexo', 
	historico_chamados_acao = NEW.chamados_anexo;
	END IF;
    
    IF NEW.chamados_anexo <> OLD.chamados_anexo && NEW.chamados_anexo <=> ''
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Exclusão de anexo', 
	historico_chamados_acao = OLD.chamados_anexo;
	END IF;

	IF NEW.chamados_solucao <> '' && NEW.chamados_situacao_id <=> '3'
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_responsavel_id, 
	historico_chamados_ocorrencia = 'Descrição da solução', 
	historico_chamados_acao = NEW.chamados_solucao;
	END IF;
    
    IF NEW.chamados_solucao <> '' && NEW.chamados_situacao_id <=> '5'
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_responsavel_id, 
	historico_chamados_ocorrencia = 'Descrição do cancelamento', 
	historico_chamados_acao = NEW.chamados_solucao;
	END IF;

	IF NEW.chamados_situacao_id <> OLD.chamados_situacao_id && NEW.chamados_situacao_id <=> '2'
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_enviou_id, 
	historico_chamados_ocorrencia = 'Alteração de situação', 
	historico_chamados_acao = (
	SELECT situacoes_nome 
	FROM situacoes 
	WHERE situacoes_id = NEW.chamados_situacao_id);
	END IF;
    
    IF NEW.chamados_situacao_id <> OLD.chamados_situacao_id && NEW.chamados_situacao_id <> '6' && NEW.chamados_situacao_id <> '2'
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_responsavel_id, 
	historico_chamados_ocorrencia = 'Alteração de situação', 
	historico_chamados_acao = (
	SELECT situacoes_nome 
	FROM situacoes 
	WHERE situacoes_id = NEW.chamados_situacao_id);
	END IF;
    
    IF NEW.chamados_situacao_id <=> '6'
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_id, 
	historico_chamados_ocorrencia = 'Alteração de situação', 
	historico_chamados_acao = (
	SELECT situacoes_nome 
	FROM situacoes 
	WHERE situacoes_id = NEW.chamados_situacao_id);
	END IF;

	IF NEW.chamados_situacao_id <=> '2' && NEW.chamados_responsavel_id <> OLD.chamados_responsavel_id || NEW.chamados_situacao_id <=> '2' && OLD.chamados_situacao_id <=> '1'
	THEN
	INSERT INTO historico_chamados 
	SET historico_chamados_chamado_id = NEW.chamados_id, 
	historico_chamados_usuario_id = NEW.chamados_usuario_enviou_id, 
	historico_chamados_ocorrencia = 'Alteração de responsável', 
	historico_chamados_acao = (
	SELECT GROUP_CONCAT(DISTINCT usuarios_nome, ' ', usuarios_sobrenome)
	FROM usuarios 
	WHERE usuarios_id = NEW.chamados_responsavel_id);
	END IF;
	END;");

	// Insere na tabela de histórico as alterações de perfil
	mysqli_query($conexao,
	"CREATE TRIGGER IF NOT EXISTS alterar_usuario 
	AFTER UPDATE ON usuarios
	FOR EACH ROW
	BEGIN
	IF NEW.usuarios_usuario <> OLD.usuarios_usuario 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de usuário', 
	historico_perfil_acao = NEW.usuarios_usuario;
	END IF;
	
	IF NEW.usuarios_nome <> OLD.usuarios_nome 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de nome', 
	historico_perfil_acao = NEW.usuarios_nome;
	END IF;
	
	IF NEW.usuarios_sobrenome <> OLD.usuarios_sobrenome 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de sobrenome', 
	historico_perfil_acao = NEW.usuarios_sobrenome;
	END IF;
	
	IF NEW.usuarios_matricula <> OLD.usuarios_matricula 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de matrícula', 
	historico_perfil_acao = NEW.usuarios_matricula;
	END IF;
	
	IF NEW.usuarios_telefone <> OLD.usuarios_telefone 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de telefone', 
	historico_perfil_acao = NEW.usuarios_telefone;
	END IF;
	
	IF NEW.usuarios_celular <> OLD.usuarios_celular && NEW.usuarios_celular <> ''
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de celular', 
	historico_perfil_acao = NEW.usuarios_celular;
	END IF;
	
	IF NEW.usuarios_celular <> OLD.usuarios_celular && NEW.usuarios_celular <=> ''
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Exclusão de celular', 
	historico_perfil_acao = OLD.usuarios_celular;
	END IF;
	
	IF NEW.usuarios_email <> OLD.usuarios_email && NEW.usuarios_email <> ''
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de e-mail', 
	historico_perfil_acao = NEW.usuarios_email;
	END IF;
	
	IF NEW.usuarios_email <> OLD.usuarios_email && NEW.usuarios_email <=> ''
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Exclusão de e-mail', 
	historico_perfil_acao = OLD.usuarios_email;
	END IF;
	
	IF NEW.usuarios_data_nascimento <> OLD.usuarios_data_nascimento && NEW.usuarios_data_nascimento <> ''
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de data de nascimento', 
	historico_perfil_acao = NEW.usuarios_data_nascimento;
	END IF;
	
	IF NEW.usuarios_data_nascimento <> OLD.usuarios_data_nascimento && NEW.usuarios_data_nascimento <=> ''
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Exclusão de data de nascimento', 
	historico_perfil_acao = OLD.usuarios_data_nascimento;
	END IF;
	
	IF NEW.usuarios_cpf <> OLD.usuarios_cpf 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de CPF', 
	historico_perfil_acao = NEW.usuarios_cpf;
	END IF;
	
	IF NEW.usuarios_sexo <> OLD.usuarios_sexo 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de sexo', 
	historico_perfil_acao = NEW.usuarios_sexo;
	END IF;
	
	IF NEW.usuarios_imagem <> OLD.usuarios_imagem 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de imagem', 
	historico_perfil_acao = NEW.usuarios_imagem;
	END IF;

	IF NEW.usuarios_senha <> OLD.usuarios_senha 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de senha', 
	historico_perfil_acao = 'Senha alterada com sucesso';
	END IF;

	IF NEW.usuarios_setor_id <> OLD.usuarios_setor_id 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de setor', 
	historico_perfil_acao = (
	SELECT setores_setor 
	FROM setores 
	WHERE setores_id = NEW.usuarios_setor_id);
	END IF;

	IF NEW.usuarios_permissao_id <> OLD.usuarios_permissao_id 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de permissão', 
	historico_perfil_acao = (
	SELECT permissoes_permissao 
	FROM permissoes 
	WHERE permissoes_id = NEW.usuarios_permissao_id);
	END IF;

	IF NEW.usuarios_status_id <> OLD.usuarios_status_id 
	THEN
	INSERT INTO historico_perfil 
	SET historico_perfil_usuario_id = NEW.usuarios_id, 
	historico_perfil_ocorrencia = 'Alteração de status', 
	historico_perfil_acao = (
	SELECT status_nome
	FROM status 
	WHERE status_id = NEW.usuarios_status_id);
	END IF;
	END;");

	
	
	# /////////////////////////////////////////
	# Inserção default nas tabelas de usuários
	# ////////////////////////////////////////

	// Tabela usuário com letra minúscula
	mysqli_query($conexao,
	"UPDATE IGNORE usuarios SET usuarios_usuario = lower(usuarios_usuario);");

	// Tabela setores
	mysqli_query($conexao,
	"INSERT IGNORE INTO setores (setores_setor, setores_status_id) VALUES ('Tecnologia da Informação', '1');");

	// Tabela permissões
	mysqli_query($conexao,
	"INSERT IGNORE INTO permissoes (permissoes_permissao) VALUES ('Administrador'), ('Supervisor'), ('Analista'), ('Técnico'), ('Usuário');");

	// Tabela status
	mysqli_query($conexao,
	"INSERT IGNORE INTO status (status_nome) VALUES ('Ativo'), ('Desativado');");

	// Tabela prioridades
	mysqli_query($conexao,
	"INSERT IGNORE INTO prioridades (prioridades_nome) VALUES ('Alta'), ('Média'), ('Baixa');");

	// Tabela situações
	mysqli_query($conexao,
	"INSERT IGNORE INTO situacoes (situacoes_nome) VALUES ('Aberto'), ('Enviado'), ('Resolvido'), ('Pendente'), ('Cancelado'), ('Reaberto');");

	// Criação de usuário default (administrador)
	$senha	= base64_encode('langames');
	$cpf	= base64_encode('04888656541');
	mysqli_query($conexao,
	"INSERT IGNORE INTO usuarios (
		usuarios_usuario, usuarios_senha, usuarios_nome, usuarios_sobrenome, usuarios_matricula, usuarios_setor_id, 
		usuarios_email, usuarios_cpf, usuarios_telefone, usuarios_celular, usuarios_data_nascimento, usuarios_sexo, 
		usuarios_imagem, usuarios_permissao_id, usuarios_status_id) 
		VALUES (
		  'felipe24987', '{$senha}', 'Felipe', 'Sales', '24987', '1', 'felipesales007@hotmail.com', '{$cpf}', 
		  '07134051450', '071991402371', '12/01/1991', 'Masculino', 'masculino.png', '1', '1');"
	);



	# /////////////////////////////////////////////
	# Inserção para testes nas tabelas de chamados
	# ////////////////////////////////////////////

	// Tabela setores de serviços
	mysqli_query($conexao,
	"INSERT IGNORE INTO setores_servicos (
		setores_servicos_id, setores_servicos_nome, setores_servicos_status_id) 
		VALUES ('1', 'Tecnologia da Informação', '1');");

	// Tabela ocorrências (categoria)
	mysqli_query($conexao,
	"INSERT IGNORE INTO ocorrencias (
		ocorrencias_ocorrencia, ocorrencias_setor_id, ocorrencias_status_id) 
		VALUES ('Computador não liga', '1', '1');");
?>