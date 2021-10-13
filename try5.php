<?php

echo "name:-".$_POST['bname']."</br>";
echo "author:-".$_POST['aname']."</br>";
echo "publisher:-".$_POST['pname']."</br>";
echo "category:-".$_POST['book_cate']."</br>";
echo "condition:-".$_POST['r1']."</br>";
echo "price:-".$_POST['price']."</br>";
echo "desciption:-".$_POST['desc']."</br>";




session_start();
if (isset($_SESSION['user'])) {
    $uname=$_SESSION['user'];
    echo "user".$uname."</br>";
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
    move_uploaded_file($temp,"book_img/$img");
    
    $con=mysqli_connect("localhost","root","","rs1");
    $insert_product = "insert into products (prod_cate_id,date,bname,aname,pname,cond,price,des,img,uname) values ('$cate',NOW(),'$bname','$aname','$pname','$cond','$price','$desc','$img','$uname')";
    
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        //echo "<script>window.open('aa.php?view_products','_self')</script>";
        
    }
    
}
}

?>
