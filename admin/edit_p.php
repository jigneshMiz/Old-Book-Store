<?php 

    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_p'])){
        
        $edit_id = $_GET['edit_p'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $bname = $row_edit['bname'];
        $aname = $row_edit['aname'];
        $pname = $row_edit['pname'];
        
        $image = $row_edit['img'];
        
        $p_price = $row_edit['price'];

        $prod_cate_id = $row_edit['prod_cate_id'];
        
        
        
        $p_desc = $row_edit['des'];
        
    }
        
        $get_p_cat = "select * from product_categories where prod_cate_id='$prod_cate_id'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['prod_cate_title'];
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Update Books </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Update Books
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Update Books 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="bname" type="text" class="form-control" required value="<?php echo $bname; ?>">
                          
                      </div>
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Author </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="aname" type="text" class="form-control" required value="<?php echo $aname; ?>">
                          
                      </div>
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Publisher </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="pname" type="text" class="form-control" required value="<?php echo $pname; ?>">
                          
                      </div>
                       
                   </div><!-- form-group Finish -->

                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="book_cate" class="form-control" required><!-- form-control Begin -->
                              
                              <option value="<?php echo $prod_cate_id; ?>"> <?php echo $p_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['prod_cate_id'];
                                  $p_cat_title = $row_p_cats['prod_cate_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
            
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <div class="col-md-10">
                          <input name="price" type="text" class="form-control"> 
                        </div>
                        OR&nbsp;
                          <input type="checkbox" class="custom-control-input" id="check"  name="price" value="Free">
                          <label class="custom-control-label" for="check">Free</label>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Condition </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->

                      <input type="radio" class="custom-control-input" id="radio1" name="r1" value="Used" required>
                      <label class="custom-control-label" for="radio1">Used</label>
                      <input type="radio" class="custom-control-input" id="radio2" name="r1" value="New" required>
                      <label class="custom-control-label" for="radio2">New</label>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="desc" cols="19" rows="6" class="form-control"><?php echo $p_desc; ?></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Image </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="img" type="file" class="form-control" required>
                           <br>
                          
                          <img width="70" height="70" src="/../rs2/book_img/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="update" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
</body>
</html>


<?php 

if(isset($_POST['submit'])){

  
    
    $bname = $_POST['bname'];
    $aname = $_POST['aname'];
    $pname = $_POST['pname'];
    $cate = $_POST['book_cate'];
    $cond = $_POST['r1'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $img = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];
    move_uploaded_file($temp,"/../rs2/book_img/$img");
    
    $con=mysqli_connect("localhost","root","","rs1");
    $insert_product = "update products set prod_cate_id=$cate,bname='$bname',aname='$aname',pname='$pname',cond='$cond',price='$price',des='$desc',img='$img' where product_id='$p_id'";
    
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been Updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_p','_self')</script>";
        
    }
    

}
    
    

?>


<?php } ?>