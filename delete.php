<!DOCTYPE html>
<html>
    <head>
        <title>delete.php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <!-- <nav> 
        <a style="margin-left: 5px" href="./index.php">Home</a> 
        <a href="./update.php">Change/Create Event</a>
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
                    <a class="nav-link" href="./update.php">Change/Create Event</a>
                </li>
                
            </ul>
            <span class="navbar-text">
                
            </span>
        </div>
    </nav>
    
    <body style="background-color: #faebd7;">
        <form action="index.php/events/delete" method="post">
                <label for="id">ID:</label>
                <input type="number" name="id">        
                <button type="submit">Go</button>
            </form>
        
        </div>
    </body>
</html>