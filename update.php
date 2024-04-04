<!DOCTYPE html>
<html>
    <head>
        <title>update.php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <!-- <nav> 
        <a style="margin-left: 5px" href="./index.php">Home</a> 
        <a href="./delete.php">Delete Event</a>
    </nav> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./delete.php">Delete Event</a>
                </li>
                
            </ul>
            <span class="navbar-text">
                
            </span>
        </div>
    </nav>

        <body style="background-color: #faebd7;">
        <div id="cond">
        <?
        #coming from main page 'set' doesn't have value, give it one if so
        if ( !isset($_POST["set"])){
            $_POST["set"] = "u";
        }
        #output for creating entry
        if ( $_POST["set"] == "c") {
            echo "<form action=\"update.php\" method=\"post\">
            <input type=\"hidden\" name=\"set\" value=\"u\">
            <button type=\"submit\">Update</button>
            </form>
            <form action=\"index.php/events/update\" method=\"post\">       
            <input type=\"hidden\" name=\"id\" value=\"\">
                <label for=\"title\">Title:</label>
                <input type=\"text\" name=\"title\">
                <label for=\"desc\">Description:</label>
                <input type=\"text\" name=\"desc\">
                <label for=\"date\">Date:</label>
                <input type=\"date\" name=\"date\">
                <label for=\"time\">Time:</label>
                <input type=\"time\" name=\"time\">
                <button type=\"submit\">Go</button>
            </form>";
        } else {
            #output for updating entry
            echo "<form action=\"update.php\" method=\"post\">
            <input type=\"hidden\" name=\"set\" value=\"c\">
            <button type=\"submit\">Create</button>
            </form>
            <form action=\"index.php/events/update\" method=\"put\">
                <label for=\"id\">ID:</label>
                <input type=\"number\" name=\"id\">        
                <label for=\"title\">Title:</label>
                <input type=\"text\" name=\"title\">
                <label for=\"desc\">Description:</label>
                <input type=\"text\" name=\"desc\">
                <label for=\"date\">Date:</label>
                <input type=\"date\" name=\"date\">
                <label for=\"time\">Time:</label>
                <input type=\"time\" name=\"time\">
                <button type=\"submit\">Go</button>
            </form>";
        }
        ?>
        </div>
    </body>
</html>