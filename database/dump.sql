CREATE DATABASE  IF NOT EXISTS `letsfly` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `letsfly`;
-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: letsfly
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

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
-- Table structure for table `new_destination`
--

DROP TABLE IF EXISTS `new_destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_destination`
--

LOCK TABLES `new_destination` WRITE;
/*!40000 ALTER TABLE `new_destination` DISABLE KEYS */;
INSERT INTO `new_destination` VALUES (1,'Curitiba','Jardim botânico de Curitiba é um dos principais pontos turísticos da cidade de Curitiba','image_01.jpg','2018-08-05 21:07:34'),(2,'Salvador','Praias, música, museus, cultura, teatros, carnaval, patrimônio histórico. São muitas as opções turísticas da capital baiana, a primeira cidade fundada no Brasil.','image_02.jpg','2018-08-05 21:07:34'),(3,'Maceió','Os viajantes visitam Maceió por suas praias impressionantes, consideradas algumas das melhores no Brasil. As dunas de Marapé, localizadas onde o rio encontra o mar, são particularmente notáveis, e lá você pode nadar em água salgada e doce.','image_03.jpg','2018-08-05 21:07:34'),(4,'Natal','Natal, conhecida por seus incontáveis dias ensolarados, é a cidade perfeita para quem quer descansar em frente ao mar. Ponta Negra é o lugar preferido dos turistas, mas a viagem não deve se resumir a isso. Quem vai a Natal não pode ficar preso à cidade - o litoral sul e o norte têm muito a oferecer e fazem parte do roteiro de quem quer desfrutar dos melhores lugares do Rio Grande do Norte','image_04.jpg','2018-08-05 21:07:34'),(5,'Trancoso / Bahia','Trancoso, entretanto, ganhou um upgrade que elevou seus serviços à categoria cinco estrelas - mas sem perder o charme, o astral e a ternura.\n\nO povoado, hoje, tem pousadas sofisticadas, lojas de grife e restaurantes estrelados que atraem ricos e famosos.','image_05.jpg','2018-08-05 21:07:34'),(6,'Florianopolis','O mar está sempre presente na imagem cotidiana do manezinho e é o grande atrativo da cidade. O visual por toda a ilha é deslumbrante, com muito verde, espaço para trilhas e esportes radicais.','image_06.jpg','2018-08-05 21:07:34'),(7,'Rio de Janeiro ','O destino mais famoso do Brasil é cercado por belas praias e pelo verde da Mata Atlântica presente em quase toda a cidade. Um destino perfeito para quem adora curtir a vida agitada de uma grande metrópole e desfrutar de belos cenários naturais ao mesmo tempo\n\nA cidade do Rio de Janeiro é a segunda maior metrópole do Brasil e está localizada no Sudeste do país. Carinhosamente apelidada de cidade maravilhosa, esse é sem dúvidas o destino turístico número um do Brasil. Sendo internacionalmente conhecida por diversos ícones culturais e paisagísticos, como o Pão de Açúcar, a estátua do Cristo Redentos (uma das sete maravilhas do mundo moderno) e as praias e bairros de Copacabana, Ipanema e Barra da Tijuca, a cidade é recheada de lugares para conhecer durante uma visita ao destino','image_07.jpg','2018-08-05 21:07:34'),(8,'Jericoacoara','Um lugar para amar, sorrir, se divertir, dançar, cantar. Jeri é uma vila que nos surpreende para muito além da sua beleza. É estimulante, encantadora. Em suas ruas de areia as línguas de todas as partes do mundo se misturam, dialogam. Jeri é a kite surf, Jeri é Wind Surf. Jeri é SUP. Yoga. Pilates. Capoeira. Zumba. \nJeri também é noite. Tem forró a luz do luar, xote arrasta pé pra não deixar ninguém parado sob o brilho das estrelas. Jeri também é samba, samba de raiz. Tem música ao vivo, hotéis de charme, bares transados, restaurantes fantásticos. Jeri é pé no chão. Sem postes de iluminação para não ofuscar a luz da lua e das estrelas, turistas circulam por suas ruas de areia sem interferências visuais, tem um toque a mais, ','image_08.jpg','2018-08-05 21:07:34'),(9,'Tocantins / Jalapão','Destino já conhecido pelos apaixonados pelo ecoturismo e turismo de aventura. Localizada no Estado do Tocantins, a região encanta por suas águas abundantes, chapadões e serras com clima de savana, além da paisagem de cerrado, com direito a dunas alaranjadas, rios encachoeirados, nascentes e impressionantes formações rochosas.','image_09.jpg','2018-08-05 21:07:34');
/*!40000 ALTER TABLE `new_destination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Passageira grávida','Todos os tipos de companhias aéreas permitem a viagem de mulheres grávidas. No entanto, existem diferenças de acordo com o tempo de gravidez da gestante.\n\nLembre-se: toda mulher grávida deve consultar o médico antes do voo e, depois do sétimo mês de gestação, a gestante precisa solicitar atestado médico permitindo a viagem.\n\nÉ importante que a mulher grávida informe ao médico sobre situações de aborto prévio, sangramentos, diabete, pressão alta ou parto prematuro prévio.\n\nA passageira grávida não pode se esquecer de levar seus documentos pessoais, o atestado médico da gestante e o cartão pré-natal para o embarque. No aeroporto, será solicitada a assinatura de um termo de responsabilidade pela passageira grávida.\n\nNo nono mês de gravidez, é exigido o acompanhamento de um médico. Durante o voo, a gestante deve cuidar para não permanecer na mesma posição, principalmente em viagens longas, e hidratar-se sempre que possível, já que o ar dentro do avião é seco. Também, é fundamental que a gestante leve consigo remédios que possam ser necessários.\n\nCada companhia aérea tem suas especificidades, e é indispensável avisar da condição de gestante durante a compra de passagem aérea.','image_01.jpg','2018-08-05 20:26:40'),(2,'Viagem Internacional','Para embarcar em alguns voos internacionais, é necessário ter passaporte. Porém, se o país de destino é membro do Mercosul ou tem acordo de viagem com o Brasil (Argentina, Paraguai, Uruguai, Chile, Venezuela e Bolívia), os documentos abaixo também podem ser utilizados:\n\n• Carteira de Identidade (RG);\n\n• Registro de Identidade Civil (RIC);\n\n• Cédula de Identidade de Estrangeiro expedida pela Polícia Federal (RNE).\n\n- Maiores de 18 anos: Passaporte com validade mínima de seis meses (ou conforme exigência do país visitado) ou documento de RG original em bom estado e com emissão há menos de 10 anos.\n\n- Menores de 18 anos: passaporte ou documento de RG (certidão de nascimento não é aceita)','image_02.jpg','2018-08-05 20:26:40'),(3,'Cartão de Embarque Eletrônico','No Brasil, as principais companhias aéreas já dão a oportunidade de o passageiro utilizar o bilhete eletrônico. Atualmente, TAM, Gol, Azul e Avianca e Lan operam também com o cartão eletrônico de passagem. O passageiro deve ficar atento, já que cada companhia aérea tem sua politica com relação ao cartão de embarque eletrônico e modos diferentes de operá-los.\n\nConforme a rota e as opções da assinatura do telefone fixo ou celular do passageiro, o cliente pode receber o cartão de embarque por e-mail. A qualidade do código de barras será a mesma, seja qual for a forma pela qual ele receber o cartão de embarque eletrônico.\n\nQuanto à bagagem, os passageiros que possuem apenas a bagagem de mão podem se dirigir diretamente à sala de embarque, onde terão que apresentar o cartão de embarque eletrônico através do celular quando passarem pela segurança ou imigração e, também, no momento do embarque. Já os passageiros que necessitam despachar a bagagem também deverão apresentar o cartão no balcão da companhia aérea ao entregarem suas malas no guichê.\nSegundo a Infraero, essa tecnologia para a leitura de QR Code dos cartões de embarque já está presente em 41 de seus terminais, o que é equivalente a 65% da rede.','image_03.jpg','2018-08-05 20:26:40'),(4,'Auto check-in no aeroporto','Para evitar filas para check-in, portando seu código de reserva você pode usar os totens de check-in localizados na maioria dos aeroportos.\n\nAuto check-in passo a passo:\n\n1. No aeroporto, encontre uma máquina/totem de auto check-in correspondente à companhia aérea com a qual você viajará.\n2. Digite na máquina as informações do documento de identidade que utilizou para comprar o bilhete, e o código de confirmação da reserva.\n3. Se a máquina permitir, você pode escolher o seu assento no avião ou a máquina escolherá automaticamente.\n4. Leve o cartão de embarque impresso - é necessário para embarcar no avião.\n\nEm alguns aeroportos, a opção de auto check-in só é possível quando o passageiro possui apenas a bagagem de mão.\n\nAlguns grandes aeroportos possibilitam o auto check-in com a bagagem despachada. Nesse caso, a bagagem deve ser entregue no ponto de descarga de bagagens (baggage drop-off point).\n\nO auto-check-in no aeroporto é gratuito.\n\nCheck-in dos passageiros de primeira classe\n\nAos passageiros que compraram lugares na primeira classe (em algumas companhias aéreas, também na classe executiva), as companhias aéreas regulares oferecem pontos de check-in especiais. Graças a isso, os viajantes da primeira classe podem contar com envio de bagagem rápido e eficiente no aeroporto. Os pontos de check-in para passageiros da primeira classe são especialmente marcados, assim como pontos adicionais de verificação de segurança rápida.\n\nOs passageiros da primeira classe também podem, utilizar o check-in online, o auto check-in ou o check-in por telefone.','image_04.jpg','2018-08-05 20:26:40'),(5,'Menores desacompanhados','Crianças entre 5 e 12 anos anos incompletos (obrigatório).\nAdolescentes entre 12 e 18 anos incompletos (opcional. Em caso de voo com conexão, verificar com a Companhia aérea correspondente).\n\nCondições\nNão está disponível para crianças que precisam de atestado médico para viajar\nAs crianças devem ser capazes de se alimentar e de responder às necessidades básicas de higiene, bem como se movimentar sozinhas em caso de evacuação e responder às instruções de segurança do voo\nAs crianças não podem viajar com animais domésticos na cabine ou no compartimento de carga do avião\nEstá disponível apenas em itinerários operados pela LATAM sem voos compartilhados com outras companhias aéreas\nNas conexões, não pode haver troca de aeroporto\nQuando houver conexão, o próximo voo precisa ocorrer em até 4 horas após o desembarque \nO serviço não está disponível no caso de reservas de trechos feitos separadamente\nVocê poderá solicitar a devolução do serviço somente antes da partida do voo\nNo avião, a criança desacompanhada será acomodada na parte de trás do avião, de forma que a tripulação tenha mais visibilidade e controle. Elas serão as primeiras a embarcar e as últimas a deixar o avião\nMenores até 14 anos não podem viajar desacompanhados em voos da American Airlines e United Airlines. Para fazê-lo, o serviço para menor desacompanhado deve ser contratado junto às empresas diretamente. A American Airlines, United Airlines e LATAM Airlines não autorizam menor desacompanhado em voos de conexão com outras companhias aéreas. Sugerimos entrar em contato com o Central de Vendas, Fidelidade e Serviços ou procurar por nossas lojas de atendimento antes de comprar a passagem.','image_05.jpg','2018-08-05 20:26:40'),(6,'Contrate um seguro de viagem','Sempre faça um seguro de viagem! Parece óbvio, mas muitas pessoas não se incomodam com isso e acabam perdendo muito dinheiro quando as coisas dão errado…','image_06.jpg','2018-08-05 20:26:40');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-08 16:36:21
