<?php

    session_start();
    $con=mysqli_connect("localhost","root","","rs1");

    $suname=$_SESSION['user'];
    $runame=$_SESSION['name1'];

    $upm=mysqli_query($con,"UPDATE chat SET msg_status='Read' WHERE s_uname='$runame' AND r_uname='$suname'");
    $chk="select * from chat where (s_uname='$suname' and r_uname='$runame') OR (r_uname='$suname' and s_uname='$runame') order by 1 ASC";
     $run_chk=mysqli_query($con,$chk);
   while ($row_chk=mysqli_fetch_array($run_chk)) {
        
        $msg_cont=$row_chk['msg_cont'];
        $msg_date=$row_chk['msg_date'];
        $s_name=$row_chk['s_name'];
        $r_name=$row_chk['r_name'];
        $s_unm=$row_chk['s_uname'];
        $r_unm=$row_chk['r_uname'];
        $msg_status=$row_chk['msg_status'];

?>
<?php
        if ($suname==$r_unm AND $runame==$s_unm) {
        

           echo " <div class='row' style='width: 780px; margin-top: 10px;'>
            <div class='row card col-md-9' style=' height: auto; padding-top: 3px; padding-left: 5px; margin-left: 20px; background-color: lightblue; '>
                <a class='text-muted'><i style='font-size: 15px; ' class='fas fa-user-circle'>&nbsp;</i>$s_name</a>
            
               <p>$msg_cont</p>

               <div>

                <a class='text-muted'>$msg_date</a>

                   
               </div>

            </div>
        </div>";
    }
    elseif ($suname==$s_unm AND $runame==$r_unm) {
    
    
         echo "<div class='row justify-content-end' style='margin-top: 10px; width: 780px;'>
            <div class='row card col-md-9 text-right' style=' height: auto; padding-top: 3px; padding-left: 5px; background-color: lightgreen; '>
                <a class='text-muted'>$s_name &nbsp;<i style='font-size: 15px; ' class='fas fa-user-circle'></i></a>
            
               <p>$msg_cont</p>

               <div>

                <a class='text-muted'>$msg_date</a>
                <a class='text-muted'>($msg_status)</a>
                   
               </div>
               
            </div>
        </div>";

    }
        ?>

<?php
}

?>
