<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 
<?php 
if(!empty($css_files))
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>

<?php if(!empty($js_files)) foreach($js_files as $file): ?>
 
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
    <div style="float: left">
        <a href='<?php echo site_url('main/users')?>'>Users</a> | 
        <a href='<?php echo site_url('main/groups')?>'>Groups</a> |
           <a href='<?php echo site_url('main/user_groups')?>'>User Groups</a> |
           <a href='<?php echo site_url('main/type_contacts')?>'>Contacts type</a> |
            <a href='<?php echo site_url('main/contacts')?>'>User Contacts</a> |
              <a href='<?php echo site_url('main/email_settings')?>'>Email Settings</a> 
    </div>
    <div style="float: right;">
    		Hi, <strong><?php echo $username; ?></strong>! You are logged in now. <?php echo anchor('/auth/logout/', 'Logout'); ?>
    </div>
<!-- End of header-->