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
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='search.php'>Faculty</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='indexQuestion.php' target="_blank">Question Bank</a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='www.uiu.ac.bd' target="_blank"><span>UIU</span></a></td>
                    <td bgcolor="#EBEBEB" style="text-align: center"><a href='contact.php'>Contact</a></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align="center" valign="middle"><table width="100%" cellspacing="0" cellpadding="15">
                <tbody>
                <tr align="center">
                    <td width="75%"><table width="100%" cellspacing="0" cellpadding="15">
                            <form  action="QuestionsUpload.php" method="post" enctype="multipart/form-data">

                                <b>Course </b><select name="course">

                                    <option>Select</option>
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
                                <br/><br/>

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

                                </select>
                                <br/><br/>
                                <label><b>Trimester: </b></label>

                                <input type="text" name="trimester_name"> ex: Fall-17
                                <br/><br/>


                                <input type="file" name="myfile"><br><br>
                                <input type="submit" name="submit" value="Upload">
                            </form>

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