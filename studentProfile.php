<?php
/*
$host = "127.0.0.1";
$user = "root";
$password ="";
$database = "ufsi";*/

//include_once('include/dbInc.php');

session_start();
$id=$_SESSION['s_uid'];
//echo $id;


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);





$user = 'root';
$pass = '';
$db = 'ufsi';
$db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect!");
$sqlget = "SELECT * FROM students WHERE student_uid ='$id'";
$sqldata = mysqli_query($db,$sqlget) or die ('error getting data.');
$row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC);

//$uid = $row['student_first'];;
$fname = $row['student_first'];
$lname = $row['student_last'];
$phone = $row['phone'];
$email=$row['email'];
$address =$row['address'];
//echo $studentId=$row['student_first'];
$deptName=$row['department_name'];
//$roomNum=$row['student_first'];
$credit=$row['credit'];



/*

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}


$search_Query = "SELECT * FROM students WHERE 	student_uid ='student_first'";
$search_Result = mysqli_query($connect, $search_Query);
//$row = mysqli_fetch_array($search_Result,MYSQLI_ASSOC);
//echo $row[2];
if($search_Result)
{

    if(mysqli_num_rows($search_Result))
    {
        while($row = mysqli_fetch_array($search_Result,MYSQLI_ASSOC))
        {
            $uid = $row['student_uid'];
            $fname = $row['student_first'];
            $lname = $row['student_last'];
            $phone = $row['phone'];
            $address = $row['address'];
            $email = $row['email'];
            $deptName = $row['department_name'];
            $credit = $row['credit'];
            $gender = $row['gender'];

        }
    }else{
        //echo 'No Data For This Id';
        //header("Location:studentProfileUpdate.php?search=empty");
    }
}

*/




// get values from the form
/*function getPosts()
{
    $posts = array();
    $posts[0] = $_SESSION['s_uid'];
    $posts[1] = $_POST['fname'];
    $posts[2] = $_POST['lname'];
    $posts[3] = $_POST['phone'];
    $posts[4] = $_POST['about'];
    $posts[5]=$_POST['email'];
    $posts[6]=$_POST['deptName'];
    $posts[7]=$_POST['credit'];


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
    $address=$_POST['about'];
    $email=$_POST['email'];
    $deptName=$_POST['deptName'];
    $credit=$_POST['credit'];
    $uid=$id;
    //$phone=$_POST['phone'];

    //$data = getPosts();
    $update_Query = "UPDATE `students` SET `student_first`='$fname',`student_last`='$lname',`phone`='$phone',`address`='$address',`email`='$email',`gender`='$gender',`department_name`='$deptName',`credit`='$credit' WHERE `student_uid` = '$uid'";
    //UPDATE `students` SET `student_first`=[value-1],`student_last`=[value-2],`student_uid`=[value-3],`gender`=[value-4],`department_name`=[value-5],`password`=[value-6],`email`=[value-7],`phone`=[value-8],`address`=[value-9],`credit`=[value-10] WHERE 1

    $update_Result = mysqli_query($db, $update_Query);
    header("Location:studentMainPage.php?update=success");

    /* try{
         $update_Result = mysqli_query($db, $update_Query);
         //$update_Result = mysqli_query($con, $update_Query);
         if($update_Result)
         {
             if(mysqli_affected_rows($connect) > 0)
             {
                 echo 'Data Updated';
                 header("Location:studentProfile.php?update=success");





             }else{
                 echo 'Data Not Updated';
                 header("Location:studentProfile.php?update=failed");

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
    <title>Student Profile</title>
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
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='studentMainPage.php'>Home</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='search.php'>Search Faculty</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='indexQuestion.php'>Question Bank</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank" >UIU</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php'>Contact</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td width="75%" align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                <tbody>
                <tr>

                    <br>
                    <br>
                    <form action="studentProfile.php" method="post">

                        <label>Student UID: </label>
                        <input type="text" name="uid" value="<?php echo $id;?>" disabled><br><br>

                        <label>First Name: </label>
                        <input type="text" name="fname" value="<?php echo $fname;?>"><br><br>

                        <label>Last Name: </label>
                        <input type="text" name="lname" value="<?php echo $lname;?>"><br><br>

                        <label>Gender: </label>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female<br><br>

                        <label>Department: </label>
                        <select name="deptName">
                            <option>CSE</option>
                            <option>EEE</option>
                            <option>BBA</option>
                        </select><br><br>

                        <label>Email: </label>
                        <input type="text" name="email"  value="<?php echo $email;?>"><br><br>
                        <label>Credit: </label>
                        <input type="text" name="credit" value="<?php echo $credit;?>"><br><br>

                        <label>Phone: </label>
                        <input type="number" name="phone" value="<?php echo $phone;?>"><br><br>
                        <label>Student Address: </label>
                        <textarea name="about" cols="25" rows="5"><?php echo htmlspecialchars($address);?></textarea><br><br>

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