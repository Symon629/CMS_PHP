<?php
global $connection;
 if(isset($_POST['create_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $query = "INSERT INTO users(user_firstname,user_lastName,username,user_role,user_email,user_password) VALUES('$user_firstname','$user_lastname','$username','$user_role','$user_email','$user_password')";
$create_user_query = mysqli_query($connection,$query);
confirm($create_user_query);
 }

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text"class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_category">Last Name</label>
        <input type="text"class="form-control" name="user_lastname">
    </div>
    <select name="user_role" id="">
        <option value="subscriber">Select any option</option>
   <option value="admin">Admin</option>
   <option value="subscriber">Subscriber</option>
</select>
<div class="form-group">
        <label for="post_category">username</label>
        <input type="text"class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_category">Email </label>
        <input type="text"class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_category">Password </label>
        <input type="text"class="form-control" name="user_password">
    </div>
    <input class="btn btn-primary" type="submit" name="create_user">
</form>
