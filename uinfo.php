<?php

if (isset($_SESSION['user'])) {
    $user=$_SESSION['user'];

    $con=mysqli_connect("localhost","root","","rs1");
    $get_user="select * from user_login where username='$user'";
    $run_user=mysqli_query($con,$get_user);
    $row_user=mysqli_fetch_array($run_user);
    $name=$row_user['name'];
    $add=$row_user['address'];
    $city=$row_user['city'];
    $pin=$row_user['pin'];
    $gender=$row_user['gender'];
    $phone=$row_user['phone'];
    $email=$row_user['email'];
}



?>




<div class="card" style="padding-top: 10px; padding-left: 10px; height: 550px">
        <a class="text-muted" style="font-family: cursive; font-size: 30px; margin-left: 30px ">My Info</a><hr class="sty">


        <div class="col-sm-12">
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">Name</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $name ?></td>
                </tr>
            </table>
            <hr>
            <table cellpadding="2">
                 <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">Address</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $add ?></td>
                </tr>
            </table>
            <hr>
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">City</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $city ?></td>
                </tr>
                </table>
            <hr>
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">Pin-Code</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $pin ?></td>
                </tr>
                </table>
            <hr>
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">Gender</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $gender ?></td>
                </tr>
                </table>
            <hr>
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">Phone</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $phone ?></td>
                </tr>
                </table>
            <hr>
            <table cellpadding="2">
                <tr>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">E-mail</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;">:-</td>
                    <td class="text-muted" style=" font-size: 20px; font-family: cursive;"><?php echo $email ?></td>
                </tr>
            </table>
        </div>

    </div>