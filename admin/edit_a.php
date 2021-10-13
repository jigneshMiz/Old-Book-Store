<?php 

    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<?php 

    if(isset($_GET['edit_a'])){
        
        $edit_user = $_GET['edit_a'];
        
        $get_user = "select * from admin where a_id='$edit_user'";
        
        $run_user = mysqli_query($con,$get_user);
        
        $row_user = mysqli_fetch_array($run_user);
        
        $id = $row_user['a_id'];
        
        $name = $row_user['a_name'];
        
        $pass = $row_user['a_pass'];
        
        $email = $row_user['a_email'];

        $city = $row_user['a_city'];
        $uname = $row_user['a_uname'];
        $phone = $row_user['a_phone'];
        
        
        
        
        
       
        
    }

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Profile
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Profile
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="name" type="text" class="form-control" required value="<?php echo $name; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                    </div>

                      <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="email" type="email" class="form-control" required value="<?php echo $email; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                    </div>
                      <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> City </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="city" type="text" class="form-control" required value="<?php echo $city; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Phone </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="phone" type="text" class="form-control" required value="<?php echo $phone; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                    </div>

                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Gender </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->

                      <input type="radio" class="custom-control-input" id="radio1" name="r1" value="Male" required>
                      <label class="custom-control-label" for="radio1">Male</label>
                      <input type="radio" class="custom-control-input" id="radio2" name="r1" value="Female" required>
                      <label class="custom-control-label" for="radio2">Female</label>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Username </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="uname" type="text" class="form-control" required value="<?php echo $uname; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                    </div>
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="pass" type="password" class="form-control" required value="<?php echo $pass; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                    </div>


                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Update" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['r1'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

   
    $up = "update admin set a_name='$name',a_email='$email',a_uname='$uname',a_pass='$pass',a_phone='$phone',a_gender='$gender',a_city='$city' where a_id='$id'";
    
    
    $run_up = mysqli_query($con,$up);
    
    if($run_up){
        
        echo "<script>alert('Profile has been Updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_a','_self')</script>";
    }
    
    session_destroy();
}

?>


<?php } ?>