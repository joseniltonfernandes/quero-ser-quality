<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Tarefas';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Rotas para as funções das tarefas
$route["tarefas"] = "tarefas/tarefas";
$route["tarefa/(:num)"]["get"] = "v1/tarefas/tarefas/id/$1";
$route['tarefas/search'] = 'tarefas/tarefas/search';
