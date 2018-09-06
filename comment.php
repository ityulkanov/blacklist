<?php include "db.php";  ?>

<?php 
 
  $page_id = $_POST["page_id"];
  $text_comment = $_POST["text_comment"];
  $data_added = date("Y-m-d"); 
  $query = "INSERT INTO comments (page_id, text_comment, data_added) VALUES ('$page_id', '$text_comment', '$data_added')"; // составляем запрос
  $comment_query = mysqli_query($connection, $query); //Добавляем комментарий в базу данных
  if (!$comment_query) {
		die("query failed"); 
	}
  header("Location: phone_card.php?id=$page_id");// Делаем реридект обратно

?>