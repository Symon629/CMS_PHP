<?php
global $connection;
 if(isset($_POST['create_post'])){

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_date = date('d-m-y');
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];  
    $post_comment_count = 0;  

    move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO posts(post_title,post_author,post_category_id,post_status,post_tags,post_image,post_content,post_date,post_comment_count)";
$query.= "VALUES('{$post_title}','{$post_author}',{$post_category_id},'{$post_status}','{$post_tags}','{$post_image}','{$post_content}',now(),{$post_comment_count})";

$create_post_query = mysqli_query($connection,$query);
confirm($create_post_query);

$the_post_id = mysqli_insert_id($connection);
 }

?>
<form action="" method="post" enctype="multipart/form-data">
    <?php
    if(isset($_POST['create_post'])){
        echo" <p>Post Created successfully</p> . <a href='../post.php?p_id={$the_post_id}'>View Post</a>' ";
    }
   ?>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text"class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Author</label>
        <input type="text"class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <Select name="post_category_id" id="post_category_id">
            <?php 

            $n_query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$n_query);
            while($row =mysqli_fetch_array($select_categories)){
                echo"<option value={$row['cat_id']}>{$row['cat_title']}</option>";
            }

            ?>
        </Select>
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status">
            <option value="published">Publish</option>
            <option value="draft">draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>
     <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text"class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="post_image">Post Contet</label>
        <input type="text"class="form-control" name="post_content">
    </div>
    <input type="submit" name="create_post">
</form>