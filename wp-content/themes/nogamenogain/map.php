<?php

	if($_POST['request']) {
	
		$request=$_POST['request'];	
		$mysqli = new mysqli('localhost', 'root', '', 'stats');

		echo '<table>
				<tr>
					<th>player</th>
					<th>damage_w</th>
					<th>damage_r</th>
					<th>damage_p</th>
					<th>kills_m</th>
					<th>deaths_m</th>
					<th>rounds_w</th>
					<th>maps_w</th>
				</tr>';

		$result = $mysqli -> query('select player, round ((sum(dmg_t) + sum(dmg_ct)) / (cap * (sum(round_t) + sum(round_ct))), 3) as damage_w, round ((sum(dmg_t) + sum(dmg_ct)) / (sum(round_t) + sum(round_ct)), 2) as damage_r, round ((sum(dmg_p_t) + sum(dmg_p_ct)) / (sum(map_p) * 2), 2) as damage_p, round ((sum(kills_t) + sum(kills_ct)) / sum(map_p), 2) as kills_m, round ((sum(deaths_t) + sum(deaths_ct)) / sum(map_p), 2) as deaths_m, round ((sum(round_t_w) + sum(round_ct_w)) / (sum(round_t) + sum(round_ct)), 2) as rounds_w, round (sum(map_w) / sum(map_p), 2) as maps_w from total where map_id like ' .$request. ' and map_p > 0 and player <> "team_1" and player <> "team_2" group by player;');
		while($row = $result -> fetch_assoc()) {
		
			echo '<tr>';
				echo '<td>' . $row['player'] . '</td>';
				echo '<td>' . $row['damage_w'] . '</td>';
				echo '<td>' . $row['damage_r'] . '</td>';
				echo '<td>' . $row['damage_p'] . '</td>';
				echo '<td>' . $row['kills_m'] . '</td>';
				echo '<td>' . $row['deaths_m'] . '</td>';
				echo '<td>' . $row['rounds_w'] . '</td>';
				echo '<td>' . $row['maps_w'] . '</td>';
			echo '</tr>';
		}

		echo "</table>";
	
	};

?>