<?php

namespace Beejee;

class Task
{
    private $id;
    private $username;
    private $email;
    private $taskMessage;
    private $status;
    private $edited;

    public function __construct( $username, $email, $taskMessage, $status = null, $id = 0, $edited = 0)
    {
        $this->setId($id);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setTaskMessage($taskMessage);
        $this->setStatus($status);
        $this->setEdited($edited);
    }

    /**
     * @param mixed $edited
     */
    public function setEdited($edited)
    {
        $this->edited = $edited;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $taskMessage
     */
    public function setTaskMessage($taskMessage)
    {
        $this->taskMessage = $taskMessage;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getEdited()
    {
        return $this->edited;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getTaskMessage()
    {
        return $this->taskMessage;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}