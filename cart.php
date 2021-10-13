<div class="card" style="padding-top: 20px; padding-left: 10px;">
        <a class="text-muted" style="font-family: cursive; font-size: 30px">Manage Your Wishlist</a><hr class="sty">
        			<?php
        			$cart="select * from cart where uname = '$user'";
					$run_cart=mysqli_query($con,$cart);
					$count = mysqli_num_rows($run_cart);
					if ($count==0) {
						
						echo "<div class='card' style='margin-left:20px; margin-right:20px; height: 150px; margin-bottom: 10px;'>
						<div class='text-center text-muted' style='font-size: 30px; font-family: cursive; margin-top: 50px;'><i class='fas fa-remove'>&nbsp;</i><a>No Book Found</a></div>		
					</div>";
					}
					while ($row_cart=mysqli_fetch_array($run_cart)) 
					{
						
						$pro_id=$row_cart['pro_id'];
						$prod="select * from products where product_id = '$pro_id'";
						$run_prod=mysqli_query($con,$prod);
						$row_prod=mysqli_fetch_array($run_prod);
						$image=$row_prod['img'];
						$bname=$row_prod['bname'];
						$price=$row_prod['price'];
						$cond=$row_prod['cond'];
                  $date=$row_prod['date'];
					
        			?>

        			<div class="card" style="margin-left:20px; margin-right:20px; height: 150px; margin-bottom: 10px;">
        				<div class="row col-md-9">
        				<div class="col-md-3" style="padding-top: 10px; padding-left: 10px;">
        					<img src=<?php echo "book_img/$image" ?> width="130px" height="130px">
        				</div>
        				<div class="col-md-9">
        					<table cellpadding="2">
        						<tr>
        							<td class="text-muted" style="font-size: 20px; font-family: cursive;">Name</td>
        							<td>:</td>
        							<td class="" style="font-size: 20px; font-family: cursive;"><a href='details.php?pro_id=<?php echo "$pro_id" ?>'><?php echo $bname ?></a></td>
        						
        						</tr>
        						<tr>
        							<td class="text-muted" style="font-size: 15px; font-family: cursive;">Price</td>
        							<td>:</td>
        							<td class="text-muted" style="font-family: cursive; font-size: 15px"><?php echo $price ?></td>
        						</tr>
        						<tr>
        							<td class="text-muted" style="font-size: 15px; font-family: cursive;">Condition</td>
        							<td>:</td>
        							<td class="text-muted" style="font-family: cursive; font-size: 15px"><?php echo $cond ?></td>
        						</tr>
                        <tr>
                           <td class="text-muted" style="font-size: 15px; font-family: cursive;">Posted On</td>
                           <td>:</td>
                           <td class="text-muted" style="font-family: cursive; font-size: 15px"><?php echo $date ?></td>
                        </tr>
        						<tr>
        							<td class="text-muted" style="font-family: cursive; font-size: 15px"><a href='profile.php?pro_id=<?php echo "$pro_id" ?>'><i class='fas fa-trash'>&nbsp;</i>Remove</a></td>
                                    <td></td>
                                    <td style="font-family: cursive; font-size: 15px;"><a style="color: blue" href='profile.php?pro=uchat&prod=<?php echo "$pro_id" ?>'>chat <i class='fas fa-comments'></i></a></td>
        						</tr>
        					</table>
        				</div>
        			</div>
        			</div>

        			<?php
        		}

        			?>
        			
        			<div class="text-muted text-center"><h5>That's All &nbsp; ;)</h5></div>
        		</div>

