-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5089
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para conecta
CREATE DATABASE IF NOT EXISTS `conecta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `conecta`;

-- Copiando estrutura para tabela conecta.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `instituicao` int(11) DEFAULT NULL,
  `conteudo` text,
  `id_post` int(11) DEFAULT NULL,
  `data_comentario` varchar(12) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela conecta.comentario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` (`id`, `usuario`, `instituicao`, `conteudo`, `id_post`, `data_comentario`, `id_turma`) VALUES
	(4, '106385146447034', NULL, 'teste', 3, '17/06/2016', NULL),
	(5, '106385146447034', NULL, 'segundo comentario o primeiro foi muito bom', 3, '17/06/2016', NULL),
	(7, '106385146447034', NULL, 'comentario de teste 2', 4, '17/06/2016', NULL),
	(8, '106385146447034', NULL, 'luiz gomes', 4, '17/06/2016', NULL),
	(11, '106385146447034', NULL, 'teste', 4, '19/06/2016', NULL),
	(14, '1034389293319874', NULL, NULL, NULL, '19/06/2016', NULL),
	(16, '1034389293319874', NULL, 'teste comentario editado 2', 4, '19/06/2016', NULL),
	(17, '1034389293319874', NULL, 'teste comentariio post 5', 5, '19/06/2016', NULL),
	(18, '106385146447034', NULL, 'teste comntariio post 5 LG', 5, '19/06/2016', NULL);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Copiando estrutura para tabela conecta.instituicao
CREATE TABLE IF NOT EXISTS `instituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela conecta.instituicao: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `instituicao` DISABLE KEYS */;
INSERT INTO `instituicao` (`id`, `descricao`) VALUES
	(1, 'UTFPR');
/*!40000 ALTER TABLE `instituicao` ENABLE KEYS */;

-- Copiando estrutura para tabela conecta.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) DEFAULT NULL,
  `titulo` varchar(35) DEFAULT NULL,
  `conteudo` text,
  `data_post` varchar(14) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `instituicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_grade_id` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela conecta.post: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `usuario`, `titulo`, `conteudo`, `data_post`, `id_turma`, `instituicao`) VALUES
	(4, '1034389293319874', 'teste post 1', 'testando post 1', '17/06/2016', 4, NULL),
	(5, '1034389293319874', 'teste', 'aqwsedasasxxa', '17/06/2016', 4, NULL),
	(6, '1034389293319874', 'teste', 'testetetetete', '19/06/2016', 10, NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Copiando estrutura para tabela conecta.turma
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) DEFAULT NULL,
  `instituicao` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data_criacao` varchar(14) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela conecta.turma: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` (`id`, `usuario`, `instituicao`, `nome`, `data_criacao`, `ativo`) VALUES
	(4, '106385146447034', 1, 'MYSQL', '16/06/2016', 1),
	(7, '106385146447034', 1, 'NOSQL', '17/06/2016', 1),
	(8, '106385146447034', 1, 'TESTE POS AJUSTE', '17/06/2016', 1),
	(9, '1034389293319874', 1, 'TESTE POS @', '17/06/2016', 1),
	(10, '106385146447034', 1, 'PYTHON', '19/06/2016', 1);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;

-- Copiando estrutura para tabela conecta.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `foto` text,
  `instituicao` int(11) DEFAULT NULL,
  `id_facebook` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela conecta.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `foto`, `instituicao`, `id_facebook`) VALUES
	(1, 'Luiz Carlos Pedroso Gomes', '<img src=" http://graph.facebook.com/1034389293319874/pciture?type=normal">', 1, '1034389293319874'),
	(2, 'Luiz Gomes', '<img src=" http://graph.facebook.com/106385146447034/pciture?type=normal">', 1, '106385146447034');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela conecta.usuario_turma
CREATE TABLE IF NOT EXISTS `usuario_turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(40) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_usuario` (`id_usuario`,`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela conecta.usuario_turma: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_turma` DISABLE KEYS */;
INSERT INTO `usuario_turma` (`id`, `id_usuario`, `id_turma`) VALUES
	(8, '1034389293319874', 4),
	(11, '1034389293319874', 5),
	(9, '1034389293319874', 7),
	(12, '1034389293319874', 8),
	(7, '1034389293319874', 9),
	(15, '1034389293319874', 10),
	(1, '106385146447034', 0),
	(2, '106385146447034', 4),
	(5, '106385146447034', 7),
	(6, '106385146447034', 8),
	(14, '106385146447034', 10);
/*!40000 ALTER TABLE `usuario_turma` ENABLE KEYS */;

-- Copiando estrutura para trigger conecta.TRG_ingressar_turma
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TRG_ingressar_turma` AFTER INSERT ON `turma` FOR EACH ROW BEGIN
      insert into usuario_turma(id_usuario, id_turma) values(new.usuario, new.id); 
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
