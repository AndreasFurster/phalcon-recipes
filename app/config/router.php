<?php

// Create router
$router = $di->getRouter();

// Set default controller for routing /
$router->setDefaultController('recipes');

// Handle routes
$router->handle();
