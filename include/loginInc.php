<?php

session_start();


if(isset($_POST['submit'])){

    include('dbInc.php');


    $uid=mysqli_real_escape_string($con,$_POST['uid']);

    $pwd=mysqli_real_escape_string($con,$_POST['pwd']);



    //echo $uid;
    //echo $pwd;
    //return;

    ////Error handers
    ///check if inpurts are empty


    if(empty($uid)||empty($pwd)){
        header("Location: ../index.php?login=empty");
        exit();

    }else{

        $rest = substr($uid,0,1);
        if($rest=="0"){
            echo "Student";
            $sql="SELECT * FROM students WHERE student_uid='$uid'";
            //echo $sql;
            //return;

            $result=mysqli_query($con,$sql);
            $resultCheck=mysqli_num_rows($result);
            if($resultCheck<1){



                header("Location: ../index.php?login=studentresulterror");
                exit();

            }else{
                if($row=mysqli_fetch_assoc($result)){
                    //echo $row['user_uid'];

                    //De-hashing the password

                    $hashPwdCheck=password_verify($pwd,$row['password']);

                    if($hashPwdCheck==false){
                        header("Location: ../index.php?login=studentpassworderror");
                        exit();

                    }elseif($hashPwdCheck==true){

                        //login the user here
                        $_SESSION['s_first']=$row['student_first'];
                        $_SESSION['s_last']=$row['student_last'];
                        $_SESSION['s_uid']=$row['student_uid'];
                        $_SESSION['s_email']=$row['email'];
                        $_SESSION['s_pwd']=$row['password'];
                        $_SESSION['s_dept']=$row['department_name'];
                        $_SESSION['s_phone']=$row['phone'];
                        $_SESSION['s_address']=$row['address'];
                        $_SESSION['s_credit']=$row['credit'];
                        $_SESSION['s_gender']=$row['gender'];



                        header("Location: ../studentMainPage.php?login=success");


                        exit();




                    }

                }


            }

        }else
        {
            echo "Teacher";
            $sql="SELECT * FROM faculties WHERE user_uid='$uid' OR user_email='$uid'";
            $result=mysqli_query($con,$sql);
            $resultCheck=mysqli_num_rows($result);

            if($resultCheck<1){


                header("Location: ../index.php?login=facultyresulterror");
                exit();

            }else{

                if($row=mysqli_fetch_assoc($result)){

                    //De-hashing the password

                    $hashPwdCheck=password_verify($pwd,$row['user_pwd']);

                    if($hashPwdCheck==false){
                        header("Location: ../index.php?login=facultypassworderror");
                        exit();

                    }elseif($hashPwdCheck==true){

                        //login the user here
                        $_SESSION['u_id']=$row['user_uid'];
                        $_SESSION['u_first']=$row['user_first'];
                        $_SESSION['u_last']=$row['user_last'];
                        $_SESSION['u_email']=$row['user_email'];
                        $_SESSION['u_pwd']=$row['user_pwd'];


                        $_SESSION['u_dept']=$row['department_name'];
                        $_SESSION['u_romm']=$row['room_number'];
                        $_SESSION['u_phone']=$row['phone'];
                        $_SESSION['u_about']=$row['about'];
                        $_SESSION['u_fid']=$row['faculty_id'];


                        header("Location: ../FacultyMainPage.php?login=success");


                        exit();




                    }

                }

            }
        }
    }



}else{
    header("Location: ../index.php?login=error");
    exit();
}


?>