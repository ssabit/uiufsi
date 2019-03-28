<?php

include_once('include/dbInc.php');
session_start();

$id=$_SESSION['u_id'];

if(isset($_POST['submit'])) {

    include('dbInc.php');

    $data=$_POST['uid'];




    //echo "Successful:   ".$data;

    $search_Query = "SELECT * FROM faculties WHERE 	user_uid = '$data'";
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
    <title>Faculty Main Page</title>
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
<?php
//echo $_SESSION['u_id'];
?>


<table width="90%" align="center" cellspacing="0" border="0">
    <td height="5px"; bgcolor="purple";

    <p style="color:rgb(230, 230, 230);  text-align:right;  ><a "  ><b><?php echo "welcome:".$_SESSION['u_id'];?>
            <form action="FacultyMainPage.php" method="post"> <button type="submit" name="logout">Logout</button></form></b></p></a></p></td>
    <tbody>
    <tr>
        <td width="50%" align="center" valign="middle" bgcolor="purple" style="font-size: xx-large; color: #FFFFFF;">UIU Faculty And Student Info</td>
    </tr>
    <tr>
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='FacultyMainPage.php'>Home</a>
                    </td>
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
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15"  bgcolor="#D7BDE2">
                <tbody>
                <tr>
                    <td width="25%"><table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                            <tbody>
                            <tr>
                                <td><a href='FacultyProfile.php'>Profile</a></td>
                            </tr>
                            <tr>
                                <td><a href='courseSelect.php'>Courses</a>
                                </td>

                            </tr>
                            <tr>
                                <td><a href='counseling.php'>Counsing</a></td>
                            </tr>
                            </tbody>
                        </table></td>
                    <td width="75%"><table width="100%" border="2" cellpadding="15" cellspacing="0" bgcolor="#D7BDE2">
                            <?php
                           // $search_Query = "SELECT * FROM faculties WHERE 	user_uid = 'admin'";
                            $search_Query = "SELECT * FROM faculties WHERE 	user_uid ='$id'";

                            $search_Result = mysqli_query($con, $search_Query);
                            $row = mysqli_fetch_array($search_Result);
                            ?>
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $row[1]." ".$row[2];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $row[3];?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row[6];?></td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td><?php echo $row[7];?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $row[9];?></td>
                            </tr>
                            <tr>
                                <td>Faculty Id</td>
                                <td><?php echo $row[0];?></td>
                            </tr>
                            <tr>
                                <td>Room Number</td>
                                <td><?php echo $row[8];?></td>
                            </tr>
                            <tr>
                                <td>Counsiling</td>
                                <?php
                                $rs = mysqli_query($con,"SELECT * FROM `counseling` WHERE faculty_id='$id'") or die ('error getting data.');
                                //echo "<br><b>Counseling: </b><br>";
                                ?>
                                <td><?php while($row1 = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                    echo $row1['time_slot']."   ".$row1['day']."<br>";
                                    }?></td>
                            </tr>
                            <tr>
                                <td>About</td>
                                <td><?php echo $row[10];?></td>
                            </tr>
                            <tr>
                                <td>Courses</td>

                                <td><?php

                                    $rs = mysqli_query($con,"SELECT * FROM `facultycoursebridge` INNER JOIN time_slot ON facultycoursebridge.slot_id=time_slot.slot_id WHERE facultycoursebridge.faculty_id='$id'") or die ('error getting data.');

                                    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                        $slot=$row['start_hour'].":".$row['start_minute']."min - ".$row['end_hour'].":".$row['end_minute']."min";

                                        echo "<b>course:</b>".$row['course_name']."  <b>sec:</b>".$row['section']."  <b>day:</b>".$row['day']."   <b>room:</b>".$row['room_number']."  <b>time:</b>".$slot."<br>";
                                    } ?></td>
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