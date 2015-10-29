<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ECards.</title>

</head>
<body>
<div align="center">
    
    <div align="center">
        <div align="center">
            <ul>
            <?php if(!empty($images)): foreach($images as $img) : ?>
               <li><img src="<?php echo $img['image']; ?>" ></li>
            <?php endforeach;  endif; ?>
            </ul>
        </div>
    </div>
   
     
</div>
</body>
</html>
