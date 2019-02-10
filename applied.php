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
                ?>
                <table class ="table table-hover">
                    <thead>
                        <tr>
                            <!--table label-->
                            <!--this will only show the detail of a location with specific ID chosen by the user-->
                            <th>Roll No</th>
                            <th>Name</th>
                            <th>Branch</th>                    
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!--table contents-->
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['rollno'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['branch'] . '</td>';                    
                            
                            
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
