<? 
require __DIR__ . "/inc/bootstrap.php";
require PROJECT_ROOT_PATH . "/Controller/Api/EventController.php";
#get uri segments
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

$objFeedController = new EventController();
#control for updating/creating entries
parse_str($_SERVER['QUERY_STRING'], $query);

if ($uri[4] == "list"){
    $objFeedController->listEvents();
} else if ($uri[4] == "update"){
    $title = $query['title'];
    $desc = $query['desc'];
    $date = $query['date'];
    $time = $query['time'];
    if ( strtoupper($_SERVER["REQUEST_METHOD"]) == 'POST' ){
        $objFeedController->createEvents($title, $desc, $date, $time);
    } else {
        $id = $query['id'];
        $objFeedController->updateEvents($id, $title, $desc, $date, $time);
    } 
} else if ($uri[4] == "delete"){
    $id = $query['id'];
    $_SERVER["REQUEST_METHOD"] = "DELETE"; #change the method to DELETE, php forms cannot use the delete method 
    $objFeedController->deleteEvents($id);
}
?> 