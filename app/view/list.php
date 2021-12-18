<?php

    $listController = new Beejee\ListController(3);
    $userController = new \Beejee\UserController();

    $tpl = new Beejee\Template('list');

    $tpl->assign("CURRENT_PAGE", $_data["page"]);
    if($_data["sorttype"] == "DESC")
        $tpl->assign("SORT_TYPE", "ASC");
    else
        $tpl->assign("SORT_TYPE", "DESC");

    $tasks = $listController->getTasks($_data["page"], $_data["sortby"], $_data["sorttype"]);
    $loginBtn = new \Beejee\Template('login_button');
    if($userController->isLogged())
    {
        $loginBtn->assign('SITE', '/logout');
        $loginBtn->assign('ACTION', 'LOGOUT');
        $tpl->assign('LOGIN_BUTTON', $loginBtn->fetch());
    }
    else
    {
        $loginBtn->assign('SITE', '/login');
        $loginBtn->assign('ACTION', 'LOGIN');
        $tpl->assign('LOGIN_BUTTON', $loginBtn->fetch());
    }

    if(!$tasks)
    {
        $tpl->assign("TASK_LIST", "", false);
        $tpl->assign("PAGINATION", "", false);
        $tpl->parse();
        die;
    }
    foreach ($tasks as $task)
    {
        $taskTpl = new \Beejee\Template('list_card');
        $taskTpl->assign('ID', $task->getId());
        $taskTpl->assign('USERNAME', $task->getUsername());
        $taskTpl->assign('EMAIL', $task->getEmail());
        $taskTpl->assign('TASK_MESSAGE', $task->getTaskMessage());
        $taskTpl->assign('STATUS', $task->getStatus());
        if($userController->isLogged())
        {
            $taskControls = new \Beejee\Template('controls');
            $taskControls->assign('ID', $task->getId());
            $taskTpl->assign('CONTROLS', $taskControls->fetch());
        }
        else
        {
            $taskTpl->assign('CONTROLS', '');
        }
        if($task->getEdited() == '1')
            $taskTpl->assign("EDITED", "(edited by admin)");
        else
            $taskTpl->assign("EDITED", "");

        $tpl->assign("TASK_LIST", $taskTpl->fetch(), false);
    }
    for($i = 0; $i < $listController->pageCount(); $i++)
    {
        $tplPage = new Beejee\Template('pagination');
        $tplPage->assign('PAGE', $i);
        $tplPage->assign("SORTBY", $_data["sortby"]);
        $tplPage->assign("SORTTYPE", $_data["sorttype"]);
        $tpl->assign("PAGINATION", $tplPage->fetch(), false);
    }

    $tpl->parse();