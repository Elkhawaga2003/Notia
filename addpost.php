<?php 
require('sql.php');
	if(isset($_POST['submit'])){
		$title=mysqli_escape_string($conn,$_POST['title']);
		$name=mysqli_escape_string($conn,$_POST['name']);
		$text=mysqli_escape_string($conn,$_POST['text']);
		$query="INSERT INTO users(user,Title,Text) VALUES('$name','$title','$text')";
		if(mysqli_query($conn,$query)){
			header("location:index.php");
		}else{
			echo 'Error'.mysqli_query($conn,$query);
		}
	}
?>
<?php include("inc/header.php");?>
	<div class="container">
		<h1 >Add Posts</h1>
		<hr>
	    	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	    		<div class="form-group">
	    			<label for="name">EnterName</label><br>
	    		<input name="name" type="text" id="name">
	    	</div>
	    		<div class="form-group">
	    			<label for="title">Title</label><br>
	    		<input name="title" type="text" id="title">
	    	</div>
	    		<div class="form-group">
	    			<label for="contet">Text</label><br>
	    		<textarea name="text" id="contet"></textarea>
	    	</div>
	    		<input name="submit" type="submit" value="Save" class="btn btn-primary">
	    			<a href="<?php echo ROOT_URL?>" class="btn btn-secoundry">Back</a>
	    	</form>
</div>
<?php include("inc/footer.php")?>