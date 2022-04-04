<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Iamme Blog</title> -->

    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo "Iamme Blog"; }?></title>

    <meta name="description" content="<?php if(isset($meta_description)) { echo "$meta_description"; } ?>" />
    <meta name="keywords" content="<?php if(isset($meta_keywords)) { echo "$meta_keywords"; } ?>" />
    <meta name="author" content="Iamme Blog" />
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css">') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap5.min.css') ?>">
    

</head>
<body>
    
