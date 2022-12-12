<?php 
if(isset($_GET['edit_user'])){
    $id = $_GET['edit_user'];
    $query = "SELECT * FROM users WHERE user_id={$id}";
    $select_all_users = mysqli_query($connection,$query);
    confirm($select_all_users);
    while($row = mysqli_fetch_assoc( $select_all_users)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastName = $row['user_lastName'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $randSalt = $row['randSalt'];	
}
}
?>
<form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="title">Firstname </label>
        <input type="text"class="form-control" name="user_firstname" value="<?php echo $user_firstname?>">
    </div>
  
    <div class="form-group">
        <label for="post_category">Lastname </label>
        <input type="text"class="form-control" name="user_lastName"  value="<?php echo $user_lastName?>">
    </div>
    <select name="user_role" id="" value="<?php echo $user_role ?>">
        <option value="subscriber">Select any option</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    <div class="form-group">
        <label for="post_tags">username</label>
        <input type="text"class="form-control" name="post_tags"  value="<?php echo $username?>">
    </div>
  
    <div class="form-group">
        <label for="post_image">email</label>
        <input type="text"class="form-control" name="post_content"  value="<?php echo $user_email?>">
    </div>
    <div class="form-group">
        <label for="post_image">Password</label>
        <input type="text"class="form-control" name="post_content"  value="<?php echo $user_password?>">
    </div>
    <input type="submit" name="update_post">
</form>

 