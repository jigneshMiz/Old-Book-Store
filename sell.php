
          
        
        <div class="row">
            <div class="col-lg-12">
              <div class="box text-center">
                <h1>Sell Your book</h1>
                <p class="text-muted">If you have any questions, please feel free to <a href="cont.php">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <form action="#" method="post" enctype="multipart/form-data">
                  <table cellpadding="8" class="text-left" style="margin-left: 100px">
                    <tr>
                  <td><label><b>Book Title</b></label></td>
                  <td>:-</td>
                  <td><input type="text" class="form-control" name="bname" required></td>
                  </tr>
                  <tr>
                <td><label><b>Book Author</b></label></td>
                <td>:-</td>
                  <td><input type="text" class="form-control" name="aname" required></td>
                </tr>
                <tr>
                <td><label><b>Book Publisher</b></label></td>
                <td>:-</td>
                  <td><input type="text" class="form-control" name="pname" required></td>
                </tr>
                <tr>
                  <td><label><b>Book Category</b></label></td>
                  <td>:-</td>
                
                  <td><select name="book_cate" class="form-control" required>
                              
                              <option value=""> Select a Category Product </option>
                              
                              <?php 
                              $con=mysqli_connect("localhost","root","","rs1");
                              $get_prod_cate = "select * from product_categories";
                              $run_prod_cate = mysqli_query($con,$get_prod_cate);
                              
                              while ($row_prod_cate=mysqli_fetch_array($run_prod_cate)){
                                  
                                  $prod_cate_id = $row_prod_cate['prod_cate_id'];
                                  $prod_cate_title = $row_prod_cate['prod_cate_title'];
                                  
                                  echo "
                                  
                                  <option value='$prod_cate_id'> $prod_cate_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select></td>
                        </tr>
                
                <tr>
                
                  
                    <td><label><b>Book Condition</b></label></td>
                    <td>:-</td>
                    <td><div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="radio1" name="r1" value="Used" required>
                      <label class="custom-control-label" for="radio1">Used</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="radio2"  name="r1" value="New" required>
                      <label class="custom-control-label" for="radio2">New</label>
                      </div></td>
                    
                  </tr>

                <tr>
                 
                  <td><label><b>Book price</b></label></td>
                  <td>:-</td>
                  <td><input type="text" class="text-muted form-control" name="price"></td>
                  <td>&nbsp; OR &nbsp;
                  <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="check"  name="price" value="Free">
                      <label class="custom-control-label" for="check">Free</label>
                      </div></td>
                
              </tr>
              <tr> 
                  <td><label><b>Book Description</b></label></td>
                  <td>:-</td>
                  <td><textarea rows="5" class="form-control" name="desc"></textarea>
                </td>
              </tr>
              <tr>
                  <td><label><b>Book Image</b></label></td>
                  <td>:-</td>
                  <td><input type="file" class="form-control col-sm-12" name="img" required></td>
                <tr>
                  <td></td>
                  <td></td>
                  <td><button type="submit" name="submit" value="submit" class="btn btn-primary text-center"><i class="fas fa-book"></i> Submit</button></td>
                </tr>
                  
              </table>
                </form>
              
            
        
         
          </div>
        </div>
      </div>
   
<?php

  
if(isset($_POST['submit'])){

  if (isset($_SESSION['user'])) {

    $user=$_SESSION['user'];
    
    $bname = $_POST['bname'];
    $aname = $_POST['aname'];
    $pname = $_POST['pname'];
    $cate = $_POST['book_cate'];
    $cond = $_POST['r1'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $img = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];
    move_uploaded_file($temp,"book_img/$img");
    
    $con=mysqli_connect("localhost","root","","rs1");
    $insert_product = "insert into products (prod_cate_id,date,bname,aname,pname,cond,price,des,img,uname) values ('$cate',NOW(),'$bname','$aname','$pname','$cond','$price','$desc','$img','$user')";
    
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('profile.php?pro=bo','_self')</script>";
        
    }
    
}
}

?>
