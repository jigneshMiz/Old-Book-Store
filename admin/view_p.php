<?php 
    
    if(!isset($_SESSION['a_uname'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Books
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Books
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Book No: </th>
                                
                                <th> Book Name: </th>
                                <th> Author Name: </th>
                                <th> Publisher Name: </th>
                                <th>  Price: </th>
                                <th>  Seller Name: </th>
                                <th>  Status: </th>
                                <th>  Buyer Name: </th>
                                <th> Book Delete: </th>
                                <th> Book Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from products";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $bname = $row_pro['bname'];
                                    $aname = $row_pro['aname'];
                                    $pname = $row_pro['pname'];
                                    $price = $row_pro['price'];
                                    $status = $row_pro['buyer'];
                                    $cond = $row_pro['cond'];
                                    $uname = $row_pro['uname'];
                                    $date = $row_pro['date'];
                                    $i++;

                                    $get_us = "select * from user_login where username='$uname'";
                                    $run_us = mysqli_query($con,$get_us);
                                    $row_us = mysqli_fetch_array($run_us);

                                    $name=$row_us['name'];

                                    if ($status==null) {
                                        
                                        $buyer='';
                                    }
                                    else{

                                    $get_b = "select * from user_login where username='$status'";
                                    $run_b = mysqli_query($con,$get_b);
                                    $row_b = mysqli_fetch_array($run_b);

                                    $buyer=$row_b['name'];

                                    }

                                    

                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                
                                <td> <?php echo $bname; ?> </td>
                                <td> <?php echo $aname; ?> </td>
                                <td> <?php echo $pname; ?> </td>
                                <td> <?php echo $price; ?> </td>
                                <td> <?php echo $name; ?> </td>
                                <td> <?php 
                                    
                                        if($status==''){
                                            
                                            echo $status='In Stock';
                                            
                                        }else{
                                            
                                            echo $status='Sold';
                                            
                                        }
                                    
                                    ?> </td>

                                    <td><?php echo $buyer; ?></td>

                                    
 
                                <td> 
                                     
                                     <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_p=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>