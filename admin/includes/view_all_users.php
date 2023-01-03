<table class="table table-bordered table-hover">
 <thead>
   <tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Role</th>
    <th>Email</th>
</tr>
</thead>
    <tbody>

        <?php
if(isset($_GET['change_to_admin'])){
    $user_id =$_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id";
    $update_query = mysqli_query($connection,$query);
                                confirm($update_querys);
                                header("Location:users.php");
}
    if(isset($_GET['change_to_subs'])){
        $user_id =$_GET['change_to_subs'];
        $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $user_id";
        $update_query = mysqli_query($connection,$query);
                                    confirm($update_query);
                                    header("Location:users.php");
        }




        $query = "SELECT * FROM users";
        $select_all_users = mysqli_query($connection,$query);
        confirm($select_all_users);
        while($row = mysqli_fetch_assoc( $select_all_users)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $randSalt = $row['randSalt'];	    
                                echo"<tr>";
                                echo"<td>{$user_id}</td>";
                                echo"<td>{$username}</td>";
                                echo" <td>{$user_firstname}</td>";
                                echo" <td>{$user_lastname}</td>";
                                echo" <td>{$user_role}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td><a href=users.php?source=edit_user&edit_user={$user_id}>Edit</a>'</td>";
                                echo "<td><a href=users.php?change_to_admin={$user_id}>Admin</a>'</td>";
                                echo "<td><a href=users.php?change_to_subs={$user_id}>Subscriber</a>'</td>";
                            
                                echo "<td><a href=users.php?delete_user={$user_id}>Delete</a>'</td>";
                                echo "</tr>";

                    
                            ?>
                        
                           </tbody>
                        </table>
                        <?php }?>
                        <?php
                        if(isset($_GET['delete_user'])){
                            $id = $_GET['delete_user'];
                           $query = "DELETE FROM users WHERE user_id={$id}";
    
                           $delete_query = mysqli_query($connection,$query);
                           confirm($delete_query);
                           header("Location:users.php");
                           
                        }
                 
 
                        ?>