<?php
session_start();
include 'connection.php';
$login_code = $_POST['userCode'];
$login_password = $_POST['userPwd'];
$op = $_GET['op'];



if($op=="in"){
    $sql = mysqli_query($conn,"SELECT * FROM login WHERE login_code='$login_code' AND login_password='$login_password'");

    if(mysqli_num_rows($sql)==1){
        $qry = mysqli_fetch_array($sql);
        $_SESSION['login_code'] = $qry['login_code'];
        $_SESSION['login_password'] = $qry['login_password'];
        $_SESSION['user_role'] = $qry['user_role'];

        if($qry['user_role']=="cashier"){
            header("location:cashier.php");
        }
        else if($qry['user_role']=="manager"){
            header("location:manager.php");
        }
        else if($qry['user_role']=="Advisor"){
            header("location:lInsAdvisor.php");
        }
        else if($qry['user_role']=="sales agent"){
            header("location:sAgent.php");
        }
        else if($qry['user_role']=="supervisor"){
            header("location:supervisor.php");
        }
        else if($qry['user_role']=="team leader"){
            header("location:teamLead.php");
        }
        else{
            header("location:login.php");
        }

    }
    else{
    ?>

    <script language="JavaScript">
        alert('wrong agent code and password');
        document.location='login.php';
    </script>
    <?php
    }
}else if($op=="out"){
    unset($_SESSION['login_code']);
    unset($_SESSION['user_role']);
    header("location:login.php");
}
?>