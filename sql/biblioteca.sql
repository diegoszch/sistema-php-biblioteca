# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                 127.0.0.1
# Database:             biblioteca
# Server version:       4.1.13a-nt
# Server OS:            Win32
# Target-Compatibility: MySQL 4.0
# Extended INSERTs:     N
# HeidiSQL version:     3.0 Revision: 572
# --------------------------------------------------------

/*!40100 SET CHARACTER SET latin1*/;


#
# Database structure for database 'biblioteca'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `biblioteca`;

USE `biblioteca`;


#
# Table structure for table 'alunos'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `alunos` (
  `id` int(11) NOT NULL auto_increment,
  `nome_aluno` varchar(50) default NULL,
  `end_aluno` varchar(80) default NULL,
  `email_aluno` varchar(40) default NULL,
  `tel_aluno` varchar(20) default NULL,
  `cidade_aluno` varchar(40) default NULL,
  `estado_aluno` int(11) default NULL,
  `nasc_aluno` varchar(10) default NULL,
  `identidade_aluno` varchar(14) default NULL,
  `cep_aluno` varchar(9) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'alunos'
#

/*!40000 ALTER TABLE `alunos` DISABLE KEYS*/;
LOCK TABLES `alunos` WRITE;
REPLACE INTO `alunos` (`id`, `nome_aluno`, `end_aluno`, `email_aluno`, `tel_aluno`, `cidade_aluno`, `estado_aluno`, `nasc_aluno`, `identidade_aluno`, `cep_aluno`) VALUES (4,'Adalberto Menezes','endereco','email','telefone','cidade',1,'data','identidade','cep');
REPLACE INTO `alunos` (`id`, `nome_aluno`, `end_aluno`, `email_aluno`, `tel_aluno`, `cidade_aluno`, `estado_aluno`, `nasc_aluno`, `identidade_aluno`, `cep_aluno`) VALUES (5,'Ricardo Soares','endereco','email','telefone','cidade',2,'data nasci','identidade','cep2');
REPLACE INTO `alunos` (`id`, `nome_aluno`, `end_aluno`, `email_aluno`, `tel_aluno`, `cidade_aluno`, `estado_aluno`, `nasc_aluno`, `identidade_aluno`, `cep_aluno`) VALUES (6,'Noxx','asdasd','asdlk','asldk','askdç',3,'askdl','111','asd');
UNLOCK TABLES;
/*!40000 ALTER TABLE `alunos` ENABLE KEYS*/;


#
# Table structure for table 'autores'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `autores` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(50) default NULL,
  `nacionalidade` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'autores'
#

/*!40000 ALTER TABLE `autores` DISABLE KEYS*/;
LOCK TABLES `autores` WRITE;
REPLACE INTO `autores` (`id`, `nome`, `nacionalidade`) VALUES ('2','Autor','Brasil');
UNLOCK TABLES;
/*!40000 ALTER TABLE `autores` ENABLE KEYS*/;


#
# Table structure for table 'autores_livros'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `autores_livros` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `autores_id` int(10) unsigned default NULL,
  `livros_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'autores_livros'
#

/*!40000 ALTER TABLE `autores_livros` DISABLE KEYS*/;
LOCK TABLES `autores_livros` WRITE;
REPLACE INTO `autores_livros` (`id`, `autores_id`, `livros_id`) VALUES ('11','3','4');
REPLACE INTO `autores_livros` (`id`, `autores_id`, `livros_id`) VALUES ('14','3','5');
REPLACE INTO `autores_livros` (`id`, `autores_id`, `livros_id`) VALUES ('25','3','11');
REPLACE INTO `autores_livros` (`id`, `autores_id`, `livros_id`) VALUES ('34','2','3');
REPLACE INTO `autores_livros` (`id`, `autores_id`, `livros_id`) VALUES ('37','2','1');
UNLOCK TABLES;
/*!40000 ALTER TABLE `autores_livros` ENABLE KEYS*/;


#
# Table structure for table 'classificacao'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `classificacao` (
  `id` int(3) unsigned zerofill NOT NULL default '000',
  `nome` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `cod` (`id`),
  KEY `cod_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'classificacao'
#

/*!40000 ALTER TABLE `classificacao` DISABLE KEYS*/;
LOCK TABLES `classificacao` WRITE;
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (0,'Obras gerais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (10,'Bibliografia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (20,'Biblioteconomia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (30,'Enciclopédias gerais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (40,'Coleções de ensaios gerais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (50,'Periódicos em geral');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (60,'Sociedades em geral, museus');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (70,'Jornalismo, jornais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (80,'Poligrafia. Coleções gerais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (90,'Livros raros');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (100,'Filosofia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (110,'Metafísica');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (120,'Assuntos de metafísica especial');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (130,'Corpo e espírito');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (140,'Sistemas filosóficos');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (150,'Psicologia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (160,'Lógica');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (170,'Ética');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (180,'Filósofos antigos e medievais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (190,'Filosofia moderna');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (200,'Religião');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (210,'Teologia natural');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (220,'A bíblia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (230,'Teologia doutrinal');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (240,'Literatura de devoção');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (250,'Teologia, homílias');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (260,'A igreja');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (270,'História da igreja');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (280,'Seitas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (290,'Religiões não-cristãs');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (300,'Ciências sociais');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (310,'Estatística');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (320,'Ciências políticas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (330,'Economia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (340,'Direito');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (350,'Administração Pública');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (360,'Assistência Social e Instituições');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (370,'Educação');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (380,'Comércio e Comunicações');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (390,'Usos e Costumes');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (400,'Filologia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (410,'Filologia comparada');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (420,'Inglês');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (430,'Alemão');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (440,'Francês');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (450,'Italiano');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (460,'Espanhol, português');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (470,'Latim');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (480,'Grego');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (490,'Outras línguas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (500,'Ciências puras');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (510,'Matemática');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (520,'Astronomia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (530,'Física');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (540,'Química');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (550,'Geologia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (560,'Paleontologia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (570,'Biologia, antropologia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (580,'Botânica');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (590,'Zoologia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (600,'Ciências aplicadas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (610,'Medicina');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (620,'Engenharia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (630,'Agricultura');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (640,'Economia doméstica');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (650,'Comunicações, transporte e comércio');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (660,'Química industrial');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (670,'Manufaturas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (680,'Outras manufaturas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (690,'Construções');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (700,'Belas artes');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (710,'Arquitetura paisagística');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (720,'Arquitetura');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (730,'Escultura');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (740,'Desenho, decorações');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (750,'Pintura');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (760,'Gravura');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (770,'Fotografia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (780,'Música');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (790,'Recreações');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (800,'Literatura');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (810,'Literatura americana');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (820,'Literatura inglesa');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (830,'Literatura alemã');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (840,'Literatura francesa');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (850,'Literatura italiana');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (860,'Literatura espanhola, portuguesa');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (870,'Literatura latina');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (880,'Literatura grega');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (890,'Outras literaturas');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (900,'História');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (910,'Geografia, descrições e viagens');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (920,'Biografia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (930,'História antiga');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (940,'Europa');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (950,'Ásia');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (960,'África');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (970,'América do Norte');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (980,'América do Sul');
REPLACE INTO `classificacao` (`id`, `nome`) VALUES (990,'Oceania e as regiões polares');
UNLOCK TABLES;
/*!40000 ALTER TABLE `classificacao` ENABLE KEYS*/;


#
# Table structure for table 'estados'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `estados` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uf` char(2) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`,`uf`),
  KEY `id_2` (`id`,`uf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'estados'
#

/*!40000 ALTER TABLE `estados` DISABLE KEYS*/;
LOCK TABLES `estados` WRITE;
REPLACE INTO `estados` (`id`, `uf`) VALUES ('1','RS');
REPLACE INTO `estados` (`id`, `uf`) VALUES ('2','SP');
REPLACE INTO `estados` (`id`, `uf`) VALUES ('3','PR');
UNLOCK TABLES;
/*!40000 ALTER TABLE `estados` ENABLE KEYS*/;


#
# Table structure for table 'livros'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `livros` (
  `id` int(11) NOT NULL auto_increment,
  `inclusao_livro` date default NULL,
  `nome_livro` varchar(80) default NULL,
  `editora` varchar(30) default NULL,
  `ano` varchar(10) default NULL,
  `ISBN` varchar(30) default NULL,
  `num_pag` varchar(6) default NULL,
  `edicao` varchar(5) default NULL,
  `classificacao_id` int(3) unsigned zerofill default NULL,
  `classificacao_extra` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Descreve dados sobre os livros';



#
# Dumping data for table 'livros'
#

/*!40000 ALTER TABLE `livros` DISABLE KEYS*/;
LOCK TABLES `livros` WRITE;
REPLACE INTO `livros` (`id`, `inclusao_livro`, `nome_livro`, `editora`, `ano`, `ISBN`, `num_pag`, `edicao`, `classificacao_id`, `classificacao_extra`) VALUES (1,'2009-06-16','Banco de dados','editora','ano1','isbn2','numero','edica',400,'Classificação e');
REPLACE INTO `livros` (`id`, `inclusao_livro`, `nome_livro`, `editora`, `ano`, `ISBN`, `num_pag`, `edicao`, `classificacao_id`, `classificacao_extra`) VALUES (3,'2009-06-16','Redes de Computadores','editora','ano','isbn','num pa','edica',10,NULL);
REPLACE INTO `livros` (`id`, `inclusao_livro`, `nome_livro`, `editora`, `ano`, `ISBN`, `num_pag`, `edicao`, `classificacao_id`, `classificacao_extra`) VALUES (4,'2009-06-16','Banco de dados III','editora','ano','isbn','num pa','edica',NULL,NULL);
REPLACE INTO `livros` (`id`, `inclusao_livro`, `nome_livro`, `editora`, `ano`, `ISBN`, `num_pag`, `edicao`, `classificacao_id`, `classificacao_extra`) VALUES (5,'2009-06-16','Biologia','editora','ano','isbn','num pa','edica',NULL,NULL);
REPLACE INTO `livros` (`id`, `inclusao_livro`, `nome_livro`, `editora`, `ano`, `ISBN`, `num_pag`, `edicao`, `classificacao_id`, `classificacao_extra`) VALUES (11,'2009-10-28','Livros','editora','2009','ISBN','200','3',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `livros` ENABLE KEYS*/;


#
# Table structure for table 'locacao'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `locacao` (
  `id` int(11) NOT NULL auto_increment,
  `id_aluno` int(11) default NULL,
  `id_usuario` int(11) default NULL,
  `id_livro` int(11) default NULL,
  `data_retirada` date default NULL,
  `data_devolucao` date default NULL,
  `data_entrega` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='descreve os dados sobre a retirada de livros';



#
# Dumping data for table 'locacao'
#

/*!40000 ALTER TABLE `locacao` DISABLE KEYS*/;
LOCK TABLES `locacao` WRITE;
REPLACE INTO `locacao` (`id`, `id_aluno`, `id_usuario`, `id_livro`, `data_retirada`, `data_devolucao`, `data_entrega`) VALUES (1,4,1,1,'2009-11-11','2009-11-15','2009-11-15');
REPLACE INTO `locacao` (`id`, `id_aluno`, `id_usuario`, `id_livro`, `data_retirada`, `data_devolucao`, `data_entrega`) VALUES (10,4,1,3,'2009-12-14','2009-12-15',NULL);
REPLACE INTO `locacao` (`id`, `id_aluno`, `id_usuario`, `id_livro`, `data_retirada`, `data_devolucao`, `data_entrega`) VALUES (4,5,1,4,'2009-05-20','2009-05-27','2009-05-29');
REPLACE INTO `locacao` (`id`, `id_aluno`, `id_usuario`, `id_livro`, `data_retirada`, `data_devolucao`, `data_entrega`) VALUES (6,5,1,4,'2007-11-11','2008-12-23','2010-12-23');
REPLACE INTO `locacao` (`id`, `id_aluno`, `id_usuario`, `id_livro`, `data_retirada`, `data_devolucao`, `data_entrega`) VALUES (11,5,1,1,'2009-12-14','2009-12-15',NULL);
REPLACE INTO `locacao` (`id`, `id_aluno`, `id_usuario`, `id_livro`, `data_retirada`, `data_devolucao`, `data_entrega`) VALUES (12,5,1,11,'2009-12-14','2009-12-16',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `locacao` ENABLE KEYS*/;


#
# Table structure for table 'multa'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `multa` (
  `valor` float unsigned default '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'multa'
#

/*!40000 ALTER TABLE `multa` DISABLE KEYS*/;
LOCK TABLES `multa` WRITE;
REPLACE INTO `multa` (`valor`) VALUES ('1');
UNLOCK TABLES;
/*!40000 ALTER TABLE `multa` ENABLE KEYS*/;


#
# Table structure for table 'usuarios'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `usuarios` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(50) default NULL,
  `login` varchar(20) default NULL,
  `senha` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`,`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



#
# Dumping data for table 'usuarios'
#

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS*/;
LOCK TABLES `usuarios` WRITE;
REPLACE INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES ('1','admin','admin','admin');
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS*/;
