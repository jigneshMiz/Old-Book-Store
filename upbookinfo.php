
<?php

if (isset($_GET['up'])) {
    
    $pro_id=$_GET['up'];

    $con=mysqli_connect("localhost","root","","rs1");
    $prod="select * from products where product_id='$pro_id'";
    $run_prod=mysqli_query($con,$prod);
    $row_prod=mysqli_fetch_array($run_prod);
    $prod_cate_id=$row_prod['prod_cate_id'];
    $bname=$row_prod['bname'];
    $aname=$row_prod['aname'];
    $pname=$row_prod['pname'];
    $cond=$row_prod['cond'];
    $price=$row_prod['price'];
    $image=$row_prod['img'];
    $des=$row_prod['des'];
    $date=$row_prod['date'];
    $cate="select * from product_categories where prod_cate_id='$prod_cate_id'";
    $run_cate=mysqli_query($con,$cate);
    $row_cate=mysqli_fetch_array($run_cate);
    $prod_cate_id=$row_cate['prod_cate_id'];
    $prod_cate_title=$row_cate['prod_cate_title'];
}


?>


<div class="card" style="padding-top: 10px; padding-left: 10px; height: 400px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px">Info of Your Uploaded Book</a><hr class="sty">
        <div class="row col-md-12">
        <div class="col-md-4 card" style="height: 240px; width: 250px; padding-left: 20px; padding-top: 20px;">
            <img src=<?php echo "book_img/$image" ?> width="200" height="200">
        </div>
        <div class="col-md-6">
            <table cellpadding="8">
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Name</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $bname ?></td>
                </tr>
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Author</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $aname ?></td>
                </tr>
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Publisher</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $pname ?></td>
                </tr>
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Category</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $prod_cate_title ?></td>
                </tr>
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Condition</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $cond ?></td>
                </tr>
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Price</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $price ?></td>
                </tr>
                <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Description</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $des ?></td>
                </tr>
                 <tr>
                    <td class="text-muted" style="font-size: 15px; font-family: cursive;">Uploaded On</td>
                    <td>:</td>
                    <td style="font-size: 15px; font-family: cursive;"><?php echo $date ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
    