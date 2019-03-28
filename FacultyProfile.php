<?php

//$host = "127.0.0.1";
//$user = "root";
//$password ="";
//$database = "ufsi";

//include_once('include/dbInc.php');

session_start();
$id=$_SESSION['u_id'];
//echo $id;

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);





$user = 'root';
$pass = '';
$db = 'ufsi';
$db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect!");
$sqlget = "SELECT * FROM faculties WHERE 	user_uid ='$id'";
$sqldata = mysqli_query($db,$sqlget) or die ('error getting data.');
$row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC);

//$uid = $row['student_first'];;
 $fname = $row['user_first'];
$lname = $row['user_last'];
$phone = $row['phone'];
$email=$row['user_email'];
$about =$row['about'];
$facultyId=$row['faculty_id'];
$deptName=$row['department_name'];
 $roomNum=$row['room_number'];
//echo $credit=$row['credit'];
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
/*try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}*/

// get values from the form
/*function getPosts()
{
    $posts = array();
    $posts[0] = $_SESSION['u_id'];
    $posts[1] = $_POST['fname'];
    $posts[2] = $_POST['lname'];
    $posts[3] = $_POST['phone'];
    $posts[4] = $_POST['about'];
    $posts[5]=$_POST['email'];
    $posts[6]=$_POST['facultyId'];
    $posts[7]=$_POST['deptName'];
    $posts[8]=$_POST['roomNum'];


    return $posts;
}*/


// Search

/*if(isset($_POST['search']))
{
    $data = getPosts();

    $search_Query = "SELECT * FROM faculties WHERE 	user_uid = '$data[0]'";

    $search_Result = mysqli_query($connect, $search_Query);
    //$search_Result = mysqli_query($con, $search_Query);


    if($search_Result)
    {

        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $uid = $row['user_uid'];
                $fname = $row['user_first'];
                $lname = $row['user_last'];
                $phone = $row['phone'];
                $about = $row['about'];
                $email = $row['user_email'];
                $facultyId = $row['faculty_id'];
                $deptName = $row['department_name'];
                $roomNum = $row['room_number'];

            }
        }else{
            echo 'No Data For This Id';
            header("Location:FacultyProfile.php?search=empty");
        }
    }else{

        echo 'Result Error';
        header("Location:FacultyProfile.php?search=error");

    }
}*/



// Update
if(isset($_POST['update']))
{
    $gender=$_POST['gender'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $about=$_POST['about'];
    $email=$_POST['email'];
    $deptName=$_POST['deptName'];
    $roomNum=$_POST['roomNum'];
    $facultyId=$_POST['facultyId'];
    $uid=$id;



    //$data = getPosts();
    $update_Query = "UPDATE `faculties` SET `user_first`='$fname',`user_last`='$lname',`phone`='$phone',`about`='$about',`user_email`='$email',`gender`='$gender',`faculty_id`='$facultyId',`department_name`='$deptName',`room_number`='$roomNum' WHERE `user_uid` = '$uid'";
    $update_Result = mysqli_query($db, $update_Query);
    header("Location:FacultyMainPage.php?update=success");

    /*try{
        $update_Result = mysqli_query($db, $update_Query);
        //$update_Result = mysqli_query($con, $update_Query);
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
                header("Location:FacultyMainPage.php?update=success");





            }else{
                echo 'Data Not Updated';
                header("Location:FacultyProfile.php?update=failed");

            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }*/
}



?>


<!doctype html>
<html>


<head>
    <meta charset="utf-8">
    <title>Faculty Profile</title>
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
    </style>
</head>

<body>

<table width="1000" align="center" cellspacing="0">
    <tbody>
    <tr>
        <td align="center" valign="middle" bgcolor="#800080" style="font-size: xx-large; color: #FFFFFF;">UIU Faculty And Student Info</td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='FacultyMainPage.php'>Home</a>
                    </td>

                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank" >UIU</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php'target="_blank">Contact</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                <tbody>
                <tr>

                    <br>
                    <br>
                    <form action="FacultyProfile.php" method="post">

                        <label>User UID: </label>
                        <input type="text" name="uid" value="<?php echo $id;?>" disabled><br><br>

                        <label>First Name: </label>
                        <input type="text" name="fname" value="<?php echo $fname;?>"><br><br>

                        <label>Last Name: </label>
                        <input type="text" name="lname" value="<?php echo $lname;?>"><br><br>

                        <label>Gender: </label>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female<br><br>

                        <label>Faculty ID: </label>
                        <input type="text" name="facultyId" value="<?php echo $facultyId;?>"><br><br>

                        <label>Department: </label>
                        <select name="deptName">
                            <option>CSE</option>
                            <option>EEE</option>
                            <option>BBA</option>
                        </select><br><br>
                        <label>Room Number: </label>

                        <select name="roomNum">
                            <option>Select Room</option>
                            <?php
                            $i=0;
                            while($i<10):;?>

                                <option><?php echo "PC Computer Lab".++$i;?></option>
                            <?php endwhile;?>


                            <?php
                            $i=0;
                            while($i<2):;?>

                                <option><?php echo "PC Circuit Lab".++$i;?></option>
                            <?php endwhile;?>

                            <?php
                            $i=0;
                            while($i<2):;?>

                                <option><?php echo "PC Digital Lab".++$i;?></option>
                            <?php endwhile;?>




                            <?php
                            $i=0;
                            while($i<10):;?>

                                <option><?php echo "PC Phy/Chem Lab".++$i;?></option>
                            <?php endwhile;?>



                            <?php
                            $i=0;
                            while($i<60):;?>

                                <option><?php echo "PCR".++$i;?></option>
                            <?php endwhile;?>



                        </select><br><br>


                        <label>User Email: </label>
                        <input type="text" name="email"  value="<?php echo $email;?>"><br><br>
                        <label>User Phone: </label>
                        <input type="number" name="phone" value="<?php echo $phone;?>"><br><br>
                        <label>User About: </label>

                        <textarea name="about" cols="25" rows="5"><?php echo htmlspecialchars($about);?></textarea><br><br>

                        <div>




                            <input type="submit" name="update" value="Update">

                        </div>

                    </form>

                    <br>
                    <br>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#800080">&nbsp;</td>
    </tr>
    </tbody>
</table>

</body>

</html>