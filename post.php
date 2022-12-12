<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php
if(isset($_GET['p_id'])){
    $post_id = $_GET['p_id'];
}
    $query = "SELECT * FROM posts where post_id = $post_id";
    $All_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($All_posts)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];   
?>


    <!-- Navigation -->
    <?php include"./includes/navigation.php";?>
     <!-- Page Content -->
     <div class="container">

<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo"{$post_title}"?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#"><?php echo"{$post_author}"?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo"{$post_date}"?> at 9:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">]
        <?php echo"{$post_content}"?>
        <hr>

        <!-- Blog Comments -->
        <?php
        if(isset($_POST['create_comments'])){
            $comment_author = $_POST['comment_author'];
            $comment_content =  $_POST['comment_content'];
            $comment_email =  $_POST['comment_email'];
            $comment_status = "Unapproved";
            $query = "INSERT INTO comments(comment_author,comment_email,comment_content,comment_date,comment_post_id,comment_status) VALUES('$comment_author',
            '$comment_email','$comment_content',now(),$post_id,'$comment_status'
            )";
             $insert_query = mysqli_query($connection,$query);
             $update_count =  "UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$post_id";
             $update_query = mysqli_query($connection,$update_count);

        }
        
        ?>

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form action="" method="post" >
            <div class="form-group">
              <label for="Author">Author</label>
    <input type="text" class="form-control" name="comment_author">
</div>
                    <div class="form-group">
                           <label for="email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name='create_comments'>Submit</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->
        <?php 
        $query = "SELECT * FROM comments WHERE comment_post_id =$post_id AND comment_status='Approved' ORDER BY comment_id DESC";
                            $select_all_comments = mysqli_query($connection,$query);
                        
                            while($row = mysqli_fetch_assoc( $select_all_comments)){
                         $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_content = $row['comment_content'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];
                            
                                
?>    <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo"{$comment_author}"?>
                    <small><?php echo"{$comment_date}"?></small>
                </h4>
                <?php echo"{$comment_content}"?>
            </div>
        </div>"
                         <?php    } ?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>

</div>
<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php  } ?>