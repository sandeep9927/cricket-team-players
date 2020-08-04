<?php include "includes/header.php" ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center page-header">
                            Welcome
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>

                        <?php 
                            if(isset($_POST['create_team'])){

                                $team_name = $_POST['team_name'];
                                $state = $_POST['state'];
                                $team_logo = $_FILES['image']['name'];
                                $team_logo_tmp = $_FILES['image']['tmp_name'];

                                move_uploaded_file($team_logo_tmp, "../image/$team_logo");

                            $query="INSERT INTO team (name,city,image) VALUES ('{$team_name}','{$state}','{$team_logo}')";

                                $add_new_team = mysqli_query($conn, $query);

                                if(!$add_new_team){
                                    die("Failed...". mysqli_error($conn));
                                }else{
                                    ?>
                                    <script>
                                    alert("Team successfully added")
                                    window.open("add_team.php","_self")
                                    </script>
                                    <?php
                                }
                            }
                        ?>
                        
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class= "form-group">
                            <label for="title">Team Name</label>
                            <input type="text" class="form-control" name="team_name">
                        </div>

                        <div class= "form-group">
                            <label for="post_author">State</label>
                            <input type="text" class="form-control" name="state">
                        </div>
                        
                        <div class= "form-group">
                            <input type="file" name="image">
                        </div>

                        <div class= "form-group">
                            <input class="btn btn-primary" type="submit" name="create_team" value="Add New Team">
                        </div>
                    </form>

                   </div>
                </div>
            </div>
                <!-- /.row -->

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>