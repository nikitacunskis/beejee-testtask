<?php

    $tpl = new \Beejee\Template('task_action');
    $tpl->assign('ACTION', '/create-action/');
    $tpl->assign('TITLE', 'Create');
    $tpl->assign('EDIT_STATUS', '');

    switch ($_data["error"]) {
        case 'username':
            $tpl->assign('ERROR', 'Username is empty!');
            break;
        case 'email':
            $tpl->assign('ERROR', 'E-mail is empty!');
            break;
        case 'msg':
            $tpl->assign('ERROR', 'Task message is empty!');
            break;
        default:
            $tpl->assign('ERROR', '');
            break;
    }

    if(isset($_data["username"]))
        $tpl->assign('USERNAME', $_data["username"]);
    else
        $tpl->assign('USERNAME', '');

    if(isset($_data["email"]))
        $tpl->assign('EMAIL', $_data["email"]);
    else
        $tpl->assign('EMAIL', '');

    if(isset($_data["msg"]))
        $tpl->assign('MSG', $_data["msg"]);
    else
        $tpl->assign('MSG', '');


    $tpl->parse();