<!DOCTYPE html>
<html>
    <head>
        <title>delete.php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <nav> 
        <a style="margin-left: 5px" href="./index.php">Home</a> 
        <a href="./update.php">Change/Create Event</a>
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