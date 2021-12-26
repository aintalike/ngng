<?php
/**
 * The template for displaying homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nogamenogain
 */
get_header();
?>


<script>
	
		jQuery(document).ready(function($) {
			$("#map-filter").on('change',function() {
				var value = $(this).val();
				$.ajax( {
					url:'wp-content/themes/nogamenogain/map.php',
					type:'POST',
					data:'request='+value,
					success:function(data)
					{
						$("table").html(data);	
					},
				});
			});
		});
		
	</script>
	
	<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"wp-content/themes/nogamenogain/date.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#general_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>

	<main>

				<div>  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div>  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div>  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div> 
	
		<select id="map-filter">
		
			<option value="'%'">All</option>
			
			<option value="1">DE_DUST2</option>
			
			<option value="2">DE_INFERNO</option>
			
			<option value="3">DE_NUKE</option>
			
		</select>

		<?php

			$mysqli = new mysqli('localhost', 'root', '', 'stats');

			echo '<table id="general_table">
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

			$result = $mysqli -> query('select player, round ((sum(dmg_t) + sum(dmg_ct)) / (cap * (sum(round_t) + sum(round_ct))), 3) as damage_w, round ((sum(dmg_t) + sum(dmg_ct)) / (sum(round_t) + sum(round_ct)), 2) as damage_r, round ((sum(dmg_p_t) + sum(dmg_p_ct)) / (sum(map_p) * 2), 2) as damage_p, round ((sum(kills_t) + sum(kills_ct)) / sum(map_p), 2) as kills_m, round ((sum(deaths_t) + sum(deaths_ct)) / sum(map_p), 2) as deaths_m, round ((sum(round_t_w) + sum(round_ct_w)) / (sum(round_t) + sum(round_ct)), 2) as rounds_w, round (sum(map_w) / sum(map_p), 2) as maps_w from total where map_p > 0 and player <> "team_1" and player <> "team_2" group by player;');
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

		?>

	</main>


<?php
get_footer();