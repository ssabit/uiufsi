<?php

include_once('include/dbInc.php');
session_start();

$id=$_SESSION['s_uid'];
$fname=$_SESSION['s_first'];
$lname=$_SESSION['s_last'];
$gender=$_SESSION['s_gender'];
$dept=$_SESSION['s_dept'];
$phone=$_SESSION['s_phone'];
$address=$_SESSION['s_address'];
$email=$_SESSION['s_email'];
$credit=$_SESSION['s_credit'];
//$id=$_SESSION['s_credit'];




/*if(isset($_POST['submit'])) {

    include('dbInc.php');

    $data=$_POST['uid'];
    //$_SESSION['username']=$_POST['uid'];
    $data=$_SESSION['s_uid'];

    echo "Successful:   ".$data;

    $search_Query = "SELECT * FROM students WHERE 	student_uid = '$data'";

    $search_Result = mysqli_query($con, $search_Query);
}*/
if(isset($_POST['submit'])) {

    include('dbInc.php');

    $data=$_POST['uid'];





    //echo "Successful:   ".$data;

    $search_Query = "SELECT * FROM students WHERE 	student_uid = '$data'";
    //$search_Query = "SELECT * FROM faculties WHERE 	user_uid = '$id'";

    $search_Result = mysqli_query($con, $search_Query);
}



if(isset($_POST['logout'])){

    session_start();
    session_unset();
    session_destroy();
    header("Location:index.php");
    exit();

}

?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Main Page</title>
    <style type="text/css">
        a:link {
            text-decoration: none;
        }
        a:visited {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        a:active {
            text-decoration: none;
        }
        body {
            background-color: #FFFFFF;
        }
        body,td,th {
            color: #000000;
        }
    </style>
</head>

<body>
<table width="90%" align="center" cellspacing="0">
    <td height="5px"; bgcolor="purple";

    <p style="color:rgb(230, 230, 230);  text-align:right;  ><a "  ><b><?php echo "welcome:".$_SESSION['s_uid'] ?>
            <form action="studentMainPage.php" method="post"> <button type="submit" name="logout">Logout</button></form></b></p></a></p></td>
    <tbody>
    <tr>
        <td width="50%" align="center" valign="middle" bgcolor="purple" style="font-size: xx-large; color: #FFFFFF;">UIU Faculty And Student Info</td>
    </tr>
    <tr>
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='studentMainPage.php'>Home</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='search.php'target="_blank">Search Faculty</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='indexQuestion.php' target="_blank">Question Bank</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank">UIU</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php' target="_blank">Contact</a>
                    </td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                <tbody>
                <tr>
                    <td width="25%"><table width="100%" cellspacing="0" cellpadding="15">
                            <tbody>
                            <tr>
                                <td><a href='studentProfile.php'>Profile</a></td>
                            </tr>
                            <tr>
                                <td><a href='studentCourseBridge.php'>Courses</a>
                                </td>

                            </tr>
                            </tbody>
                        </table></td>
                    <td width="75%"><table width="100%" border="2" cellpadding="15" cellspacing="0">
                            <?php
                            $search_Query = "SELECT * FROM students WHERE student_uid ='$id'";

                            $search_Result = mysqli_query($con, $search_Query);
                            $row = mysqli_fetch_array($search_Result);
                            ?>
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $row[0]." ".$row[1];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $row[6];?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row[3];?></td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td><?php echo $row[4];?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $row[7];?></td>
                            </tr>
                            <tr>
                                <td>Student Id</td>
                                <td><?php echo $row[2];?></td>
                            </tr>
                            <tr>
                                <td>Courses</td>
                                <td><?php   $rs3 = mysqli_query($con,"SELECT * FROM `studentcoursebridge` INNER JOIN time_slot ON studentcoursebridge.slot_id=time_slot.slot_id WHERE studentcoursebridge.student_id='$id'") or die ('error getting data.');

                                    while($row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC)){
                                        $slot=$row3['start_hour'].":".$row3['start_minute']."min - ".$row3['end_hour'].":".$row3['end_minute']."min";

                                        echo "<b>course:</b>".$row3['course_name']."  <b>sec:</b>".$row3['section']."  <b>day:</b>".$row3['day']."   <b>room:</b>".$row3['room_number']."  <b>time:</b>".$slot."<br>";
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Credit</td>
                                <td><?php echo $row[9];?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $row[8];?></td>
                            </tr>
                            </tbody>
                        </table></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#800080">&nbsp;</td>
    </tr>
    </tbody>
</table>
<p>&nbsp;</p>



</body>
</html>