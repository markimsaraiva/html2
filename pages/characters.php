<?PHP
date_default_timezone_set('America/Sao Paulo');
$name = stripslashes(ucwords(strtolower(trim($_REQUEST['name']))));
if(empty($name))
        $main_content .= 'Here you can get detailed information about a certain player on '.$config['server']['serverName'].'.<BR>  <FORM ACTION="?subtopic=characters" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=2><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'">
        <TABLE BORDER=0 CELLPADDING=1>
            <TR>
                <TD>Name:</TD>
                <TD><input name="name" maxlength="30" type="text" class="custom-field" value="" /></TD>
                <TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD>
            </TR>
        </TABLE></TD></TR></TABLE></FORM>';
else
{
    if(check_name($name)) 
    {
        $player = new Player();
        $player->find($name);
        if($player->isLoaded()) 
        {
            $account = $player->getAccount();
            $account_db = new Account();
            if($config['site']['show_flag'])
            {
                $flagg = $account->getCustomField("flag");
                $flag = '<image src="http://images.boardhost.com/flags/'.$flagg.'.png"/> ';
            }
            $main_content .= '<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%><TR><TD></TD><TD><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Character Information</B></TD></TR>';
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD WIDTH=20%>Name:</TD><TD>'.$flag.'<font color="';
                $main_content .= ($player->isOnline()) ? '' : '';
                $main_content .= '">'.$player->getName().'</font>';
                if($player->isDeleted())
                    $main_content .= '<font color="red"> [DELETED]</font>';
                if($player->isNameLocked())
                    $main_content .= '<font color="red"> [BANISHED ACCOUNT]</font>';
                $main_content .= '</TD></TR>';
                
            /*
            if($player->getOldName())
            {
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                    if($player->isNameLocked())
                        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Proposition:</TD><TD>'.$player->getOldName().'</TD></TR>';
                    else
                        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Old name:</TD><TD>'.$player->getOldName().'</TD></TR>';
            }
            */
            
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Sex:</TD><TD>';
                $main_content .= ($player->getSex() == 0) ? 'female' : 'male';
                $main_content .= '</TD></TR>';
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Profession:</TD><TD>' . htmlspecialchars(Website::getVocationName($player->getVocation(), $player->getPromotion())) . '</TD></TR>';
                    $v = $SQL->query('SELECT (SELECT COUNT(`death_id`) FROM `killers` k LEFT JOIN `player_killers` pk ON `k`.`id` = `pk`.`kill_id` LEFT JOIN `players` p ON `pk`.`player_id` = `p`.`id` WHERE `k`.`unjustified` >= 0 AND `player_id` = ' . $player->getId() . '), COUNT(`player_id`) FROM `player_deaths` WHERE `player_id` = '.$player->getId())->fetch();
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor='.$bgcolor.'><td>Kills and Deaths:</td><td>' . htmlspecialchars($v[0]) . ' kills and ' . htmlspecialchars($v[1]) . ' deaths</td></tr>';
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Level:</TD><TD>'.$player->getLevel().'</TD></TR>';
            {
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Residence:</TD><TD>'.$towns_list[$player->getWorld()][$player->getTownId()].'</TD></TR>';
            }
                        /*Vip Status
                
            $result = $SQL->query('SELECT * FROM `players` WHERE `id` = '.$player['vipacess'].';');
                
                */                {
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['darkborder']; } $number_of_rows++;  
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>VIP TEST:</TD><TD>';  
            $main_content .= ($account->getVipTime()) ? '<font color="#00CD00"><b>USED</b></font>' : '<font color="#FF0000"><b>NOT USED - Say !viptest</b></font>';
                }
            $house = $SQL->query( 'SELECT `houses`.`name`, `houses`.`town`, `houses`.`lastwarning` FROM `houses` WHERE `houses`.`world_id` = '.$player->getWorld().' AND `houses`.`owner` = '.$player->getId().';' )->fetchAll();
            if ( count( $house ) != 0 )
            {
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>House:</TD><TD colspan="2">';
                    $main_content .= $house[0]['name'].' ('.$towns_list[$player->getWorld()][$house[0]['town']].') is paid until '.date("j M Y G:i", $house[0]['lastwarning']).'</TD></TR>';
            }
            $rank_of_player = $player->getRank();
            if(!empty($rank_of_player))
            {
                {
                    $guild_id = $rank_of_player->getGuild()->getId();
                    $guild_name = $rank_of_player->getGuild()->getName();
                    if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Guild:</TD><TD>'.$rank_of_player->getName().' of the <a href="?subtopic=guilds&action=show&guild='.$guild_id.'">'.$guild_name.'</a></TD></TR>';
                }
            }
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $lastlogin = $player->getLastLogin();
                if(empty($lastlogin))
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Last login:</TD><TD colspan="2">Never logged in.</TD></TR>';
                else
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Last login:</TD><TD colspan="2">'.date("j F Y, g:i a", $lastlogin).'</TD></TR>';
                if($account->getCreateDate())
                {
                    if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                    $main_content .= '<TR BGCOLOR='.$config['site']['lightborder'].'><TD WIDTH=20%>Created:</TD><TD>'.date("j F Y, g:i a", $account->getCreateDate()).'</TD></TR>';
                }
            $comment = $player->getCustomField("comment");
            $newlines   = array("\r\n", "\n", "\r");
            $comment_with_lines = str_replace($newlines, '<br />', $comment, $count);
            if($count < 50)
                $comment = $comment_with_lines;
            if(!empty($comment))
                
            {
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD VALIGN=top>Comment:</TD><TD>'.$comment.'</TD></TR>';
            }
if(!$player->getHideChar()) 
            {
    '</TD></TR>';
    
                $group = $player->getGroup();
            if ($group == 2){$group_name = 'Tutor';}
            if ($group == 4){$group_name = 'Gamemaster';}
            if ($group == 5){$group_name = 'Community Manager';}
            if ($group == 6){$group_name = 'Fundador/Criador';}
            if ($group == 7){$group_name = 'Administrador';}
            if($group != 1)
            if($group != 3)
            {
               
                $main_content .= '<TR BGCOLOR='.$config['site']['darkborder'].'><TD>Position:</TD><TD>'.$group_name.'</TD></TR>';
            }            
                
                
                $name = $account->getRLName();
                if(!empty($name)){
                $main_content .= '<TR BGCOLOR='.$config['site']['lightborder'].'><TD WIDTH=20%>Real Name:</TD><TD>'.$account->getRLName().'</TD></TR>';    
                }
                $location = $account->getLocation();
                if(!empty($location)){
                $main_content .= '<TR BGCOLOR='.$config['site']['darkborder'].'><TD WIDTH=20%>Location:</TD><TD>'.$account->getLocation().'</TD></TR>';
                }            
            }
            $main_content .= '</TABLE>';            
                $main_content .= '</TD></TR></TABLE>';
                        $main_content .= '</TR></TABLE>';
                        
 //modified status scripts by ballack13
 //rogaforyn2 tried to edit this to get more hide and show stuffs
   $main_content .= '<br />
            <table border="0" cellspacing="1" cellpadding="4" width="100%">
                <tbody><tr bgcolor="#505050"><td colspan="2" class="white">
                    <img id="btnItems" style="vertical-align:middle;cursor:pointer;" src="images/show.gif"> 
                    <b>Equipments</b></td>
                </tr></tbody>
            </table>';  
$main_content .= '<table id="tableItems" style="display:none;" width=100%><tr>';
//equipment shower by ballack13
$id = $player->getCustomField("id");
$number_of_items = 1;
$main_content .= '<td align=center><table with=100% style="border: solid 1px #888888;" CELLSPACING="1"><TR>';
$list = array('2','1','3','6','4','5','9','7','10','8');
foreach ($list as $pid => $name) {
$top = $SQL->query('SELECT * FROM player_items WHERE player_id = '.$id.' AND pid = '.$list[$pid].';')->fetch();
if($top[itemtype] == false) {
if($list[$pid] == '8') {
$main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Soul:<br/>'.$player->getSoul().'</td>';
}
if(is_int($number_of_items / 3)){
$main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$list[$pid].'.gif"/></TD></tr><tr>';
} else {
$main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$list[$pid].'.gif"/></TD>';
}
$number_of_items++;
}
else
{
if($list[$pid] == '8') {
$main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Soul:<br/>'.$player->getSoul().'</td>';
}
if(is_int($number_of_items / 3))
$main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$top[itemtype].'.gif" width="45"/></TD></tr><tr>';
else
$main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$top[itemtype].'.gif" width="45"/></TD>';
$number_of_items++;
}
if($list[$pid] == '8') {
$main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Cap:<br/>'.$player->getCap().'</td>';
}
}
$main_content .= '</tr></TABLE></td>';
//Hp/Mana/Exp Status by ballack13
$hp = ($player->getHealth() / $player->getHealthMax() * 100);
$main_content .= '<td align=center ><table width=100%><tr><td align=center><table CELLSPACING="1" CELLPADDING="4"><tr><td BGCOLOR="#D4C0A1" align="left" width="20%"><b>Player Health:</b></td>
<td BGCOLOR="#D4C0A1" align="left">'.$player->getHealth().'/'.$player->getHealthMax().'<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: red; width: '.$hp.'%; height: 3px;"></td></tr>';
if ($player->getManaMax() > 0) {
$mana = ($player->getMana() / $player->getManaMax() * 100);
$main_content .= '<tr><td BGCOLOR="#F1E0C6" align="left"><b>Player Mana:</b></td><td BGCOLOR="#F1E0C6" align="left">'.$player->getMana().'/'.$player->getManaMax().'<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: blue; width: '.$mana.'%; height: 3px;"></td>'; 
} else {
$main_content .= '<tr><td BGCOLOR="#F1E0C6" align="left"><b>Player Mana:</b></td><td BGCOLOR="#F1E0C6" align="left">0/0<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: blue; width: 100%; height: 3px;"></td>'; }
$main_content .= '</tr></table><tr>';
$next = ($player->getLevel() + 1);
$exp = ((50 / 3) * ($player->getLevel() * $player->getLevel() * $player->getLevel()) - (100 * ($player->getLevel() * $player->getLevel())) + ((850/3) * $player->getLevel()) - 200);
$expnext = ((50 / 3) * ($next * $next * $next) - (100 * ($next * $next)) + ((850/3) * $next) - 200 - $player->getExperience());
$expresult = ($expnext / (($expnext + $player->getExperience()) - $exp) * 100);
$main_content .= '<tr><table CELLSPACING="1" CELLPADDING="4"><tr><td BGCOLOR="'.$config['site']['lightborder'].'" align="left" width="20%"><b>Player Level:</b></td><td BGCOLOR="'.$config['site']['lightborder'].'" align="left">'.$player->getLevel().'</td></tr>
<tr><td BGCOLOR="'.$config['site']['darkborder'].'" align="left"><b>Player Experience:</b></td><td BGCOLOR="'.$config['site']['darkborder'].'" align="left">'.$player->getExperience().' EXP.</td></tr>
<tr><td BGCOLOR="'.$config['site']['lightborder'].'" align="left"><b>To Next Level:</b></td><td BGCOLOR="'.$config['site']['lightborder'].'" align="left">You need <b>'.$exp.' EXP</b> to Level <b>'.$next.'</b>.<div title="99.320604545 %" style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: red; width: '.$expresult.'%; height: 3px;"></td></tr></table></td></tr></table></tr></TABLE></td>';
if($config['site']['show_skills_info']) {
//Skills Pics v2. Table borders optimized by Absolute Mango     
$main_content .= '
</tr></tbody></table>';
    
  $main_content .= '
<table id="tableSkills" cellspacing="0" cellpadding="0" border="1" width="360" align="center" style="display:none;"><tbody><tr><tr bgcolor="'.$config['site']['darkborder'].'">
<td align="center" width="38"><strong>Level</strong></td>
<td align="center" width="38"><strong>ML</strong></td>
<td align="center" width="42"><strong>Fist</strong></td>
<td align="center" width="40"><strong>Club</strong></td>
<td align="center" width="38"><strong>Swrd</strong></td>
<td align="center" width="38"><strong>Axe</strong></td>
<td align="center" width="38"><strong>Dist</strong></td>
<td align="center" width="38"><strong>Shield</strong></td>
<td align="center" width="38"><strong>Fish</strong></td></font>
</tr>
<tr bgcolor="'.$config['site']['lightborder'].'">
<td align="center" width="38">'.$player->getLevel().'</td>
<td align="center" width="38">'.$player->getMagLevel().'</td>
<td align="center" width="38">'.$player->getSkill(0).'</td>
<td align="center" width="38">'.$player->getSkill(1).'</td>
<td align="center" width="38">'.$player->getSkill(2).'</td>
<td align="center" width="38">'.$player->getSkill(3).'</td>
<td align="center" width="38">'.$player->getSkill(4).'</td>
<td align="center" width="38">'.$player->getSkill(5).'</td>
<td align="center" width="38">'.$player->getSkill(6).'</td>
</tr></tbody></table><div table align="center">  ';
//skill script end
}
        
            // Quest list show
            if($config['site']['showQuests'])
            {
                 $main_content .= '<br />
            <table border="0" cellspacing="1" cellpadding="4" width="100%">
                <tbody><tr bgcolor="#505050"><td colspan="2" class="white">
                    <img id="btnQsts" style="vertical-align:middle;cursor:pointer;" src="images/show.gif"> 
                    <b>Quests</b></td>
                </tr></tbody>
            </table>';       
                $quests = $config['site']['quests'];
                $questCount = count($config['site']['quests']);
                $questCountDone = 0;
                foreach($quests as $storage => $name) 
                {
                    if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                    $quest = $SQL->query('SELECT * FROM player_storage WHERE player_id = '.$player->getId().' AND `key` = '.$quests[$storage].';')->fetch();
                    $questList .= '<TR bgcolor="'.$bgcolor.'"><TD WIDTH=98%>'.$storage.'</TD>';
                    if($quest == false) 
                    {
                        $questList .= '<TD><img src="images/false.png"/></TD></TR>';
                    }
                    else
                    {
                        $questList .= '<TD><img src="images/true.png"/></TD></TR>';
                        $questCountDone++;
                    }
                }
                $ilosc_procent = ( $questCountDone / $questCount ) * 100;
                $questComplet .= '<tr bgcolor='.$bgcolor.'><td colspan=2><table width=100%><tr><td width=50%><b>Quest Progress</b>: '.round($ilosc_procent, 0).'%</td><td><div title="'.round($ilosc_procent, 0).'%" style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: green; width: '.$ilosc_procent.'%; height: 3px;"></td></tr></table>
                    </td></tr>';
                     $main_content .= '<table id="tableQsts" border="0" cellspacing="1" cellpadding="4" width="100%" style="display:none;">'.$questComplet.''.$questList.'</table>';
            }
            // Vip List show
            if($config['site']['showVipList'])
            {
                // Table player_viplist: player_id, vip_id
                // Table account_viplist: account_id, world_id, player_id
                $vip = 0;
                if($config['server']['separateVipListPerCharacter'] == false)
                    $vipLists = $SQL->query('SELECT * FROM `account_viplist` WHERE `account_id` = '.$account->getId().';');
                else
                    $vipLists = $SQL->query('SELECT * FROM `player_viplist` WHERE `player_id` = '.$player->getId().';');
                foreach($vipLists as $vipList) 
                {
                    if($config['server']['separateVipListPerCharacter'] == false)
                        $result = $SQL->query('SELECT * FROM `players` WHERE `id` = '.$vipList['player_id'].';');
                    else
                        $result = $SQL->query('SELECT * FROM `players` WHERE `id` = '.$vipList['vip_id'].';');
                    foreach($result as $listVip)
                    {
                        $vip++;
                        if($config['site']['show_flag'])
                        {
                            $accounts = $SQL->query('SELECT * FROM accounts WHERE id = '.$listVip['account_id'].'')->fetch();
                            $flags = '<image src="http://images.boardhost.com/flags/'.$accounts['flag'].'.png"/> ';
                        }
                        if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++;
                            $vipResult .= '<tr bgcolor='.$bgcolor.'>
                                <td>'.$vip.'</td>
                                <td>
                                    '.$flags.'<a href="index.php?subtopic=characters&name='.urlencode($listVip['name']).'">'.$listVip['name'].'</a>';
                                    if($config['site']['showMoreInfo'])
                                        $vipResult .= '<br><small>Level: '.$listVip['level'].', '.$vocation_name[$listVip['world_id']][$listVip['promotion']][$listVip['vocation']].', '.$config['site']['worlds'][$listVip['world_id']].'</small>';
                                $vipResult .= '</td>
                            </tr>';
                    }
                }
                if($vip > 0)
                    $main_content .= '<br><table border=0 cellspacing=1 CELLPADDING=2 width=100%><TR bgcolor='.$config['site']['vdarkborder'].'><TD align="left" COLSPAN=2 CLASS=white><B>Vip List</B></TD></TR>'.$vipResult.'</table>';
            }
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
            {
                if (is_int($number_of_rows / 2)) $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 
                $number_of_rows++;
                $main_content .= "<tr bgcolor=\"".$bgcolor."\"> 
                <td width=\"20%\" align=\"center\">".$task[0]."</td> 
                ".$qtd."".$task[2]."</tr>";
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
                
                $('#btnQsts').click(function() {
                    $('#tableQsts').toggle();
                    if ($(this).attr('src') == 'images/show.gif') {
                        $(this).attr('src', 'images/hide.gif');
                    } else {
                        $(this).attr('src', 'images/show.gif');
                    }
                });
                
 $('#btnItems').click(function() {
                    $('#tableItems').toggle();
                       $('#tableSkills').toggle();
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
                
            
            {
                $main_content .= '<BR><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=2 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=5 CLASS=white><B>Characters</B></TD></TR>
                    <TR BGCOLOR='.$config['site']['darkborder'].'><TD><B>Name</B></TD><TD><B>World</B></TD><TD><b>Status</b></TD><TD><B>&#160;</B></TD></TR>';
                $account_players = $account->getPlayersList();
                $player_number = 0;
                foreach($account_players as $player_list)
                {
                    if(!$player_list->getHideChar())
                    {
                        $player_number++;
                        if(is_int($player_number / 2))
                            $bgcolor = $config['site']['darkborder'];
                        else
                            $bgcolor = $config['site']['lightborder'];
                        if(!$player_list->isOnline())
                            $player_list_status = '';
                        else
                            $player_list_status = '<b><font color="#00CD00">online</font></b>';
                        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD WIDTH=18%><NOBR>'.$player_number.'.&#160;'.$player_list->getName();
                        $main_content .= ($player_list->isDeleted()) ? '<font color="red"> [DELETED]</font>' : '';
                        $main_content .= '</NOBR></TD><TD WIDTH=12%>'.$config['site']['worlds'][$player_list->getWorld()].'<TD WIDTH="60%"><b>'.$player_list_status.'</b></TD><TD><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0><FORM ACTION="?subtopic=characters" METHOD=post><TR><TD><INPUT TYPE=hidden NAME=name VALUE="'.$player_list->getName().'"><INPUT TYPE=image NAME="View '.$player_list->getName().'" ALT="View '.$player_list->getName().'" SRC="'.$layout_name.'/images/buttons/sbutton_view.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></FORM></TABLE></TD></TR>';
                    }
                }
                $main_content .= '</TABLE>';
            }
            $main_content .= '<BR><FORM ACTION="?subtopic=characters" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=2><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'"><TABLE BORDER=0 CELLPADDING=1><TR><TD>Name:</TD><TD><INPUT NAME="name" VALUE=""SIZE=29 MAXLENGTH=29></TD><TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></TABLE></TD></TR></TABLE></FORM>';
            $main_content .= '</TABLE>';
        }
        else
            $search_errors[] = 'Character <b>'.$name.'</b> does not exist.';
    }
    else
        $search_errors[] = 'This name contains invalid letters. Please use only A-Z, a-z and space.';
    if(!empty($search_errors))
    {
        $main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
        foreach($search_errors as $search_error)
        $main_content .= '<li>'.$search_error;
        $main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
        $main_content .= '<BR><FORM ACTION="?subtopic=characters" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=2><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'"><TABLE BORDER=0 CELLPADDING=1><TR><TD>Name:</TD><TD><INPUT NAME="name" VALUE=""SIZE=29 MAXLENGTH=29></TD><TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></TABLE></TD></TR></TABLE></FORM>';
    }
}
?>