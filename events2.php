<?php
require_once 'utils/functions.php';


require_once 'classes/LocationTableGateway.php';
require_once 'classes/Connection.php';

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);

$statement = $gateway->getLocations();
	


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MRCET Events</title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
		
        <div class = "content">
            <div class = "container">
                <?php 
                if (isset($message)) {
                    echo '<p>'.$message.'</p>';
                }
                ?><br><br><br><br><br>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <table class ="table table-hover">
                    <thead>
                        <tr>
                            <!--table label-->
                            <!--this will only show the detail of a location with specific ID chosen by the user-->
                            <th>Event ID</th>
                            <th>Title</th>
                            <th>Address</th>                    
                            <th>Coordinator Name 1</th>
                            <th>Coordinator Name 2</th>
                            <th>Email</th>
                            <th>Cost</th>
                            <th>Max Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--table contents-->
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['LocationID'] . '</td>';
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Address'] . '</td>';                    
                            echo '<td>' . $row['ManagerFName'] . '</td>';
                            echo '<td>' . $row['ManagerLName'] . '</td>';
                            echo '<td>' . $row['ManagerEmail'] . '</td>';
                            echo '<td>' . $row['ManagerNumber'] . '</td>';
                            echo '<td>' . $row['MaxCapacity'] . '</td>';
                            echo '<td>'
                            . '<a href="signup.html">Apply</a> '
                          . '<a href="reg1.php?id=' . $row['LocationID'] . '">Info</a> '
                           
                            . '</td>';
                            echo '</tr>';  

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
