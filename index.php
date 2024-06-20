<?php 
require('sql.php');
$query='SELECT * FROM users ORDER BY cerated_at DESC';
$result=mysqli_query($conn,$query);
$posts=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<?php include("inc/header.php");?>
	<div class="container">
		<h1 >Posts</h1>
		<hr>
		<a href="addpost.php" class="btn btn-primary">Addpost</a>
		<hr>
	    	<?php foreach ($posts as $post):?>
	    		<div class="well">
              	<h2><?php echo $post['Title'];?></h2>
              	<small><?php echo $post['user']." ,its created at ".$post['cerated_at'];?></small>
              	<section>
              			<p>	<?php echo  $post['Text'];?> </p>
               	</section>
               	<a href="id.php?id=<?php echo $post['id']?>" class="btn">readMore</a>
               </div>
               <br>
	    	<?php endforeach;?>
</div>
<?php include("inc/footer.php")?>