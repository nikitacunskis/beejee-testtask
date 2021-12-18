<?php

namespace Beejee;

class ListController
{
    private $perPage;

    public function __construct($perPage)
    {
        $this->setPerPage($perPage);
    }

    /**
     * @param int $page
     * @param string $sortBy
     * @param string $sortType
     * @return array
     */
    public function getTasks($page = 0, $sortBy = 'id', $sortType = 'ASC')
    {
        $db = new Database();

        $firstEntry = $db->conn->real_escape_string($page) * $this->getPerPage();
        $sortBy = $db->conn->real_escape_string($sortBy);
        $sortType = $db->conn->real_escape_string($sortType);
        $result = $db->conn->query("SELECT id, username, email, taskmessage, status, edited FROM tasks ORDER BY $sortBy $sortType LIMIT $firstEntry, " . $this->getPerPage());

        if($result->num_rows == 0)
            return false;
        $tasks = [];
        while($row = $result->fetch_assoc())
        {
            $tasks[] = new Task($row["username"], $row["email"], $row["taskmessage"], $row["status"], $row["id"], $row["edited"]);
        }
        return $tasks;
    }

    public function pageCount()
    {
        $db = new Database();
        $result = $db->conn->query("SELECT COUNT(username) as c FROM tasks");
        $count = $result->fetch_assoc()['c'] / $this->getPerPage();
        return $count;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * @return mixed
     */
    public function getPerPage()
    {
        return $this->perPage;
    }
}