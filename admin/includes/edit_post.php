<?php 
if(isset($_GET['p_id'])){
    $id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id={$id}";
    $select_all_posts = mysqli_query($connection,$query);
    confirm($select_all_posts);
    while($row = mysqli_fetch_assoc( $select_all_posts)){
    $post_title = $row['post_title']; 
    $post_author = $row['post_author'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_tags=$row['post_tags'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
}
}

?>
<form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text"class="form-control" name="post_title" value="<?php echo $post_title?>">
    </div>

    
    <div class="form-group">
        <label for="post_category">Post Author</label>
        <input type="text"class="form-control" name="post_author"  value="<?php echo $post_author?>">
    </div>
    <div class="form-group">
        <select name="post_category_id" id="post_category_id">
            <?php
             $query = "SELECT * FROM categories WHERE cat_id='{$post_category_id}'";
             $select_categories = mysqli_query($connection,$query);
             confirm($select_categories);
             while($row = mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='{$cat_id} '>{$cat_title}</option>";
             }
            

             ?>
        </select>
    </div>

  
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text"class="form-control" name="post_status" value="<?php echo $post_status ?>">
    </div>
    <div class="form-group">
    <select name="post_status" id="">
        <option value='<?php echo $post_status ?>'>
            <?php echo $post_status;?> </option>
            <?php 
            if($post_status == 'published'){
                echo "<option value='draft'>Draft</option>"; 
            }else{
                echo "<option value='published'>Publish</option>";
            }
            
            ?>
        
    </select>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text"class="form-control" name="post_tags"  value="<?php echo $post_tags?>">
    </div>
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image?>">
        <label for="post_image">Post Image</label>
        <input type="file"class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="post_image">Post Contet</label>
        <input type="text"class="form-control" name="post_content"  value="<?php echo $post_content?>">
    </div>
    <input type="submit" name="update_post">
</form>

<?php
if(isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $query = "UPDATE posts SET post_title='{$post_title}',post_author='{$post_author}',post_category_id={$post_category_id},post_status='{$post_status}',post_tags='{$post_tags}',post_image='{$post_image}',post_content='{$post_content}' WHERE post_id={$id}";
    move_uploaded_file($post_image_temp, "../images/$post_image");
    if(empty($post_image)){

        $newQuery = "SELECT * FROM posts WHERE post_id=$id";
        $select_image = mysqli_query($connection,$newQuery);
        while($row=mysqli_fetch_array($select_image)){
            $post_image = $row['post_image'];
        }
    }
$create_post_query = mysqli_query($connection,$query);
echo $create_post_query;
confirm($create_post_query);
}
echo  "<p>Post Updated . <a href='../posts.php'>View Posts</a></p>"

?>