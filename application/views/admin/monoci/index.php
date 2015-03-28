<!DOCTYPE html>
<html lang="en">
  
 <head>
<meta charset="utf-8">
<title>Signup - Bootstrap Admin Template</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes"> 

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> -->

<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Bootstrap Admin Template				
			</a>			
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="account-container register">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>index.php/admin/monoci" method="post" class="form-horizontal">
		
			<h1>Generate CRUD</h1>			
			
			<div class="login-fields">
				
				<p>Create your free CRUD:</p>
				
				<div class="field">
					<label for="firstname">Table Name:</label>
					<select name="table_name">
					<?php foreach ($tables as $value){ ?>
						<option value="<?php echo $value; ?>" <?php if($value == @$table_name){ ?> selected <?php } ?>><?php echo $value; ?></option>
					<?php } ?>
					</select>		
				</div> <!-- /field -->
				
				<?php if(isset($fields)) { ?>
				<div class="field">
					<label for="firstname">Table Field:</label>
					<?php foreach ($fields as $value){ ?>
						<?php echo $value; ?> <input type="checkbox" name="table_field[]" value="<?php echo $value; ?>"> <br/>
					<?php } ?>	
				</div> <!-- /field -->
				<?php } ?>
				
				<?php
                    //form validation
                    echo validation_errors();
                ?> 
			
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Agree with the Terms & Conditions.</label>
				</span>
				<?php if(isset($fields)) { ?>					
				<button class="button btn btn-primary btn-large">Generate</button>
				<?php }else{ ?>
				<button class="button btn btn-primary btn-large">Preview</button>
				<?php } ?>
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/js/signin.js"></script>

</body>

 </html>
