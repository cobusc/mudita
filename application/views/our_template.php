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
 
<style type='text/css'>
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
</style>
</head>
<body>
<!-- Beginning header -->
    <div>
        <b>Operational</b> |
        <a href='<?php echo site_url('main/patient')?>'>Patients</a> | 
        <a href='<?php echo site_url('main/drugtest')?>'>Drug Tests</a> |
        <b>Administrative</b> |
        <a href='<?php echo site_url('main/school')?>'>Schools</a> |
        <a href='<?php echo site_url('main/drugtest_type')?>'>Drug Test Types</a> | 
        <a href='<?php echo site_url('main/substance')?>'>Substances</a> |
        <a href='<?php echo site_url('auth/logout')?>'>Logout</a> 
 
    </div>
<!-- End of header-->
    <div style='height:20px;'></div>  
    <div>
        <?php echo $output; ?>
 
    </div>
        <!-- Beginning footer -->
<div>&copy; Cobus Carstens</div>
<!-- End of Footer -->
</body>
</html>
