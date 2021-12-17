<?php
/**
 * module
 *  - view          : view to call
 *  - rules         : how to parse data from url
 *                    if there is a variable supposed to be
 *                    in some part, put ? before.
 *  - default_values : each variable must have default value
 */
    $routes = [
        "list" => [
            "view" => "list", //view to open
            "rules" => "list/?page/?sortby/?sorttype", //route rules
            "default_values" => ["page" => "0",
                "sortby" => "id",
                "sorttype" => "ASC"] //default values
        ],
        "create" => [
            "view" => "create", //view to open
            "rules" => "create/?error", //route rules
            "default_values" => [
                "error" => "none",
            ],
        ],
        "create-action" => [
            "view" => "create_action", //view to open
            "rules" => "create-action", //route rules
        ],
        "edit" => [
            "view" => "edit", //view to open
            "rules" => "edit/?id/?error", //route rules
            "default_values" => [
                "error" => "none",
            ],
        ],
        "edit-action" => [
            "view" => "edit_action", //view to open
            "rules" => "edit_action/?id", //route rules
        ],
        "done" => [
            "view" => "done", //view to open
            "rules" => "done/?id", //route rules
        ],
        "login" => [
            "view" => "login", //view to open
            "rules" => "login", //route rules
        ],
        "login-action" => [
            "view" => "login_action", //view to open
            "rules" => "login-action", //route rules
        ],
        "logout" => [
            "view" => "logout", //view to open
            "rules" => "logout", //route rules
        ],
    ];