<?php   
    include("dbconnection.php"); 
    //Checks if the form was submitted
    if(isset($_POST['submit'] )){
        $uname=$_POST['username'];
        $pass=$_POST['psw'];

        $sql="SELECT * FROM users WHERE username ='$uname' and password='$pass'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);//Counts how many rows were returned by the query

        if($count==1){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $uesr_id=$row['user_id'];

            header("Location: welcome.php"); // // Redirect with user_id as URL parameter
        }
        else{

            echo "Invalid username or password.";
           
        }
    }
?>