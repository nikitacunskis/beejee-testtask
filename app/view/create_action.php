<?php

if(!isset($_POST["username"]) || $_POST["username"] == "")
    header('Location: /create/username');
if(!isset($_POST["email"]) || $_POST["email"] == "")
    header('Location: /create/email');
if(!isset($_POST["msg"]) || $_POST["msg"] == "")
    header('Location: /create/msg');

$taskController = new \Beejee\TaskController();
$taskController->create(new \Beejee\Task($_POST["username"], $_POST["email"], $_POST["msg"]));
header('Location: /');
