
    <?php include"./includes/header.php"?>

    <?php if(isset($_SESSION['username'])){
        global $connection;
        $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_profile_query  = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($select_user_profile_query)){
            $user_id        =$row['user_id'];
            $username       =$row['username'];
            $user_password  =$row['user_password'];
            $user_firstname =$row['user_firstname'];
            $user_lastname  =$row['user_lastname'];
            $user_email     =$row['user_email'];
            $user_image     =$row['user_image'];
            $user_role      =$row['user_role']; 
    }
    }?>

        <div id="wrapper">
            <!-- Navigation -->
            <?php include"./includes/navigation.php"?>
    <div id="page-wrapper">
        <div class="container-fluid">        
                    <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="title">Firstname </label>
                        <input type="text"class="form-control" name="user_firstname" value="<?php echo $user_firstname?>">
                    </div>
                    <div class="form-group">
                        <label for="post_category">Lastname </label>
                        <input type="text"class="form-control" name="user_lastname"  value="<?php echo $user_lastname?>">
                    </div>
                    <select name="user_role" id="" value="<?php echo $user_role;?>">
                        <option value="subscriber">Select any option</option>
                        <option value="admin">Admin</option>
                        <option value="subscriber">Subscriber</option>
                    </select>
                    <div class="form-group">
                        <label for="post_tags">username</label>
                        <input type="text"class="form-control" name="username"  value="<?php echo $username?>">
                    </div>
                
                    <div class="form-group">
                        <label for="post_image">email</label>
                        <input type="text"class="form-control" name="user_email"  value="<?php echo $user_email?>">
                    </div>
                    <div class="form-group">
                        <label for="post_image">Password</label>
                        <input type="text"class="form-control" name="user_password"  value="<?php echo $user_password?>">
                    </div>
                    <input type="submit" name="update_profile">
                    </form>
            </div>
                 </div>
     </div>
 </div>
                    <!-- /.row -->
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->
    <?php include"./includes/footer.php"?>
    
    <?php
    if(isset($_POST['update_profile'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];


        $query = "UPDATE users SET user_firstname='{$user_firstname}',user_lastName='{$user_lastname}',user_role='{$user_role}',username='{$username}',user_email='{$user_email}',user_password='{$user_password}' WHERE username='{$username}'";
    $update_user_query = mysqli_query($connection,$query);
    echo $update_user_query;
    confirm($update_user_query);
    }