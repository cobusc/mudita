<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
<!--    <link rel="stylesheet" href="http://mudita.local/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap.min.css"  type="text/css"/> -->
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<!--    <script src="http://mudita.local/assets/grocery_crud/themes/twitter-bootstrap/js/libs/bootstrap/bootstrap.min.js"></script> -->
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
    <h1>Outpatient Treatment Information System</h1>
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
                            <li><a href='<?php echo site_url('main/individual_session')?>'>Individual Sessions</a></li>
                            <li><a href='<?php echo site_url('main/group_session')?>'>Group Sessions</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-th-large"></i>Administrative
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href='<?php echo site_url('main/school')?>'>Schools</a></li>
                            <li><a href='<?php echo site_url('main/drugtest_type')?>'>Drug Test Types</a></li>
                            <li><a href='<?php echo site_url('main/substance')?>'>Substances</a></li>
                            <li><a href='<?php echo site_url('main/individual_session_type')?>'>Individual Session Types</a></li>
                            <li><a href='<?php echo site_url('main/group_session_type')?>'>Group Session Types</a></li>
                            <li><a href='<?php echo site_url('main/facilitator')?>'>Facilitators</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-th-large"></i>Reporting
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href='<?php echo site_url('reports/test_report')?>'>Test Report</a></li>
                            <li><a href="#">Item2</a></li>
                            <li><a href="#">Item3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About</a></li>
                    <li><a href='<?php echo site_url('auth/logout')?>'>Logout (<?php echo $this->session->userdata('username');?>)</a></li>
                </ul>
            </div>
        </div>
    </div>
<!-- End of header-->

         <div class="row">
             <?php echo $output; ?>
         </div>

<!-- Beginning footer -->
    <hr>
    <div class="footer">
        <p>&copy; Cobus Carstens</p>
    </div>
<!-- End of Footer -->
    </div>
</body>
</html>
