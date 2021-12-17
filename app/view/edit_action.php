<?php

$userController = new \Beejee\UserController();
if(!$userController->isLogged())
{
    $tpl = new \Beejee\Template('message');
    $tpl->assign('TITLE', 'Edit');
    $tpl->assign('MESSAGE', 'You have not permission!');
    $tpl->assign('RETURN_LINK', '/login');
    $tpl->parse();
    die;
}
if( !isset($_POST["username"])   ||
    !isset($_POST["email"])      ||
    !isset($_POST["msg"]))
{

    $tpl = new \Beejee\Template('message');
    $tpl->assign('TITLE', 'Edit');
    $tpl->assign('MESSAGE', 'Wrong data!');
    $tpl->assign('RETURN_LINK', '/edit/'.$_data["id"]);
    $tpl->parse();
    die;
}

$taskController = new \Beejee\TaskController();
$taskController->edit(new \Beejee\Task($_POST["username"], $_POST["email"], $_POST["msg"], null, $_data["id"]));

$tpl = new \Beejee\Template('message');
$tpl->assign('TITLE', 'Login');
$tpl->assign('MESSAGE', 'Edit success!');
$tpl->assign('RETURN_LINK', '/');
$tpl->parse();
die;