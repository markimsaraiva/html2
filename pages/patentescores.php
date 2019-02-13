<?php
	$limitt = 100; 
	$patentes = array(
		1 => "Bronze IV",
		2 => "Bronze III",
		3 => "Bronze II",
		4 => "Bronze I",
		5 => "Silver IV",
		6 => "Silver III",
		7 => "Silver II",
		8 => "Silver I",
		9 => "Gold IV",
		10 => "Gold III",
		11 => "Gold II",
		12 => "Gold I",
		13 => "Platinum III",
		14 => "Platinum II",
		15 => "Platinum I",
		16 => "Diamond III",
		17 => "Diamond II",
		18 => "Diamond I",
		19 => "Master II",
		20 => "Master I",
		21 => "Challenger"

	);
	
	$zap = $SQL->query('SELECT p.name,s.value as army_level FROM players p INNER JOIN player_storage s ON p.id = s.player_id WHERE s.key = 2014159 ORDER BY s.value DESC LIMIT 0,50;'); 
	$number_of_rows = 0; 
	$main_content .= '
		<center><h2>Patentes Score</h2></center>
		<TABLE BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100%>
	<tr bgcolor="#af2126">
		<td><font color="white">Nome</font></td>
		<td><font color="white">Patente</font></td>
	</tr>
	';	
	foreach($zap as $wynik) { 
	if(!is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; }
		$number_of_rows++; 
		$patente = $patentes[$wynik['army_level']];
	$main_content .= '
	<tr bgcolor="'.$bgcolor.'">
		<td>
			<a href="index.php?subtopic=characters&name='.urlencode($wynik['name']).'">
			<b> '.$wynik['name'].' </b></a>
		</td>
		<td>
			<img style="width:44px;height:44px;" src="/patentes/' . $wynik['army_level'] . '.png"/>  ' . $patente . '
		</td>
	</tr>
		';
	}
	$main_content .= '
		</tr>	
	</table>
	</br>
	<center>STAFF GRAN BAIAK</a>.</center>
	';

?>
