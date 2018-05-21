CREATE DATABASE  IF NOT EXISTS `mps_ioge` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mps_ioge`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: mps_ioge
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acoes`
--

DROP TABLE IF EXISTS `acoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data_limite` varchar(10) NOT NULL,
  `situacao` varchar(20) NOT NULL,
  `reuniao_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `responsavel` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reuniao_key_idx` (`reuniao_id`),
  CONSTRAINT `acao_reuniao_key` FOREIGN KEY (`reuniao_id`) REFERENCES `reunioes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acoes`
--

LOCK TABLES `acoes` WRITE;
/*!40000 ALTER TABLE `acoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `acoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `tipo_atividade` varchar(20) NOT NULL,
  `data_inicio_planejada` varchar(10) NOT NULL,
  `data_inicio_realizada` varchar(10) DEFAULT NULL,
  `data_fim_planejada` varchar(10) NOT NULL,
  `data_fim_realizada` varchar(10) DEFAULT NULL,
  `situacao` varchar(20) NOT NULL,
  `total_horas` varchar(5) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `consultor_planejado_id` int(11) NOT NULL,
  `consultor_realizado_id` int(11) DEFAULT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `atividades_consultor_planejado_key_idx` (`consultor_planejado_id`),
  KEY `atividades_consultor_realizado_key_idx` (`consultor_realizado_id`),
  KEY `atividades_projeto_key_idx` (`projeto_id`),
  CONSTRAINT `atividades_consultor_planejado_key` FOREIGN KEY (`consultor_planejado_id`) REFERENCES `consultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `atividades_consultor_realizado_key` FOREIGN KEY (`consultor_realizado_id`) REFERENCES `consultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `atividades_projeto_key` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultores`
--

DROP TABLE IF EXISTS `consultores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_coordenador` tinyint(4) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `instituicao_implementadora_id` int(11) NOT NULL,
  `modelo_referencia` varchar(20) DEFAULT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_key_idx` (`usuario_id`),
  KEY `consultor_instituicaoimplementadora_key_idx` (`instituicao_implementadora_id`),
  CONSTRAINT `consultor_instituicaoimplementadora_key` FOREIGN KEY (`instituicao_implementadora_id`) REFERENCES `instituicoes_implementadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `consultor_usuario_key` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultores`
--

LOCK TABLES `consultores` WRITE;
/*!40000 ALTER TABLE `consultores` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultores_projetos`
--

DROP TABLE IF EXISTS `consultores_projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultores_projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consultor_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `consultoresprojetos_consultor_key_idx` (`consultor_id`),
  KEY `consultoresprojetos_projeto_key_idx` (`projeto_id`),
  CONSTRAINT `consultoresprojetos_consultor_key` FOREIGN KEY (`consultor_id`) REFERENCES `consultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `consultoresprojetos_projeto_key` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultores_projetos`
--

LOCK TABLES `consultores_projetos` WRITE;
/*!40000 ALTER TABLE `consultores_projetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultores_projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordenadores_ioges`
--

DROP TABLE IF EXISTS `coordenadores_ioges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordenadores_ioges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao_organizadora_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `coordenadorioge_instituicaoimplementadora_key_idx` (`instituicao_organizadora_id`),
  KEY `coordenadorioge_usuario_key_idx` (`usuario_id`),
  CONSTRAINT `coordenadorioge_instituicaoimplementadora_key` FOREIGN KEY (`instituicao_organizadora_id`) REFERENCES `instituicoes_organizadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `coordenadorioge_usuario_key` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordenadores_ioges`
--

LOCK TABLES `coordenadores_ioges` WRITE;
/*!40000 ALTER TABLE `coordenadores_ioges` DISABLE KEYS */;
/*!40000 ALTER TABLE `coordenadores_ioges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `descricao_atividades` text NOT NULL,
  `porte` varchar(30) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `instituicao_organizadora_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `empresa_instituicaoorganizadora_key_idx` (`instituicao_organizadora_id`),
  CONSTRAINT `empresa_instituicaoorganizadora_key` FOREIGN KEY (`instituicao_organizadora_id`) REFERENCES `instituicoes_organizadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos_empresas`
--

DROP TABLE IF EXISTS `grupos_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos_empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `edital_associado` varchar(45) NOT NULL,
  `descricao_penalidades` text,
  `descricao_obrigatoriedades` text,
  `instituicao_organizadora_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `grupoempresas_instituicaoorganizadora_key_idx` (`instituicao_organizadora_id`),
  CONSTRAINT `grupoempresas_instituicaoorganizadora_key` FOREIGN KEY (`instituicao_organizadora_id`) REFERENCES `instituicoes_organizadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_empresas`
--

LOCK TABLES `grupos_empresas` WRITE;
/*!40000 ALTER TABLE `grupos_empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(150) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `website` varchar(45) NOT NULL,
  `logo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes`
--

LOCK TABLES `instituicoes` WRITE;
/*!40000 ALTER TABLE `instituicoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes_avaliadoras`
--

DROP TABLE IF EXISTS `instituicoes_avaliadoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes_avaliadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(45) NOT NULL,
  `email_contato` varchar(45) NOT NULL,
  `telefone_contato` varchar(20) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `instituicaoorganizadora_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instituicaoavaliadora_instituicao_key_idx` (`instituicao_id`),
  KEY `instituicaoavaliadora_instituicaoorganizadora_key_idx` (`instituicaoorganizadora_id`),
  CONSTRAINT `instituicaoavaliadora_instituicao_key` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `instituicaoavaliadora_instituicaoorganizadora_key` FOREIGN KEY (`instituicaoorganizadora_id`) REFERENCES `instituicoes_organizadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes_avaliadoras`
--

LOCK TABLES `instituicoes_avaliadoras` WRITE;
/*!40000 ALTER TABLE `instituicoes_avaliadoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituicoes_avaliadoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes_implementadoras`
--

DROP TABLE IF EXISTS `instituicoes_implementadoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes_implementadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(45) NOT NULL,
  `email_contato` varchar(45) NOT NULL,
  `telefone_contato` varchar(20) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `modelo_referencia` varchar(20) DEFAULT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `instituicaoorganizadora_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instituicao_instituicaoimplementadora_key_idx` (`instituicao_id`),
  KEY `instituicaoimplementadora_instituicaoorganizadora_key_idx` (`instituicaoorganizadora_id`),
  CONSTRAINT `instituicaoimplementadora_instituicao_key` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `instituicaoimplementadora_instituicaoorganizadora_key` FOREIGN KEY (`instituicaoorganizadora_id`) REFERENCES `instituicoes_organizadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes_implementadoras`
--

LOCK TABLES `instituicoes_implementadoras` WRITE;
/*!40000 ALTER TABLE `instituicoes_implementadoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituicoes_implementadoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes_organizadoras`
--

DROP TABLE IF EXISTS `instituicoes_organizadoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes_organizadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `instituicaoorganizadora_instituicao_key_idx` (`instituicao_id`),
  CONSTRAINT `instituicaoorganizadora_instituicao_key` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes_organizadoras`
--

LOCK TABLES `instituicoes_organizadoras` WRITE;
/*!40000 ALTER TABLE `instituicoes_organizadoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituicoes_organizadoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licoes_aprendidas`
--

DROP TABLE IF EXISTS `licoes_aprendidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licoes_aprendidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licao_aprendida` text NOT NULL,
  `ocorrencia` text,
  `impacto` text,
  `influencia` text,
  `data_identificacao` varchar(10) DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `topico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `licaoaprendida_projeto_idx` (`projeto_id`),
  KEY `licaoaprendida_topico_idx` (`topico_id`),
  CONSTRAINT `licaoaprendida_projeto_key` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `licaoaprendida_topico_key` FOREIGN KEY (`topico_id`) REFERENCES `topicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licoes_aprendidas`
--

LOCK TABLES `licoes_aprendidas` WRITE;
/*!40000 ALTER TABLE `licoes_aprendidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `licoes_aprendidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_implementacao` double NOT NULL,
  `valor_avaliacao` double NOT NULL,
  `valor_total` double NOT NULL,
  `valor_softex` double NOT NULL,
  `valor_restante` double NOT NULL,
  `valor_pago_implementacao` double DEFAULT NULL,
  `valor_pago_avaliacao` double DEFAULT NULL,
  `valor_gasto_total` double DEFAULT NULL,
  `justificativa_recursos_terceiros` varchar(250) DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pagamento_projeto_idx` (`projeto_id`),
  CONSTRAINT `pagamento_projeto_key` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagamento_id` int(11) NOT NULL,
  `data_pagamento` varchar(10) DEFAULT NULL,
  `valor_parcela` double DEFAULT NULL,
  `data_prevista_pagamento` varchar(10) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `tipo_parcela` varchar(8) NOT NULL,
  `observacoes` text,
  PRIMARY KEY (`id`),
  KEY `parcela_pagamento_key_idx` (`pagamento_id`),
  CONSTRAINT `parcela_pagamento_key` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='referente ao cronograma de desembolso da softex';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelas`
--

LOCK TABLES `parcelas` WRITE;
/*!40000 ALTER TABLE `parcelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `parcelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemas`
--

DROP TABLE IF EXISTS `problemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data_acompanhamento` varchar(10) NOT NULL,
  `acao_contingencia` text NOT NULL,
  `impacto` varchar(20) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `problema_projeto_key_idx` (`projeto_id`),
  CONSTRAINT `problema_projeto_key` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problemas`
--

LOCK TABLES `problemas` WRITE;
/*!40000 ALTER TABLE `problemas` DISABLE KEYS */;
/*!40000 ALTER TABLE `problemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_prevista_marco_100` date DEFAULT NULL,
  `data_prevista_marco_50` date DEFAULT NULL,
  `data_prevista_avaliacao` date DEFAULT NULL,
  `data_assinatura_convenio` date DEFAULT NULL,
  `data_inicio_implementacao` date DEFAULT NULL,
  `parecer_ii_cumprimento` text,
  `parecer_ii_comprometimento` text,
  `parecer_ii_dificuldades` text,
  `parecer_ioge_desempenho` text,
  `parecer_ioge_dificuldades` text,
  `parecer_ioge_observacoes` text,
  `data_realizacao_marco_50` date DEFAULT NULL,
  `data_realizacao_marco_100` date DEFAULT NULL,
  `data_realizacao_avaliacao` date DEFAULT NULL,
  `grupo_empresas_id` int(11) NOT NULL,
  `unidade_organizacional_id` int(11) NOT NULL,
  `descricao_processo_ii` text,
  `instituicao_implementadora_id` int(11) DEFAULT NULL,
  `descricao_processo_ia` text,
  `instituicao_avaliadora_id` int(11) DEFAULT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `projeto_grupoempresas_key_idx` (`grupo_empresas_id`),
  KEY `projeto_unidadeorganizacional_key_idx` (`unidade_organizacional_id`),
  KEY `projeto_instituicaoimplementadora_key_idx` (`instituicao_implementadora_id`),
  KEY `projeto_instituicaoavaliadora_key_idx` (`instituicao_avaliadora_id`),
  CONSTRAINT `projeto_grupoempresas_key` FOREIGN KEY (`grupo_empresas_id`) REFERENCES `grupos_empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `projeto_instituicaoavaliadora_key` FOREIGN KEY (`instituicao_avaliadora_id`) REFERENCES `instituicoes_avaliadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `projeto_instituicaoimplementadora_key` FOREIGN KEY (`instituicao_implementadora_id`) REFERENCES `instituicoes_implementadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `projeto_unidadeorganizacional_key` FOREIGN KEY (`unidade_organizacional_id`) REFERENCES `unidades_organizacionais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos_uos`
--

DROP TABLE IF EXISTS `projetos_uos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos_uos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL,
  `unidade_organizacional_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `unidade_organizacional_key_idx` (`unidade_organizacional_id`),
  CONSTRAINT `projetosuo_unidadeorganizacional_key` FOREIGN KEY (`unidade_organizacional_id`) REFERENCES `unidades_organizacionais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos_uos`
--

LOCK TABLES `projetos_uos` WRITE;
/*!40000 ALTER TABLE `projetos_uos` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos_uos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restituicoes`
--

DROP TABLE IF EXISTS `restituicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restituicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagamento_id` int(11) NOT NULL,
  `unidade_organizacional_id` int(11) NOT NULL,
  `data_pagamento` varchar(10) DEFAULT NULL,
  `valor_restituicao` double NOT NULL,
  `data_notificacao` varchar(10) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `observacoes` text,
  PRIMARY KEY (`id`),
  KEY `restituicao_pagamento_key_idx` (`pagamento_id`),
  KEY `restituicao_unidadeorganizacional_key_idx` (`unidade_organizacional_id`),
  CONSTRAINT `restituicao_pagamento_key` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `restituicao_unidadeorganizacional_key` FOREIGN KEY (`unidade_organizacional_id`) REFERENCES `unidades_organizacionais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restituicoes`
--

LOCK TABLES `restituicoes` WRITE;
/*!40000 ALTER TABLE `restituicoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `restituicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reunioes`
--

DROP TABLE IF EXISTS `reunioes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reunioes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_realizacao` varchar(10) NOT NULL,
  `hora_inicio` varchar(5) NOT NULL,
  `hora_fim` varchar(5) NOT NULL,
  `local_reuniao` varchar(45) NOT NULL,
  `nome_redator` varchar(45) DEFAULT NULL,
  `objetivo` text,
  `discussao` text,
  `instituicao_implementadora_id` int(11) NOT NULL,
  `unidade_organizacional_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `nome_participante_uo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reuniao_instituicaoimplementadora_key_idx` (`instituicao_implementadora_id`),
  KEY `reuniao_unidadeorganizacional_key_idx` (`unidade_organizacional_id`),
  CONSTRAINT `reuniao_instituicaoimplementadora_key` FOREIGN KEY (`instituicao_implementadora_id`) REFERENCES `instituicoes_implementadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reuniao_unidadeorganizacional_key` FOREIGN KEY (`unidade_organizacional_id`) REFERENCES `unidades_organizacionais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reunioes`
--

LOCK TABLES `reunioes` WRITE;
/*!40000 ALTER TABLE `reunioes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reunioes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riscos`
--

DROP TABLE IF EXISTS `riscos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riscos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `acao_prevencao` text NOT NULL,
  `acao_contingencia` text NOT NULL,
  `data_acompanhamento` varchar(10) NOT NULL,
  `situacao` varchar(20) NOT NULL,
  `impacto` varchar(20) NOT NULL,
  `probabilidade` varchar(20) NOT NULL,
  `severidade` varchar(20) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `consultor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `risco_projeto_key_idx` (`projeto_id`),
  KEY `risco_consultor_key_idx` (`consultor_id`),
  CONSTRAINT `risco_consultor_key` FOREIGN KEY (`consultor_id`) REFERENCES `consultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `risco_projeto_key` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riscos`
--

LOCK TABLES `riscos` WRITE;
/*!40000 ALTER TABLE `riscos` DISABLE KEYS */;
/*!40000 ALTER TABLE `riscos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topicos`
--

DROP TABLE IF EXISTS `topicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `ativo` smallint(6) NOT NULL DEFAULT '1',
  `instituicaoorganizadora_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topico_instuicaoorganizadora_key_idx` (`instituicaoorganizadora_id`),
  CONSTRAINT `topico_instuicaoorganizadora_key` FOREIGN KEY (`instituicaoorganizadora_id`) REFERENCES `instituicoes_organizadoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topicos`
--

LOCK TABLES `topicos` WRITE;
/*!40000 ALTER TABLE `topicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `topicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treinamentos`
--

DROP TABLE IF EXISTS `treinamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treinamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(45) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `data_inicio` date NOT NULL,
  `total_horas` time NOT NULL,
  `grupo_empresas_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `data_fim` date NOT NULL,
  `preletor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `treinamento_grupoempresas_key_idx` (`grupo_empresas_id`),
  CONSTRAINT `treinamento_grupoempresas_key` FOREIGN KEY (`grupo_empresas_id`) REFERENCES `grupos_empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treinamentos`
--

LOCK TABLES `treinamentos` WRITE;
/*!40000 ALTER TABLE `treinamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `treinamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treinamentos_participantes`
--

DROP TABLE IF EXISTS `treinamentos_participantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treinamentos_participantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `treinamento_id` int(11) NOT NULL,
  `nome_participante` varchar(45) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `treinamentoparticipantes_treinamento_key_idx` (`treinamento_id`),
  KEY `treinamentoparticipantes_empresa_key_idx` (`empresa_id`),
  CONSTRAINT `treinamentoparticipantes_empresa_key` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `treinamentoparticipantes_treinamento_key` FOREIGN KEY (`treinamento_id`) REFERENCES `treinamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treinamentos_participantes`
--

LOCK TABLES `treinamentos_participantes` WRITE;
/*!40000 ALTER TABLE `treinamentos_participantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `treinamentos_participantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_organizacionais`
--

DROP TABLE IF EXISTS `unidades_organizacionais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_organizacionais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao_atividades` text NOT NULL,
  `nivel_mps` char(8) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `grupo_empresas_id` int(11) DEFAULT NULL,
  `versao_modelo` varchar(15) NOT NULL,
  `modelo_referencia` varchar(20) NOT NULL,
  `descricao_processo_uo` text,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `unidadeorganizacional_empresa_key_idx` (`empresa_id`),
  KEY `unidadeorganizacional_grupo_empresas_key_idx` (`grupo_empresas_id`),
  CONSTRAINT `unidadeorganizacional_empresa_key` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `unidadeorganizacional_grupo_empresas_key` FOREIGN KEY (`grupo_empresas_id`) REFERENCES `grupos_empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_organizacionais`
--

LOCK TABLES `unidades_organizacionais` WRITE;
/*!40000 ALTER TABLE `unidades_organizacionais` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidades_organizacionais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `ativo` smallint(1) NOT NULL DEFAULT '1',
  `cod_verificador` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (17,'CAROLINE ALVES MACHADO','carolineamachado@hotmail.com','','','$2y$10$zzqWRe528LhlwI1Rt3pCeuMj9cYIjM9pyJT5g9gQFWGeJjG7lBu3a','admin',1,'c71715003c6304b759c73ba41f3a8b77');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-07  0:53:39
