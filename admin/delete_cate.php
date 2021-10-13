<?php 
    
    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_cate'])){
        
        $delete_p_cat_id = $_GET['delete_cate'];
        
        $delete_p_cat = "delete from product_categories where prod_cate_id='$delete_p_cat_id'";
        
        $run_delete = mysqli_query($con,$delete_p_cat);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Book Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_cate','_self')</script>";
            
        }
        
    }

?>




<?php } ?>