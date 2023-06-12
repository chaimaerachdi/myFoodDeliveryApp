<?php include('../admin/partials/menu.php');?><!--comment part =menu +footer -->

<!-- here only changing part iss inserted  -->
        <!-- main contenet section  stars -->
        <div class="main_content">
            <div class="wrapper">
                <h1>MANAGE ADMIN</h1>
                <!-- btn to add admmin -->
                <?php
                    if( isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }                
                ?>
                <?php
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
                <br><br><br>
                <a class="btn-primary" href="add-admin.php">add admin</a>
                <br><br><br><br>
                <table width="100%" > 
                <tr>
                    <th>Serial Number(S.N)</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>
                
                <?php
                    // recupere de la bdd  tous les admins
                    $sql="SELECT * FROM tbl_admin";
                    $res=mysqli_query($conn,$sql);
                    if($res)
                    {
                        // il a pas pu recupere les admins de dbb
                        // echo'il a pu recupere les admins de dbb\n';
                        // s'il y'a des elts da la bdd
                        $count=mysqli_num_rows($res);//echo $count;
                        if($count>0)
                        {
                            // exist des admins dans la bdd
                            // dans ce cas je recupere elt par elt
                            
                            $sn=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $full_name=$row['full_name'];
                                $user_name=$row['user_name'];
                                $password=$row['pw'];
                                // I have to indsert html code here so I need to go from =>php to html to php again to complete the process
                                ?>
                                <!-- here html where I will use also php inside pour recupere les valuers ds variables $id... -->
                                <tr><!--when i will add code i will dispaly them from db-->
                                    <td><?php echo $sn?></td>
                                    <td><?php echo$full_name;?></td>
                                    <td><?php echo $user_name;?></td>
                                    <td><a class="btn-secondary" href="<?php echo SESSIONURL;?>admin/update-admin.php?id=<?php echo $id?>">update admin </a></td><br><br>
                                    <td><a class="btn-danger"    href="<?php echo SESSIONURL;?>admin/delete-admin.php?id=<?php echo $id;?>">delete admin</a></td>
                                    <!-- use GET method to send data to update-admin page|^ -->
                                </tr>
                                <?php $sn=$sn+1;
                            }
                        }
                        else
                        {
                            // pas d' admins dans la bdd
                            echo'pas d\' admins dans la bdd';
                        }
                    }
                    else
                    {
                        // il n'a pas pu recupere les admins de dbb
                        echo'il n\'a pas pu recupere les admins de dbb\n';
                    }
                ?>
                </table>
   
            </div>   
        </div>
        <!-- main contenet section  ends -->

<?php include('../admin/partials/footer.php');?>                   



<!-- <tr>when i will add code i will dispaly them from db -->
<!-- <td>1.</td>
<td>Chaimae Rachdi</td>
<td>Chaimae</td>
<td><a class="btn-secondary" href="#">update admin </a></td>
<td><a class="btn-danger" href="#">delete admin</a></td>
</tr>
<tr>when i will add code i will dispaly them from db-->
<!-- <td>1.</td>
<td>Chaimae Rachdi</td>
<td>Chaimae</td>                      
<td><a class="btn-secondary" href="#">update admin </a></td>
<td><a class="btn-danger" href="#">delete admin</a></td>
</tr>
<tr>when i will add code i will dispaly them from db-->
<!-- <td>1.</td>
<td>Chaimae Rachdi</td>
<td>Chaimae</td>
<td><a class="btn-secondary" href="#">update admin </a></td>
<td><a class="btn-danger" href="#">delete admin</a></td>

</tr>  -->