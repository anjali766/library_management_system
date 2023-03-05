<?php
  $emailmsg="";
  $pasdmsg="";
  $msg="";

  $ademailmsg="";
  $adpasdmsg="";
 
  if(!empty($_REQUEST['ademailmsg'])){
      $ademailmsg=$_REQUEST['ademailmsg'];
   }  
   
   if(!empty($_REQUEST['adpasdmsg'])){
      $adpasdmsg=$_REQUEST['adpasdmsg'];
   }  
   
    if(!empty($_REQUEST['emailmsg'])){
      $emailmsg=$_REQUEST['emailmsg'];
   } 
    
   if(!empty($_REQUEST['pasdmsg'])){
      $pasdmsg=$_REQUEST['pasdmsg'];
   }

   if(!empty($_REQUEST['msg'])){
      $msg=$_REQUEST['msg'];
   }


   ?>






<!DOCTYPE html>
<html>
    <head>
        <title>AdLogin</title>
        <link rel="stylesheet" href="log.css">
    </head>
    <body>
       <div class="container admin">
                   <form action="loginadmin_server_page.php" method="get">
                       <h1>Admin Login</h1>
                       <br>
                       <input type="text" id="email" name="login_email" size=55 placeholder="Enter Your Email" style="height:30px;">
                       <br>
                       <Label style="color:red">*<?php echo $ademailmsg?></label>
                       <br>
                       <input type="password" id="pwd" name="login_password" size=55 name="pwd" placeholder="Enter password" style="height:30px;">
                       <br>
                       <label style="color:red">*<?php echo $adpasdmsg?></label>
                       <br>
                       <input type="submit" value="Submit" class="form_btn">
                   </form>
        </div>    
    </body>
</html>