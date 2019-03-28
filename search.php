<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Search Faculty</title>
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
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='studentMainPage.php'>Home</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='search.php'>Search Faculty</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='indexQuestion.php' target="_blank">Question Bank</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank">UIU</a>
                    </td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php' target="_blank">Contact</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <td align="center" valign="middle">
        <table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
            <tbody>
            <tr>
                <form method="post" action="search.php" id="searchform">
                    <input  type="text" name="name">
                    <input  type="submit" name="submit" value="Search">
                </form><br><br>
                <?php
                $host = "127.0.0.1";
                $user = "root";
                $password ="";
                $database = "ufsi";

                if(isset($_POST['name'])) {
                    $name = $_POST['name'];
                    $fname = "";
                    $lname = "";
                    $phone = "";
                    $email = "";
                    $about = "";
                    $facultyId = "";
                    $deptName = "";
                    $roomNum = "";
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                    // connect to mysql database
                    try {
                        $connect = mysqli_connect($host, $user, $password, $database);
                    } catch (mysqli_sql_exception $ex) {
                        echo 'Error';
                    }


                    if (isset($_POST['submit'])) {

                        $search_Query = "SELECT * FROM `faculties` WHERE user_first LIKE '%$name%' OR user_last LIKE '%$name%'";

                        $search_Result = mysqli_query($connect, $search_Query);

                        $rowsReturned=mysqli_num_rows($search_Result);

                        echo "<b>".$rowsReturned." rows returned.</b><br><br><br><br>";
                        if ($search_Result) {

                            if (mysqli_num_rows($search_Result)) {

                                $i=0;
                                while ($row = mysqli_fetch_array($search_Result)) {
                                    $i++;
                                    $userUID = $row['user_uid'];
                                    $fname = $row['user_first'];
                                    $lname = $row['user_last'];
                                    $phone = $row['phone'];
                                    $about = $row['about'];
                                    $email = $row['user_email'];
                                    $facultyId = $row['faculty_id'];
                                    $deptName = $row['department_name'];
                                    $roomNum = $row['room_number'];
                                    $gender=$row['gender'];

                                    echo "<b>$i.  Name: </b>".$fname." ".$lname;
                                    echo "<br><b>Gender: </b>".$gender;
                                    echo "<br><b>Department: </b>".$deptName;
                                    echo "<br><b>Phone: </b>".$phone;
                                    echo "<br><b>Email: </b>".$email;
                                    echo "<br><b>Room Number: </b>".$roomNum;
                                    $rs1 = mysqli_query($connect,"SELECT * FROM `counseling` WHERE faculty_id='$userUID'") or die ('error getting data.');
                                    echo "<br><b>Counseling: </b><br>";
                                    while($row1 = mysqli_fetch_array($rs1,MYSQLI_ASSOC)){
                                        echo $row1['time_slot']."   ".$row1['day']."<br>";
                                    }


                                    $rs = mysqli_query($connect,"SELECT * FROM `facultycoursebridge` INNER JOIN time_slot ON facultycoursebridge.slot_id=time_slot.slot_id WHERE facultycoursebridge.faculty_id='$userUID'") or die ('error getting data.');
                                    echo "<b>Courses: </b><br>";
                                    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                        $slot=$row['start_hour'].":".$row['start_minute']."min - ".$row['end_hour'].":".$row['end_minute']."min";

                                        echo $row['course_name']." ".$row['section']." ".$row['day']."   ".$row['room_number']." ".$slot."<br>";
                                    }

                                    echo "<b>About: </b>".$about;



                                    echo "<br><br><br><br>";

                                }
                            } else {
                                echo "<b>No Data For  ".$name."</b>";
                                header("search.php?search=empty");
                            }
                        } else {

                            echo 'Result Error';
                            header("Location:search.php?search=error");

                        }
                    }

                }

                ?>
            </tr>
            </tbody>
        </table>
    </td>
    <tr>
        <td align="center" valign="middle" bgcolor="#800080">&nbsp;</td>
    </tr>
    </tbody>
</table>

</body>

</html>
