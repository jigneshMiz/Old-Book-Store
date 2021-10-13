<?php 
    
    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_p'])){
        
        $delete_id = $_GET['delete_p'];
        
        $delete_pro = "delete from products where product_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your product has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_p','_self')</script>";
            
        }
        
    }

?>

<?php } ?>