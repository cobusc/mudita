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
    <div></div>
<!-- End of header-->

    <div style="width:100%; margin:0; padding:0">
        <div style="float:left;width:10%; border: thin solid black">
            <hr>
            <b>Operational</b>
            <hr>
            <a href='<?php echo site_url('main/patient')?>'>Patients</a> <br/> 
            <a href='<?php echo site_url('main/drugtest')?>'>Drug Tests</a><br/>
            <hr>
            <b>Administrative</b><br/>
            <hr>
            <a href='<?php echo site_url('main/school')?>'>Schools</a> <br/>
            <a href='<?php echo site_url('main/drugtest_type')?>'>Drug Test Types</a> <br/> 
            <a href='<?php echo site_url('main/substance')?>'>Substances</a> <br/>
            <hr>
            <b>Reports</b><br/>
            <hr>
            Coming soon
            <hr>
            <a href='<?php echo site_url('auth/logout')?>'>Logout</a><br/><br/>
        </div>
        <div style=" float:left;width:89%">
            <?php echo $output; ?>
        </div>
    </div>
    <div style="clear:both">
    </div>
<!-- Beginning footer -->
    <div>&copy; Cobus Carstens</div>
<!-- End of Footer -->
</body>
</html>
