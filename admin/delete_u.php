<?php 
    
    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_u'])){
        
        $delete_id = $_GET['delete_u'];
        
        $delete_c = "delete from user_login where id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_c);
        
        if($run_delete){
            
            echo "<script>alert('One of your User has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_u','_self')</script>";
            
        }
        
    }

?>

<?php } ?>