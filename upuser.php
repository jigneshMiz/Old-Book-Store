<?php

if (isset($_SESSION['user'])) {
    $user=$_SESSION['user'];

    $con=mysqli_connect("localhost","root","","rs1");
    $info="select * from user_login where username='$user'";
    $run_info=mysqli_query($con,$info);
    $row_info=mysqli_fetch_array($run_info);
    $name=$row_info['name'];
    $add=$row_info['address'];
    $pin=$row_info['pin'];
    $email=$row_info['email'];
    $phone=$row_info['phone'];
    $email=$row_info['email'];

}

?>





<div class="card" style="padding-top: 10px; padding-left: 10px; height: 600px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px; margin-left: 30px ">Update Your Profile</a><hr class="sty">


        <div class="col-sm-12">
            <form method="post" action="#">
            <table cellpadding="10" style="margin-left: 30px; margin-top:30px; ">
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Name</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="uname" value='<?php echo "$name" ?>' required></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Address</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <textarea cols="5" rows="3" class="form-control" name="uadd" ><?php echo $add ?></textarea>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Gender</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <div class="custom-control custom-radio custom-control-inline ">
                      <input type="radio" class="custom-control-input" id="radio1" name="ur1" value="Male" required>
                      <label class="custom-control-label" for="radio1">Male</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" class="custom-control-input" id="radio2"  name="ur1" value="Female" required>
                      <label class="custom-control-label" for="radio2">Female</label>
                      </div>
                    </div></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Phone</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="uphone" value='<?php echo "$phone" ?>' required></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">E-mail</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="uemail" value='<?php echo "$email" ?>' required></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">City</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                         <select name="ucity" class="form-control custom-select" required>
                          <option value="" selected>Select City</option>
                          <option value="Mehsana">Mehsana</option>
                          <option value="Bhavnagar">Bhavnagar</option>
                          <option value="Surat">Surat</option>
                          <option value="Baroda">Baroda</option>
                          <option value="Ahemdabad">Ahemdabad</option>
                          </select></td>
                </tr>
                <tr>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">Pin-Code</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 15px; font-family: cursive;">
                        <input type="text" class="form-control" name="upin" value='<?php echo "$pin" ?>' required></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><div class="text-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary text-center"><i class="fas fa-edit"></i>Update</button>
                  </div></td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {

    $uname=$_POST['uname'];
    $uadd=$_POST['uadd'];
    $upin=$_POST['upin'];
    $uphone=$_POST['uphone'];
    $ur1=$_POST['ur1'];
    $ucity=$_POST['ucity'];
    $uemail=$_POST['uemail'];
    $user=$_SESSION['user'];



    if ($uadd==NULL) {

        $up="update user_login set name='$uname',address='$add',pin='$upin',phone='$uphone',city='$ucity',email='$uemail',gender='$ur1' where username = '$user'";
        $run_up=mysqli_query($con,$up);
        if ($run_up) {
            echo "<script>alert('Your Data has been Updated!!!')</script>";
          echo "<script>window.open('profile.php?pro=uinfo','_self')</script>";
        }
        
    }
    else{

        $up="update user_login set name='$uname',address='$uadd',pin='$upin',phone='$uphone',city='$ucity',email='$uemail',gender='$ur1' where username = '$user'";
        $run_up=mysqli_query($con,$up);
    
    if ($run_up) {

         echo "<script>alert('Your Data has been Updated!!!')</script>";
          echo "<script>window.open('profile.php?pro=uinfo','_self')</script>";

    }
}
     
}

?>