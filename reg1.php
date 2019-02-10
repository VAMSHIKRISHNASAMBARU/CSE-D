<?php
require_once 'classes/Location.php';
require_once 'classes/LocationTableGateway.php';
require_once 'classes/EventTableGateway.php';
require_once 'classes/Connection.php';


if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);
$eventGateway = new EventTableGateway($connection);

$statement = $gateway->getLocationsById($id);
$events = $eventGateway->getEventsByLocationId($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class = "container">
                <?php
                if (isset($message)) {
                    echo '<p>' . $message . '</p>';
                }
                ?>
                <table class = "table table-hover">
                    <thead>
                        <!--table label-->
                        <!--this will only show the detail of a location with specific ID chosen by the user-->
                        <tr>
                            <th>Location ID</th>
                            <th>Location Name</th>
                            <th>Address</th>
                            <th>Manager First Name</th>
                            <th>Manager Last Name</th>
                            <th>Manager Email</th>
                            <th>Manager Number</th>
                            <th>Max Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--table contents-->
                        <?php
                        echo '<tr>';
                        echo '<td>' . $row['LocationID'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['Address'] . '</td>';
                        echo '<td>' . $row['ManagerFName'] . '</td>';
                        echo '<td>' . $row['ManagerLName'] . '</td>';
                        echo '<td>' . $row['ManagerEmail'] . '</td>';
                        echo '<td>' . $row['ManagerNumber'] . '</td>';
                        echo '<td>' . $row['MaxCapacity'] . '</td>';
                  
                        echo '</tr>';
						  echo '<tr>';
							echo '<td colspan="9">' . $row['info'] . '</td>';
                        echo '</tr>';
                        ?>
						
                    </tbody>
                </table>
               
                <a class="btn btn-default" href="events2.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
            </div>
        </div>
        
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
