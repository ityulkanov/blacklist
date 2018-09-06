<?php include ("db.php"); ?>

<?php 


mysqli_set_charset($connection, "utf8");

$search =  $_POST['search']; 

if (!empty($search)) {
	$query = "SELECT * FROM records WHERE phone LIKE '$search%' "; 
	$search_query = mysqli_query($connection, $query); 
	$num_rows = mysqli_num_rows($search_query);
	?><p><?php echo "<span id='results'>Результатов: {$num_rows}";  ?> </p> 
	<?php
	if (!$search_query) {
		die('QUERY FAILED' . mysqli_error($connection));
		# code...
	}
	while($row = mysqli_fetch_array($search_query)) {
// get data from each row to display it in the results
		$phone = $row['phone'];
		$description = $row['description']; 
		$date_added = $row['date_added']; 
		$id = $row['id']; 

		?>

		<ul class="list-unstyled">
			<?php  
				echo "<li>{$phone} <span class='date'><a href='phone_card.php?id={$id}'>Добавлено: {$date_added}. </a></span></li>
				 <p>Комментарий: {$description}</p>
				
				 ";
			?>

		</ul>

		<?php 

 	}
}

 ?>