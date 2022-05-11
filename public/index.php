<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};


/**
//  * TODO: implement twig
//  * TODO: navigation support
//  * TODO: category page categories pulled from database
//  * TODO: show pizzas per category
//  * TODO: Order gets saved to database
 * TODO: customer gets message to confirm the order 
//  * TODO: Show orders on login page
//  * TODO: clicked pizza gets saved to session storage
 * TODO: styles
 */