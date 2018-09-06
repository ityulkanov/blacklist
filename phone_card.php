<?php include ("db.php"); ?>

<?php 
$id =  $_GET['id']; 


  $page_id = $id;// Уникальный идентификатор страницы 
  $query_for_page_comments = "SELECT * FROM comments WHERE page_id='$page_id'"; // составляем запрос для всех комментариев 
  $comments_result = mysqli_query($connection, $query_for_page_comments);  // вытаскиваем все комментарии относящиеся к этому номеру на страницу




if (!empty($id)) {
	$query = "SELECT * FROM records WHERE id LIKE $id "; //building a query to get all data about the phone
	$search_query = mysqli_query($connection, $query); 
	if (!$search_query) {
		die('QUERY FAILED' . mysqli_error($connection));
		# code...
	}
	while($row = mysqli_fetch_assoc($search_query)) {
		//get data from the array and put it into the variables
		$phone = $row['phone'];
		$description = $row['description']; 
		$date_added = $row['date_added']; 
	
	?>


	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Подробнее о номере:</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				
				
					<h2>Номер телефона: </h2>
					<p><?php echo $phone;  ?></p>
					<p>Дата добавления: <?php echo $date_added ?></p>
					<h3>Почему добавлен в ЧС:</h3>
					<p><?php echo $description;  ?></p>
				
					<h3>Комментарии: </h3>

					<?php 
					while($row = mysqli_fetch_array($comments_result)) {
						//parse all the comments via loop and put them into the view 
				    $comment_name = $row['name']; 
				    $comment_text = $row['text_comment']; 
				    $data_added = $row['data_added']; 
			    	?> 
					<div class="col-lg-12">
					<div class="col-lg-6">
						 <span class="date">Добавлен: <?php echo $data_added; ?></span> 
			    	<p class="well"><?php echo $comment_text; ?></p> 
			    	</div>
			    	</div>
			    	<?php 
	  				}  
  					?>
					<div class="col-lg-6">
						<form class="form-group" name="comment" action="comment.php" method="post">
					 
					  <p>
					    <label>Комментарий:</label>
					    <br />
					    <textarea class="form-control" name="text_comment" ></textarea>
					  </p>
					  <p>
					    <input type="hidden" name="page_id" value="<?php echo $id ?>" />
					    <input class="btn btn-primary btn-lg" type="submit" value="Отправить" />
					  </p>
					</form>
					</div>

			</div>
		</div>
		
	</body>
	</html>
		
		<?php
	}

}


 ?>


<!-- TODO Сделать аккаунты пользователей, привязать каждый из телефонов к аккаунту при добавлении -->
<!-- TODO Сделать привязку комментариев к пользователям -->