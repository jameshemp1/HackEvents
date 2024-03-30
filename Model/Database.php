<?php
class Database
{
    protected $connection = null;
    #constructor for initializing connection to DB
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }
    #gets all entires, limits to $limit in EventController.listEvents() 
    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }
    #for executing all APi request other than GET 
    public function updateDB($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );			
            $stmt->close();
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }
    #Prepares and executes passed statement
    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                if ( sizeof($params) == 6 ){
                    $stmt->bind_param($params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);
                } else if ( sizeof($params) == 5 ){
                    $stmt->bind_param($params[0], $params[1], $params[2], $params[3], $params[4]);
                } else {
                    $stmt->bind_param($params[0], $params[1]);
                }
                
            }
            $stmt->execute();
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }
}
?>