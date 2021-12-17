<?php

    require_once "vendor/autoload.php";

    //setting start page as "list"
    if(!isset($_REQUEST['route']))
        $request = "list";
    else
        $request = $_REQUEST['route'];

    $rawRoute =  explode("/", $request);

    require_once 'route.php';
    $_module = $rawRoute[0]; // global module name

    $routeRules = explode("/", $routes[$_module]["rules"]);

    // generate global _data assoc array, based on rules
    $_data = [];
    foreach ($routeRules as $i => $rr)
    {
        if(trim($rr, "?") != $rr)
        {
            $assocName = trim($rr, "?");
            if(isset($rawRoute[$i]))
                $_data[$assocName] = $rawRoute[$i];
            else
                $_data[$assocName] = $routes[$_module]["default_values"][$assocName];
        }
    }
    $_view = $routes[$_module]["view"]; // global view name

    // raw route and route rules isn't supposed to be used directly
    unset($rawRoute);
    unset($routeRules);


    include ("app/view/" . $_view . ".php");



