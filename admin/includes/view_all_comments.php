<?php
if(isset($_GET['delete_comments'])){
$comment_id =$_GET['delete_comments'];
$query = "DELETE FROM comments WHERE comment_id=$comment_id";
$delete_query = mysqli_query($connection,$query);
                            confirm($delete_query);
                            header("Location:comments.php");
}
if(isset($_GET['approve'])){
    $comment_id =$_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id=$comment_id";
    $update_query = mysqli_query($connection,$query);
                                confirm($update_querys);
                                header("Location:comments.php");
}
    if(isset($_GET['unapprove'])){
        $comment_id =$_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id=$comment_id";
        $update_query = mysqli_query($connection,$query);
                                    confirm($update_query);
                                    header("Location:comments.php");
        }
?>

<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>In Response to</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                           <tbody>
                            <?php
                            $query = "SELECT * FROM comments";
                            $select_all_comments = mysqli_query($connection,$query);
                            confirm($select_all_comments);
                            while($row = mysqli_fetch_assoc( $select_all_comments)){

                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_content = $row['comment_content'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];
                            
                                echo"<tr>";
                                echo"<td>{$comment_id}</td>";
                                echo"<td>{$comment_author}</td>";
                                echo"<td>{$comment_content}</td>";
                                echo"<td>{$comment_email}</td>";
                                echo"<td>Some ttiel</td>";
                                echo"<td>{$comment_status}</td>";
                                echo"<td>{$comment_date}</td>";
        
                                echo"<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                echo"<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                                  
                                echo"<td><a href='comments.php?delete_comments=$comment_id'>Delete</a></td>";
                                echo"</tr>";
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

                       