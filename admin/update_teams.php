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
                        if(isset($_GET['team_id'])){
                            $get_team_id = $_GET['team_id'];
                        

                        $query = "SELECT * FROM team WHERE id = '$get_team_id'";
                        $select_teams = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($select_teams)){
                            $team_name = $row['name'];
                            $state = $row['city'];
                            $team_logo = $row['image'];

                            if(isset($_POST['update_post'])){
                                $team_name = $_POST['team_name'];
                                $state = $_POST['state'];
                                $team_logo = $_FILES['image']['name'];
                                $team_logo_tmp = $_FILES['image']['tmp_name'];

                                move_uploaded_file($team_logo_tmp, "../images/$team_logo");
                                if(empty($team_logo))
                                {
                                    $query= "SELECT * FROM team WHERE id= $get_team_id";
                                    $select_image = mysqli_query($conn, $query);
                                    while($row= mysqli_fetch_array($select_image))
                                    {
                                        $team_logo= $row['image'];
                                    }
                                }

                                $query = "UPDATE team SET name='{$team_name}',city='{$state}',image='{$team_logo}' WHERE id= $get_team_id";
                                $update_team = mysqli_query($conn, $query);
                                if(!$update_team){
                                    die("Failed...") . mysqli_error($conn);
                                }else{
                                    ?>
                                    <script>
                                    alert("Team successfully added")
                                    window.open("update_teams.php","_self")
                                    </script>
                                    <?php
                                }

                            }
                        }
                    }
                        ?>
                        
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class= "form-group">
                            <label for="title">Team Name</label>
                            <input value="<?php echo $team_name; ?>" type="text" class="form-control" name="team_name">
                        </div>

                        <div class= "form-group">
                            <label for="post_author">State</label>
                            <input value="<?php echo $state; ?>" type="text" class="form-control" name="state">
                        </div>
                        
                        <div class= "form-group">
                            <img width=60 src="../image/<?php echo $team_logo?>">
                            <input type="file" name="image">
                        </div>

                        <div class= "form-group">
                            <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
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