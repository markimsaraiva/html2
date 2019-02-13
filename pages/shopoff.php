<?php header("Content-Type: text/html; charset=ISO-8859-1", true); 
$main_content .= '
<center><img src="images/shopoff.png"></center>
<br>
		<table cellpadding="4" cellspacing="1" width="98%">
			<tr bgcolor="'.$config['site']['vdarkborder'].'">
				<td colspan="2"><font class="white"><b>O que é o Shop Off?</b></font></td>
			</tr>
			<tr bgcolor="'.$config['site']['darkborder'].'">
				<td>
É um sistema que tem como objetivo fazer com que os jogadores vendam seus items de uma forma mais legal e eficiente.</td>
			</tr>
		</table>
		<br>
		<table cellpadding="4" cellspacing="1" width="98%">
			<tr bgcolor="'.$config['site']['vdarkborder'].'">
				<td colspan="2"><font class="white"><b>Como funciona?</b></font></td>
			</tr>
			<tr bgcolor="'.$config['site']['darkborder'].'">
				<td><p><strong>Segue abaixo os seguintes comandos usados:</strong><br><br />
<b>!shopoff on</b> - Para ligar o sistema, ao usar esse comando seu character se transforma em um NPC para vender seus devidos items.<br /><br />
<b>!shopoff off</b> - Para desligar o sistema.<br /><br />
<b>!shopoff add</b> - Para adicionar um item ao seu shop. Ex¹: !shopoffer add, nomedoitem, quantidade, preço. Ex²: !shopoffer add, magic plate armor, 1, 20000.<br /><br />
<b>!shopoff remove</b> - Para remover um item do seu shop. Ex¹: !shopoffer remove, nomedoitem, quantidade. Ex²: !shopoffer remove, magic plate armor, 1.<br /><br />
<b>!shopoff list</b> - Para saber a lista de items que voce esta vendendo.<br /><br />
<b>!shopoff help</b> - Para saber mais informaçoes.<br/><br/></p></td>
			</tr>
		</table>
		<br>
';
?>