<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
<style type='text/css'>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
  </head>

  <body>

<div class="container">

<div class="row" id="infoMessage" class="alert modal-message"><?php echo $message;?></div>

<?php echo form_open("auth/login", array('class'=>'form-signin'));?>
<h2 class="form-signin-heading"><?php echo lang('login_heading');?></h2>
<p><?php echo lang('login_subheading');?></p>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input(array('name' => 'identity', 'id' => 'identity', 'class' => 'form-control', 'placeholder' => 'Email address'));?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Password'));?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit(array('name'=>'submit', 'value'=>lang('login_submit_btn'), 'class'=>'btn btn-lg btn-primary btn-block'));?></p>
  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

<?php echo form_close();?>

</div>
</body>
</html>

