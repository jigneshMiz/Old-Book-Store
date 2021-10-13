<?php 
    
    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_a'])){
        
        $delete_user_id = $_GET['delete_a'];
        
        $delete_user = "delete from admin where a_id='$delete_user_id'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('One of your Admin has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_a','_self')</script>";
            
        }
        
    }

?>

<?php } ?>