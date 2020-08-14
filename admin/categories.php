<?php require_once('inc/top.php');  ?>

  </head>
  <body>
    <div id="wrapper">
<?php require_once('inc/header.php');  ?>


        <div class="container-fluid body-section">
            <div class="row">
               <?php require_once('inc/sidebar.php');  ?>

                <div class="col-md-9">
                    <h1><i class="fa fa-folder-open"></i> Categories <small>Different Categories</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-folder-open"></i> Categories</li>
                    </ol>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <form action="inc/process.php" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name:*</label>
                                    <?php
                                    if (isset($_GET['error'])) {
                                      echo "<span class='pull-right' style='color:red;'>".$_GET['error']."</span>";
                                      
                                    }
                                     else if (isset($_GET['success']))
                                   {
                                      echo "<span class='pull-right' style='color:green;'>".$_GET['success']."</span>";
                                      
                                    }
                                    else {
                                      echo "Enter Catagory";
                                      
                                    }
                                  ?>
                                    <input type="text" placeholder="Category Name" class="form-control" name="cat_name" required>
                                </div>
                                <input type="submit" value="Add Category" name="add_categorie" class="btn btn-primary">
                            </form>

                              <br> <br>

                              <?php
                              if (isset($_GET['edit'])) { 
                                  $edit_id=$_GET['edit'];
                                  $query = "select * from categories where cat_id=$edit_id";
                                  $data = mysqli_query($con,$query);
                                  $total = mysqli_num_rows($data);
                                  $result = mysqli_fetch_assoc($data)

                               ?> 
                              <form action="inc/process.php?upcatagory=<?php echo $edit_id;?>" method="post">
                                <div class="form-group">
                                    <label for="category">Update Category Name:*</label>
                                    <?php
                                    if (isset($_GET['uperror'])) {
                                      echo "<span class='pull-right' style='color:red;'>".$_GET['uperror']."</span>";
                                      
                                    }
                                     else if (isset($_GET['upsuccess']))
                                   {
                                      echo "<span class='pull-right' style='color:green;'>".$_GET['upsuccess']."</span>";
                                      
                                    }
                                    else {
                                      echo "Enter Catagory";
                                      
                                    }
                                  ?>
                                    <input type="text" placeholder="Update Category Name" class="form-control" name="upcat_name" value=<?php echo $result['cat_name'] ; ?> required>
                                </div>
                                <input type="submit" value="Update Category" name="up_categorie" class="btn btn-primary">
                            </form> <?php

                              }


                                ?>
                              

                        </div>
                        <div class="col-md-6"><br>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                  <?php
                                        $query = "select * from categories";
                                        $data = mysqli_query($con,$query);
                                        $total = mysqli_num_rows($data);
                                        if($total!=0)
                                        {
                                            ?>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                    
                                              while($result = mysqli_fetch_assoc($data))
                                              {
                                                echo"<tr>
                                                     <td>".$result['cat_id']."</td>
                                                     <td>".$result['cat_name']."</td>
                                                     <td><a href='categories.php?edit=".$result['cat_id']."'><i class='fa fa-pencil'></i></a></td>
                                                    <td><a href='categories.php?del=".$result['cat_id']."'><i class='fa fa-times'></i></a></td>
                                                     </tr>";
                                              }
                                          }
                                        ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php require_once('inc/footer.php');  ?>
