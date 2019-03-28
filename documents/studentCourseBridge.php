<html>
<title>studentCourseSelect</title>
<head>
<body>
<?php
$user = 'root';
$pass = '';
$db = 'UIUFSI';
$db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect!");
$sqlget = "SELECT * FROM Courses";
$sqldata = mysqli_query($db,$sqlget) or die ('error getting data.');

?>

<form action="studentCourseBridge.php" method="post">

    <?php

    $rs = mysqli_query($db,"SELECT * FROM StudentCourseBridge") or die ('error getting data.');
    echo "<table>";
    echo "<tr><th>Courses:</th></tr>";

    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
        echo "<tr><td>";
        echo $row['course_name']."  ".$row['section']."  ".$row['day'];
    }
    echo "</table>";
    ?>
    <b>Select course:</b>
    <select name="course">
        <option>Select any one...</option>
        <?php
        while($row = mysqli_fetch_array($sqldata)):;?>

            <option><?php echo $row[1];?></option>
        <?php endwhile;?>
    </select>


    </br></br>
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
        <option>Select section</option>
        <option><?php echo "A";?></option>
        <option><?php echo "B";?></option>

        <option><?php echo "C";?></option>

        <option><?php echo "D";?></option>

        <option><?php echo "E";?></option>

        <option><?php echo "F";?></option>

        <option><?php echo "G";?></option>

        <option><?php echo "H";?></option>

        <option><?php echo "I";?></option>

    </select>



    <br><br>
    <input type="submit" value="ADD" name="insert">
    <input type="submit" value="DELETE" name="delete">

</form>
<?php


if(isset($_POST['course'])&&isset($_POST['slot'])&&isset($_POST['day'])&&isset($_POST['section'])) {
    $courseName = $_POST['course'];

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
        $sqlget = "INSERT INTO `StudentCourseBridge`(`student_id`, `course_name`, `section`, `slot_id`,`day`) VALUES (011,'$courseName','$sec','$slotID','$day')";
        $sqldata = mysqli_query($db, $sqlget) or die ('error sending data.');
        header("Refresh:0");

    } else if (isset($_POST['delete'])) {
        $sqlget = "DELETE FROM `StudentCourseBridge` WHERE section='$sec' AND course_name='$courseName' AND day='$day'";
        $sqldata = mysqli_query($db, $sqlget) or die ('error deleting data.');
        header("Refresh:0");

    }
}
?>




</body>
</html>