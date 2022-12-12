<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
   

    <form action="search.php" method="post">
    <h4>Blog Search</h4>
    <div class="input-group">
        <input name="search"type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit"class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form><!-- seeach form -->
    <!-- /.input-group -->
</div>
<?php
  $query =  "SELECT * FROM categories";
  $data = mysqli_query($connection,$query);
?>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php  while($row = mysqli_fetch_array($data)){
     $cat_title = $row['cat_title'];
     $cat_id  = $row['cat_id'];
     echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
  } ?>
              
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
               
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>