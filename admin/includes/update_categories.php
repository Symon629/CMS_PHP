<form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <?php
                                    if(isset($_GET['edit'])){
                                        $id = $_GET['edit'];
                                        $query = "SELECT * FROM categories";
                                        $query .= " WHERE cat_id = {$id}";
                                        $editCateogry =  mysqli_query($connection,$query);
                                        while($row=mysqli_fetch_array($editCateogry)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            ?>
                                        
                                    <input type="text" value=<?php if(isset($cat_title)){
                                        echo $cat_title;
                                    } ?> name="cat_title" class="form-control"/>
                                    <?php 
                                    }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                                </form>
                                <?php
                                 if(isset($_POST['update_category'])){
                                    $the_cat_title = $_POST['cat_title'];
                                    $editQuery = "UPDATE categories ";
                                    $editQuery .= "SET cat_title = '{$the_cat_title}' WHERE cat_id = $id";
                                    $update_query =  mysqli_query($connection,$editQuery);
                                    if(!$update_query){
                                        die('Query Failed' .  mysqli_error($connection));
                                    }
                                

                                 }
                                 ?>