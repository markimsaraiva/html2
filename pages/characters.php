<?php
if(!defined('INITIALIZED'))
	exit;

$name = '';
if(isset($_REQUEST['name']))
	$name = (string) $_REQUEST['name'];

if(!empty($name))
{
	$player = new Player();
	$player->find($name);
	if($player->isLoaded())
	{
		$number_of_rows = 0;
		$account = $player->getAccount();
		$main_content .= '<table border="0" cellspacing="1" cellpadding="4" width="100%"><tr bgcolor="'.$config['site']['vdarkborder'].'"><td colspan="2" style="font-weight:bold;color:white">Character Information</td></tr>';
		$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
		$main_content .= '<tr bgcolor="' . $bgcolor . '"><td width="20%">Name:</td><td style="font-weight:bold;color:' . (($player->isOnline()) ? 'green' : 'red') . '">' . htmlspecialchars($player->getName()) . '';
		if($player->isBanned() || $account->isBanned())
			$main_content .= '<span style="color:red">[BANNED]</span>';
		if($player->isNamelocked())
			$main_content .= '<span style="color:red">[NAMELOCKED]</span>';
		$main_content .= '<br /><img src="' . $config['site']['outfit_images_url'] . '?id=' . $player->getLookType() . '&addons=' . $player->getLookAddons() . '&head=' . $player->getLookHead() . '&body=' . $player->getLookBody() . '&legs=' . $player->getLookLegs() . '&feet=' . $player->getLookFeet() . '" alt="" /></td></tr>';

		$playerNamelocks = new DatabaseList('PlayerNamelocks');
		$filter = new SQL_Filter(new SQL_Field('player_id'), SQL_Filter::EQUAL, $player->getID());
		$playerNamelocks->setFilter($filter);
		if(count($playerNamelocks) > 0)
		{
			$old_names_text = array();
			foreach($playerNamelocks as $oldName)
			{
				$old_names_text[] = 'until ' . date("j F Y, g:i a", $oldName->getDate()) . ' known as <b>' . htmlspecialchars($oldName->getName()) . '</b>';
			}
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Old Names:</td><td>' . implode('<br />', $old_names_text) . '</td></tr>';
		}
		if(in_array($player->getGroup(), $config['site']['groups_support']))
		{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Group:</td><td>' . htmlspecialchars(Website::getGroupName($player->getGroup())) . '</td></tr>';
		}
		$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
		$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Sex:</td><td>' . htmlspecialchars((($player->getSex() == 0) ? 'female' : 'male')) . '</td></tr>';
		$expNext = Functions::getExpForLevel($player->getLevel() + 1);
		$expLeft = bcsub($expNext, $player->getExperience(), 0);
		$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
		$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Profession:</td><td>' . htmlspecialchars(Website::getVocationName($player->getVocation(), $player->getPromotion())) . '</td></tr>';	
		$v = $SQL->query('SELECT (SELECT COUNT(`death_id`) FROM `killers` k LEFT JOIN `player_killers` pk ON `k`.`id` = `pk`.`kill_id` LEFT JOIN `players` p ON `pk`.`player_id` = `p`.`id` WHERE `k`.`unjustified` >= 0 AND `player_id` = ' . $player->getId() . '), COUNT(`player_id`) FROM `player_deaths` WHERE `player_id` = '.$player->getId())->fetch();
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor='.$bgcolor.'><td>Kills and Deaths:</td><td>' . htmlspecialchars($v[0]) . ' kills and ' . htmlspecialchars($v[1]) . ' deaths</td></tr>';
		$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
		$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Level:</td><td>' . htmlspecialchars($player->getLevel()) . ' (You need <b>' . $expLeft . ' EXP</b> to Level <b>' . ($player->getLevel() + 1) . '</b>)</td></tr>';
		$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
		
		$rank_of_player = $player->getRank();
		if(!empty($rank_of_player))
		{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Guild:</td><td>' . htmlspecialchars($rank_of_player->getName()) . ' of the <a href="?subtopic=guilds&action=show&guild='. $rank_of_player->getGuild()->getID() .'">' . htmlspecialchars($rank_of_player->getGuild()->getName()) . '</a></td></tr>';
		}
		$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
		$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Last login:</td><td>' . (($player->getLastLogin() > 0) ? date("j F Y, g:i a", $player->getLastLogin()) : 'Never logged in.') . '</td></tr>';
		if($player->getCreateDate() > 0)
		{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Created:</td><td>' . date("j F Y, g:i a", $player->getCreateDate()) . '</td></tr>';
		}
		$comment = $player->getComment();
		$newlines = array("\r\n", "\n", "\r");
		$comment_with_lines = str_replace($newlines, '<br />', $comment, $count);
		if($count < 50)
			$comment = $comment_with_lines;
		if(!empty($comment))
		{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$main_content .= '<tr bgcolor="' . $bgcolor . '"><td>Comment:</td><td>' . $comment . '</td></tr>';
		}
				
		$hpPercent = max(0, min(100, $player->getHealth() / max(1, $player->getHealthMax()) * 100));
		$manaPercent = max(0, min(100, $player->getMana() / max(1, $player->getManaMax()) * 100));
		$main_content .= '</TABLE><br><center><table width=25% ><td BGCOLOR="'.$config['site']['lightborder'].'" ><b>Health:</b></td>
		<td BGCOLOR="'.$config['site']['lightborder'].'">'.$player->getHealth().'/'.$player->getHealthMax().'<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: red; width: ' . $hpPercent . '%; height: 3px;"></td>
		<tr><td BGCOLOR="'.$config['site']['darkborder'].'"><b>Mana:</b></td><td BGCOLOR="'.$config['site']['darkborder'].'">' . $player->getMana() . '/' . $player->getManaMax() . '<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: blue; width: '.$manaPercent.'%; height: 3px;"></table></td>';
		
		$itemsList = $player->getItems();		
		$main_content .= '<br><table with=100% style="border: solid 1px #888888;" CELLSPACING="1"><TR>';			
		
		foreach ($list as $number_of_items_showed => $slot)
		{
			if($slot == '8') // add Soul before show 'feet'
			{
				$main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Soul:<br/>'. $player->getSoul() .'</td>';
			}
			if($itemsList->getSlot($slot) === false) // item does not exist in database
			{
				$main_content .= '<TD style="background-color: '.$config['site']['darkborder'].';"><img src="' . $config['site']['item_images_url'] . $slot . $config['site']['item_images_extension'] . '" width="45"/></TD>';
			}
			else
			{
				$main_content .= '<TD style="background-color: '.$config['site']['darkborder'].';"><img src="' . $config['site']['item_images_url'] . $itemsList->getSlot($slot)->getID() . $config['site']['item_images_extension'] . '" width="45"/></TD>';
			}
			if($number_of_items_showed % 3 == 2)
			{
				$main_content .= '</tr><tr>';
			}
			if($slot == '8') // add Capacity after show 'feet'
			{
				$main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Cap:<br/>'. $player->getCap() .'</td></center>';
			}
		}

		if($config['site']['show_skills_info'])
		{
			$main_content .= '</table><br><table cellspacing="0" cellpadding="0" border="1" width="200">
				
				<tbody>
					<tr>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=experience&world=' . $player->getWorldID() . '"><img src="images/skills/level.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=magic&world=' . $player->getWorldID() . '"><img src="images/skills/ml.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=fist&world=' . $player->getWorldID() . '"><img src="images/skills/fist.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=club&world=' . $player->getWorldID() . '"><img src="images/skills/club.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=sword&world=' . $player->getWorldID() . '"><img src="images/skills/sword.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=axe&world=' . $player->getWorldID() . '"><img src="images/skills/axe.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=distance&world=' . $player->getWorldID() . '"><img src="images/skills/dist.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=shield&world=' . $player->getWorldID() . '"><img src="images/skills/def.gif" alt="" style="border-style: none"/></td>
						<td style="text-align: center;"><a href="?subtopic=highscores&list=fishing&world=' . $player->getWorldID() . '"><img src="images/skills/fish.gif" alt="" style="border-style: none"/></td>
					</tr>
					<tr>
						<tr bgcolor="' . $config['site']['darkborder'] . '"><td style="text-align: center;"><strong>Level</strong></td>
						<td style="text-align: center;"><strong>ML</strong></td>
						<td style="text-align: center;"><strong>Fist</strong></td>
						<td style="text-align: center;"><strong>Mace</strong></td>
						<td style="text-align: center;"><strong>Sword</strong></td>
						<td style="text-align: center;"><strong>Axe</strong></td>
						<td style="text-align: center;"><strong>Dist</strong></td>
						<td style="text-align: center;"><strong>Def</strong></td>
						<td style="text-align: center;"><strong>Fish</strong></td>
					</tr>
					<tr>
						<tr bgcolor="' . $config['site']['lightborder'] . '"><td style="text-align: center;">' . $player->getLevel() . '</td>
						<td style="text-align: center;">' . $player->getMagLevel().'</td>
						<td style="text-align: center;">' . $player->getSkill(0) . '</td>
						<td style="text-align: center;">' . $player->getSkill(1) . '</td>
						<td style="text-align: center;">' . $player->getSkill(2) . '</td>
						<td style="text-align: center;">' . $player->getSkill(3) . '</td>
						<td style="text-align: center;">' . $player->getSkill(4) . '</td>
						<td style="text-align: center;">' . $player->getSkill(5) . '</td>
						<td style="text-align: center;">' . $player->getSkill(6) . '</td>
					</tr>
				</tbody>
			</table>




			<div style="text-align: center;">&nbsp;<br />&nbsp;</div></center>';
		}

				$deads = 0;

		//deaths list
		$player_deaths = $SQL->query('SELECT ' . $SQL->fieldName('id') . ', ' . $SQL->fieldName('date') . ', ' . $SQL->fieldName('level') . ' FROM ' . $SQL->tableName('player_deaths') . ' WHERE ' . $SQL->fieldName('player_id') . ' = '.$player->getId().' ORDER BY ' . $SQL->fieldName('date') . ' DESC LIMIT 10');
		foreach($player_deaths as $death)
		{
			$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
			$deads++;
			$dead_add_content .= "<tr bgcolor=\"".$bgcolor."\"><td width=\"20%\" align=\"center\">".date("j M Y, H:i", $death['date'])."</td><td>";
			$killers = $SQL->query('SELECT ' . $SQL->tableName('environment_killers') . '.' . $SQL->fieldName('name') . ' AS monster_name, ' . $SQL->tableName('players') . '.' . $SQL->fieldName('name') . ' AS player_name, ' . $SQL->tableName('players') . '.' . $SQL->fieldName('deleted') . ' AS player_exists FROM ' . $SQL->tableName('killers') . ' LEFT JOIN ' . $SQL->tableName('environment_killers') . ' ON ' . $SQL->tableName('killers') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('environment_killers') . '.' . $SQL->fieldName('kill_id') . ' LEFT JOIN ' . $SQL->tableName('player_killers') . ' ON ' . $SQL->tableName('killers') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('player_killers') . '.' . $SQL->fieldName('kill_id') . ' LEFT JOIN ' . $SQL->tableName('players') . ' ON ' . $SQL->tableName('players') . '.' . $SQL->fieldName('id') . ' = ' . $SQL->tableName('player_killers') . '.' . $SQL->fieldName('player_id') . '  WHERE ' . $SQL->tableName('killers') . '.' . $SQL->fieldName('death_id') . ' = ' . $SQL->quote($death['id']) . ' ORDER BY ' . $SQL->tableName('killers') . '.' . $SQL->fieldName('final_hit') . ' DESC, ' . $SQL->tableName('killers') . '.' . $SQL->fieldName('id') . ' ASC')->fetchAll();

			$i = 0;
			$count = count($killers);
			foreach($killers as $killer)
			{
				$i++;
				if($i == 1)
				{
					if($count <= 4)
						$dead_add_content .= "killed at level <b>".$death['level']."</b> by ";
					elseif($count > 4 and $count < 10)
						$dead_add_content .= "slain at level <b>".$death['level']."</b> by ";
					elseif($count > 9 and $count < 15)
						$dead_add_content .= "crushed at level <b>".$death['level']."</b> by ";
					elseif($count > 14 and $count < 20)
						$dead_add_content .= "eliminated at level <b>".$death['level']."</b> by ";
					elseif($count > 19)
						$dead_add_content .= "annihilated at level <b>".$death['level']."</b> by ";
				}
				elseif($i == $count)
					$dead_add_content .= " and ";
				else
					$dead_add_content .= ", ";

				if($killer['player_name'] != "")
				{
					if($killer['monster_name'] != "")
						$dead_add_content .= htmlspecialchars($killer['monster_name'])." summoned by ";

					if($killer['player_exists'] == 0)
						$dead_add_content .= "<a href=\"?subtopic=characters&name=".urlencode($killer['player_name'])."\">";

					$dead_add_content .= htmlspecialchars($killer['player_name']);
					if($killer['player_exists'] == 0)
						$dead_add_content .= "</a>";
				}
				else
					$dead_add_content .= htmlspecialchars($killer['monster_name']);
			}

			$dead_add_content .= "</td></tr>";
		}

		$main_content .= '<br />
			<table border="0" cellspacing="1" cellpadding="4" width="100%">
				<tbody><tr bgcolor="#505050"><td colspan="2" class="white">
					<img id="btnDeaths" style="vertical-align:middle;cursor:pointer;" src="images/show.gif"> 
					<b>Character Deaths</b></td>
				</tr></tbody>
			</table>';
			$main_content .= '<table id="tableDeaths" border="0" cellspacing="1" cellpadding="4" width="100%" style="display:none;">' . $dead_add_content . '</table>';
			
			//frags by Mateus Fiereck
			$frags_limit = 999; 
			$player_frags = $SQL->query('SELECT `player_deaths`.*, `players`.`name`, `killers`.`unjustified` FROM `player_deaths` LEFT JOIN `killers` ON `killers`.`death_id` = `player_deaths`.`id` LEFT JOIN `player_killers` ON `player_killers`.`kill_id` = `killers`.`id` LEFT JOIN `players` ON `players`.`id` = `player_deaths`.`player_id` WHERE `player_killers`.`player_id` = '.$player->getId().' AND `killers`.`unjustified` = 0 ORDER BY `date` DESC LIMIT 0,'.$frags_limit.';');
			if (count($player_frags)) {
				$main_content .= '<br />
			<table border="0" cellspacing="1" cellpadding="4" width="100%">
				<tbody><tr bgcolor="#505050"><td colspan="2" class="white">
					<img id="btnJustified" style="vertical-align:middle;cursor:pointer;" src="images/show.gif"> 
					<b>Frags Justified</b></td>
				</tr></tbody>
			</table>';
				
				$frags = 0; 
				$frag_add_content .= '<table id="tableJustified" border="0" cellspacing="1" cellpadding="4" width="100%" style="display:none;">'; 
				foreach($player_frags as $frag) {
					$frags++; 
					if (is_int($number_of_rows / 2)) $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 
					$number_of_rows++; 
					$frag_add_content .= "<tr bgcolor=\"".$bgcolor."\"> 
					<td width=\"20%\" align=\"center\">".date("j M Y, H:i", $frag['date'])."</td> 
					<td>".(($player->getSex() == 0) ? 'She' : 'He')." fragged <a href=\"index.php?subtopic=characters&name=".$frag['name']."\">".$frag['name']."</a> at level ".$frag['level'].""; 
					$frag_add_content .= ". (".(($frag['unjustified'] == 0) ? "<font size=\"1\" color=\"green\">Justified</font>" : "<font size=\"1\" color=\"red\">Unjustified</font>").")</td></tr>"; 
				}
				if($frags >= 1) 
					$main_content .= $frag_add_content . '</TABLE>'; 
			}
			
			$player_frags2 = $SQL->query('SELECT `player_deaths`.*, `players`.`name`, `killers`.`unjustified` FROM `player_deaths` LEFT JOIN `killers` ON `killers`.`death_id` = `player_deaths`.`id` LEFT JOIN `player_killers` ON `player_killers`.`kill_id` = `killers`.`id` LEFT JOIN `players` ON `players`.`id` = `player_deaths`.`player_id` WHERE `player_killers`.`player_id` = '.$player->getId().' AND `killers`.`unjustified` = 1 ORDER BY `date` DESC LIMIT 0,'.$frags_limit.';'); 
			if (count($player_frags2)) {
				$main_content .= '<br />
			<table border="0" cellspacing="1" cellpadding="4" width="100%">
				<tbody><tr bgcolor="#505050"><td colspan="2" class="white">
					<img id="btnUnjustified" style="vertical-align:middle;cursor:pointer;" src="images/show.gif"> 
					<b>Frags Unjustified</b></td>
				</tr></tbody>
			</table>';
				
				$frags2 = 0; 
				$frag_add_content2 .= '<table id="tableUnjustified" border="0" cellspacing="1" cellpadding="4" width="100%" style="display:none;">'; 
				foreach($player_frags2 as $frag) {
					$frags2++; 
					if (is_int($number_of_rows / 2)) $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 
					$number_of_rows++; 
					$frag_add_content2 .= "<tr bgcolor=\"".$bgcolor."\"> 
					<td width=\"20%\" align=\"center\">".date("j M Y, H:i", $frag['date'])."</td> 
					<td>".(($player->getSex() == 0) ? 'She' : 'He')." fragged <a href=\"index.php?subtopic=characters&name=".$frag['name']."\">".$frag['name']."</a> at level ".$frag['level'].""; 
					$frag_add_content2 .= ". (".(($frag['unjustified'] == 0) ? "<font size=\"1\" color=\"green\">Justified</font>" : "<font size=\"1\" color=\"red\">Unjustified</font>").")</td></tr>"; 
				}
				if($frags2 >= 1)
					$main_content .= $frag_add_content2 . '</TABLE>'; 
			}
			
			$main_content .= '<br />
			<table border="0" cellspacing="1" cellpadding="4" width="100%">
																		</tr></tbody>
			</table>';
			
			
			
			$main_content .= '<table id="tableTasks" border="0" cellspacing="1" cellpadding="4" width="100%" style="display:none;">';
			foreach ($tasks as $task) {
				$task_query = $SQL->query('SELECT `player_storage`.`value` FROM `player_storage` WHERE `player_storage`.`player_id` = '.$player->getId().' AND `player_storage`.`key` = '.$task[1].' ;');
				$qtd = 0;
				foreach ($task_query as $t) {
					if (is_numeric($t['value'])) {
						$qtd = $t['value'] - 1;
					} else {
						$qtd = $t['value'];
					}
				}
				
				if (is_int($number_of_rows / 2)) $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 
				$number_of_rows++;
				$main_content .= "<tr bgcolor=\"".$bgcolor."\"> 
				<td width=\"20%\" align=\"center\">".$task[0]."</td> 
				<td>".$qtd." / ".$task[2]."</td></tr>";
			} 
			$main_content .= '</table>';
			
			$main_content .= "
			<script>
			$(function() {
				$('#btnDeaths').click(function() {
					$('#tableDeaths').toggle();
					if ($(this).attr('src') == 'images/show.gif') {
						$(this).attr('src', 'images/hide.gif');
					} else {
						$(this).attr('src', 'images/show.gif');
					}
				});
				
				$('#btnJustified').click(function() {
					$('#tableJustified').toggle();
					if ($(this).attr('src') == 'images/show.gif') {
						$(this).attr('src', 'images/hide.gif');
					} else {
						$(this).attr('src', 'images/show.gif');
					}
				});
				
				$('#btnUnjustified').click(function() {
					$('#tableUnjustified').toggle();
					if ($(this).attr('src') == 'images/show.gif') {
						$(this).attr('src', 'images/hide.gif');
					} else {
						$(this).attr('src', 'images/show.gif');
					}
				});
				
				$('#btnTasks').click(function() {
					$('#tableTasks').toggle();
					if ($(this).attr('src') == 'images/show.gif') {
						$(this).attr('src', 'images/hide.gif');
					} else {
						$(this).attr('src', 'images/show.gif');
					}
				});
			})</script>";
				
			/*
			//frags list by Xampy 
            $frags_limit = 10; // frags limit to show? // default: 10 
            $player_frags = $SQL->query('SELECT `player_deaths`.*, `players`.`name`, `killers`.`unjustified` FROM `player_deaths` LEFT JOIN `killers` ON `killers`.`death_id` = `player_deaths`.`id` LEFT JOIN `player_killers` ON `player_killers`.`kill_id` = `killers`.`id` LEFT JOIN `players` ON `players`.`id` = `player_deaths`.`player_id` WHERE `player_killers`.`player_id` = '.$player->getId().' ORDER BY `date` DESC LIMIT 0,'.$frags_limit.';'); 
            if(count($player_frags)) 
            {
                $frags = 0; 
                $frag_add_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><br><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Frags List</B></TD></TR>'; 
                foreach($player_frags as $frag) 
                { 
                $frags++; 
                    if(is_int($number_of_rows / 2)) $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 
                    $number_of_rows++; 
                    $frag_add_content .= "<tr bgcolor=\"".$bgcolor."\"> 
                    <td width=\"20%\" align=\"center\">".date("j M Y, H:i", $frag['date'])."</td> 
                    <td>".(($player->getSex() == 0) ? 'She' : 'He')." fragged <a href=\"index.php?subtopic=characters&name=".$frag[name]."\">".$frag[name]."</a> at level ".$frag[level].""; 
 
                    $frag_add_content .= ". (".(($frag[unjustified] == 0) ? "<font size=\"1\" color=\"green\">Justified</font>" : "<font size=\"1\" color=\"red\">Unjustified</font>").")</td></tr>"; 
                } 
            if($frags >= 1) 
                $main_content .= $frag_add_content . '</TABLE>';  
			}
			*/

		

		if(!$player->getHideChar())
		{
						
			
			if($account->getRLName())
			{
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$main_content .= '<TR BGCOLOR="' . $bgcolor . '"><TD WIDTH=20%>Real name:</TD><TD>' . $account->getRLName() . '</TD></TR>';
			}
			if($account->getLocation())
			{
				$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
				$main_content .= '<TR BGCOLOR="' . $bgcolor . '"><TD WIDTH=20%>Location:</TD><TD>' . $account->getLocation() . '</TD></TR>';
			}
			if($account->isBanned())
			{
				if($account->getBanTime() > 0)
					$main_content .= '<font color="red"> [Banished until '.date("j F Y, G:i", $account->getBanTime()).']</font>';
				else
					$main_content .= '<font color="red"> [Banished FOREVER]</font>';
			}
			$main_content .= '</TD></TR></TABLE>';
			$main_content .= '<br><TABLE BORDER=0><TR><TD></TD></TR></TABLE><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD COLSPAN=5 CLASS=white><B>Characters</B></TD></TR>
			<TR BGCOLOR="' . $bgcolor . '"><TD><B>Name</B></TD><TD><B>World</B></TD><TD><B>Level</B></TD><TD><b>Status</b></TD><TD><B></B></TD></TR>';
			$account_players = $account->getPlayersList();
			$player_number = 0;
			foreach($account_players as $player_list)
			{
				if(!$player_list->getHideChar())
				{
					$player_number++;
					$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
					if(!$player_list->isOnline())
						$player_list_status = '<font color="red">Offline</font>';
					else
						$player_list_status = '<font color="green">Online</font>';
					$main_content .= '<TR BGCOLOR="' . $bgcolor . '"><TD WIDTH=30%><NOBR>'.$player_number.'. '.htmlspecialchars($player_list->getName());
					$main_content .= ($player_list->isDeleted()) ? '<font color="red"> [DELETED]</font>' : '';
					$main_content .= '</NOBR></TD><TD WIDTH=15%>'.$config['site']['worlds'][$player_list->getWorld()].'</TD><TD WIDTH=30%>'.$player_list->getLevel().' '.htmlspecialchars($vocation_name[$player_list->getPromotion()][$player_list->getVocation()]).'</TD><TD WIDTH="10%"><b>'.$player_list_status.'</b></TD><TD><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0><FORM ACTION="?subtopic=characters" METHOD=post><TR><TD><INPUT TYPE="hidden" NAME="name" VALUE="'.htmlspecialchars($player_list->getName()).'"><INPUT TYPE=image NAME="View '.htmlspecialchars($player_list->getName()).'" ALT="View '.htmlspecialchars($player_list->getName()).'" SRC="'.$layout_name.'/images/buttons/sbutton_view.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></FORM></TABLE></TD></TR>';
				}
			}
			$main_content .= '</TABLE></TD><TD></TD></TR></TABLE>';
		}
	}
	else
		$search_errors[] = 'Character <b>'.htmlspecialchars($name).'</b> does not exist.';	
}
if(!empty($search_errors))
{
	$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
	foreach($search_errors as $search_error)
		$main_content .= '<li>'.$search_error;
	$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
}
$main_content .= '<BR><FORM ACTION="?subtopic=characters" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=4><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'"><TABLE BORDER=0 CELLPADDING=1><TR><TD>Name:&nbsp;</TD><TD><INPUT NAME="name" VALUE=""SIZE=29 MAXLENGTH=29></TD><TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></TABLE></TD></TR></TABLE></FORM>';
$main_content .= '</TABLE>';

