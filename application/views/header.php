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
    	<?php if( $this->tank_auth->is_admin() ) {  ?>
        <a href='<?php echo site_url('main/users')?>'>Users</a> |
        <a href='<?php echo site_url('main/groups2')?>'>Groups</a> |
           <a href='<?php echo site_url('main/user_groups')?>'>User Groups</a> |
           <a href='<?php echo site_url('main/type_contacts')?>'>Contacts type</a> |
            <a href='<?php echo site_url('main/contacts2')?>'>User Contacts</a> |
              <a href='<?php echo site_url('main/email_settings')?>'>Email Settings</a>
               <?php } else { ?>
                 <a href='<?php echo site_url('ecard/index')?>'>Cards select</a> |
              <a href='<?php echo site_url('ecard/stamps')?>'>Stamp select</a> |
              <a href='<?php echo site_url('ecard/front_side')?>'>Front side preview</a> |
               <a href='<?php echo site_url('ecard/back_side')?>'>Back side</a> |
                 <a href='<?php echo site_url('contact/contact')?>'>Contact us</a> 
               <?php }  ?>
    </div>
    <div style="float: right;">
    		Hi, <strong><?php echo $username; ?></strong>! You are logged in now.  <?php if( !$this->tank_auth->is_admin() ) { echo anchor('/auth/logout/', 'My profile') ;} ?> | <?php echo anchor('/auth/logout/', 'Logout'); ?>
   
    </div>
<!-- End of header-->