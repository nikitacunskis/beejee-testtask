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

    $id = $_data["id"];
    $task = $taskController->getById($id);

    $tpl = new \Beejee\Template('task_action');

    switch ($_data["error"])
    {
        case 'username':
            $tpl->assign('ERROR', 'Username is empty!');
            break;
        case 'email':
            $tpl->assign('ERROR', 'E-mail is empty!');
            break;
        case 'msg':
            $tpl->assign('ERROR', 'Task message is empty!');
            break;
        case 'status':
            $tpl->assign('ERROR', 'Status is empty!');
            break;
        default:
            $tpl->assign('ERROR', '');
            break;
    }

    $tpl->assign('ACTION', '/edit-action/' . $_data["id"]);
    $tpl->assign('TITLE', 'Edit');
    $tpl->assign('STATUS', $task->getStatus());
    $tpl->assign('USERNAME', $task->getUsername());
    $tpl->assign('EMAIL', $task->getEmail());
    $tpl->assign('MSG', $task->getTaskMessage());
    $tpl->parse();
