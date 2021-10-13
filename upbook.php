<?php
if (isset($_GET['bno'])) {
    
    $pro_id=$_GET['bno'];

    if (isset($_SESSION['user'])) {
     
        $user=$_SESSION['user'];

        $con=mysqli_connect("localhost","root","","rs1");
        $chk="select * from products where product_id='$pro_id' and uname='$user'";
        $run_chk=mysqli_query($con,$chk);
        $row_chk=mysqli_fetch_array($run_chk);
        $bname=$row_chk['bname'];
        $aname=$row_chk['aname'];
        $pname=$row_chk['pname'];
        $des=$row_chk['des'];
        $price=$row_chk['price'];

    }

}
?>


<div class="card" style="padding-top: 10px; padding-left: 10px; height: 550px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px; margin-left: 30px ">Update Your Book</a><hr class="sty">


        <div class="col-sm-12">
            <form method="post">
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Book Name</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="ubname" value='<?php echo "$bname" ?>' required></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Author</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="uaname" value='<?php echo "$aname" ?>' required></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Publisher</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="upname" value='<?php echo "$pname" ?>' required></td>
                </tr>
                 <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Category</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <select name="ubook_cate" class="form-control" required>
                              
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
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Condition</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <div class="custom-control custom-radio custom-control-inline ">
                      <input type="radio" class="custom-control-input" id="radio1" name="ur1" value="Used" required>
                      <label class="custom-control-label" for="radio1">Used</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="radio2"  name="ur1" value="New" required>
                      <label class="custom-control-label" for="radio2">New</label>
                      </div>
                    </td>
                </tr>
                 <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Price</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="text-muted form-control" name="uprice"></td>
                        <td class="text-muted" style=" font-size: 15px; font-family: cursive">&nbsp; OR &nbsp;
                        <div class="custom-control custom-checkbox custom-control-inline ">
                      <input type="checkbox" class="custom-control-input" id="check"  name="uprice" value="Free">
                      <label class="custom-control-label" for="check">Free</label>
                      </div>
                    </td>
                </tr>
                 <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Description</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <textarea rows="5" class="form-control" name="udes"><?php echo $des ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> <button type="submit" name="submit" value="submit" class="btn btn-primary text-center"><i class="fas fa-book"></i> Submit</button></td>
                </tr>
            </table>
            </form>
        </div>

    </div>

<?php

if (isset($_POST['submit'])) {


    $ubname=$_POST['ubname'];
    $uaname=$_POST['uaname'];
    $upname=$_POST['upname'];
    $ubook_cate=$_POST['ubook_cate'];
    $ur1=$_POST['ur1'];
    $uprice=$_POST['uprice'];
    $udes=$_POST['udes'];
    $user=$_SESSION['user'];
    $pro_id=$_GET['bno'];

    if ($uprice==Null && $udes==Null) {

        $up="update products set prod_cate_id='$ubook_cate',bname='$ubname',aname='$uaname',pname='$upname',cond='$ur1',price='$price',des='$des' where product_id='$pro_id' and uname='$user'";
        $run_up=mysqli_query($con,$up);
        if ($run_up) {
          echo "<script>alert('Your Book has been Updated!!!')</script>";
          echo "<script>window.open('profile.php?pro=upbookinfo&up=$pro_id','_self')</script>";
        }
    
    }
    elseif ($uprice==Null) {
        
         $up="update products set prod_cate_id='$ubook_cate',bname='$ubname',aname='$uaname',pname='$upname',cond='$ur1',price='$price',des='$udes' where product_id='$pro_id' and uname='$user'";
        $run_up=mysqli_query($con,$up);
        if ($run_up) {
          echo "<script>alert('Your Book has been Updated!!!')</script>";
          echo "<script>window.open('profile.php?pro=upbookinfo&up=$pro_id','_self')</script>";
        }
    
    
    }
    elseif ($udes==Null) {
       
        $up="update products set prod_cate_id='$ubook_cate',bname='$ubname',aname='$uaname',pname='$upname',cond='$ur1',price='$uprice',des='$des' where product_id='$pro_id' and uname='$user'";
        $run_up=mysqli_query($con,$up);
        if ($run_up) {
          echo "<script>alert('Your Book has been Updated!!!')</script>";
          echo "<script>window.open('profile.php?pro=upbookinfo&up=$pro_id','_self')</script>";
        }
    }
    else{

     $up="update products set prod_cate_id='$ubook_cate',bname='$ubname',aname='$uaname',pname='$upname',cond='$ur1',price='$uprice',des='$udes' where product_id='$pro_id' and uname='$user'";
        $run_up=mysqli_query($con,$up);
        if ($run_up) {
          echo "<script>alert('Your Book has been Updated!!!')</script>";
          echo "<script>window.open('profile.php?pro=upbookinfo&up=$pro_id','_self')</script>";
        }
}
}

?>