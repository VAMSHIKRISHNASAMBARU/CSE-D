<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MRCET Events</title>
		<?php require 'utils/styles.php'; ?>
		
        <?php require 'utils/scripts.php'; ?>

            </head>
    <body>
	<?php require 'utils/header.php'; ?>
      <br><br><br><br><br>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            
<?php
$con=mysqli_connect("localhost","root","","year");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM registration");



?>


        <div class = "content">
            <div class = "container">
               <br/><br/>
                <table class ="table table-hover" align="center" >
                    <thead>
                        <tr>
                            <!--table label-->
                            <!--this will only show the detail of a location with specific ID chosen by the user-->
                            <th>Roll no</th>
                            <th>Name</th>
                            <th>Branch</th> 
							<th>College Name</th> 							
                            <th>Event Name</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <!--table contents-->
                        <?php
                        while($row = mysqli_fetch_array($result))
						{
						echo "<tr>";
						
						echo "<td>" . $row['rollno'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['branch'] . "</td>";
						echo "<td>" . $row['college'] . "</td>";
						echo "<td>" . $row['eventname'] . "</td>";
						echo "</tr>";
						}
                        
                        ?>
                    </tbody>
                </table>
 <?php
mysqli_close($con);
?>
            </div>
        </div>
 <?php require 'utils/footer.php'; ?>
</body>
</html>

