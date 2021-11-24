<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
<link rel="stylesheet" href="styles.css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Our clients have spoken</title>

</head>
<body>
  <div class="container">
  <div id="header" class="row px-4">
  <div class="col"> 
  <div id="row1" class="row py-4">
  <h2><i> <b>Divide's Italian Restaurant </b></i></h2>
  <p> <i> It's about experience with us </b> </i></p>
  </div>

<div id="row2" class="row py-2">
<div class="col d-flex flex-row justify-content-end"> 

  <h4> <button class="subnavbtn" onclick="location.href = 'index.html'">Home </h4> 
    
    <h4> <b> <button class="dropbtn" onclick="location.href = 'menucards.html'">Menu</button> </b> </h4>
    <h4> <b> <button class="dropbtn" onclick="location.href = 'reviewspage.php'">Our clients have spoken</button> </b> </h4>
    <h4> <b> <button class="dropbtn" onclick="location.href = 'feedbackform.html'">Feedback</button> </b> </h4>

  </div>
  </div>

  </div>
  </div>

	<?php
	$conn = mysqli_connect("localhost", "root", "", "restaurant");
	if ($conn-> connect_error) {
		die("connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT id, firstname, response from feedback";
	$result = $conn-> query($sql);
	
	if ($result-> num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "<b>". $row["firstname"] ."</b>"."</br>". "<i>".$row["response"] ."</i>"."</br>"."</br>";
		}
		
	}
	else {
		echo "0 result";
	}
	
	$conn-> close();
	?>
</table>
</body>
</html>