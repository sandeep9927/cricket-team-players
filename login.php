<?php 
include "includes/bootstrap.php" ;
include "includes/db.php";
?>

<?php 
session_start();
ob_start();
?>


<?php 
    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $query = "SELECT * FROM login WHERE username = '$username'";
        $login_query = mysqli_query($conn, $query);

        if(!$login_query)
        {
            die('Query Failed..!!' . mysqli_error($conn));
        }
        
        while($row = mysqli_fetch_assoc($login_query))
        {
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
        }

        if($username === $db_username && $password === $db_user_password)
        {
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;

            header("Location: admin");
        }
        else {
            header("Location: index.php");
        }
    }

    if(isset($_POST['back']))
        header("Location: index.php");
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
        <!-- <link rel="stylesheet" href="../css/login.css"> -->
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>

        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign In</h3>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" value="Login" class="btn float-right login_btn">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="back" value="Back" class="btn float-left login_btn">
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
