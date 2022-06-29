<!doctype html>
<html lang="en">
<head>
	<title>Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Maitree|Ropa+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" ">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="css/profile.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->



	<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
		.pro-education h1, .pro-skill h1, .pro-interest h1{
                background-color:  #202427;
		}

        .heading
        {
            padding-top: 40px;
            padding-left:70px;
            color:black;
            font-size: 30px;

        }
	</style>
</head>

<body onload="check()">
	<script type="text/javascript">
		function check(){
			$("span#msgcount").load("msg-counter.php");
		}

		function suggestions(){
			var input = $(".search").val();
			var url = "users.php?keyword="+input;
			$("datalist#searches").load(url);
		}

		function searched(){
			var name = $(".search").val();
			window.open("profile.php?user="+name,'_self');
		}
	</script>

<?php

include 'header.php';
?>
<main class="cd-main-content">
<?php
include 'sidebar.php';

if($id = (isset($_GET['id']) ? $_GET['id'] : ''))
    {
        foreach ($record as $data){
            $name = $data['name'] ;
            $email = $data['email'];
            $contact = $data['phone'];
        }
                           
    }
?>

<div class="content-wrapper">
<div class="profile-container">
				<div class="info-box">
					<img id="pro-timeline" src="images/pro-timeline.jpg"></img>
					<div class="pro-title">
	            		<center><img class="profile-image" src="<?php echo $dp; ?>">
	            		 <p id="pro-name"><?php 
                          echo $name; ?></p>
	            		 <span class="pro-detail"><?php echo $email; ?></span> | <span class="pro-detail" id="number"><?php echo $contact; ?></span><br/><br/>
	            		 </center>
	            	</div>
                </div>
	           
   </div>
</div> 

<!-- .content-wrapper -->
</main>

<script src="js/jquery.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/profile.js"></script> <!-- Resource jQuery -->
<script>
$(document).ready(function(){
	$("button#add-contact").hide();
	<?php
		if ($_GET['user'] != $_SESSION['login_user']){
			$_SESSION['added'] = 0;
	?>
			$(".remove").hide();
			$("button#add-contact").show();
	<?php
			$query = "select * from contact where user_id =".$_SESSION['login_user'];
			$table = mysqli_query($connection,$query);

			if($table){
				$rows=mysqli_num_rows($table);
				if($rows > 0){
				    for($x = 0; $x<= $row; $x++){
						$row = mysqli_fetch_assoc($table);
						if ($_GET['user'] == $row['contact_id']){
							?>
							$("button#add-contact").html("Added in Contact List");
							$("button#add-contact").val(1);
							$("button#add-contact").css({"background-color":"white","border":"1px solid #16b980", "color":"#16b980"});
							<?php
							$_SESSION['added'] = 1;
							break;
						}
					}
				}
			}
		}
	?>

	$("form#form-edu").hide();
	$("form#form-int").hide();
	$("form#form-ski").hide();
	$("button#cancel-edu").click(function(){
		$("form#form-edu").hide();
	});
	$("button#cancel-ski").click(function(){
		$("form#form-ski").hide();
	});
	$("button#cancel-int").click(function(){
		$("form#form-int").hide();
	});
	$("button#add-edu").click(function(){
		$("form#form-edu").toggle();
	});
	$("button#add-ski").click(function(){
		$("form#form-ski").toggle();
	});
	$("button#add-int").click(function(){
		$("form#form-int").toggle();
	});
});
</script>
</body>
</html>