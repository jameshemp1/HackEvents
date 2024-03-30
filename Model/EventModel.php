<?php
/* Functions for buidling the queries befroe they are prepared*/
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class EventModel extends Database
{
    public function getEvents($limit)
    {
        return $this->select("SELECT * FROM events LIMIT ?", ["i", $limit]);
    }

    public function updateEvents($id, $title, $desc, $date, $time)
    {
        $this->updateDB("UPDATE events SET title = ?, description = ?, date = ?, time = ? WHERE id = ?", ["ssssi", $title, $desc, $date, $time, $id]);
    }

    public function deleteEvents($id)
    {
        $this->updateDB("DELETE FROM events WHERE id = ?", ["i", $id]);
    }

    public function createEvents($title, $desc, $date, $time)
    {
        $this->updateDB("INSERT INTO events (title, description, date, time) VALUES (?,?,?,?)", ["ssss", $title, $desc, $date, $time]);
    }
}
?>