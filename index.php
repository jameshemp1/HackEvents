<?php

#get uri segments
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
#redirect to base page
$uri = explode( '/', $uri );
if (sizeof($uri) < 5){
    header("Location: http://localhost/HackEvents/index.php/events/list");
    exit();
} 
#set url for hitting api
$url = "localhost/HackEvents/api.php/".$uri[3]."/".$uri[4];
$curl = curl_init();

$changed = false;

if ( $uri[4] == "update"){
    $title = trim($_POST["title"]);
    $desc = trim($_POST["desc"]);
    $date = $_POST["date"];
    $time = $_POST["time"];
    $id = $_POST["id"]; 
    if ( strtoupper($_POST["_method"]) == 'POST' ){
        curl_setopt($curl, CURLOPT_POST, TRUE);
        $url = $url."?title=".$title."&desc=".$desc."&date=".$date."&time=".$time;
        curl_setopt($curl, CURLOPT_URL, $url);
    } else if ( strtoupper($_POST["_method"]) == 'PUT' ){
        curl_setopt($curl, CURLOPT_PUT, TRUE);
        $url = $url."?id=".$id."&title=".$title."&desc=".$desc."&date=".$date."&time=".$time;
        curl_setopt($curl, CURLOPT_URL, $url);
    }
    $changed = true;
} else if ( $uri[4] == "delete" ){
    $id = $_POST["id"];
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    $url = $url."?id=$id";
    curl_setopt($curl, CURLOPT_URL, $url);
    $changed = true;
} 

if ( $changed ){
    curl_exec($curl);
    $url = "localhost/HackEvents/api.php/events/list";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
} else {
    curl_setopt($curl, CURLOPT_URL, $url);
}

curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$sqlraw = curl_exec($curl);
curl_close($curl);
$sql = json_decode($sqlraw, true);

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