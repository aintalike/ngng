<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $mysqli = new mysqli('localhost', 'root', '', 'stats'); 
      $output = '';  
      $result = $mysqli -> query("select player, round ((sum(dmg_t) + sum(dmg_ct)) / (cap * (sum(round_t) + sum(round_ct))), 3) as damage_w, round ((sum(dmg_t) + sum(dmg_ct)) / (sum(round_t) + sum(round_ct)), 2) as damage_r, round ((sum(dmg_p_t) + sum(dmg_p_ct)) / (sum(map_p) * 2), 2) as damage_p, round ((sum(kills_t) + sum(kills_ct)) / sum(map_p), 2) as kills_m, round ((sum(deaths_t) + sum(deaths_ct)) / sum(map_p), 2) as deaths_m, round ((sum(round_t_w) + sum(round_ct_w)) / (sum(round_t) + sum(round_ct)), 2) as rounds_w, round (sum(map_w) / sum(map_p), 2) as maps_w from total where (date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."') and map_p > 0 and player <> 'team_1' and player <> 'team_2' group by player;");   
      $output .= '  
           <table id="general_table">  
                <tr>
						<th>player</th>
						<th>damage_w</th>
						<th>damage_r</th>
						<th>damage_p</th>
						<th>kills_m</th>
						<th>deaths_m</th>
						<th>rounds_w</th>
						<th>maps_w</th>
					</tr>
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["player"] .'</td>  
                          <td>'. $row["damage_w"] .'</td>  
                          <td>'. $row["damage_r"] .'</td>  
                          <td>$ '. $row["damage_p"] .'</td>  
                          <td>'. $row["kills_m"] .'</td>  
						  <td>'. $row["deaths_m"] .'</td>
						  <td>'. $row["rounds_w"] .'</td>
						  <td>'. $row["maps_w"] .'</td>
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>