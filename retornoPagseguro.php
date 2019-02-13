<?php

##############################################################
#                  Retorno Pagseguro API V2                  #
#         Autor: Pedro Sodré <pedro@pedrosodre.net>          #
#                        Versão: 1.00                        #
##############################################################

##############################################################
#                  VARIÁVEIS E CONFIGURAÇÕES                 #
##############################################################
$tokenpessoal = '13la89aso'; //Token Gerado Aleatóriamente 
$email = 'claytonguths@hotmail.com'; //E-mail pagseguro
$pagseguro_token = '6C02782389A943A1BBB0F71A6196A5B1'; //Token Pagseguro
$host = "localhost"; //Host MySQL
$user = "root"; //Usuário MySQL
$passwd = "s987d89s887tfgxxtsdsa"; //Senha MySQL
$db = "otxserver"; //Banco MySQL
$file = "./leticiaeuteamo.txt"; //Arquivo txt que salvara transacoes

//Sistema de promoções
$minimoValorPromocao = 30; // mínimo valor pra a promoção
$promocaoMultiplicador = 2; // multiplicador da promoção
//Segunda promocao 
$minimoValorPromocao2 = 150; // mínimo valor pra a promoção
$promocaoMultiplicador2 = 3; // multiplicador da promoção

/* Banco:

CREATE TABLE IF NOT EXISTS `PagSeguroTrans` (
  `TransacaoID` varchar(36) NOT NULL,
  `Account` varchar(200) DEFAULT NULL,
  `StatusTransacao` varchar(50) NOT NULL,
  `CliNome` varchar(200) NOT NULL,
  `CliEmail` varchar(200) NOT NULL,
  `Data_PagSeg` varchar(200) NOT NULL,
  `Data` datetime NOT NULL,
  `QntPontos` int(5) NOT NULL,
  `Valor` int(5) NOT NULL,
  UNIQUE KEY `TransacaoID` (`TransacaoID`,`StatusTransacao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

*/

//Receber Token Pessoal
if(isset($_GET['tokenpessoal'])){ //Caso existir
	$token = $_GET['tokenpessoal'];
	if($token == $tokenpessoal){ //Caso token pessoal esteja certo
		echo "Token Pessoal Validado <br />";
		if(isset($_POST['notificationCode'])){ //POST
			$notificationCode = $_POST['notificationCode']; //POST
			
			echo "Pagseguro Notification Code Validado <br />";
			
			$url_pagseguro = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?email='.$email.'&token='.$pagseguro_token.'';
			
			$conectapag = curl_init();
			curl_setopt($conectapag, CURLOPT_URL, $url_pagseguro);
			curl_setopt($conectapag, CURLOPT_TIMEOUT, 30);
			curl_setopt($conectapag, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($conectapag, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($conectapag, CURLOPT_SSL_VERIFYHOST, false);
			$retornopagseguro = curl_exec($conectapag);
			curl_close($conectapag);
			
			$xml = new SimpleXMLElement($retornopagseguro);
			
			$ret_reference = $xml->reference; //account
			$ret_code = $xml->code; //code
			$ret_date = $xml->date; //date
			$ret_grossAmount = $xml->grossAmount; //valor
			$ret_status = $xml->status; //3 = pago
			$ret_name = $xml->sender->name; //Nome
			$ret_email = $xml->sender->email; //e-mail
			$quant_pontos = intval($ret_grossAmount);			
			
			if($ret_status == '3'){
			
			$lnk = mysql_connect("$host", "$user", "$passwd") or die ('Nao foi possível conectar ao MySql: ' . mysql_error());
			
			mysql_select_db("$db", $lnk) or die ('Nao foi possível ao banco de dados selecionado no MySql: ' . mysql_error());	
			
			if($quant_pontos >= $minimoValorPromocao && $quant_pontos < $minimoValorPromocao2) {
				$quant_pontos = $quant_pontos * $promocaoMultiplicador;				
			}else if($quant_pontos >= $minimoValorPromocao2){
				$quant_pontos = $quant_pontos * $promocaoMultiplicador2;		
			}
			
			$query_verify = "SELECT EXISTS(
SELECT * FROM `PagSeguroTrans` WHERE `TransacaoID` = '$ret_code'
);";
			$tst = mysql_query($query_verify);
			$verificar = mysql_fetch_row($tst);
			
				if($verificar[0] == false) {
				
					echo "Pontos ainda não adicionados <br />";
				
					$ret_reference = str_replace("-sv","",$ret_reference);//remover -sv da account caso tenha
					mysql_query("INSERT into PagSeguroTrans SET
							TransacaoID='$ret_code',
							Account='$ret_reference',
							StatusTransacao='$ret_status',
							CliNome='$ret_name',
							CliEmail='$ret_email',
							Data_PagSeg='$ret_date',
							Data=now(),
							QntPontos='$quant_pontos',
							Valor='$ret_grossAmount';			
								");
					
					mysql_query("UPDATE accounts SET premium_points = premium_points + '$quant_pontos' WHERE name = '".htmlspecialchars(strtolower($ret_reference))."'");
					
					
					$ret_datex = str_replace("T", " ", $ret_date);
					$ret_datex = str_replace(".000-03:00", "", $ret_datex);
					$myfile = file_put_contents($file, "$ret_datex | $ret_reference | R$ $ret_grossAmount | $quant_pontos Pontos".PHP_EOL , FILE_APPEND);
					
					echo "Pontos adicionados <br />";
			
				}
				
			}
		}
	}
}
?>