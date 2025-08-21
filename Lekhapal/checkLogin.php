<?php 
  session_start();
  include("dbconnection.php"); 

    //Checks if the form was submitted
    if(isset($_POST['login'] )){
        $uname=$_POST['username'];
        $pass=$_POST['psw'];

        $sql="SELECT * FROM users WHERE username ='$uname' and password='$pass'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);//Counts how many rows were returned by the query

        if($count==1){

            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $user_id=$row['user_id'];
            $username=$row['username'];

            //stores user_id and username in session variable
            $_SESSION['user_id']=$user_id; 
            $_SESSION['username']=$uname; 
            $_SESSION['just_logged_in'] = true;
            header("Location: dashboard.php"); 
            exit();
        }
        else{

            echo "Invalid username or password.";
           
        }
    }
?>