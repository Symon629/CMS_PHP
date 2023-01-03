<?php
if(isset($_POST['submit'])){
    $post_status = $_POST['post_status'];
    $all_posts = $_POST['post_checkbox'];
    if($post_status!=='delete'){
foreach($all_posts as $mypost_id){

    $update_posts = "UPDATE posts SET post_status='{$post_status}' WHERE post_id={$mypost_id}";
    $updated_success = mysqli_query($connection,$update_posts);
   
}}else{
    foreach($all_posts as $mypost_id){
        $update_posts = "DELETE FROM posts WHERE post_id={$mypost_id}";
        $updated_success = mysqli_query($connection,$update_posts);  
    }
}

}
?>

<form action="" method="post">



<table class="table table-bordered table-hover">
<div id="bulkOptionContainer" class="col-xs-4">
    <select name="post_status">
    <option value="published">Publish</option>
    <option value="draft">draft</option>
    <option value="delete">Delete</option>

</select>
</div> 
<div class="col-xs-4">
    <input type="submit"  value="Apply"class="btn btn-success" name="submit" >
    <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
</div>
                            <thead>
                                <tr>
                                    <th><input id="select_all_Checkbox" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                           <tbody>
                            <?php
                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection,$query);
                            confirm($select_all_posts);


                            while($row = mysqli_fetch_assoc( $select_all_posts)){
                                $post_id = $row['post_id'];
                                $post_image = $row['post_image'];
                                $cat_id = $row['post_category_id'];
                            
                                echo"<tr>";
                                echo " <th><input id='otherCheckbox' type='checkbox' name='post_checkbox[]' value={$post_id}></th>";
                                echo"<td>{$post_id}</td>";
                                echo" <td>{$row['post_author']}</td>";
                                echo"<td>{$row['post_title']}</td>";
                                $category_query = "SELECT * FROM categories WHERE cat_id ={$cat_id}";
                                $select_allCat =  mysqli_query($connection,$category_query);;
                                while($cat = mysqli_fetch_assoc($select_allCat)){
                                    $cat_title = $cat['cat_title'];
                                    echo"<td>{$cat_title}</td>";
                                }
                               
                                echo"  <td>{$row['post_status']}</td>
                                <td><img class='img-responsive' width='100' src='../images/{$post_image}'></img> </td>
                                <td>{$row['post_tags']}</td>
                                <td>{$row['post_comment_count']}</td>
                                <td>{$row['post_date']}</td>
                                <td><a href='../post.php?p_id={$post_id}'> View Posts</a></td>
                                <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>
                                <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
                                </tr>";
                            }
                            ?>


                        
                           </tbody>
                        </table>
                        </form>
                        <?php
                        if(isset($_GET['delete'])){
                            $id = $_GET['delete'];
                           $query = "DELETE FROM posts WHERE post_id={$id}";
                           $delete_query = mysqli_query($connection,$query);
                           confirm($delete_query);

                        }
 
                        ?>
                        <script>
                            let allCheckBox = document.querySelector('#select_all_Checkbox');
                            let otherCheckboxes = document.querySelectorAll('#otherCheckbox');
                            allCheckBox.addEventListener('change',function(){
                                if(this.checked){
                                    otherCheckboxes.forEach((item) => {
                                         item.checked = true
                                        })
                                }else{
                                    otherCheckboxes.forEach((item) => {
                                         item.checked = false;
                                })}
                            })
                            let encryption = Math.trunc((Math.random() * 1000));
                            
                            </script>