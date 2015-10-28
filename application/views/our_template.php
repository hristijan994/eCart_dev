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
        <a href='<?php echo site_url('main/users')?>'>Users</a> | 
        <a href='<?php echo site_url('main/groups2')?>'>Groups</a> |
           <a href='<?php echo site_url('main/user_groups')?>'>User Groups</a> |
           <a href='<?php echo site_url('main/type_contacts')?>'>Contacts type</a> |
            <a href='<?php echo site_url('main/contacts')?>'>User Contacts</a> |
              <a href='<?php echo site_url('main/email_settings')?>'>Email Settings</a> 
    </div>
<!-- End of header-->
    <div style='height:20px;'></div>  
    <div>
        <?php echo $output; ?>
 
    </div>
<!-- Beginning footer -->

<!-- End of Footer -->
</body>
</html>
