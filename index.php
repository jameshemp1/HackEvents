
<?php
require __DIR__ . "/inc/bootstrap.php";
require PROJECT_ROOT_PATH . "/Controller/Api/EventController.php";
#get uri segments
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

$objFeedController = new EventController();
#redirect to base page
if (sizeof($uri) < 5){
    header("Location: http://localhost/HackEvents/index.php/events/list");
    exit();
} 
#control for updating/creating entries
if ($uri[4] == "update"){
    $title = trim($_POST["title"]);
    $desc = trim($_POST["desc"]);
    $date = $_POST["date"];
    $time = $_POST["time"];
    $id = $_POST["id"];

    if ( ($title == "") || ($desc == "") || ($date == "") || ($time == "")){
        printf("Not Enough inputs");
    } else if ( $id == "" ){
        $objFeedController->createEvents($title, $desc, $date, $time);
    } else {
        $objFeedController->updateEvents($id, $title, $desc, $date, $time);
    } 
} else if ($uri[4] == "delete"){
    $id = $_POST["id"];
    $_SERVER["REQUEST_METHOD"] = "DELETE"; #change the method to DELETE, php forms cannot use the delete method 
    $objFeedController->deleteEvents($id);
}
#base page alwasy displays event table
$_SERVER["REQUEST_METHOD"] = "GET";
$sql = $objFeedController->listEvents();
$sql = json_decode($sql, true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>index.php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <nav> 
        <a style="margin-left: 5px" href="../../index.php">Home</a> 
        <a href="../../update.php">Change/Create Event</a>
        <a href="../../delete.php">Delete Event</a>
    </nav>
        <body style="background-color: #faebd7;">
        <div class="container">
            
            <table class="table table-bordered table-striped" style="border: 1px solid black">
                <thead class="thead-dark">
                    <tr>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    #output the table
                        foreach ($sql as $row){
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['description'] .  "</td>";
                        echo "<td>" . $row['date'] .  "</td>";
                        echo "<td>" . $row['time'] .  "</td>";
                        echo "<td>" . $row['id'] .  "</td>";
                        echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>