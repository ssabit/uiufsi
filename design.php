<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course Select</title>
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
<table width="85%" align="center" cellspacing="0">
    <tbody>
    <tr>
        <td width="50%" align="center" valign="middle" bgcolor="purple" style="font-size: xx-large; color: #FFFFFF;">UIU Faculty And Student Info</td>
    </tr>
    <tr>
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='#'>Home</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='#'>Faculty</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='#'>Question Bank</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='#'><span>UIU</span></a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='#'>Contact</a></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr align="center">
                    <td width="75%"><table width="100%" cellspacing="0" cellpadding="15">
                            <?php
                            $user = 'root';
                            $pass = '';
                            $db = 'ufsi';
                            $db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect!");
                            $sqlget = "SELECT * FROM courses";
                            $sqldata = mysqli_query($db,$sqlget) or die ('connection error getting data.');

                            session_start();

                            $id=$_SESSION['u_id'];

                            ?>
                            <form action="" method="post">


                                <b>Course: </b>
                                <select name="course">
                                    <option>Select</option>
                                    <?php
                                    while($row = mysqli_fetch_array($sqldata)):;?>

                                        <option><?php echo $row[1];?></option>
                                    <?php endwhile;?>
                                </select><font color="red"><b>*select to delete</b></font>


                                </br></br><b>Day: </b></br>
                                <input type="radio" name="day" value="Sun"> <b>Sun</b>
                                <input type="radio" name="day" value="Mon"> <b>Mon</b>
                                <input type="radio" name="day" value="Tue"> <b>Tue</b>
                                <input type="radio" name="day" value="Wed"> <b>Wed</b>


                                </br></br>
                                <?php
                                $sqlget = "SELECT * FROM time_slot";
                                $sqldata = mysqli_query($db,$sqlget) or die ('error getting data.');
                                echo "<b>Class Time:</b></br>";

                                while($row = mysqli_fetch_array($sqldata)):;?>
                                    <input type="radio" name="slot" value="<?php echo $row[1].":".$row[2]."min - ".$row[3].":".$row[4]."min";?>"> <?php echo $row[1].":".$row[2]."min - ".$row[3].":".$row[4]."min";?>
                                    </br>
                                <?php endwhile;?>


                                </br></br>

                                <b>Section: </b>
                                <select name="section">
                                    <option>Select</option>
                                    <option><?php echo "A";?></option>
                                    <option><?php echo "B";?></option>

                                    <option><?php echo "C";?></option>

                                    <option><?php echo "D";?></option>

                                    <option><?php echo "E";?></option>

                                    <option><?php echo "F";?></option>

                                    <option><?php echo "G";?></option>

                                    <option><?php echo "H";?></option>

                                    <option><?php echo "I";?></option>

                                </select><font color="red"><b>*select to delete</b></font>



                                <br><br>




                                <label><b>Lab number: </b></label>

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
                                </select><b>  Room Number: </b><input type="text" name="roomBox"> Ex: PCR03
                                <br><br>
                                <input type="submit" value="ADD" name="insert" style="margin-right: 30px">
                                <input type="submit" value="DELETE" name="delete">

                            </form>
                            <?php


                            if(isset($_POST['course'])&&isset($_POST['slot'])&&isset($_POST['day'])&&isset($_POST['section'])) {
                                $courseName = $_POST['course'];
                                if(isset($_POST['roomNum'])) {
                                    $room = $_POST['roomNum'];
                                }if ($_POST['roomNum']="Select Room"&&$_POST['roomBox']){
                                    $room=$_POST['roomBox'];
                                }



                                $pizza  = $_POST['slot'];
                                $pieces = explode("-", $pizza);
                                $pieces2 = explode(":", $pieces[0]);
                                $pieces3 = explode(":", $pieces[1]);
                                $pieces4 = explode("min", $pieces2[1]);
                                $pieces5 = explode("min", $pieces3[1]);


                                $sh = $pieces2[0];
                                $sm = $pieces4[0];
                                $eh = $pieces3[0];
                                $em = $pieces5[0];
                                $day=$_POST['day'];
                                $sec=$_POST['section'];

                                $sqlget = "SELECT slot_id FROM time_slot WHERE start_hour='$sh' AND start_minute='$sm' AND end_hour='$eh' AND end_minute='$em'";
                                $sqldata = mysqli_query($db,$sqlget) or die ('error getting data.') ;
                                $row = $sqldata->fetch_assoc();
                                $slotID=$row['slot_id'];
                                if (isset($_POST['insert'])) {

                                    $sqlget = "SELECT slot_id FROM time_slot WHERE start_hour='$sh' AND start_minute='$sm' AND end_hour='$eh' AND end_minute='$em'";
                                    $sqldata = mysqli_query($db,$sqlget) or die ('error getting data.') ;
                                    $row = $sqldata->fetch_assoc();
                                    $slotID=$row['slot_id'];
                                    $sqlget = "INSERT INTO `facultycoursebridge`(`faculty_id`, `course_name`, `section`, `slot_id`,`day`,`room_number`) VALUES ('$id','$courseName','$sec','$slotID','$day','$room')";
                                    $sqldata = mysqli_query($db, $sqlget) or die ('error sending data.');
                                    header("Location:FacultyMainPage.php");

                                }
                            }
                            if(isset($_POST['course'])&&isset($_POST['section'])){
                                if (isset($_POST['delete'])) {
                                    $courseName = $_POST['course'];
                                    $sec=$_POST['section'];

                                    $sqlget = "DELETE FROM `facultycoursebridge` WHERE faculty_id='$id' AND section='$sec' AND course_name='$courseName'";
                                    $sqldata = mysqli_query($db, $sqlget) or die ('error deleting data.');
                                    header("Location:FacultyMainPage.php");

                                }
                            }
                            ?>




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