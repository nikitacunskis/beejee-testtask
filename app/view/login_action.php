<?php

    if(!isset($_POST['login']) || !isset($_POST['pass']))
    {
        $tpl = new \Beejee\Template('message');
        $tpl->assign('TITLE', 'Login');
        $tpl->assign('MESSAGE', 'Data not set!');
        $tpl->assign('RETURN_LINK', '/login');
        $tpl->parse();
        die;
    }
    $userController = new \Beejee\UserController();
    if($userController->userLogin($_POST['login'], $_POST['pass']))
    {
        $tpl = new \Beejee\Template('message');
        $tpl->assign('TITLE', 'Login');
        $tpl->assign('MESSAGE', 'Login success!');
        $tpl->assign('RETURN_LINK', '/');
        $tpl->parse();
        die;
    }
    else
    {
        $tpl = new \Beejee\Template('message');
        $tpl->assign('TITLE', 'Login');
        $tpl->assign('MESSAGE', 'User not found!');
        $tpl->assign('RETURN_LINK', '/login');
        $tpl->parse();
        die;
    }

