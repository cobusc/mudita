<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
        <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<!-- <style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style> -->
</head>
<body>
    <div class="container">
<!-- Beginning header -->
    <h1><a href="#">Mudita Matrix Manager</a></h1>
    <!-- Navigation -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-th-large"></i>Operational
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href='<?php echo site_url('main/patient')?>'>Patients</a></li>
                            <li><a href='<?php echo site_url('main/drugtest')?>'>Drug Tests</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-th-large"></i>Administrative
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href='<?php echo site_url('main/school')?>'>School</a></li>
                            <li><a href='<?php echo site_url('main/drugtest_type')?>'>Drug Test Types</a></li>
                            <li><a href='<?php echo site_url('main/substance')?>'>Substances</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-th-large"></i>Reporting
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Item1</a></li>
                            <li><a href="#">Item2</a></li>
                            <li><a href="#">Item3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About</a></li>
                    <li><a href='<?php echo site_url('auth/logout')?>'>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
<!-- End of header-->

<!--    <div class="row">
         <div class="span0">
             <ul class="nav nav-list">
                <li class="nav-header">Operational</li>
                <li><a href='<?php echo site_url('main/patient')?>'>Patients</a></li>
                <li><a href='<?php echo site_url('main/drugtest')?>'>Drug Tests</a></li>
                <li class="nav-header">Reporting</li>
                <li><a href="#">Todo</a></li>
                <li class="nav-header">Admin</li>
                <li><a href='<?php echo site_url('main/school')?>'>School</a></li>
                <li><a href='<?php echo site_url('main/drugtest_type')?>'>Drug Test Types</a></li>
                <li><a href='<?php echo site_url('main/substance')?>'>Substances</a></li>
            </ul>
         </div> -->
         <div class="row">
             <?php echo $output; ?>
         </div>
<!--    </div>  -->

<!-- Beginning footer -->
    <hr>
    <div class="footer">
        <p>&copy; Cobus Carstens</p>
    </div>
<!-- End of Footer -->
    </div>
</body>
</html>
