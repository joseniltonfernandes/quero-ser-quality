<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Rotas para as funções das tarefas
$route["tasks"]["get"] = "v1/Tasks/tasks";
$route["tasks/(:num)"]["get"] = "v1/Tasks/tasks/id/$1";
$route["tasks/status/(:num)"]["get"] = "v1/Tasks/status/status/$1";
$route["tasks"]["post"] = "v1/Tasks/tasks";
$route["tasks"]["put"] = "v1/Tasks/tasks";
$route["tasks/(:num)"]["delete"] = "v1/Tasks/tasks/id/$1";
$route["tasks"]["delete"] = "v1/Tasks/tasks";
