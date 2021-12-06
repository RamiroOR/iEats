<?php
session_start();
include "conect.php";
if (isset($_POST["email"]) && isset($_POST["pass"]) ){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($date);
        $data = htmlspecialchars($data);
        return $data;
    }
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        if (empty($email)){
            header("Location: index.php?error=user name is requiered");
             exit();
        }
        else if(empty($pass)){
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }else{
           $sql = "SELECT * FROM clientes WHERE email = '$email' and pass = '$pass' ";

           $result = mysqli_query($conn, $sql);

           if(mysqli_num_rows($result) === 1){
               $row = mysqli_fetch_assoc($result);

               if($row["email"] === $email and $row["pass"] === $pass){
                $_SESSION["id"] = $row["id"];
                   $_SESSION["name"] = $row["name"];
                   $_SESSION["email"] = $row["email"];
                   $_SESSION["username"] = $row["username"];
                   $_SESSION["pass"] = $row["pass"];
                  

                   header("Location: ../indexUser.php");
    exit();
               }
               else{
                header("Location: ../main/mainlogin1.php?error=Incorect User name or password");
                exit();
               }
           }
           else{
            header("Location: ../main/mainlogin1.php?error=Incorect User name or password");           
           }
        }
    }

else{
    header("Location: ../main/mainlogin1.php?error=Incorect User name or password");
    exit();
}

?>