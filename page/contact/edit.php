<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($title) || empty($subject) || empty($email)) {	
			
		if(empty($title)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($subject)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE comment SET title='$title',subject='$subject',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM comment WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title = $res['title'];
	$subject = $res['subject'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="../style/index.css">
	<link rel="stylesheet" href="../style/com.css">
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $title;?>"></td>
			</tr>
			<tr> 
				<td>Subject</td>
				<td>
				<textarea  style=" height: 100; width: 200%;" name="subject" ><?php echo $subject;?>
</textarea></td>

			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
