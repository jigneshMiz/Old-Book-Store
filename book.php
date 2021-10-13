<div class="card" style="padding-top: 10px; padding-left: 10px; padding-right: 10px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px">Manage Your Books For Sell</a><hr class="sty">

        			<?php
        			$prod="select * from products where uname = '$user' and buyer='' order by 1 asc"; //desc
					$run_prod=mysqli_query($con,$prod);
					$count = mysqli_num_rows($run_prod);
					if ($count==0) {
						
						echo "<div class='card' style='margin-left:20px; margin-right:20px; height: 150px; margin-bottom: 10px;'>
						<div class='text-center text-muted' style='font-size: 30px; font-family: cursive; margin-top: 50px;'><i class='fas fa-remove'>&nbsp;</i><a>No Book Found</a></div>		
					</div>";
					}
                    else{
                        $c=0;
                        echo "<table cellpadding='4' border='5'>
                    <tr>
                        <th>No.</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Posted On</th>
                        <th>Price</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>";
                    }
					while ($row_prod=mysqli_fetch_array($run_prod)) 
					{
						
						
                        $pro_id=$row_prod['product_id'];
						$date=$row_prod['date'];
						$image=$row_prod['img'];
						$bname=$row_prod['bname'];
						$price=$row_prod['price'];
						$cond=$row_prod['cond'];
                        $c++
					
        			?>

        						<tr>
        							<td class="text-muted" style="font-size: 20px; font-family: cursive;"><?php echo $c ?></td>
                                    <td class="text-muted" style="font-size: 20px; font-family: cursive;"><?php echo $pro_id ?></td>
        							<td class="" style="font-size: 20px; font-family: cursive;"><a href='profile.php?pro=upbookinfo&up=<?php echo "$pro_id" ?>'><?php echo $bname ?></a></td>
                                    <td class="text-muted" style="font-family: cursive; font-size: 15px"><?php echo $date ?></td>
                                    <td class="text-muted" style="font-family: cursive; font-size: 15px"><?php echo $price ?></td>
                                    <td><a href='profile.php?pro=upbook&bno=<?php echo "$pro_id" ?>'>Update</a></td>
                                    <td class="text-muted" style="font-family: cursive; font-size: 15px"><a href='profile.php?rno=<?php echo "$pro_id" ?>'><i class='fas fa-trash'>&nbsp;</i>Remove</a></td>
                                    
        						</tr>


        			<?php
        		}

        			?>
                </table>
        			
        			<div class="text-muted text-center" style="margin-top: 10px"><h5>That's All &nbsp; ;)</h5></div>
        		</div>

