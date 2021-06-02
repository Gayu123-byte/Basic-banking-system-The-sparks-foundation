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
  background-color: #03443f;
}

.active {
  background-color: #0c887e;
}
.form{
    
		width: 600px;
		margin: 0 auto;
	
	}
	input[type=text], select {
    width: 100%;
    padding: 10px 15px;
    margin: 5px 0;
    display: block;
    border: 20px solid #03443f ;
    border-radius: 3px;
    box-sizing: border-box;
    }
    input[type=submit] {
    width: 100%;
    background-color:  #0c887e;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }
    
    input[type=submit]:hover {
    background-color:#03443f;
    }
</style>

<?php
$conn = mysqli_connect("localhost", "root", "", "banking");
if($conn-> connect_error){
	die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT name, email, credit FROM students";
error_reporting(0);
$result = mysqli_query($conn,"SELECT *  FROM students");
$resul1 = mysqli_query($conn,"SELECT *  FROM students");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transfer Money</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<ul>
  <li><a class="active" href="index final.html">Home</a></li>
  <li><a  href="viewusers.php">View customers</a></li>
  <li><a href="transfer.php">Transfer Money</a></li>
	<li><a href="transferdetails.php">Transfer Details</a></li>
  
  
</ul>
</div>
</div>  
<div class ='form'> 
	<h1 align ='center'> Transfer Money </h1>
</div> 
<div class='main'>
<form action="" method="GET" class = "form">
		<select  class= fromuser type="text"  name="u1" required value="">
		<option value ="">From User</option>
		<?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
		<select  class =touser  type="text" name="u2" value="">
	     <option value ="">To User</option>
		<?php
                        while($tname = mysqli_fetch_array($resul1)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

        </select>
		
		<input type="text" id="amount" name="amt" placeholder="Enter amount">
		
		<input type="submit" id= submit name="submit" value=" Transfer">
		
	</form>
</div>

	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
			{
				//update transaction changes in database
				$query1= "UPDATE students  SET credit = credit + '$amt' WHERE Name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE  students SET credit = credit  - '$amt' WHERE Name = '$u1' ";
				$data2= mysqli_query($conn, $query2);
				
				//insert into transaction_history
				    $query1 = "INSERT INTO transfer_history (from_user,to_user,Credit) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
				
                                          if($res2){
		                           	 $user1 = "SELECT * FROM students WHERE  Name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
			                      }
				
            

				     if ($data1 && $data2)
				     {
					$message="Successful transfer";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}
				else
				{
					$message="Error While Commiting Transaction ";
					echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}

			}

			else
			{
				$message="All Fields are Mandatory";
				echo "<script type='text/javascript'>alert('$message');
                    </script>";
			}
		}
		

	?>

</body>
</html>
