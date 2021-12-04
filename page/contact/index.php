<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM comment ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" href="../style/com.css">
	<link rel="stylesheet" href="../style/home.css">
</head>
<p class="name">Hi <?php
    include '../session/auth_session.php';
    echo $_SESSION['username'], '!  ';
    ?>Welcome back!<span  style="font-size:30px;cursor:pointer;color:#ff0209;float: right;" onclick="openNav()">&#9776; </span></p>
  
    <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a href="../home.php">Home</a>
    <a href="#">About</a>
    <a href="./contact/index.php">Commentars</a>
    <a href="#">Contact</a>
  </div>
</div>
<body>
<a class="addData" href="add.htm">Add New Data</a><br/><br/>

	<table width='100%' border=1>

	<tr bgcolor='#330800'>
		<td>Title</td>
		<td>Subject</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['title']."</td>";
		echo "<td>".$res['subject']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
<script src="../javascript/nav.js"></script>
</html>
