<?php

if(isset($_POST['submit'])){

    include_once('dbInc.php');


    $first=mysqli_real_escape_string($con, $_POST['first']);
    $last=mysqli_real_escape_string($con, $_POST['last']);
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $uid=mysqli_real_escape_string($con, $_POST['uid']);
    $pwd=mysqli_real_escape_string($con, $_POST['pwd']);


    $x=$_POST['uid'];

    //Error handers////
    //Check for empty field

    //if(empty($first) && empty($last) && empty($email) && empty($uid) && empty($pwd)){
    if(empty($first)||empty($last)|| empty($email)||empty($uid)||empty($pwd)){
        header("Location: ../signup.php?signup=empty");
        exit();

    }
    else{

        //Check if input character are valid
        if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)){

            header("Location: ../signup.php?signup=invalid");
            exit();

        }else{

            //check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                header("Location: ../signup.php?signup=email");
                exit();
            }else{
                /////////user name check//////////////
                ///


                $rest = substr($x,0,1);

                if($rest=="0"){
                    echo "Student";
                    $sql="SELECT * FROM students WHERE  student_uid='$x'";

                    $result=mysqli_query($con,$sql);

                    $resultCheck=mysqli_num_rows($result);

                    if($resultCheck>0)
                    {
                        header("Location: ../signup.php?signup=studentidtaken");
                        exit();

                    }
                    else{

                        //Hashing the password

                        $hashPwd=password_hash($pwd,PASSWORD_DEFAULT);

                        //insert  the user into database

                        $sql="INSERT INTO students(	student_first,student_last,email,student_uid,password)  VALUES ('$first','$last','$email' ,'$uid','$hashPwd')";

                        //echo $sql;
                        //return;
                        mysqli_query($con,$sql);

                        header("Location: ../signup.php?signup=success");
                        exit();


                    }
                }else
                {
                    echo "Teacher";
                    $sql="SELECT * FROM faculties WHERE  user_uid='$x'";

                    $result=mysqli_query($con,$sql);

                    $resultCheck=mysqli_num_rows($result);

                    if($resultCheck>0)
                    {
                        header("Location: ../signup.php?signup=usernametaken");
                        exit();

                    }
                    else{

                        //Hashing the password

                        $hashPwd=password_hash($pwd,PASSWORD_DEFAULT);



                        //insert  the user into database




                        $sql="INSERT INTO faculties(user_first,user_last,user_email,user_uid,user_pwd)  VALUES ('$first','$last','$email' ,'$uid','$hashPwd')";

                        //echo $sql;
                        //return;
                        mysqli_query($con,$sql);

                        header("Location: ../signup.php?signup=success");
                        exit();


                    }
                }







            }

        }

    }


}
else{

    header("Location: ../signup.php");
    exit();
}




?>