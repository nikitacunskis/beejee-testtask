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
    $taskController = new \Beejee\TaskController();
    $taskController->done($_data["id"]);
    header('Location: /');
    die;