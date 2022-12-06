<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
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
                                <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
                                <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>
                                </tr>";
                            }
                            ?>


                        
                           </tbody>
                        </table>
                        <?php
                        if(isset($_GET['delete'])){
                            $id = $_GET['delete'];
                           $query = "DELETE FROM posts WHERE post_id={$id}";
                           $delete_query = mysqli_query($connection,$query);
                           confirm($delete_query);

                        }
 
                        ?>