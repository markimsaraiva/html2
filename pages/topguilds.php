<?PHP
    $main_content .= '<center><table border="0" cellspacing="1" cellpadding="4" width="80%">
    <tr bgcolor="'.$config['site']['vdarkborder'].'">
        <td width="10%"><b><font color=white><center>Pos</font></center></b></td>
        <td width="20%"><b><font color=white><center>Logo</center></b></font></td>
        <td width="30%"><b><font color=white><center>Guild Name</center></b></font></td>
        <td width="20%"><b><font color=white><center>Kills</center></b></font></td>
    </tr>';
$i = 0;
foreach($SQL->query('SELECT `g`.`id` AS `id`, `g`.`name` AS `name`,
    `g`.`logo_gfx_name` AS `logo`, COUNT(`g`.`name`) as `frags`
    FROM `killers` k
    LEFT JOIN `player_killers` pk ON `k`.`id` = `pk`.`kill_id`
    LEFT JOIN `players` p ON `pk`.`player_id` = `p`.`id`
    LEFT JOIN `guild_ranks` gr ON `p`.`rank_id` = `gr`.`id`
    LEFT JOIN `guilds` g ON `gr`.`guild_id` = `g`.`id`
   WHERE `k`.`unjustified` = 1 AND `k`.`final_hit` = 1
    GROUP BY `name`
    ORDER BY `frags` DESC, `name` ASC
    LIMIT 0, 15;') as $guild)
{
    $i++;
    $main_content .= '<tr bgcolor="' . (is_int($i / 2) ? $config['site']['lightborder'] : $config['site']['darkborder']). '">
        <td>            
            <center>'.$i.'</center>
        </td>
        <td>            
            <center><IMG SRC="images/default_guild_logo.gif" WIDTH=64 HEIGHT=64></center>
        </td>
        <td>
            <center><a href="?subtopic=guilds&action=show&guild=' . $guild['id'] . '">' . $guild['name'] . '</a></center>
        </td>
        <td>
            <center>' . $guild['frags'] . ' kills</center>
        </td>
    </tr>';
}
$main_content .= '</table><br />';
$main_content .= '<div style="text-align: right; font-size: 10;"></a></div>';
?> 