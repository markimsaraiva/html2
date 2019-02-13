<?PHP
$woe = $SQL->query("
	SELECT w.id AS id, w.time AS time, g.name AS guild, p.name AS name, w.started AS start, w.guild AS guild_id
		FROM woe AS w
	INNER JOIN players AS p
		ON p.id = w.breaker
	INNER JOIN guilds AS g
		ON g.id = w.guild
	ORDER BY id DESC LIMIT 10;	
");

foreach ($woe as $k=>$v) {
	$winners .="
		<TR BGCOLOR=\"".$config['site'][($k % 2 == 1 ? 'light' : 'dark').'border']."\">
			<TD>{$v[id]}</TD>
			<TD><a href='index.php?subtopic=guilds&action=show&guild=" . $v[guild_id] . "'>$v[guild]</a></TD>
			<TD>{$v[name]}</TD>
			<TD>" . date("d/m/y   H:i:s", $v[start]) . "</TD>
			<TD>" . date("d/m/y   H:i:s", $v[time]) . "</TD>
		</TR>
	";
}
$main_content .= '
<center><h1><img src="woe.png"></h1></center>
<br>
';

if(!$winners) {
	$main_content .= '
		<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%>
			<TR BGCOLOR="'.$config['site']['vdarkborder'].'">
				<TD CLASS=white>
					<B>Vencedor do War of Emperium</B>
				</TD>
			</TR>
			<TR BGCOLOR='.$config['site']['darkborder'].'>
				<TD>
					Ainda n&atilde;o h&aacute; vencedores no War of Emperium do '.$config['server']['serverName'].' .
				</TD>
			</TR>
		</TABLE>
		<br>';
} else {
	$main_content .= "
		<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%>
			<TR BGCOLOR=\"{$config['site']['vdarkborder']}\">
				<TD CLASS=white width=5%>
					<B>No.</B>
				</TD>
				<TD CLASS=white width=30%>
					<B>Winner guild</B>
				</TD>
				<TD CLASS=white width=25%>
					<B>Conquest by</B>
				</TD>
				<TD CLASS=white width=20%>
					<B>Start time</B>
				</TD>
				<TD CLASS=white width=20%>
					<B>Last conquest</B>
				</TD>
			</TR>
			$winners
		</TABLE>
	";
}
$main_content .='<table width="100%" cellspacing="1" cellpadding="6">

	<tr widht="100%" bgcolor="#505050">

		<th align="center">Informa&ccedil;&otilde;es do Castle</th>

	</tr>

	<tr widht="100%" bgcolor="#D4C0A1">

		<td>Todos os dias  as <font color="red"><b>20:00</b></font> horas, no qual as Guilds tentam dominar o castelo destruindo seus geradores.</td>

	</tr>

	<tr widht="100%" bgcolor="#F1E0C6">

		<td><b>A guild que ter o dominio do castelo ganhara durante o periodo que estiver dominando Hunts Exclusivase +15% de exp Extra.</b></td>

	</tr>

	
	<tr widht="100%" bgcolor="#F1E0C6">

		<td>Primeiro, &eacute; obrigatorio ter guild, depois &eacute; s&oacute; registra-la usando o comando <b>!guildjoin</b> .</td>

	</tr>

	<tr widht="100%" bgcolor="#D4C0A1">

		<td>Durante 30 minutos, as guilds tem que tentar tomar o m&aacute;ximo de controle do castelo War of Emperium. Ap&oacute;s uma das guilds ter destru&iacute;do o &uacute;ltimo gerador, ela ter&aacute; que defender o seu dom&iacute;nio no castelo evitando que outras guilds destruam o &uacute;ltimo Gerador novamente, isso durante o tempo restante do castelo. </td>

	</tr>

	<tr widht="100%" bgcolor="#F1E0C6">

		<td>Sempre que o evento come&ccedil;ar ira abri um teleporte no  <b>Templo de Do BaiakNew</b> poder&aacute; ser acessado por todos e tamb&eacute;m poder&aacute; tentar invadir o castelo apos digitar o comando <b>!guild</b> .</td>

	</tr>

	<tr widht="100%" bgcolor="#D4C0A1">

		<td>Para tomar controle do castle a guild ter&aacute; que destruir 3 Geradores localizados dentro do castelo, ap&oacute;s destruir os 2 primeiros geradores &agrave; Leste e Oeste, aparecer&aacute; 2 teleportes ao Norte e dar&aacute; acesso ao &uacute;ltimo Gerador.</td>

	</tr>

	<tr widht="100%" bgcolor="#F1E0C6">

		<td>

		Comandos &uacute;teis no castelo:

		<ul>

		<li>

		<b>!recall</b> s&oacute; pode ser executado pelo l&iacute;der da guild e cada 5 minutos, teletransporta todos os membros da guilda online ao lado dele.

		</li>

		<li>

		<b>/woe info</b> ver quanto tempo resta e quem est&aacute; dominando o castelo atualmente.

		</li>

		</td>

	</tr>

	<tr width="100%" bgcolor="#D4C0A1">

	</tr>

</table></center>

<center><object width="425" height="350"><embed src="http://www.youtube.com/v/dYH0Quwxw-U" type="application/x-shockwave-flash" width="425" height="350"></embed></object></center><br/> 

<br>
';

?>