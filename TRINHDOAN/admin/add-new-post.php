<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>	

<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create post</h1>
    		
    		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    		    
    		    <div class="form-group has-error">
                    <input type="file" name="fileToUpload" id="fileToUpload">
    		    </div>
    		    
    		    <div class="form-group">
    		        <label >Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <div>
                        <textarea rows="10" cols="60" name="content" required></textarea>
                    </div>
    		    </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary" name="submit">
    		            Create
    		        </button>
    		        <button class="btn btn-default" type="reset">
    		            Cancel
    		        </button>
    		    </div>
    		</form>
		</div>
		
	</div>
</div>
</body>
</html>
<?php 
    include 'php/connectMySQL.php';
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        if($title ==""){
            echo "rong ";
        }
        else{

        $sql = "insert into list_posts(title,content) values ('$title','$content') ";
            if (mysqli_query($conn, $sql)) {
             // echo "<script type='text/javascript'>alert('thanh cong');</script>";
             header('Location:add-new-post.php');
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();

 ?>