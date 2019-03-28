<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Question</title>
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
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='studentMainPage.php'>Home</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='search.php' target="_blank">Search Faculty</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='indexQuestion.php'>Question Bank</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank"><span>UIU</span></a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php' target="_blank">Contact</a></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                <tbody>
                <tr align="center">
                    <td width="75%"><table width="100%" cellspacing="0" cellpadding="15">
                            <form  action="QuestionsUpload.php" method="post">
                                <input  type="submit" name="upload_question" value="Upload Question">


                            </form>
                            <br><br><br>

                            <form action="indexQuestion.php" method="post">
                                <b>Course:</b>
                                <select name="courseSearch">
                                    <option> Select </option>
                                    <?php
                                    $user = 'root';
                                    $pass = '';
                                    $db = 'ufsi';
                                    $db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect!");
                                    $sqlget = "SELECT * FROM courses";
                                    $sqldata = mysqli_query($db,$sqlget) or die ('error getting data.');

                                    while($row = mysqli_fetch_array($sqldata)):;?>

                                        <option><?php echo $row[1];?></option>
                                    <?php endwhile;?>
                                </select>
                                <input style="margin-left: 30px" type="submit" name="search_question" value="Search">

                                <br/><br/>

                            </form>


                            <?php
                            $error = "error";

                            $con = mysqli_connect("localhost","root","") or die($error);
                            mysqli_select_db($con,"ufsi") or die($error);
                            if(isset($_POST['courseSearch'])) {
                                $cName = $_POST['courseSearch'];
                                $sql = "SELECT * FROM questions WHERE course_name='$cName'";
                                $res = mysqli_query($con, $sql);
                                $i=1;
                                while($row=mysqli_fetch_array($res)){
                                    if(is_null($row)){
                                        echo "done";
                                        break;
                                    }
                                    $id=$row['id'];
                                    $name=$row['course_name'];
                                    $path=$row['path'];
                                    $trmstr=$row['trimester'];
                                    $sec=$row['section'];
                                    echo $i++." ".$name."      <b>Section:</b>".$sec."          ".$trmstr."   "."<a href='download.php?dow=$path'>Download</a><br><br>";
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