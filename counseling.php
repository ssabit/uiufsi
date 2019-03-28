<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Counseling</title>
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
    <tr >
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='FacultyMainPage.php'>Home</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank"><span>UIU</span></a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php'>Contact</a></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr >
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr align="center">
                    <td width="75%"><table width="100%" cellspacing="0" cellpadding="15">
<?php
$user = 'root';
$pass = '';
$db = 'ufsi';
$db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect!");
$sqlget = "SELECT * FROM time_slot";
$sqldata = mysqli_query($db,$sqlget) or die ('error getting data1.');
$i=0;

session_start();

$id=$_SESSION['u_id'];


?>

<form action="" method="post">

    <input type="radio" name="day" value="Sun"> Sun
    <input type="radio" name="day" value="Mon"> Mon
    <input type="radio" name="day" value="Tue"> Tue
    <input type="radio" name="day" value="Wed"> Wed


    </br></br>
    <b>Start: </b>
    <select name="startTime">
        <option>Select</option>
        <?php
        $sqlget = "SELECT DISTINCT start_hour FROM time_slot ORDER BY start_hour";
        $sqldata = mysqli_query($db,$sqlget) or die ('error getting data2.');

        while($row = mysqli_fetch_array($sqldata)):;?>
            <option><?php echo $row[0];?></option>
        <?php endwhile;?>
    </select>&nbsp;

    <select name="startMin">
        <option>Select</option>
        <?php
        $sqlget = "SELECT DISTINCT start_minute FROM time_slot ORDER BY start_minute";
        $sqldata = mysqli_query($db,$sqlget) or die ('error getting data3.');

        while($row = mysqli_fetch_array($sqldata)):;?>
            <option><?php echo $row[0];?></option>
        <?php endwhile;?>
    </select>
    <br></br>

    <b>End:   </b>
    <select name="endTime">
        <option>Select</option>
        <?php
        $sqlget = "SELECT DISTINCT end_hour FROM time_slot ORDER BY end_hour";
        $sqldata = mysqli_query($db,$sqlget) or die ('error getting data4.');

        while($row = mysqli_fetch_array($sqldata)):;?>
            <option><?php echo $row[0];?></option>
        <?php endwhile;?>
        <option><?php echo 12;?></option>

    </select>&nbsp;
    <b> </b> </b>
    <select name="endMin">
        <option>Select</option>
        <?php
        $sqlget = "SELECT DISTINCT end_minute FROM time_slot ORDER BY end_minute";
        $sqldata = mysqli_query($db,$sqlget) or die ('error getting data5.');

        while($row = mysqli_fetch_array($sqldata)):;?>
            <option><?php echo $row[0];?></option>
        <?php endwhile;?>
    </select>
    <br><br>


    <input type="submit" value="ADD" name="insert" style="margin-right: 30px">
    <input type="submit" value="DELETE" name="delete">



</form>
<?php


if(isset($_POST['startTime'])&&isset($_POST['startMin'])&&isset($_POST['endTime'])&&isset($_POST['endMin'])&&isset($_POST['day'])) {
    $sh = $_POST['startTime'];
    $sm = $_POST['startMin'];
    $eh = $_POST['endTime'];
    $em = $_POST['endMin'];
    $day=$_POST['day'];
    $slot=$sh.$sm.$eh.$em;
    if($sh=='Select'||$sm=='Select'||$eh=='Select'||$em=='Select'){
        echo "Wrong time input!";
        return;}
    $slot=$sh.":".$sm."min - ".$eh.":".$em."min";

    if (isset($_POST['insert'])) {

        echo $slot.$day;
        // header("Refresh:0");

        $sqlget = "INSERT INTO `counseling`( `time_slot`, `faculty_id`,`day`) VALUES ('$slot','$id','$day')";
        $sqldata = mysqli_query($db,$sqlget) or die ('error sending data6.') ;
        header("Location:FacultyMainPage.php");

        echo $day;
        echo "<br>".$slot."<br>";
    } else if (isset($_POST['delete'])) {
        $sqlget = "DELETE FROM `counseling` WHERE faculty_id='$id' AND time_slot='$slot' AND day='$day'";
        $sqldata = mysqli_query($db, $sqlget) or die ('error deleting data7.');
        header("Refresh:0");

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