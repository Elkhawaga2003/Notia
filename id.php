<?php 
require('sql.php');
if(isset($_POST['delete'])){
		$dele_id=mysqli_escape_string($conn,$_POST['delet']);
		$query="DELETE FROM users WHERE id={$dele_id}";
		if(mysqli_query($conn,$query)){
			header("location:index.php");
		}else{
			echo 'Errors'.mysqli_query($conn,$query);
		}
	}
$id=mysqli_escape_string($conn,$_GET['id']);
$query='SELECT * FROM users WHERE id='.$id;
$result=mysqli_query($conn,$query);
$post=mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notia</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 >Posts</h1>
		<hr>
	    		<div class="well">
              	<h2><?php echo $post['Title'];?></h2>
              	<small><?php echo $post['user']." ,its created at ".$post['cerated_at'];?></small>
              	<section>
              			<p>	<?php echo $post['Text'];?> </p>
               	</section>
               	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
               			<input type="hidden" value="<?php echo $post['id']?>" name="delet">
               			<input type="submit" name="delete" value="delet" class="btn btn-danger">

               	</form>
               	<br>
               	<a href="<?php echo ROOT_URL;?>edit.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Edit</a>
               	<a href="<?php echo ROOT_URL;?>" class="btn btn-secoundry">Back</a>
               </div>
               <br>
</div>
</body>
</html>
