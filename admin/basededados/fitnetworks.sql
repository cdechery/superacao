-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.25a
-- Versão do PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `fitnetworks`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Login` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Senha` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `EMail` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Logotipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Titulo_Site` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Descricao_Site` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `KeyWords` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ativo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`ID`, `Login`, `Senha`, `EMail`, `Logotipo`, `Titulo_Site`, `Descricao_Site`, `KeyWords`, `URL`, `Ativo`) VALUES
(1, 'admin@fitnetworks.com.br', 'b47c070f41d9bb46f4f5586d9de813ce', 'comercial@fitnetworks.com.br', '1399636804.jpg', 'FIT Networks', 'FIT Networks: focada em soluÃ§Ãµes para distribuiÃ§Ã£o de internet banda larga.', 'GEPON, GPON, Fibra Ã“tica, Banda Larga, OLT, ONU, Internet, Rede, LAN, VLAN, IPTV.', 'http://www.fitnetworks.com.br', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE IF NOT EXISTS `depoimentos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL DEFAULT '0000-00-00',
  `Nome` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Cargo` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Depoimento` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Produto` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ativo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `depoimentos`
--

INSERT INTO `depoimentos` (`ID`, `Data`, `Nome`, `Cargo`, `Depoimento`, `Produto`, `Ativo`) VALUES
(25, '2014-05-14', 'Dario DalPiaz', 'Diretor de Desenvolvimento de NegÃ³cios da Qualcomm para AmÃ©rica Latina', '"A FIT Networks traz para o mercado um modelo de negÃ³cios que Ã© muito simples, muito fÃ¡cil de ser explicado, Ã© uma inovaÃ§Ã£o que tem impacto de custo muito grande na distribuiÃ§Ã£o de internet".', '1400070986.jpg', 'S'),
(26, '2014-05-14', 'FabrÃ­cio Fadel Kammer', 'Neolink Banda Larga de Conchal - SP', '"Em um mercado dinÃ¢mico e extremamente competitivo como o de telecomunicaÃ§Ãµes, onde as grandes teles concorrem de forma desigual com os provedores regionais, a FIT Networks com o desenvolvimento do produto PACPON permitiu que provedores de internet pudessem ter uma soluÃ§Ã£o com excelente custo x benefÃ­cio, especialmente para o atendimento em regiÃµes com grande densidade de imÃ³veis. Um Ã³timo produto nÃ£o seria nada se nÃ£o fosse o excelente atendimento prestado pela equipe da FIT Networks".', '1400070018.jpg', 'S'),
(24, '2014-05-14', 'Emanuel MagalhÃ£es', 'Provedor TianguÃ¡, de TianguÃ¡ - CE', '"Sou cliente da FIT e nunca tive do que reclamar. Sempre me atenderam muito bem e cumpriram com o prometido, que foi homologar o produto. A FIT demostra transparÃªncia e fico feliz por compartilhar de sua experiÃªncia e cases de sucesso".', '1400068163.jpg', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL DEFAULT '0000-00-00',
  `Dia` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Titulo` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nome_URL_Amigavel` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Resumo` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Obs` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SEO` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TextFull` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Produto` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Arquivo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `KeyWords` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ativo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=130 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`ID`, `Data`, `Dia`, `Titulo`, `Nome_URL_Amigavel`, `Resumo`, `Obs`, `SEO`, `TextFull`, `Produto`, `Tipo`, `Arquivo`, `KeyWords`, `Ativo`) VALUES
(125, '2013-10-24', '', 'FIT Networks startup campeÃ£ na Futurecom', 'fit-networks-startup-campea-na-futurecom', '', '', 'Start-up mineira de equipamentos para provedores vence competiÃ§Ã£o na Futurecom', '<p>A empresa mineira FIT Networks, que desenvolveu uma solu&ccedil;&atilde;o mais barata para a entrega de internet banda larga via fibra &oacute;tica &agrave; casa das consumidores, venceu a competi&ccedil;&atilde;o de start-ups que encerrou nesta quinta-feira a Futurecom, maior feira de tecnologia da Am&eacute;rica Latina que acontece desde ter&ccedil;a no Rio.</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align:center"><iframe align="middle" frameborder="0" scrolling="no" src="https://www.youtube.com/embed/DzvGgr-LEJ0"></iframe></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align:center;">Leia mais:<br />\r\n<a href="http://oglobo.globo.com/sociedade/tecnologia/start-up-mineira-de-equipamentos-para-provedores-vence-competicao-na-futurecom-10530982#ixzz30a0cMuKy" target="_blank"><img alt="Veja aqui a matéria completa" src="http://www.fitnetworks.com.br/admin/uploads/1400032791.jpg" /></a></p>\r\n\r\n\r\n', '', '', '', '', 'S'),
(126, '2013-08-17', '', 'Empresa incubada no Inatel, Fit Networks, atrai investidores', 'empresa-incubada-no-inatel-fit-networks-atrai-investidores', '', '', 'EmpresÃ¡rios apresentam soluÃ§Ã£o inovadora via fibra Ã³tica para provedores de acesso Ã  internet.', '<h3><strong>Empres&aacute;rios apresentam solu&ccedil;&atilde;o inovadora via fibra &oacute;tica para provedores de acesso &agrave; internet.</strong></h3>\r\n\r\n<p>A FIT Networks est&aacute; focada em solu&ccedil;&otilde;es t&eacute;cnicas para provedores de acesso &agrave; internet. O produto principal &eacute; o PACPON ONU POE, que retira o sinal de internet da fibra &oacute;tica no poste, em via p&uacute;blica, e distribui para at&eacute; oito resid&ecirc;ncias. A energia que faz o equipamento funcionar vem das casas dos clientes pelo mesmo cabo que leva a internet. Economicamente &eacute; um grande diferencial para o provedor de internet.</p>\r\n\r\n<p><strong>Investimentos recebidos e crescimento da Empresa</strong></p>\r\n\r\n<p>As empresas incubadas normalmente s&atilde;o procuradas por investidores financeiros. Cl&oacute;vis (um dos s&oacute;cios da FIT Networks)&nbsp;conta que quando apresentaram a nova solu&ccedil;&atilde;o ao mercado, come&ccedil;aram aparecer donos de provedores de internet de grande porte com a inten&ccedil;&atilde;o de serem investidores. &ldquo;Depois que registramos nosso pedido de patente, tivemos a ideia de apresentar nosso produto numa lista de e-mails de uma associa&ccedil;&atilde;o de provedores. Isso come&ccedil;ou a movimentar a empresa de uma maneira grandiosa, visitantes de todos os lados vieram conhecer a nossa solu&ccedil;&atilde;o. Em uma dessas apresenta&ccedil;&otilde;es aos provedores de internet, acabamos conseguindo dois s&oacute;cios investidores, um do Rio de Janeiro e outro de Minas Gerais. Recebemos o investimento necess&aacute;rio e da forma adequada para esta fase da empresa&rdquo;.</p>\r\n\r\n<p>Para ver a materia completa acesse:&nbsp;<a href="http://www.inatel.br/empreendedorismo/noticias/sp-551/empresarios-afirmam-que-entrada-na-incubadora-do-inatel-e-fundamental-para-o-sucesso-de-um-negocio" target="_blank">Inatel Not&iacute;cias - FIT Networks atrai investidores</a>.</p>\r\n\r\n', '', '', '', '', 'S'),
(127, '2014-05-14', '', 'Fibra Ã³ptica: Brasil puxa alta demanda atÃ© 2018', 'fibra-optica-brasil-puxa-alta-demanda-ate-2018', '', '', 'Uma combinaÃ§Ã£o de incentivo Ã  oferta e pressÃ£o da procura irÃ¡ impulsionar o mercado embrionÃ¡rio da banda larga por fibra na AmÃ©rica Latina de 2,2 milhÃµes de ', '<p>Uma combina&ccedil;&atilde;o de incentivo &agrave; oferta e press&atilde;o da procura ir&aacute; impulsionar o mercado embrion&aacute;rio da banda larga por fibra na Am&eacute;rica Latina de 2,2 milh&otilde;es de acessos em 2013 para 11,8 milh&otilde;es de acessos em 2018, pontua um novo relat&oacute;rio da Pyramid Research.</p>\r\n\r\n<p>&quot;Por todos os mercados da Am&eacute;rica Latina com crescimento econ&ocirc;mico sustent&aacute;vel e PIB per capita crescente, tais como o Brasil e o M&eacute;xico, a demanda por mais largura de banda, redes com melhores desempenhos, v&iacute;deos para os consumidores e servi&ccedil;os de empresas baseadas em nuvem est&aacute; se expandindo&quot;, disse <strong>Daniele Tricarico</strong>, Analista da Pyramid Research.</p>\r\n\r\n<p>Leia a mat&eacute;ria completa em:<br />\r\n<a href="http://convergenciadigital.uol.com.br/cgi/cgilua.exe/sys/start.htm?infoid=35441&amp;sid=8#.U3LJzdJdUwo" target="_blank">Converg&ecirc;nciaDigital</a></p>\r\n', '', '', '', 'Banda larga, fibra Ã³tica, fibra Ã³ptica, internet, acessos', 'S'),
(128, '2014-05-14', '', 'Novo cabo de fibra Ã³tica ligarÃ¡ Brasil Ã  Europa, passando por Lisboa', 'novo-cabo-de-fibra-otica-ligara-brasil-a-europa-passando-por-lisboa', '', '', 'O presidente da ComissÃ£o Europeia, DurÃ£o Barroso, disse apoiar a construÃ§Ã£o de um cabo de fibra Ã³tica que ligarÃ¡ o Brasil e a Eur', '<p>O presidente da Comiss&atilde;o Europeia, Dur&atilde;o Barroso, disse, esta segunda-feira, apoiar a constru&ccedil;&atilde;o de um cabo de fibra &oacute;tica que ligar&aacute; pelo Atl&acirc;ntico o Brasil e a Europa, com &quot;pontos de entrada e chegada em Fortaleza e Lisboa&quot;.</p>\r\n\r\n<p>&quot;Hoje concord&aacute;mos na import&acirc;ncia da constru&ccedil;&atilde;o de um cabo de fibra &oacute;tica que vai ligar a Am&eacute;rica Latina &agrave; Europa, com pontos de entrada e chegada em Fortaleza e Lisboa, este projeto contribuir&aacute; para aumentar a competitividade, reduzir os custos das liga&ccedil;&otilde;es e dar um novo impulso ao crescimento da economia digital&quot;, afirmou Jos&eacute; Manuel Dur&atilde;o Barroso.</p>\r\n\r\n<p>Leia mais em:<br />\r\n<a href="http://www.jn.pt/PaginaInicial/Tecnologia/Interior.aspx?content_id=3704433" target="_blank">Jornal de Not&iacute;cias</a></p>\r\n', '', '', '', 'Fibra Ã³tica, fibra Ã³ptica, internet, conexÃ£o, Brasil, Europa', 'S'),
(129, '2014-05-14', '', 'Brasil terÃ¡ 3,9 milhÃµes de acessos ao IPTV em 2017', 'brasil-tera-39-milhoes-de-acessos-ao-iptv-em-2017', '', '', 'Em estudo realizado em outubro deste ano, a consultoria estimava o aparecimento de ao menos 200 novas empresas de TV paga no mercado brasileiro', '<p>Em estudo realizado em outubro deste ano, a consultoria estimava o aparecimento de ao menos 200 novas empresas de TV paga no mercado brasileiro</p>\r\n\r\n<p>S&atilde;o Paulo - O mercado de IPTV ainda est&aacute; come&ccedil;ando no Brasil, mas relat&oacute;rio da consultoria Dataxis estima queem 2017, o Pa&iacute;s teria 3,9 milh&otilde;es de usu&aacute;rios do servi&ccedil;o, o que representar&aacute;, se se confirmar, 9% da base de assinantes da TV paga no per&iacute;odo.</p>\r\n\r\n<p>Leia mais em:<br />\r\n<a href="http://exame.abril.com.br/tecnologia/noticias/brasil-tera-3-9-milhoes-de-acessos-ao-iptv-em-2017" target="_blank">Exame.com</a></p>\r\n', '', '', '', 'TV, IPTV', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proarquivos`
--

CREATE TABLE IF NOT EXISTS `proarquivos` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Produto` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID_Produtos` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Legenda` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Destaque` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `proarquivos`
--

INSERT INTO `proarquivos` (`ID`, `Produto`, `ID_Produtos`, `Legenda`, `Destaque`) VALUES
(8, '1399567270.pdf', '7', 'Detalhamento tÃ©cnico', 'N'),
(12, '1399567382.pdf', '2', 'Detalhamento tÃ©cnico', 'N'),
(9, '1399567306.pdf', '6', 'Detalhamento tÃ©cnico', 'N'),
(10, '1399567321.pdf', '5', 'Detalhamento tÃ©cnico', 'N'),
(11, '1399567335.pdf', '3', 'Detalhamento tÃ©cnico', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL DEFAULT '0000-00-00',
  `Dia` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Titulo` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nome_URL_Amigavel` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Resumo` varchar(550) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Obs` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SEO` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TextFull` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Produto` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Arquivo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PDF` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `KeyWords` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ativo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ID`, `Data`, `Dia`, `Titulo`, `Nome_URL_Amigavel`, `Resumo`, `Obs`, `SEO`, `TextFull`, `Produto`, `Tipo`, `Arquivo`, `PDF`, `KeyWords`, `Ativo`) VALUES
(2, '2014-05-07', '', 'PACPON ONU POE e PACSWITCH POE', 'pacpon-onu-poe-e-pac-switch-poe', 'O produto com 8 portas POE Reverso proporciona ao provedor de internet a possibilidade de fornecer banda larga, via fibra Ã³ptica, a um baixo custo.', '', 'O produto com 8 portas POE Reverso proporciona ao provedor de internet a possibilidade de fornecer banda larga, via fibra Ã³ptica, a um baixo custo.', '<h3>ESPECIFICA&Ccedil;&Otilde;ES T&Eacute;CNICAS DA ONU</h3>\r\n\r\n<ul>\r\n	<li><strong>Comprimento de onda:</strong> Rx 1490nm/ Tx 1310nm</li>\r\n	<li><strong>Pot&ecirc;ncia &oacute;ptica:</strong> -1dBm ~ 4dbm</li>\r\n	<li><strong>Sensibilidade de recep&ccedil;&atilde;o:</strong> Min: -25dBm</li>\r\n	<li><strong>M&aacute;xima dist&acirc;ncia de recep&ccedil;&atilde;o:</strong> 20Km</li>\r\n	<li><strong>Tabela de MAC:</strong> 64 Bits</li>\r\n	<li><strong>N&uacute;mero de LLID:</strong> 1 a 8</li>\r\n	<li><strong>MTBF:</strong> 100.000 horas</li>\r\n	<li><strong>Protocolos:</strong> Suporte aos protocolos IEEE802.3, IEEE802.3U. Suporte aos protocolos IEEE802.1q WLAN, IEEE802.1 p QOS.</li>\r\n	<li><strong>Alimenta&ccedil;&atilde;o:</strong> POE reverso 48V com controle de energia em todas as portas.</li>\r\n	<li><strong>Pot&ecirc;ncia:</strong> 6W</li>\r\n	<li><strong>Gerenciamento:</strong> Configur&aacute;vel atrav&eacute;s de software de gerenciamento da OLT</li>\r\n	<li><strong>Suporte a VLAN:</strong> Sim</li>\r\n	<li><strong>Suporte a IGMP Snooping:</strong> Sim</li>\r\n	<li><strong>Peso do conjunto:</strong> 840 gramas</li>\r\n	<li><strong>Dimens&otilde;es:</strong> Altura 230mm X Largura 170mm X Profundidade 83mm</li>\r\n	<li><strong>Suporte RSTP:</strong> Sim</li>\r\n	<li><strong>Prote&ccedil;&atilde;o contra surtos:</strong> Sim</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>ESPECIFICA&Ccedil;&Otilde;ES DO SWITCH</h3>\r\n\r\n<ul>\r\n	<li><strong>Suporte a VLAN:</strong> Sim</li>\r\n	<li><strong>Prote&ccedil;&atilde;o contra surtos:</strong> Sim</li>\r\n	<li><strong>Gerenciamento:</strong> Navegador Windows Explorer ou Mozilla</li>\r\n	<li><strong>Alimenta&ccedil;&atilde;o:</strong> POE reverso 48V com controle de energia em todas as portas</li>\r\n	<li><strong>Controle de MAC:</strong> Sim</li>\r\n	<li><strong>Anti-looping:</strong> Sim</li>\r\n	<li><strong>POE</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li><strong>Portas 1 - 7:</strong> POE reverso 48V com controle de energia em todas as portas</li>\r\n	<li><strong>Porta 8&nbsp;(uplink):</strong> POE direto 48V (sa&iacute;da de 48V para ativar pr&oacute;ximo cascateamento)</li>\r\n</ul>\r\n', '1399490241.png', '', '', 'pacpon_onu_poe.pdf', '', 'S'),
(3, '2014-05-07', '', 'OLT FNL 5000', 'olt-fnl-5000', 'Comporta atÃ© 16 portas PON, todas com gerenciamento SNMP por software grÃ¡fico.', '', 'Comporta atÃ© 16 portas PON, todas com gerenciamento SNMP por software grÃ¡fico.', '<ul>\r\n	<li><strong>Comprimento de onda:</strong> 1310(RX) /1490(TX)</li>\r\n	<li><strong>Pot&ecirc;ncia &oacute;ptica:</strong> +2 ~ +7dBm</li>\r\n	<li><strong>Sensibilidade de recep&ccedil;&atilde;o:</strong> -27dBm</li>\r\n	<li><strong>Dist&acirc;ncia m&aacute;xima:</strong> 20 km</li>\r\n	<li><strong>Capacidade:</strong> 2 PON, 128 ONU&rsquo;s</li>\r\n	<li><strong>Capacidade do Rack:</strong> Suporte para mais 7 m&oacute;dulos</li>\r\n	<li><strong>MAC:</strong>&nbsp;8K para um m&oacute;dulo, at&eacute; 64k para o rack todo</li>\r\n	<li><strong>Porta de gerenciamento:</strong> RJ45, RS232 para depurrar o dispositivo</li>\r\n	<li><strong>MTBF:</strong> 100.000 horas</li>\r\n	<li><strong>Tratamento EPON:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Opera segundo o padr&atilde;o IEEE802.3ah</li>\r\n	<li>Suporta DBA com um m&iacute;nimo de 1 Kbps ajust&aacute;veis</li>\r\n	<li>Suporta 1,25 Gbps de largura de banda sim&eacute;trica (Uplink e Downlink)</li>\r\n	<li>Suporte AES-128 de encripta&ccedil;&atilde;o para cada link identificador l&oacute;gico</li>\r\n	<li>Suporte a fun&ccedil;&atilde;o OAM, implementando gerenciamento telnet , manuten&ccedil;&atilde;o e atualiza&ccedil;&atilde;o.</li>\r\n	<li>Opera auto discovery e auto register da ONU (opera&ccedil;&atilde;o em tempo real)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Protocolos suportados:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Suporte a IEEE802.3, IEEE802.3u, IEEE802.3ab</li>\r\n	<li>Suporte a IEEE802.1Q VLAN</li>\r\n	<li>Suporte a IEEE 802.1P QoS</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Gerenciamento de rede:</strong>&nbsp;</li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Suporta telnet na interface serial e gerenciamento por software gr&aacute;fico na porta RJ45.</li>\r\n	<li>Suporta gerenciamento baseado em protocolo SNMP</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Outras fun&ccedil;&otilde;es:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Suporta protocolo 1GMPv1/v2 report, query and leave message mouse</li>\r\n	<li>Suporta DHCP snooping</li>\r\n	<li>Realiza erudi&ccedil;&atilde;o de endere&ccedil;os IPv4 baseado no DHCP Snooping</li>\r\n	<li>Realiza tabela ARP Snooping e QoS</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '1399467246.png', '', '', 'olt_fnl_5000.pdf', '', 'S'),
(5, '2014-05-07', '', 'OLT FNL 2000', 'olt-fnl-2000', '2 porta Ã³ptica SC. Suporte a funÃ§Ã£o OAM, implementando gerenciamento telnet , manutenÃ§Ã£o e atualizaÃ§Ã£o.', '', '2 porta Ã³ptica SC. Suporte a funÃ§Ã£o OAM, implementando gerenciamento telnet , manutenÃ§Ã£o e atualizaÃ§Ã£o.', '<ul>\r\n	<li><strong>Comprimento de onda:</strong> 1310(RX) /1490(TX)</li>\r\n	<li><strong>Pot&ecirc;ncia &oacute;ptica:</strong> +2 ~ +7dBm</li>\r\n	<li><strong>Sensibilidade de recep&ccedil;&atilde;o:</strong> -27dBm</li>\r\n	<li><strong>Dist&acirc;ncia m&aacute;xima:</strong> 20 km</li>\r\n	<li><strong>Capacidade:</strong> 2 PON, 128 ONU&rsquo;s</li>\r\n	<li><strong>MAC:</strong> 8K</li>\r\n	<li><strong>Porta Uplink:</strong>&nbsp;2&nbsp;portas Ethernet 10/100/1000 RJ45</li>\r\n	<li><strong>Portas PON:</strong> 2 portas &oacute;pticas SC</li>\r\n	<li><strong>Porta de gerenciamento:</strong> RJ45, RS232 para depurrar o dispositivo</li>\r\n	<li><strong>MTBF:</strong> 100.000 horas</li>\r\n	<li><strong>Tratamento EPON:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Opera segundo o padr&atilde;o IEEE802.3ah</li>\r\n	<li>Suporta DBA com um m&iacute;nimo de 1 Kbps ajust&aacute;veis</li>\r\n	<li>Suporta 1,25 Gbps de largura de banda sim&eacute;trica (Uplink e Downlink)</li>\r\n	<li>Suporte AES-128 de encripta&ccedil;&atilde;o para cada link identificador l&oacute;gico</li>\r\n	<li>Suporte a fun&ccedil;&atilde;o OAM, implementando gerenciamento telnet , manuten&ccedil;&atilde;o e atualiza&ccedil;&atilde;o.</li>\r\n	<li>Opera auto discovery e auto register da ONU (opera&ccedil;&atilde;o em tempo real)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Protocolos suportados:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Suporte a IEEE802.3, IEEE802.3u, IEEE802.3ab</li>\r\n	<li>Suporte a IEEE802.1Q VLAN</li>\r\n	<li>Suporte a IEEE 802.1P QoS</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Gerenciamento de rede:</strong>&nbsp;Suporta telnet na interface serial e gerenciamento por software gr&aacute;fico na porta RJ45.</li>\r\n	<li><strong>Outras fun&ccedil;&otilde;es:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Support 1GMPv1/v2 protocol report, query and leave message mouse</li>\r\n	<li>Suporta DHCP snooping</li>\r\n	<li>Realiza erudi&ccedil;&atilde;o de endere&ccedil;os IPv4 baseado</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '1399466777.png', '', '', 'olt_fnl_2000.pdf', '', 'S'),
(6, '2014-05-07', '', 'OLT FNL 1000', 'olt-fnl-1000', '1 porta Ã³ptica SC. Suporte a funÃ§Ã£o OAM, implementando gerenciamento telnet , manutenÃ§Ã£o e atualizaÃ§Ã£o.', '', '1 porta Ã³ptica SC. Suporte a funÃ§Ã£o OAM, implementando gerenciamento telnet , manutenÃ§Ã£o e atualizaÃ§Ã£o.', '<ul>\r\n	<li><strong>Comprimento de onda:</strong> 1310(RX) /1490(TX)</li>\r\n	<li><strong>Pot&ecirc;ncia &oacute;ptica:</strong> +2 ~ +7dBm</li>\r\n	<li><strong>Sensibilidade de recep&ccedil;&atilde;o:</strong> -27dBm</li>\r\n	<li><strong>Dist&acirc;ncia m&aacute;xima:</strong> 20 km</li>\r\n	<li><strong>Capacidade:</strong> 1 PON, 64 ONU&rsquo;s</li>\r\n	<li><strong>MAC:</strong> 4K</li>\r\n	<li><strong>Porta Uplink:</strong> 1 porta Ethernet 10/100/1000 RJ45</li>\r\n	<li><strong>Portas PON:</strong> 1 porta &oacute;ptica SC</li>\r\n	<li><strong>Porta de gerenciamento:</strong> RJ45, RS232 para depurrar o dispositivo</li>\r\n	<li><strong>MTBF:</strong> 100.000 horas</li>\r\n	<li><strong>Tratamento EPON:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Opera segundo o padr&atilde;o IEEE802.3ah</li>\r\n	<li>Suporta DBA com um m&iacute;nimo de 1 Kbps ajust&aacute;veis</li>\r\n	<li>Suporta 1,25 Gbps de largura de banda sim&eacute;trica (Uplink e Downlink)</li>\r\n	<li>Suporte AES-128 de encripta&ccedil;&atilde;o para cada link identificador l&oacute;gico</li>\r\n	<li>Suporte a fun&ccedil;&atilde;o OAM, implementando gerenciamento telnet , manuten&ccedil;&atilde;o e atualiza&ccedil;&atilde;o.</li>\r\n	<li>Opera auto discovery e auto register da ONU (opera&ccedil;&atilde;o em tempo real)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Protocolos suportados:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Suporte a IEEE802.3, IEEE802.3u, IEEE802.3ab</li>\r\n	<li>Suporte a IEEE802.1Q VLAN</li>\r\n	<li>Suporte a IEEE 802.1P QoS</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Gerenciamento de rede:</strong>&nbsp;Suporta telnet na interface serial e gerenciamento por software gr&aacute;fico na porta RJ45.</li>\r\n	<li><strong>Outras fun&ccedil;&otilde;es:</strong></li>\r\n</ul>\r\n\r\n<ul style="margin-left:40px">\r\n	<li>Support 1GMPv1/v2 protocol report, query and leave message mouse</li>\r\n	<li>Suporta DHCP snooping</li>\r\n	<li>Realiza erudi&ccedil;&atilde;o de endere&ccedil;os IPv4 baseado</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '1399466763.png', '', '', 'olt_fnl_1000.pdf', '', 'S'),
(7, '2014-05-07', '', 'FONTE POE FNPS 48', 'fonte-poe-fnps-48', 'Comprimento Cabo: 94 (cm). Peso: 160g. Conector AC: IEC-320 C6. Conector LAN/POE: RJ45 Shielded Socket.', '', 'Comprimento Cabo: 94 (cm). Peso: 160g. Conector AC: IEC-320 C6. Conector LAN/POE: RJ45 Shielded Socket.', '<ul>\r\n	<li><strong>Voltagem Output:</strong> 48 VDC</li>\r\n	<li><strong>Corrente Output:</strong> 0.4A</li>\r\n	<li><strong>Voltagem Input:</strong> 90 ~ 260 VAC</li>\r\n	<li><strong>Freq&uuml;&ecirc;ncia Input:</strong> 47 ~ 63 Hz</li>\r\n	<li><strong>Corrente Input:</strong> 0.3A @120VAC; 0.2A @230VAC</li>\r\n	<li><strong>Efici&ecirc;ncia:</strong> 70+%</li>\r\n	<li><strong>Output Ripple:</strong> 1% M&aacute;x</li>\r\n	<li><strong>Freq&uuml;&ecirc;ncia de chaveamento:</strong> 200kHz</li>\r\n	<li><strong>Temperatura de Opera&ccedil;&atilde;o:</strong> -10&deg; ~ +60&deg;C</li>\r\n	<li><strong>Temperatura de armazenamento:</strong> -20&deg; ~ +85&deg;C</li>\r\n	<li><strong>Dimens&otilde;es (C x L x A):</strong> 88 x 55 x 45 (mm)</li>\r\n	<li><strong>Comprimento Cabo:</strong> 94 (cm)</li>\r\n	<li><strong>Peso:</strong> 160g</li>\r\n	<li><strong>Conector AC:</strong> IEC-320 C6</li>\r\n	<li><strong>Conector LAN/POE:</strong> RJ45 Shielded Socket</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '1399466731.png', '', '', 'fonte_poe_fnps_48.pdf', '', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profotos`
--

CREATE TABLE IF NOT EXISTS `profotos` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Produto` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ID_Produtos` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Legenda` varchar(165) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Destaque` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `profotos`
--

INSERT INTO `profotos` (`ID`, `Produto`, `ID_Produtos`, `Legenda`, `Destaque`) VALUES
(31, '1399666964.jpg', '3', 'OLT FNL 5000', 'S'),
(32, '1399667164.jpg', '6', 'OLT FNL 1000', 'S'),
(34, '1399667552.jpg', '7', 'FONTE POE FNPS 48', 'S'),
(30, '1399666893.jpg', '3', 'OLT FNL 5000', 'N'),
(33, '1399667316.jpg', '5', 'OLT FNL 2000', 'S'),
(26, '1399665882.jpg', '2', 'PACPON ONU', 'S'),
(27, '1399665917.jpg', '2', 'PACPON ONU', 'N'),
(28, '1399665942.jpg', '2', 'PAC Switch POE', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Arquivo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ativo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Legenda` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `uploads`
--

INSERT INTO `uploads` (`ID`, `Arquivo`, `Ativo`, `Data`, `Legenda`) VALUES
(37, '1399655208.png', 'S', '2014-05-09 17:06:48', 'qwerqr'),
(38, '1400032791.jpg', 'S', '2014-05-14 01:59:51', 'Veja a matÃ©ria completa em: O Globo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
