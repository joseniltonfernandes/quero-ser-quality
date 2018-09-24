<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <title><?php if(isset($title)){echo $title;}else{echo'To Do List';}?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/code.js'); ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/card.css'); ?>">
</head>
<body>
            <div class="container">
                <div class="content">
