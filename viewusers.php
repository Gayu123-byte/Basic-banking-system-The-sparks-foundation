<!Doctype html>
<html>
<style>
body {
  font-size: 25px;
  background-color:#92d6d1;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #0c887e;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: ;
}

.active {
  background-color: #0c887e;

}
.viewusers{
  background-color:#0c887e ;
  margin-left: auto; 
  margin-right: auto;
  }
  table, th, td {
    background-color: white;
    border: 2px solid black;
    width:45%;
    }
    
    
    h1{
    color: white;
    border:2px  #35b0f2; 
    font-size:30px;
    
    }
    
    .button a {
    background-color: #f27b35; 
    color: black; 
    width: 100%;
    
    }
    
    .button a:hover {
    background-color: #f27b35;
    color: black;
    }
    
    .button {
      padding: 20px;
      max-width:100% ;
      background-color: #f27b35;
      border: #f27b35;
      margin: auto;    
      border-radius: 0px;
    }
    
    .button:hover{
     border-radius: 30px; 
    }
    
    @media only screen and (max-width:500px){
    
      *{
        font-size: 10px;
</style>	
<head>
	<title>Transfer Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
<ul>
  <li><a class="active" href="index.html">Home</a></li>
  <li><a  href="viewusers1.php">View customers</a></li>
  <li><a href="transfe2r.php">Transfer Money</a></li>
	<li><a href="transferdetails1.php">Transfer Details</a></li>
  
  
</ul>
</div>  
<table class="viewusers">
	<h1><center>Transfer Details</center></h1>
	<tr>
		<th>Sender</th>
		<th>Reciever</th>
		<th>Credit</th>
	</tr>
	<?php
	include 'connection.php';

	$sql = "SELECT * FROM transfer_history";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["from_user"] ."</td><td>".  $row["to_user"] ."</td><td>" .  $row["Credit"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>
	
</body>
</html>
