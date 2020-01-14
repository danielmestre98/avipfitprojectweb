-- MySQL dump 10.13  Distrib 5.6.36-82.0, for Linux (x86_64)
--
-- Host: aviptest.mysql.dbaas.com.br    Database: aviptest
-- ------------------------------------------------------
-- Server version	5.6.40-84.0-log

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
/*!50112 SELECT COUNT(*) INTO @is_rocksdb_supported FROM INFORMATION_SCHEMA.SESSION_VARIABLES WHERE VARIABLE_NAME='rocksdb_bulk_load' */;
/*!50112 SET @save_old_rocksdb_bulk_load = IF (@is_rocksdb_supported, 'SET @old_rocksdb_bulk_load = @@rocksdb_bulk_load', 'SET @dummy_old_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @save_old_rocksdb_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 SET @enable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @enable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `dia` varchar(15) CHARACTER SET utf8 NOT NULL,
  `evento` varchar(25) CHARACTER SET utf8 NOT NULL,
  `horario` time NOT NULL,
  `filial` int(15) NOT NULL,
  `cpffunc` varchar(15) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horafim` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfunc` (`cpffunc`),
  KEY `idfilialag` (`filial`),
  CONSTRAINT `cpfunc` FOREIGN KEY (`cpffunc`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idfilialag` FOREIGN KEY (`filial`) REFERENCES `filial` (`IdFilial`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES ('Segunda','Aula experimental','10:00:00',1,'111.111.111-11',4,'10:50:00'),('TerÃ§a','AvaliaÃ§Ã£o fÃ­sica','20:00:00',1,'111.111.111-11',5,'20:50:00'),('Segunda','Aula experimental','21:00:00',1,'111.111.111-11',6,'22:00:00'),('Segunda','AvaliaÃ§Ã£o fÃ­sica','19:00:00',1,'111.111.111-11',7,'19:30:00'),('Segunda','AvaliaÃ§Ã£o fÃ­sica','15:00:00',1,'111.111.111-11',8,'16:00:00'),('TerÃ§a','AvaliaÃ§Ã£o fÃ­sica','10:00:00',1,'111.111.111-11',9,'10:50:00'),('Quarta','AvaliaÃ§Ã£o fÃ­sica','10:00:00',1,'111.111.111-11',10,'10:50:00');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamento` (
  `data` date NOT NULL,
  `descricaoCancelamento` varchar(1022) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `horario` time NOT NULL,
  `horafim` time NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `idFilial` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento`
--

LOCK TABLES `agendamento` WRITE;
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
INSERT INTO `agendamento` VALUES ('2019-10-21','Inmfe','Cancelado','11:00:00','00:00:00','AvaliaÃ§Ã£o FÃ­sica',1,21),('2019-10-22','','Aprovado','20:00:00','20:50:00','AvaliaÃ§Ã£o FÃ­sica',1,22),('2019-10-29','','Aguardando aprovaÃ§Ã£o','20:00:00','20:50:00','AvaliaÃ§Ã£o FÃ­sica',1,23),('2019-10-29','','Aguardando aprovaÃ§Ã£o','20:00:00','20:50:00','AvaliaÃ§Ã£o FÃ­sica',1,24),('2019-10-28','','Aguardando aprovaÃ§Ã£o','21:00:00','22:00:00','Aula Experimental',1,25),('2019-10-28','','Aguardando aprovaÃ§Ã£o','10:00:00','10:50:00','Aula Experimental',1,26),('2019-10-28','','Aguardando aprovaÃ§Ã£o','10:00:00','10:50:00','Aula Experimental',1,27),('2019-10-28','','Aguardando aprovaÃ§Ã£o','10:00:00','10:50:00','Aula Experimental',1,28),('2019-10-28','Email estranho','Cancelado','21:00:00','22:00:00','Aula Experimental',1,29),('2019-11-13','','Aguardando aprovaÃ§Ã£o','10:00:00','10:50:00','Aula Experimental',1,30),('2019-11-26','<div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class=\"form-row\"><div class','Cancelado','10:00:00','10:50:00','AvaliaÃ§Ã£o FÃ­sica',1,31);
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendamentoaulaexp`
--

DROP TABLE IF EXISTS `agendamentoaulaexp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamentoaulaexp` (
  `data` date NOT NULL,
  `email` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `IdFilial` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `modalidadeTreinamento` varchar(20) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `nome` varchar(40) COLLATE utf8_general_mysql500_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `horario` time NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  CONSTRAINT `fkidaulaexp` FOREIGN KEY (`id`) REFERENCES `agendamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamentoaulaexp`
--

LOCK TABLES `agendamentoaulaexp` WRITE;
/*!40000 ALTER TABLE `agendamentoaulaexp` DISABLE KEYS */;
INSERT INTO `agendamentoaulaexp` VALUES ('2019-10-28','dmestreloureiro@gmail.com','1','Ganho de massa','Daniel Mestre','(99) 81463969','21:00:00',25),('2019-10-28','informatica@hospsantabarbara.com.br','1','Ganho de massa','Francis Gomes','(13) 131231231','10:00:00',26),('2019-10-28','dmestreloureiro@gmail.com','1','Ganho de massa','Daniel Mestre Loureiro','(99) 81463969','10:00:00',28),('2019-10-28','asdasfewagavcxzewa@adads','1','Testecaraio','adsdasd','(12) 312313131','21:00:00',29),('2019-11-13','daniel.mloure@live.com','1','teste','asdui','(19) 931293193','10:00:00',30);
/*!40000 ALTER TABLE `agendamentoaulaexp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendamentoavalfisicamensal`
--

DROP TABLE IF EXISTS `agendamentoavalfisicamensal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamentoavalfisicamensal` (
  `data` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `horario` time NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `agendamentoavalfisicamensal_ibfk_1` (`cpf`),
  CONSTRAINT `fkidagendamento` FOREIGN KEY (`id`) REFERENCES `agendamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamentoavalfisicamensal`
--

LOCK TABLES `agendamentoavalfisicamensal` WRITE;
/*!40000 ALTER TABLE `agendamentoavalfisicamensal` DISABLE KEYS */;
INSERT INTO `agendamentoavalfisicamensal` VALUES ('2019-10-21','437.340.458-51','11:00:00',21),('2019-10-22','437.340.458-51','20:00:00',22),('2019-10-29','437.340.458-51','00:00:00',23),('2019-10-29','437.340.458-51','00:00:00',24),('2019-11-26','050.633.491-02','10:00:00',31);
/*!40000 ALTER TABLE `agendamentoavalfisicamensal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avalfisica`
--

DROP TABLE IF EXISTS `avalfisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avalfisica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `massaCorporal` float NOT NULL,
  `estatura` int(11) NOT NULL,
  `subescapular` float NOT NULL,
  `triceps` float NOT NULL,
  `peitoral` float NOT NULL,
  `axilarMedial` float NOT NULL,
  `supraIliaca` float NOT NULL,
  `biceps` float NOT NULL,
  `abdominal` float NOT NULL,
  `abdominalPer` float NOT NULL,
  `coxaProximal` float NOT NULL,
  `coxaMedial` float NOT NULL,
  `panturrilha` float NOT NULL,
  `torax` float NOT NULL,
  `cintura` float NOT NULL,
  `quadril` float NOT NULL,
  `antebracoD` float NOT NULL,
  `antebracoE` float NOT NULL,
  `bracoRD` float NOT NULL,
  `bracoRE` float NOT NULL,
  `bracoCD` float NOT NULL,
  `bracoCE` float NOT NULL,
  `protocolo` int(11) NOT NULL,
  `data` date NOT NULL,
  `cpf` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `ideal` float NOT NULL,
  `meta` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avalfisica`
--

LOCK TABLES `avalfisica` WRITE;
/*!40000 ALTER TABLE `avalfisica` DISABLE KEYS */;
INSERT INTO `avalfisica` VALUES (7,81,205,10,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,10,'2019-10-03','437.340.458-51',12,86),(11,80,202,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,10,'2019-11-09','177.579.998-04',12,12),(12,3,4,43,4,43,3,4,34,34,3,43,4,3,3,34,3,4,43,43,4,34,34,2,'2019-11-12','050.633.491-02',43,34);
/*!40000 ALTER TABLE `avalfisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cpf` varchar(15) NOT NULL,
  `filial` int(15) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`cpf`),
  CONSTRAINT `fk_cpf` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES ('050.633.491-02',1,'Masculino'),('177.579.998-04',1,'Feminino'),('437.340.458-51',1,'Masculino');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contem`
--

DROP TABLE IF EXISTS `contem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contem` (
  `Exercicio` varchar(255) NOT NULL,
  `NomeTreinamento` varchar(50) NOT NULL,
  PRIMARY KEY (`Exercicio`,`NomeTreinamento`) USING BTREE,
  KEY `trei` (`NomeTreinamento`),
  CONSTRAINT `exerciciooo` FOREIGN KEY (`Exercicio`) REFERENCES `exercicio` (`NomeExercicio`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contem`
--

LOCK TABLES `contem` WRITE;
/*!40000 ALTER TABLE `contem` DISABLE KEYS */;
/*!40000 ALTER TABLE `contem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depoimentos` (
  `cpf` varchar(15) NOT NULL,
  `descricao` varchar(1022) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpffkdep` (`cpf`),
  CONSTRAINT `cpffkdep` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depoimentos`
--

LOCK TABLES `depoimentos` WRITE;
/*!40000 ALTER TABLE `depoimentos` DISABLE KEYS */;
INSERT INTO `depoimentos` VALUES ('437.340.458-51','addad','Aprovado',4,'2019-10-19'),('437.340.458-51','asdadsdasd','Pendente',5,'2019-10-25'),('050.633.491-02','lucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail','Pendente',6,'2019-11-24');
/*!40000 ALTER TABLE `depoimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicio`
--

DROP TABLE IF EXISTS `exercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercicio` (
  `NomeExercicio` varchar(255) NOT NULL,
  `descricao` varchar(1022) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NomeExercicio` (`NomeExercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicio`
--

LOCK TABLES `exercicio` WRITE;
/*!40000 ALTER TABLE `exercicio` DISABLE KEYS */;
INSERT INTO `exercicio` VALUES ('Teste','teste','',1);
/*!40000 ALTER TABLE `exercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filial`
--

DROP TABLE IF EXISTS `filial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filial` (
  `cnpj` varchar(25) NOT NULL,
  `IdFilial` int(15) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(20) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`IdFilial`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filial`
--

LOCK TABLES `filial` WRITE;
/*!40000 ALTER TABLE `filial` DISABLE KEYS */;
INSERT INTO `filial` VALUES ('98.272.935/0001-21',1,'(19) 996109854','Americana','13478-230','Jardim Colina','SÃ£o Paulo','R. OperÃ¡rio Osvaldo dos Santos','460'),('68.498.726/0001-30',2,'(12) 312312313','SBO','13123-132','Cravinho','SP','teste','1231');
/*!40000 ALTER TABLE `filial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `cpf` varchar(15) NOT NULL,
  `IdFilial` int(15) NOT NULL,
  `funcao` varchar(15) NOT NULL,
  `salario` varchar(7) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `idfilialfinc` (`IdFilial`),
  CONSTRAINT `cpf func` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idfilialfinc` FOREIGN KEY (`IdFilial`) REFERENCES `filial` (`IdFilial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES ('068.648.070-88',1,'Professor(a)','1500,00'),('111.111.111-11',1,'Admin','1500,00');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `cpf` varchar(16) NOT NULL,
  `segunda` varchar(5) DEFAULT NULL,
  `terca` varchar(5) DEFAULT NULL,
  `quarta` varchar(5) DEFAULT NULL,
  `quinta` varchar(5) DEFAULT NULL,
  `sexta` varchar(5) DEFAULT NULL,
  `sabado` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  CONSTRAINT `fkcpf` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES ('050.633.491-02','15:00','','','','',''),('177.579.998-04','12:31','','','','',''),('437.340.458-51','13:00','','','','23:13','');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `tabela` varchar(500) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `codigo` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'187.104.189.170','2019-10-09 14:02:08','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( Ganho de mass ); '),(2,'187.104.189.170','2019-10-09 14:02:15','treinamento, contem, realiza','daniel.mloure@live.com','UPDATE treinamento SET NomeTreinamento =  Ganho de massa  WHERE NomeTreinamento =  Ganho de mass   DELETE FROM contem WHERE NomeTreinamento =  Ganho de mass  UPDATE realiza SET Treinamento =  Ganho de massa  WHERE Treinamento =  Ganho de mass '),(3,'187.104.189.170','2019-10-09 14:02:27','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( Ganho de massa ); '),(4,'187.104.189.170','2019-10-09 14:03:50','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO pessoa (cpf, dataNascimento, email, nome, telefone, TipoPessoa, senha, foto, cidade, estado, cep, bairro, rua, numero, inativo, cadastro)\n		VALUES ( 437.340.458-51 ,  1998-05-17 ,  dmestreloureiro@gmail.com ,  Daniel Mestre Loureiro ,  (19) 981463969 ,  3 ,  25d55ad283aa400af464c76d713c07ad ,  padrao.jpg ,  Santa BÃ¡rbara d Oeste ,  SÃ£o Paulo ,  13452-000 ,  Residencial Furlan ,  R. Fioravante L. Angolini ,  93 ,  0 ,  2019-10-09 ); INSERT INTO cliente (cpf, filial) VALUES ( 437.340.458-51 ,  1 );  INSERT INTO horario (cpf, segunda, terca, quarta, quinta, sexta, sabado)\n		VALUES ( 437.340.458-51 ,  12:00 ,   ,   ,   ,   ,   ); INSERT INTO realiza (cpf, Treinamento) VALUES ( 437.340.458-51 ,  Ganho de massa ); INSERT INTO mensalidade (cpf, valor, DataVencimento) VALUES ( 437.340.458-51 ,  200,00 ,  10 );'),(5,'187.104.189.170','2019-10-09 14:10:48','treinamento, contem','dmestreloureiro@gmail.com','INSERT INTO depoimentos (cpf, descricao, status)\n		VALUES (\'437.340.458-51\', \'Teste\', \'Pendente\');'),(6,'187.104.189.170','2019-10-10 08:10:19','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(7,'187.104.189.170','2019-10-10 08:10:25','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(8,'187.104.189.170','2019-10-10 08:10:31','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(9,'187.104.189.170','2019-10-10 08:11:21','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(10,'AutomÃ¡tico','2019-10-14 14:29:04','token','AutomÃ¡tico','DELETE FROM token WHERE email = \'daniel.mloure@live.com\''),(11,'AutomÃ¡tico','2019-10-14 14:29:04','token','AutomÃ¡tico','DELETE FROM token WHERE email = \'dmestreloureiro@gmail.com\''),(12,'187.104.189.170','2019-10-14 15:39:23','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'aa47f8215c6f30a0dcdb2a36a9f4168e\' WHERE email = \'\''),(13,'187.104.189.170','2019-10-14 15:40:57','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'aa47f8215c6f30a0dcdb2a36a9f4168e\' WHERE email = \'dmestreloureiro@gmail.com\''),(14,'187.104.189.170','2019-10-14 15:43:29','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'827ccb0eea8a706c4c34a16891f84e7b\' WHERE email = \'dmestreloureiro@gmail.com\''),(15,'187.104.189.170','2019-10-14 15:45:09','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'81dc9bdb52d04dc20036dbd8313ed055\' WHERE email = \'dmestreloureiro@gmail.com\''),(16,'187.104.189.170','2019-10-14 15:46:08','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'aa47f8215c6f30a0dcdb2a36a9f4168e\' WHERE email = \'dmestreloureiro@gmail.com\''),(17,'189.38.41.124','2019-10-15 12:26:26','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'a2a9d246b6f4a8e6ac44f2526c175469\' WHERE email = \'gclferreira@hotmail.com\''),(18,'179.110.8.58','2019-10-16 20:27:37','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO pessoa (cpf, dataNascimento, email, nome, telefone, TipoPessoa, senha, foto, cidade, estado, cep, bairro, rua, numero, inativo, cadastro)\n		VALUES ( 050.633.491-02 ,  1995-02-17 ,  lucastenoriolima@hotmail.com ,  Lucas TenÃ³rio Lima Pereira ,  (18) 981130775 ,  3 ,  25d55ad283aa400af464c76d713c07ad ,  padrao.jpg ,  Presidente Prudente ,  SÃ£o Paulo ,   ,  Cidade Jardim ,  Rua Paulo Eiro ,  536 ,  0 ,  2019-10-16 ); INSERT INTO cliente (cpf, filial) VALUES ( 050.633.491-02 ,  1 );  INSERT INTO horario (cpf, segunda, terca, quarta, quinta, sexta, sabado)\n		VALUES ( 050.633.491-02 ,  15:00 ,   ,   ,   ,   ,   ); INSERT INTO realiza (cpf, Treinamento) VALUES ( 050.633.491-02 ,  Ganho de massa ); INSERT INTO mensalidade (cpf, valor, DataVencimento) VALUES ( 050.633.491-02 ,  200,00 ,  05 );'),(19,'187.104.189.170','2019-10-17 08:24:09','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'25d55ad283aa400af464c76d713c07ad\' WHERE email = \'dmestreloureiro@gmail.com\''),(20,'187.101.44.16','2019-10-17 20:21:30','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE pessoa SET dataNascimento = \'1998-05-17\', email = \'dmestreloureiro@gmail.com\', nome = \'Daniel Loureiro\', telefone = \'(19) 981463969\', TipoPessoa = \'3\', senha = \'avip#fit2019\', foto = \'padrao.jpg\', cidade = \'Santa BÃ¡rbara d\\\'Oeste\', estado = \'SÃ£o Paulo\', cep = \'13450-000\', bairro = \'Residencial Furlan\', rua = \'Rua Fioravante L. Angolini\', numero = \'93\', inativo = \'0\' WHERE cpf = \'437.340.458-51\' UPDATE cliente SET filial = \'1\' WHERE cpf = \'437.340.458-51\' UPDATE horario SET  segunda = \'13:00\', terca = \'\', quarta = \'\', quinta = \'\', sexta = \'\', sabado = \'\' WHERE cpf = \'437.340.458-51\' UPDATE realiza SET Treinamento = \'Ganho de massa\' WHERE cpf = \'437.340.458-51\' UPDATE mensalidade SET valor = \'500,00\', DataVencimento = \'15\' WHERE cpf = \'437.340.458-51\''),(21,'186.223.13.245','2019-10-18 11:29:01','pessoa, token','Esqueci minha senha','UPDATE pessoa SET senha = \'25d55ad283aa400af464c76d713c07ad\' WHERE email = \'dmestreloureiro@gmail.com\''),(22,'187.101.44.16','2019-10-19 17:39:54','parceiro','daniel.mloure@live.com','INSERT INTO parceiro (cnpj, email, nome, telefone, foto, cidade, estado, cep, bairro, rua, numero)\n		VALUES ( 34.381.386/0001-40 ,  asdas@sadadsa ,  dandiasn ,  (12) 312312313 ,  no-image.png ,  asdas ,  asdad ,  12312-312 ,  asdads ,  asdsad ,  asdasda );'),(23,'187.101.44.16','2019-10-19 17:39:59','treinamento, contem','daniel.mloure@live.com','DELETE FROM parceiros WHERE cnpj = 34.381.386/0001-40'),(24,'187.101.44.16','2019-10-19 18:09:39','treinamento, contem','dmestreloureiro@gmail.com','INSERT INTO depoimentos (cpf, descricao, status)\n		VALUES (\'437.340.458-51\', \'Teste de depoimento\', \'Pendente\');'),(25,'187.101.44.16','2019-10-19 18:20:46','treinamento, contem','dmestreloureiro@gmail.com','INSERT INTO depoimentos (cpf, descricao, status)\n		VALUES (\'437.340.458-51\', \'					<li id=\"mensalidades\">\r\n						<a href=\"mensalidades\">\r\n                                <i class=\"fas fa-dollar-sign\"></i>\r\n                                <span class=\"menu-text\">Mensalidades</span>\r\n                            </a>\r\n					</li>					<li id=\"mensalidades\">\r\n						<a href=\"mensalidades\">\r\n                                <i class=\"fas fa-dollar-sign\"></i>\r\n                                <span class=\"menu-text\">Mensalidades</span>\r\n                            </a>\r\n					</li>					<li id=\"mensalidades\">\r\n						<a href=\"mensalidades\">\r\n                                <i class=\"fas fa-dollar-sign\"></i>\r\n                                <span class=\"menu-text\">Mensalidades</span>\r\n                            </a>\r\n					</li>					<li id=\"mensalidades\">\r\n						<a href=\"mensalidades\">\r\n                                <i class=\"fas fa-dollar-sign\"></i>\r\n                                <span class=\"menu-text\">Mensalidades</span>\r\n                            </a>\r\n					</li>					<li id=\"mensalidades\">\r\n						<a href=\"men\', \'Pendente\');'),(26,'187.101.44.16','2019-10-19 18:23:55','treinamento, contem','dmestreloureiro@gmail.com','INSERT INTO depoimentos (cpf, descricao, status, data)\n		VALUES (\'437.340.458-51\', \'addad\', \'Pendente\', \'2019-10-19\');'),(27,'187.101.44.16','2019-10-19 19:51:17','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'11/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'12/2019\')'),(28,'187.101.44.16','2019-10-19 19:51:26','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'11/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'12/2019\')'),(29,'187.101.44.16','2019-10-19 19:51:32','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'12/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'01/2020\')'),(30,'187.101.44.16','2019-10-19 19:54:41','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(31,'187.101.44.16','2019-10-19 19:54:51','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(32,'187.101.44.16','2019-10-19 19:54:55','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(33,'187.101.44.16','2019-10-19 19:55:05','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(34,'187.101.44.16','2019-10-19 19:57:09','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'11/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'12/2019\')'),(35,'187.101.44.16','2019-10-19 19:58:07','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(36,'187.101.44.16','2019-10-19 19:58:11','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'11/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'12/2019\')'),(37,'187.101.44.16','2019-10-19 19:58:41','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'12/2019\' nada'),(38,'187.101.44.16','2019-10-19 19:58:50','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'11/2019\' nada'),(39,'187.101.44.16','2019-10-19 19:58:56','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'11/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'12/2019\')'),(40,'187.101.44.16','2019-10-20 16:05:10','treinamento, contem','daniel.mloure@live.com','DELETE FROM agenda WHERE id = 1'),(41,'187.101.44.16','2019-10-20 16:05:12','treinamento, contem','daniel.mloure@live.com','DELETE FROM agenda WHERE id = 2'),(42,'187.101.44.16','2019-10-20 16:05:15','treinamento, contem','daniel.mloure@live.com','DELETE FROM agenda WHERE id = 3'),(43,'187.101.44.16','2019-10-20 16:59:52','treinamento, contem, realiza','daniel.mloure@live.com','UPDATE treinamento SET NomeTreinamento =  Ganho de massa  WHERE NomeTreinamento =  Ganho de massa  INSERT INTO contem (NomeTreinamento, exercicio) VALUES ( Ganho de massa ,  Teste ) DELETE FROM contem WHERE NomeTreinamento =  Ganho de massa  UPDATE realiza SET Treinamento =  Ganho de massa  WHERE Treinamento =  Ganho de massa '),(44,'186.223.13.245','2019-10-21 15:49:06','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' nada'),(45,'AutomÃ¡tico','2019-10-21 18:49:27','pagamentos','AutomÃ¡tico','UPDATE pagamentos SET status = \'Em dÃ©bito\' WHERE cpf = \'050.633.491-02\' AND competencia = \'10/2019\''),(46,'AutomÃ¡tico','2019-10-21 18:49:27','pagamentos','AutomÃ¡tico','UPDATE pagamentos SET status = \'Em dÃ©bito\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\''),(47,'186.223.13.245','2019-10-21 15:49:44','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(48,'189.56.14.250','2019-10-21 19:52:56','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teeste\', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'2\', \'TEsgetefafafdsdas\', \'Array\', \'2019-10-21 19:52:56\', \'User\'); '),(49,'189.56.14.250','2019-10-21 19:54:53','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teste2\', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'3\', \'edasdasdas\', \'\', \'2019-10-21 19:54:53\', \'User\'); '),(50,'189.56.14.250','2019-10-21 20:07:43','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teste4\', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'111.111.111-11\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'5\', \'saadiasjdioajdosdfsd\', \'\', \'2019-10-21 20:07:43\', \'User\'); '),(51,'186.223.13.245','2019-10-22 08:48:02','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teste imagem\', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'111.111.111-11\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'6\', \'Temos aqui um teste de ticket com imagem\', \'Array\', \'2019-10-22 08:48:02\', \'User\'); '),(52,'186.223.13.245','2019-10-22 08:50:14','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teste imagem\', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'111.111.111-11\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'7\', \'Segundo teste com imagem no ticket\', \'da4c8ef15b329926089660c9ae438982.png\', \'2019-10-22 08:50:14\', \'User\'); '),(53,'186.223.13.245','2019-10-22 09:38:38','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teste imagem 2 \', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'111.111.111-11\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'8\', \'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quam quam, convallis viverra vehicula et, dignissim quis augue. Aenean luctus eu magna ut cursus. Pellentesque congue nulla non mauris convallis, blandit mattis ligula fringilla. In aliquam, nibh egestas vestibulum gravida, ligula velit accumsan nunc, et egestas ante justo id tellus. Curabitur tincidunt efficitur ipsum at egestas. Phasellus dapibus ut tellus sit amet gravida. Pellentesque et ante eu mi tempor tincidunt. Suspendisse rhoncus elementum arcu. Maecenas vel molestie urna. Fusce viverra laoreet lectus, sed aliquam ante imperdiet ultricies.\r\n\r\nMaecenas nec commodo ante. Pellentesque dapibus ornare ante vel consequat. Sed bibendum urna quis aliquam vulputate. Curabitur volutpat, tellus sed dictum consequat, urna felis pellentesque dolor, non pharetra neque justo eget ipsum. Curabitur nibh lacus, eleifend non eleifend quis, venenatis non eros. Vestibulum in viverra tortor, ut facilisis diam. Phasellus magna ex, ullamcorper at varius vel, rhoncus vel felis. Integer viverra metus elit, suscipit imperdiet mauris blandit at. Ut nec consectetur quam. Donec ornare neque at elit accumsan, vel vulputate orci sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus.\', \'\', \'2019-10-22 09:38:38\', \'User\'); '),(54,'186.223.13.245','2019-10-22 09:39:20','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticket (titulo, classificacao, status, prioridade, usuario)\n		VALUES (\'Teste imagem 3\', \'NÃ£o classificado\', \'Aberto\', \'NÃ£o classificado\', \'111.111.111-11\'); INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quam quam, convallis viverra vehicula et, dignissim quis augue. Aenean luctus eu magna ut cursus. Pellentesque congue nulla non mauris convallis, blandit mattis ligula fringilla. In aliquam, nibh egestas vestibulum gravida, ligula velit accumsan nunc, et egestas ante justo id tellus. Curabitur tincidunt efficitur ipsum at egestas. Phasellus dapibus ut tellus sit amet gravida. Pellentesque et ante eu mi tempor tincidunt. Suspendisse rhoncus elementum arcu. Maecenas vel molestie urna. Fusce viverra laoreet lectus, sed aliquam ante imperdiet ultricies.\r\n\r\nMaecenas nec commodo ante. Pellentesque dapibus ornare ante vel consequat. Sed bibendum urna quis aliquam vulputate. Curabitur volutpat, tellus sed dictum consequat, urna felis pellentesque dolor, non pharetra neque justo eget ipsum. Curabitur nibh lacus, eleifend non eleifend quis, venenatis non eros. Vestibulum in viverra tortor, ut facilisis diam. Phasellus magna ex, ullamcorper at varius vel, rhoncus vel felis. Integer viverra metus elit, suscipit imperdiet mauris blandit at. Ut nec consectetur quam. Donec ornare neque at elit accumsan, vel vulputate orci sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus.\', \'b6fe84f56b2842a2bcdf29fc49abcd14.png\', \'2019-10-22 09:39:20\', \'User\'); '),(55,'186.223.13.245','2019-10-22 11:28:26','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'asddadasd\', \'\', \'2019-10-22 11:28:26\', \'User\'); '),(56,'186.223.13.245','2019-10-22 11:31:40','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'rtree\', \'dda4cfa1da01b2fdd19190abe81485db.png\', \'2019-10-22 11:31:40\', \'User\'); '),(57,'187.101.44.16','2019-10-22 21:58:58','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET (classificacao = \'DÃºvida\', prioridade = \'Baixa\', status = \'\') WHERE id = \'9\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'Voce precisa lalalalal\', \'\', \'2019-10-22 21:58:58\', \'Suporte\'); '),(58,'187.101.44.16','2019-10-22 22:00:00','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET (classificacao = \'SolicitaÃ§Ã£o\', prioridade = \'MÃ©dia\', status = \'\') WHERE id = \'8\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'8\', \'dajsdoiasjd\', \'\', \'2019-10-22 22:00:00\', \'Suporte\'); '),(59,'187.101.44.16','2019-10-22 22:01:10','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET (classificacao = \'DÃºvida\', prioridade = \'Baixa\', status = \'Aberto\') WHERE id = \'9\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'Voce lalalalal\', \'\', \'2019-10-22 22:01:10\', \'Suporte\'); '),(60,'187.101.44.16','2019-10-22 22:03:00','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET classificacao = \'DÃºvida\', prioridade = \'Baixa\', status = \'Aberto\' WHERE id = \'9\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'Estamos testando\', \'\', \'2019-10-22 22:03:00\', \'Suporte\'); '),(61,'187.101.44.16','2019-10-22 22:03:33','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'Obrigado senhor!\', \'\', \'2019-10-22 22:03:33\', \'User\'); '),(62,'187.101.44.16','2019-10-22 22:05:17','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET classificacao = \'DÃºvida\', prioridade = \'Baixa\', status = \'Aberto\' WHERE id = \'9\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'Agora vou por uma imagem\', \'7f74d9e36eea176f9b5fd72cd6014834.jpg\', \'2019-10-22 22:05:17\', \'Suporte\'); '),(63,'186.223.13.245','2019-10-23 10:06:28','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'Teste\', \'../manual/078a7b8eb1994955725b471fe968a86b.zip\');'),(64,'186.223.13.245','2019-10-23 10:07:37','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'sadsadad\', \'e44ecc2a073f6c30176ac3535fc5fee5.zip\');'),(65,'186.223.13.245','2019-10-23 10:37:58','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 3'),(66,'186.223.13.245','2019-10-23 10:38:44','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'fsdfsf\', \'bd420f1b3b979c659f9514a0a0b554d9.zip\');'),(67,'186.223.13.245','2019-10-23 10:38:53','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 4'),(68,'186.223.13.245','2019-10-23 10:39:19','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'asfasfa\', \'1fb4390d36146f99564ac1b3344c7626.zip\');'),(69,'186.223.13.245','2019-10-23 10:39:23','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 5'),(70,'186.223.13.245','2019-10-23 10:41:52','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'asdasd\', \'cf2d76f067cd4e8df0b6bb626225fbd7.zip\');'),(71,'186.223.13.245','2019-10-23 10:41:56','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 6'),(72,'186.223.13.245','2019-10-23 10:45:00','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 1'),(73,'186.223.13.245','2019-10-23 10:45:15','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'Teste\', \'89da43b347f3d53be3bd5456e7d5f1ed.zip\');'),(74,'186.223.13.245','2019-10-23 10:45:19','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 7'),(75,'186.223.13.245','2019-10-23 10:45:47','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'asdas\', \'4d3f247ca4d329185818c46c8e3a1121.zip\');'),(76,'186.223.13.245','2019-10-23 10:45:55','manual','daniel.mloure@live.com','DELETE from manual WHERE id = 8'),(77,'189.56.14.250','2019-10-23 20:19:32','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( dfsdsad ); '),(78,'189.56.14.250','2019-10-23 20:19:41','treinamento, contem, realiza','daniel.mloure@live.com','UPDATE treinamento SET NomeTreinamento =  dfsdsad  WHERE NomeTreinamento =  dfsdsad   DELETE FROM contem WHERE NomeTreinamento =  dfsdsad  UPDATE realiza SET Treinamento =  dfsdsad  WHERE Treinamento =  dfsdsad '),(79,'189.56.14.250','2019-10-23 20:23:39','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO manual (nome, caminho)\n		VALUES (\'Testeeeee\', \'c68adead72fa4434374b8009a98ca85e.zip\');'),(80,'189.56.14.250','2019-10-23 20:34:16','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( Treinamento_renan ); '),(81,'189.56.14.250','2019-10-23 20:35:21','treinamento, contem','gclferreira@hotmail.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( Testecaraio ); '),(82,'186.223.13.245','2019-10-25 07:45:09','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pendente\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' nada'),(83,'AutomÃ¡tico','2019-10-25 10:45:18','pagamentos','AutomÃ¡tico','UPDATE pagamentos SET status = \'Em dÃ©bito\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\''),(84,'186.223.13.245','2019-10-25 07:45:27','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(85,'186.223.13.245','2019-10-25 07:45:27','pagamentos','daniel.mloure@live.com','UPDATE pagamentos SET status = \'Pagamento efetuado\' WHERE cpf = \'437.340.458-51\' AND competencia = \'10/2019\' INSERT INTO pagamentos VALUES (\'437.340.458-51\', \'Pendente\', \'11/2019\')'),(86,'186.223.13.245','2019-10-25 07:51:25','treinamento, contem','dmestreloureiro@gmail.com','INSERT INTO depoimentos (cpf, descricao, status, data)\n		VALUES (\'437.340.458-51\', \'asdadsdasd\', \'Pendente\', \'2019-10-25\');'),(87,'186.223.13.245','2019-10-25 10:40:09','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','INSERT INTO pessoa (cpf, dataNascimento, email, nome, telefone, TipoPessoa, senha, foto, cidade, estado, cep, bairro, rua, numero, inativo, cadastro)\n		VALUES ( 177.579.998-04 ,  1974-05-22 ,  teste@idajsidja.com ,  Elaine ,  (19) 984369565 ,  3 ,  25d55ad283aa400af464c76d713c07ad ,  padrao.jpg ,  SBO ,  SP ,  13502-222 ,  Teste ,  teste ,  teste ,  0 ,  2019-10-25 ); INSERT INTO cliente (cpf, filial, sexo) VALUES ( 177.579.998-04 ,  1 ,  Feminino );  INSERT INTO horario (cpf, segunda, terca, quarta, quinta, sexta, sabado)\n		VALUES ( 177.579.998-04 ,  12:00 ,   ,   ,   ,   ,   ); INSERT INTO realiza (cpf, Treinamento) VALUES ( 177.579.998-04 ,  dfsdsad ); INSERT INTO mensalidade (cpf, valor, DataVencimento) VALUES ( 177.579.998-04 ,  200,00 ,  15 );'),(88,'186.223.13.245','2019-10-25 11:30:42','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE pessoa SET dataNascimento = \'1974-05-22\', email = \'ADPIASDJIAD@ASDHOASDH.COM\', nome = \'Elaine\', telefone = \'(45) 684684684\', TipoPessoa = \'3\', senha = \'25d55ad283aa400af464c76d713c07ad\', foto = \'padrao.jpg\', cidade = \'SBO\', estado = \'SP\', cep = \'51513-513\', bairro = \'teste\', rua = \'teste\', numero = \'yrtre\', inativo = \'0\' WHERE cpf = \'177.579.998-04\' UPDATE cliente SET filial = \'1\' sexo = \'Feminino\' WHERE cpf = \'177.579.998-04\' UPDATE horario SET  segunda = \'12:31\', terca = \'12:31\', quarta = \'\', quinta = \'\', sexta = \'\', sabado = \'\' WHERE cpf = \'177.579.998-04\' UPDATE realiza SET Treinamento = \'Testecaraio\' WHERE cpf = \'177.579.998-04\' UPDATE mensalidade SET valor = \'1231,23\', DataVencimento = \'12\' WHERE cpf = \'177.579.998-04\''),(89,'186.223.13.245','2019-10-25 11:33:03','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE pessoa SET dataNascimento = \'1998-05-17\', email = \'anisda@aidhaisdhai\', nome = \'Elaine\', telefone = \'(15) 818168618\', TipoPessoa = \'3\', senha = \'25d55ad283aa400af464c76d713c07ad\', foto = \'padrao.jpg\', cidade = \'SBO\', estado = \'SP\', cep = \'54545-451\', bairro = \'teste\', rua = \'teste\', numero = \'teste\', inativo = \'0\' WHERE cpf = \'177.579.998-04\' UPDATE cliente SET filial = \'1\' sexo = \'Feminino\' WHERE cpf = \'177.579.998-04\' UPDATE horario SET  segunda = \'12:31\', terca = \'\', quarta = \'\', quinta = \'\', sexta = \'\', sabado = \'\' WHERE cpf = \'177.579.998-04\' UPDATE realiza SET Treinamento = \'Treinamento_renan\' WHERE cpf = \'177.579.998-04\' UPDATE mensalidade SET valor = \'1231,23\', DataVencimento = \'12\' WHERE cpf = \'177.579.998-04\''),(90,'186.223.13.245','2019-10-25 11:39:29','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE pessoa SET dataNascimento = \'1998-05-22\', email = \'aisdhaid@aisdhaih.com\', nome = \'Elaine\', telefone = \'(56) 465456465\', TipoPessoa = \'3\', senha = \'25d55ad283aa400af464c76d713c07ad\', foto = \'padrao.jpg\', cidade = \'teste\', estado = \'teste\', cep = \'12122-211\', bairro = \'teste\', rua = \'teste\', numero = \'teste\', inativo = \'0\' WHERE cpf = \'177.579.998-04\' UPDATE cliente SET filial = \'1\' sexo = \'Feminino\' WHERE cpf = \'177.579.998-04\' UPDATE horario SET  segunda = \'12:31\', terca = \'\', quarta = \'\', quinta = \'\', sexta = \'\', sabado = \'\' WHERE cpf = \'177.579.998-04\' UPDATE realiza SET Treinamento = \'Testecaraio\' WHERE cpf = \'177.579.998-04\' UPDATE mensalidade SET valor = \'1232,13\', DataVencimento = \'12\' WHERE cpf = \'177.579.998-04\''),(91,'186.223.13.245','2019-10-25 11:41:44','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE pessoa SET dataNascimento = \'1974-05-22\', email = \'dadaihsd@asdhaud.com\', nome = \'Elaine\', telefone = \'(19) 98454541\', TipoPessoa = \'3\', senha = \'25d55ad283aa400af464c76d713c07ad\', foto = \'padrao.jpg\', cidade = \'teste\', estado = \'teste\', cep = \'45445-445\', bairro = \'teste\', rua = \'teste\', numero = \'teste\', inativo = \'0\' WHERE cpf = \'177.579.998-04\' UPDATE cliente SET filial = \'1\' sexo = \'Feminino\' WHERE cpf = \'177.579.998-04\' UPDATE horario SET  segunda = \'21:31\', terca = \'\', quarta = \'\', quinta = \'\', sexta = \'\', sabado = \'\' WHERE cpf = \'177.579.998-04\' UPDATE realiza SET Treinamento = \'Treinamento_renan\' WHERE cpf = \'177.579.998-04\' UPDATE mensalidade SET valor = \'123,33\', DataVencimento = \'12\' WHERE cpf = \'177.579.998-04\''),(92,'186.223.13.245','2019-10-25 11:59:49','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE pessoa SET dataNascimento = \'1998-05-17\', email = \'daidohds@dhasdiah\', nome = \'Elaine\', telefone = \'(12) 391831931\', TipoPessoa = \'3\', senha = \'25d55ad283aa400af464c76d713c07ad\', foto = \'padrao.jpg\', cidade = \'teste\', estado = \'teste\', cep = \'13123-132\', bairro = \'teste\', rua = \'teste\', numero = \'teste\', inativo = \'0\' WHERE cpf = \'177.579.998-04\' UPDATE cliente SET filial = \'1\' sexo = \'Feminino\' WHERE cpf = \'177.579.998-04\' UPDATE horario SET  segunda = \'12:31\', terca = \'\', quarta = \'\', quinta = \'\', sexta = \'\', sabado = \'\' WHERE cpf = \'177.579.998-04\' UPDATE realiza SET Treinamento = \'Testecaraio\' WHERE cpf = \'177.579.998-04\' UPDATE mensalidade SET valor = \'1,23\', DataVencimento = \'21\' WHERE cpf = \'177.579.998-04\''),(93,'187.74.74.122','2019-10-27 19:34:58','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( teteasda ); '),(94,'187.74.74.122','2019-10-27 19:43:00','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( teste ); '),(95,'187.74.74.122','2019-10-27 19:43:14','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( teste ); '),(96,'187.74.74.122','2019-10-27 19:43:26','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( teste ); '),(97,'187.74.74.122','2019-10-27 19:56:58','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( teste ); '),(98,'187.74.74.122','2019-10-27 19:57:05','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( teste ); '),(99,'187.74.74.122','2019-10-27 20:00:40','treinamento, contem, realiza','daniel.mloure@live.com','UPDATE treinamento SET NomeTreinamento =  teste  WHERE NomeTreinamento =  Treinamento_renan   DELETE FROM contem WHERE NomeTreinamento =  Treinamento_renan  UPDATE realiza SET Treinamento =  teste  WHERE Treinamento =  Treinamento_renan '),(100,'186.223.13.245','2019-10-28 08:51:58','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( Testecaraio ); '),(101,'186.223.13.245','2019-10-28 08:53:28','treinamento, contem','daniel.mloure@live.com','INSERT INTO treinamento (NomeTreinamento)\n		VALUES ( dfsdsad ); '),(102,'200.148.38.230','2019-11-03 14:06:34','treinamento, contem','daniel.mloure@live.com','INSERT INTO depoimentos (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'1\', \'1\', \'1\', \'11\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'11\', \'1\', \'1\', \'1\', \'1\', \'1\', \'2019-11-03\', \'177.579.998-04\', \'1\', \'1\');'),(103,'200.148.38.230','2019-11-03 14:06:56','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'1\', \'1\', \'1\', \'11\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'11\', \'1\', \'1\', \'1\', \'1\', \'1\', \'2019-11-03\', \'177.579.998-04\', \'1\', \'1\');'),(104,'200.148.38.230','2019-11-03 14:08:28','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'1\', \'111\', \'1\', \'1,2\', \'11\', \'1\', \'1\', \'1\', \'11\', \'11\', \'1\', \'1\', \'1\', \'1\', \'11\', \'11\', \'1\', \'11\', \'1\', \'11\', \'1\', \'1\', \'2\', \'2019-11-03\', \'050.633.491-02\', \'1\', \'1\');'),(105,'200.148.38.230','2019-11-03 14:09:03','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'2\', \'2.23\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'22\', \'3\', \'2019-11-03\', \'437.340.458-51\', \'2\', \'2\');'),(106,'200.148.38.230','2019-11-03 14:09:56','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'1\', \'1\', \'1\', \'1\', \'11\', \'1\', \'1\', \'1\', \'1\', \'1\', \'11\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1.22\', \'1\', \'1\', \'1.45\', \'2\', \'2019-11-03\', \'177.579.998-04\', \'11\', \'1\');'),(107,'200.148.38.230','2019-11-03 14:20:35','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'40\', \'123\', \'2\', \'2\', \'2\', \'2\', \'22\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'3\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2\', \'2019-11-03\', \'050.633.491-02\', \'22\', \'3\');'),(108,'200.148.38.230','2019-11-03 15:32:06','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'80\', \'202\', \'20\', \'15\', \'68\', \'19\', \'20\', \'16\', \'35\', \'26\', \'29\', \'20\', \'50\', \'60\', \'65\', \'60\', \'10\', \'10\', \'15\', \'15\', \'20\', \'20\', \'1\', \'2019-11-03\', \'437.340.458-51\', \'8\', \'9\');'),(109,'200.148.38.230','2019-11-03 15:36:27','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'80\', \'205\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'1\', \'2019-11-03\', \'437.340.458-51\', \'12\', \'12\');'),(110,'200.148.38.230','2019-11-03 20:37:19','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'81\', \'205\', \'10\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'10\', \'2019-11-03\', \'\', \'12\', \'86\');'),(111,'200.148.38.230','2019-11-03 20:37:28','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'81\', \'205\', \'10\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'\', \'12\', \'12\', \'12\', \'12\', \'12\', \'12\', \'10\', \'2019-11-03\', \'\', \'12\', \'86\');'),(112,'200.148.38.230','2019-11-03 20:37:40','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'81\', estatura = \'205\', subescapular = \'10\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'10\', ideal = \'12\', meta = \'86\' WHERE id = \'7\''),(113,'200.148.38.230','2019-11-03 20:37:48','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'205\', subescapular = \'10\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'10\', ideal = \'12\', meta = \'86\' WHERE id = \'7\''),(114,'200.148.38.230','2019-11-03 20:37:54','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'81\', estatura = \'205\', subescapular = \'10\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'10\', ideal = \'12\', meta = \'86\' WHERE id = \'7\''),(115,'200.148.38.230','2019-11-09 22:28:51','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'12\', \'12\', \'2\', \'12\', \'12\', \'21\', \'1\', \'12\', \'21\', \'21\', \'2\', \'12.00\', \'21\', \'1\', \'21\', \'\', \'21\', \'21\', \'1\', \'12\', \'21\', \'21\', \'1\', \'2019-11-09\', \'177.579.998-04\', \'12\', \'12\');'),(116,'200.148.38.230','2019-11-09 22:29:18','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'12\', \'121\', \'21\', \'21\', \'2\', \'1.21\', \'12\', \'2\', \'12\', \'21\', \'21\', \'21\', \'1\', \'12\', \'1\', \'\', \'2\', \'21\', \'12\', \'12\', \'21\', \'1\', \'2\', \'2019-11-09\', \'177.579.998-04\', \'12.12\', \'12\');'),(117,'200.148.38.230','2019-11-09 22:30:25','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, perimetrosPerif, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'12.12\', \'21\', \'12\', \'12\', \'21\', \'21\', \'12\', \'21.21\', \'12\', \'12\', \'12\', \'21\', \'12\', \'12\', \'12\', \'\', \'12\', \'21\', \'12\', \'1\', \'1.21\', \'1.22\', \'2\', \'2019-11-09\', \'177.579.998-04\', \'12\', \'21\');'),(118,'200.148.38.230','2019-11-09 22:30:45','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, abdominalPer, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'1\', \'2\', \'2019-11-09\', \'177.579.998-04\', \'1\', \'1\');'),(119,'200.148.38.230','2019-11-09 22:31:39','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, abdominalPer, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'12\', \'12\', \'12\', \'12\', \'1\', \'12\', \'21\', \'12\', \'21\', \'21\', \'21\', \'21\', \'21\', \'1\', \'12\', \'21\', \'21\', \'21\', \'21\', \'21\', \'21\', \'21\', \'2\', \'2019-11-09\', \'177.579.998-04\', \'21\', \'21\');'),(120,'200.148.38.230','2019-11-09 22:32:25','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, abdominalPer, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'122.11\', \'121\', \'21.12\', \'21.12\', \'121.22\', \'212.11\', \'122.11\', \'211.22\', \'122.11\', \'211.22\', \'122.11\', \'121.12\', \'122.11\', \'212.11\', \'211.22\', \'122.11\', \'122.11\', \'12.21\', \'211.12\', \'12.21\', \'212.11\', \'211.22\', \'3\', \'2019-11-09\', \'177.579.998-04\', \'122.11\', \'211.22\');'),(121,'200.148.38.230','2019-11-09 22:34:09','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, abdominalPer, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'1.21\', \'212\', \'1\', \'2\', \'12\', \'12\', \'12\', \'12\', \'12\', \'1\', \'11\', \'2\', \'1\', \'221.22\', \'12.12\', \'12\', \'1\', \'2.12\', \'2.12\', \'21\', \'1\', \'12\', \'2\', \'2019-11-09\', \'177.579.998-04\', \'1\', \'1\');'),(122,'200.148.38.230','2019-11-09 22:45:01','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'2\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(123,'200.148.38.230','2019-11-09 22:50:13','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'1\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(124,'200.148.38.230','2019-11-09 22:50:25','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'2\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(125,'200.148.38.230','2019-11-09 22:50:51','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'81\', estatura = \'205\', subescapular = \'10\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'10\', ideal = \'12\', meta = \'86\' WHERE id = \'7\''),(126,'200.148.38.230','2019-11-09 22:51:44','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'3\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(127,'200.148.38.230','2019-11-09 22:57:25','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'4\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(128,'200.148.38.230','2019-11-09 23:00:27','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'4\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(129,'200.148.38.230','2019-11-09 23:02:28','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'5\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(130,'200.148.38.230','2019-11-09 23:02:53','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'6\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(131,'200.148.38.230','2019-11-09 23:05:06','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'7\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(132,'200.148.38.230','2019-11-09 23:06:03','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'8\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(133,'200.148.38.230','2019-11-09 23:06:13','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'9\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(134,'200.148.38.230','2019-11-09 23:06:36','treinamento, contem','daniel.mloure@live.com','UPDATE avalfisica SET massaCorporal = \'80\', estatura = \'202\', subescapular = \'12\', triceps = \'12\', peitoral = 12, axilarMedial = \'12\', supraIliaca = \'12\', biceps = \'12\', abdominal = \'12\', coxaProximal = \'12\', coxaMedial = \'12\', panturrilha = \'12\', torax = \'12\', cintura = \'12\', quadril = \'12\', abdominalPer = \'12\', antebracoD = \'12\', antebracoE = \'12\', bracoRE = \'12\', bracoRD = \'12\', bracoCE = \'12\', bracoCD = \'12\', protocolo = \'10\', ideal = \'12\', meta = \'12\' WHERE id = \'11\''),(135,'200.148.38.230','2019-11-12 17:09:13','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET classificacao = \'DÃºvida\', prioridade = \'Baixa\', status = \'Finalizado\' WHERE id = \'9\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'teste\', \'\', \'2019-11-12 17:09:13\', \'Suporte\'); '),(136,'200.148.38.230','2019-11-12 17:11:14','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET classificacao = \'DÃºvida\', prioridade = \'Baixa\', status = \'Fechado\' WHERE id = \'9\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'9\', \'teste\', \'\', \'2019-11-12 17:11:14\', \'Suporte\'); '),(137,'200.148.38.230','2019-11-12 17:57:09','pessoa, cliente, horario, realiza, mensalidade','daniel.mloure@live.com','UPDATE ticket SET classificacao = \'NÃ£o classificado\', prioridade = \'NÃ£o classificado\', status = \'Aberto\' WHERE id = \'8\' INSERT INTO ticketRespostas (ticket, descricao, imagem, datahora, tipo) VALUES (\'8\', \'teste\', \'\', \'2019-11-12 17:57:09\', \'Suporte\'); '),(138,'200.148.38.230','2019-11-12 21:09:43','treinamento, contem','daniel.mloure@live.com','INSERT INTO avalfisica (massaCorporal, estatura, subescapular, triceps, peitoral, axilarMedial, supraIliaca, biceps, abdominal, coxaProximal, coxaMedial, panturrilha, torax, cintura, quadril, abdominalPer, antebracoD, antebracoE, bracoRE, bracoRD, bracoCE, bracoCD, protocolo, data, cpf, ideal, meta)\n		VALUES (\'3\', \'4\', \'43\', \'4\', \'43\', \'3\', \'4\', \'34\', \'34\', \'43\', \'4\', \'3\', \'3\', \'34\', \'3\', \'3\', \'4\', \'43\', \'4\', \'43\', \'34\', \'34\', \'2\', \'2019-11-12\', \'050.633.491-02\', \'43\', \'34\');'),(139,'189.47.91.70','2019-11-24 10:54:31','parceiro','daniel.mloure@live.com','INSERT INTO parceiro (cnpj, email, nome, telefone, foto, cidade, estado, cep, bairro, rua, numero)\n		VALUES ( 10.311.258/0001-62 ,  teste@terste ,  teste ,  (12) 321312312 ,  9dc2f113a3e3f81e5e2638597887e561.jpg ,  teasr ,  asda ,  12312-312 ,  asd ,  asd ,  asdas );'),(140,'189.47.91.70','2019-11-24 11:00:29','parceiro','daniel.mloure@live.com','INSERT INTO parceiro (cnpj, email, nome, telefone, foto, cidade, estado, cep, bairro, rua, numero)\n		VALUES ( 78.627.456/0001-73 ,  asddas@1312313 ,  sdsad ,  (12) 312312312 ,  no-image.png ,  ads ,  sada ,  12311-231 ,  sadasd ,  dsadad ,  asdas );'),(141,'189.47.91.70','2019-11-24 11:56:01','treinamento, contem','lucastenoriolima@hotmail.com','INSERT INTO depoimentos (cpf, descricao, status, data)\n		VALUES (\'050.633.491-02\', \'lucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucastenoriolima@hotmail.comlucsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdfsdfdfscsdf\', \'Pendente\', \'2019-11-24\');');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manual`
--

DROP TABLE IF EXISTS `manual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `caminho` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manual`
--

LOCK TABLES `manual` WRITE;
/*!40000 ALTER TABLE `manual` DISABLE KEYS */;
INSERT INTO `manual` VALUES (9,'Testeeeee','c68adead72fa4434374b8009a98ca85e.zip');
/*!40000 ALTER TABLE `manual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensalidade`
--

DROP TABLE IF EXISTS `mensalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensalidade` (
  `cpf` varchar(15) NOT NULL,
  `valor` varchar(8) NOT NULL,
  `DataVencimento` tinyint(2) NOT NULL,
  PRIMARY KEY (`cpf`),
  CONSTRAINT `cpfm` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensalidade`
--

LOCK TABLES `mensalidade` WRITE;
/*!40000 ALTER TABLE `mensalidade` DISABLE KEYS */;
INSERT INTO `mensalidade` VALUES ('050.633.491-02','200,00',5),('177.579.998-04','1,23',21),('437.340.458-51','500,00',15);
/*!40000 ALTER TABLE `mensalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meses`
--

DROP TABLE IF EXISTS `meses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meses` (
  `comp` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`comp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meses`
--

LOCK TABLES `meses` WRITE;
/*!40000 ALTER TABLE `meses` DISABLE KEYS */;
/*!40000 ALTER TABLE `meses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamentos` (
  `cpf` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `competencia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cpf`,`competencia`) USING BTREE,
  CONSTRAINT `fkmensalidade` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
INSERT INTO `pagamentos` VALUES ('050.633.491-02','Em dÃ©bito','10/2019'),('177.579.998-04','Pendente','10/2019'),('437.340.458-51','Pagamento efetuado','10/2019'),('437.340.458-51','Pagamento efetuado','11/2019'),('437.340.458-51','Pendente','12/2019');
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parceiro`
--

DROP TABLE IF EXISTS `parceiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parceiro` (
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `numero` varchar(35) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parceiro`
--

LOCK TABLES `parceiro` WRITE;
/*!40000 ALTER TABLE `parceiro` DISABLE KEYS */;
INSERT INTO `parceiro` VALUES ('10.311.258/0001-62','teste@terste','teste','(12) 321312312','9dc2f113a3e3f81e5e2638597887e561.jpg','asd','12312-312','asd','asdas','asda','teasr'),('78.627.456/0001-73','asddas@1312313','sdsad','(12) 312312312','no-image.png','dsadad','12311-231','sadasd','asdas','sada','ads');
/*!40000 ALTER TABLE `parceiro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `TipoPessoa` varchar(15) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `inativo` tinyint(1) NOT NULL,
  `cadastro` date NOT NULL,
  `datasaida` date DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES ('050.633.491-02','1995-02-17','lucastenoriolima@hotmail.com','Lucas TenÃ³rio Lima Pereira','(18) 981130775','3','25d55ad283aa400af464c76d713c07ad','padrao.jpg','Presidente Prudente','SÃ£o Paulo','','Cidade Jardim','Rua Paulo Eiro','536',0,'2019-10-16',NULL),('068.648.070-88','1997-05-25','gclferreira@hotmail.com','Gabriel Ferreira','(19) 981463969','2','a2a9d246b6f4a8e6ac44f2526c175469','padrao.jpg','CatalÃ£o','GoiÃ¡s','12515-252','Primavera','Rua Geraldo Duarte','253',0,'2019-10-09',NULL),('111.111.111-11','2019-10-01','daniel.mloure@live.com','Daniel','123','1','21232f297a57a5a743894a0e4a801fc3','padrao.jpg','123','123',NULL,'213','123','123',0,'2019-10-07',NULL),('177.579.998-04','1998-05-17','daidohds@dhasdiah','Elaine','(12) 391831931','3','25d55ad283aa400af464c76d713c07ad','padrao.jpg','teste','teste','13123-132','teste','teste','teste',0,'2019-10-25',NULL),('437.340.458-51','1998-05-17','dmestreloureiro@gmail.com','Daniel Loureiro','(19) 981463969','3','25d55ad283aa400af464c76d713c07ad','padrao.jpg','Santa BÃ¡rbara d\'Oeste','SÃ£o Paulo','13450-000','Residencial Furlan','Rua Fioravante L. Angolini','93',0,'2019-10-09',NULL);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realiza`
--

DROP TABLE IF EXISTS `realiza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realiza` (
  `Treinamento` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `treinameona` (`Treinamento`),
  CONSTRAINT `cpf` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realiza`
--

LOCK TABLES `realiza` WRITE;
/*!40000 ALTER TABLE `realiza` DISABLE KEYS */;
INSERT INTO `realiza` VALUES ('teste','050.633.491-02'),('teste','437.340.458-51'),('Treinamento nÃ£o cadastrado','177.579.998-04');
/*!40000 ALTER TABLE `realiza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recuperacao`
--

DROP TABLE IF EXISTS `recuperacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recuperacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `token` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recuperacao`
--

LOCK TABLES `recuperacao` WRITE;
/*!40000 ALTER TABLE `recuperacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `recuperacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relatorio`
--

DROP TABLE IF EXISTS `relatorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(20) NOT NULL,
  `IdFilial` varchar(30) NOT NULL,
  `treinamento` varchar(50) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdFilial` (`IdFilial`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relatorio`
--

LOCK TABLES `relatorio` WRITE;
/*!40000 ALTER TABLE `relatorio` DISABLE KEYS */;
INSERT INTO `relatorio` VALUES (13,'437.340.458-51','1','Testecaraio','2019-10-25','2019-10-25'),(15,'437.340.458-51','1','dfsdsad','2019-10-25','2019-10-28'),(16,'177.579.998-04','1','dfsdsad','2019-10-25',NULL),(17,'437.340.458-51','2','Testecaraio','2019-10-28','2019-11-24'),(18,'437.340.458-51','1','teste','2019-11-24',NULL);
/*!40000 ALTER TABLE `relatorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `classificacao` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `prioridade` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (7,'Teste imagem','NÃ£o classificado','Aberto','NÃ£o classificado','111.111.111-11'),(8,'Teste imagem 2 ','NÃ£o classificado','Aberto','NÃ£o classificado','111.111.111-11'),(9,'Teste imagem 3','DÃºvida','Fechado','Baixa','111.111.111-11');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticketRespostas`
--

DROP TABLE IF EXISTS `ticketRespostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticketRespostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` int(11) NOT NULL,
  `descricao` varchar(1022) COLLATE latin1_general_ci NOT NULL,
  `imagem` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `datahora` datetime NOT NULL,
  `tipo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkidticket` (`ticket`),
  CONSTRAINT `fkidticket` FOREIGN KEY (`ticket`) REFERENCES `ticket` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticketRespostas`
--

LOCK TABLES `ticketRespostas` WRITE;
/*!40000 ALTER TABLE `ticketRespostas` DISABLE KEYS */;
INSERT INTO `ticketRespostas` VALUES (6,7,'Segundo teste com imagem no ticket','da4c8ef15b329926089660c9ae438982.png','2019-10-22 08:50:14','User'),(7,8,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quam quam, convallis viverra vehicula et, dignissim quis augue. Aenean luctus eu magna ut cursus. Pellentesque congue nulla non mauris convallis, blandit mattis ligula fringilla. In aliquam, nibh egestas vestibulum gravida, ligula velit accumsan nunc, et egestas ante justo id tellus. Curabitur tincidunt efficitur ipsum at egestas. Phasellus dapibus ut tellus sit amet gravida. Pellentesque et ante eu mi tempor tincidunt. Suspendisse rhoncus elementum arcu. Maecenas vel molestie urna. Fusce viverra laoreet lectus, sed aliquam ante imperdiet ultricies.\r\n\r\nMaecenas nec commodo ante. Pellentesque dapibus ornare ante vel consequat. Sed bibendum urna quis aliquam vulputate. Curabitur volutpat, tellus sed dictum consequat, urna felis pellentesque dolor, non pharetra neque justo eget ipsum. Curabitur nibh lacus, eleifend non eleifend quis, venenatis non eros. Vestibulum in viverra tortor, ut facilisis diam. Phasellus magna ex, ullamcorper at varius','','2019-10-22 09:38:38','User'),(8,9,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quam quam, convallis viverra vehicula et, dignissim quis augue. Aenean luctus eu magna ut cursus. Pellentesque congue nulla non mauris convallis, blandit mattis ligula fringilla. In aliquam, nibh egestas vestibulum gravida, ligula velit accumsan nunc, et egestas ante justo id tellus. Curabitur tincidunt efficitur ipsum at egestas. Phasellus dapibus ut tellus sit amet gravida. Pellentesque et ante eu mi tempor tincidunt. Suspendisse rhoncus elementum arcu. Maecenas vel molestie urna. Fusce viverra laoreet lectus, sed aliquam ante imperdiet ultricies.\r\n\r\nMaecenas nec commodo ante. Pellentesque dapibus ornare ante vel consequat. Sed bibendum urna quis aliquam vulputate. Curabitur volutpat, tellus sed dictum consequat, urna felis pellentesque dolor, non pharetra neque justo eget ipsum. Curabitur nibh lacus, eleifend non eleifend quis, venenatis non eros. Vestibulum in viverra tortor, ut facilisis diam. Phasellus magna ex, ullamcorper at varius','b6fe84f56b2842a2bcdf29fc49abcd14.png','2019-10-22 09:39:20','User'),(15,9,'Estamos testando','','2019-10-22 22:03:00','Suporte'),(16,9,'Obrigado senhor!','','2019-10-22 22:03:33','User'),(17,9,'Agora vou por uma imagem','7f74d9e36eea176f9b5fd72cd6014834.jpg','2019-10-22 22:05:17','Suporte'),(18,9,'teste','','2019-11-12 17:09:13','Suporte'),(19,9,'teste','','2019-11-12 17:11:14','Suporte'),(20,8,'teste','','2019-11-12 17:57:09','Suporte');
/*!40000 ALTER TABLE `ticketRespostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `token` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES ('21c8eaf61476501c0ac2758b1029bcc5574677f65fec2b012b','daniel.mloure@live.com','2019-10-15 14:20:55'),('a11cd8b59a8932d61842535ec0a31d652d55c33453561af074','dmestreloureiro@gmail.com','2019-10-19 21:20:35');
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treinamento`
--

DROP TABLE IF EXISTS `treinamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treinamento` (
  `Id` int(12) NOT NULL AUTO_INCREMENT,
  `NomeTreinamento` varchar(50) NOT NULL,
  `inativo` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treinamento`
--

LOCK TABLES `treinamento` WRITE;
/*!40000 ALTER TABLE `treinamento` DISABLE KEYS */;
INSERT INTO `treinamento` VALUES (4,'teste',0),(5,'teteasda',1),(6,'teste',1),(9,'teste',1),(10,'teste',1),(11,'Testecaraio',0),(12,'dfsdsad',1);
/*!40000 ALTER TABLE `treinamento` ENABLE KEYS */;
UNLOCK TABLES;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-24 16:07:39
