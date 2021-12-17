<?php


namespace Beejee;


class TaskController
{
    public function create(Task $task)
    {
        $db = new Database();

        $stmt = $db->conn->prepare("INSERT INTO tasks (username, email, taskmessage, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $taskMessage, $status);

        $username = $task->getUsername();
        $email = $task->getEmail();
        $taskMessage = $task->getTaskMessage();
        $status = 'undone';

        $stmt->execute();
    }

    public function edit( $task )
    {
        $db = new Database();

        $stmt = $db->conn->prepare("UPDATE tasks SET username = ?, email = ?, taskmessage = ?, edited = 1 WHERE id = ?");
        $stmt->bind_param("ssss", $username, $email, $taskMessage, $id);

        $username = $task->getUsername();
        $email = $task->getEmail();
        $taskMessage = $task->getTaskMessage();
        $id = $task->getId();

        $stmt->execute();
    }

    public function done( $id )
    {
        $db = new Database();
        $id = $db->conn->real_escape_string($id);
        $stmt = $db->conn->query("UPDATE tasks SET status = 'done' WHERE id = '$id'");
    }

    public function getById( $id )
    {
        $db = new Database();
        $id = $db->conn->real_escape_string($id);
        $result = $db->conn->query("SELECT username, email, taskmessage, status FROM tasks WHERE id = $id");
        $row = $result->fetch_assoc();
        $task = new Task($row["username"], $row["email"], $row["taskmessage"], $row["status"], $id);
        return $task;
    }
}