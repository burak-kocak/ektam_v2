<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $this->lang->line('web_title'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>css/styles.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>css/flag-icon.css" />
<script charset="utf-8"  type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jquery-2.2.2.min.js"></script>
<script charset="utf-8"  type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/bootstrap.min.js"></script>
</head>

<body>

    <div id="canvas">
    
        <header>
        	<div id="header-content">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/'); ?>images/logo.png" data-toggle="tooltip" title="Ektam Makine Sanayi ve Ticaret A.Ş." data-placement="bottom" /></a>
                <div id="language">
                    <a href="#"><div><?php echo $this->lang->line('language'); ?></div> <div class="flag-icon-<?php $lan=strtolower($this->session->lang); echo $lan==='en'?'gb':$lan; ?> flag-icon"></div></a>
                    <a href="<?php echo base_url(); ?>lang/TR"<?php if($lan==='tr') echo' class="active"';?>><div>TÜRKÇE</div> <div class="flag-icon-tr flag-icon"></div></a>
                    <a href="<?php echo base_url(); ?>lang/EN"<?php if($lan==='en') echo' class="active"';?>><div>ENGLISH</div> <div class="flag-icon-gb flag-icon"></div> <div class="flag-icon-us flag-icon"></div></a>
                    <a href="<?php echo base_url(); ?>lang/DE"<?php if($lan==='de') echo' class="active"';?>><div>DEUTSCH</div> <div class="flag-icon-de flag-icon"></div></a>
                    <a href="<?php echo base_url(); ?>lang/FR"<?php if($lan==='fr') echo' class="active"';?>><div>FRANÇAIS</div> <div class="flag-icon-fr flag-icon"></div></a>
                </div>
            </div>
        </header>