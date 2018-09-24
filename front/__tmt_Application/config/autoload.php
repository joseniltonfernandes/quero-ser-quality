<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'my_general');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('api/V1_model' => 'api');
