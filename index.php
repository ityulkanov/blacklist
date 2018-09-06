<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Black List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<style>
	p {
		background-color: white;
	}

	#top_form {
		padding-top: 100px;
	}

	#entering_bl {
		display: none;
	}
	.date {
		font-size: 12px; 
	}
	</style>

</head>
<body>
	<script>
		$(document).ready(function(){
			$("#search").keyup(function(){
				var search = $('#search').val();
				// alert(search);
				$.ajax({
					url:'search.php',
					data: {search:search},
					type: 'POST', 
					success: function(data){
						if (!data.error) {
							$('#result').html(data); 
						};
					}
				});
			});
			// adds black listed person to database:
			$("#add_bl_form").submit(function(event){
				event.preventDefault(); 
				var postData = $(this).serialize(); 
				var url = $(this).attr('action');
				$.post(url, postData, function(php_table_data){
					$('#blFormResult').html(php_table_data); 
				});
			}); 
		});

	</script>


	<div id="container" class="col-xs-6 col-xs-offset-3">
		<div class="row">
			<h2 class="text-center ">Проверить телефон: </h2>
				<div class="form-group" id="top_form">
					<input type="text" class="form-control" name="search" id="search" placeholder="79xx xxx xx xx">
				</div>
			<h2 class="bg-success" id="result"></h2>
		</div>

		<div class="row" id="entering_bl">
			<h2>Добавить в черный список: </h2>
			<form method="POST" id="add_bl_form" action="add_bl_person.php" >
			<div class="form-group">
				<input class="form-control" type="text" name="phone_bl" placeholder="79xx xxx xx xx">
			</div>
			<div class="form-group">
				<textarea class="form-control" name="comment" id="" cols="30" rows="10" placeholder="Почему занесен в черный список"></textarea>			
			</div>
				<input type="submit" id="button" class="btn btn-primary" value="Добавить в черный список">
			</form>
			<div class="col-xs-6">
				<!-- <div id="blFormResult"> -->
					
				</div>

				<div class="well">
					<?php if (!empty($_SESSION['msg'])) {
						echo $_SESSION['msg']; 
						unset($_SESSION['msg']); 
						}
					?>
        		</div>
			</div>
		</div>
			
	</div>

<script>
	
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }
    }
    console.log('Query variable %s not found', variable);
}

	
	if (getQueryVariable('allow')==='yes') {
		
		document.getElementById('entering_bl').style.display = "inline";
		 };
	
</script>

<script type="text/javascript">

	$('#button').click(function() {

    	      location.reload();

	});

</script>

<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter41896634 = new Ya.Metrika({ id:41896634, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/41896634" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

</body>
</html>