<?php 
require('sql.php');
	if(isset($_POST['submit'])){
		$update_id=mysqli_escape_string($conn,$_POST['update']);
		$title=mysqli_escape_string($conn,$_POST['title']);
		$name=mysqli_escape_string($conn,$_POST['name']);
		$text=mysqli_escape_string($conn,$_POST['text']);
		$query=" UPDATE users SET
			Title='$title';
			user='$name';
			Text='$text';
			WHERE
			id={$update_id}
		";
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
<?php include("inc/header.php");?>
	<div class="container">
		<h1 >Add Posts</h1>
		<hr>
	    	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	    		<div class="form-group">
	    			<label for="name">EnterName</label><br>
	    		<input name="name" type="text" id="name" value="<?php echo $post['user'];?>">
	    	</div>
	    		<div class="form-group">
	    			<label for="title">Title</label><br>
	    		<input name="title" type="text" id="title" value="<?php echo $post['Title'];?>">
	    	</div>
	    		<div class="form-group">
	    			<label for="contet">Text</label><br>
	    		<textarea name="text" id="contet" value="<?php echo $post['Text'];?>"></textarea>
	    	</div>
	    	<input type="hidden" name="update" value="<?php echo $post['id'];?>">
	    		<input name="submit" type="submit" value="Save" class="btn btn-primary">
	    			<a href="<?php echo ROOT_URL?>" class="btn btn-secoundry">Back</a>
	    	</form>
</div>
<?php include("inc/footer.php")?>