<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Cloud Panda</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta http-equiv="language" content="EN"/>
	<meta name="robots" content="noindex, nofollow"/>
	<meta name="author" content="Hofstede Software"/>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.orgchart.css">
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/cloudpanda.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/reset.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/webfonts.css"  />
</head>
<body>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<div class="session-message"></div>
<div class="header">
    <a href="<?php echo base_url(); ?>" class="logo">Cloud Panda</a>
    <div class="header-right">
        <a class="active" href="<?php echo base_url(); ?>">Organization</a>
        <a href="<?php echo base_url(); ?>index.php/organizations/create">Add New Record</a>
        <a href="<?php echo base_url(); ?>index.php/stringspiral">String Spiral</a>
    </div>
</div>
<div class="container">
	<h1 class="text-center"><?php echo $title; ?></h1>
