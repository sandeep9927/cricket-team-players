<?php include "includes/header.php" ?>
<?php
 if(isset($_GET['delete'])){
    $delete_team_id = $_GET['delete'];
    $query = "DELETE FROM team WHERE id = {$delete_team_id}";

    $delete_team = mysqli_query($conn, $query);
} 
?>
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

                        <div class="col-xs-4" style = "padding:0px">
                            <a class="btn btn-primary" href="add_team.php">Add New</a>
                        </div>
                        <table class="table table-bordered table hover">
                            <thead>
                              <tr>
                                <th>id</th>
                                <th>image</th>
                                <th>Team_Name</th>
                                <th>State</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php 
                              $query = "SELECT * FROM team";
                              $query_run = mysqli_query($conn,$query);
                              while($fetch_team = mysqli_fetch_assoc($query_run)){
                                $team_id = $fetch_team['id'];
                                $team_name = $fetch_team['name'];
                                $team_city = $fetch_team['city'];
                                $team_image = $fetch_team['image'];

                                echo "<tr>";
                                echo "<td>$team_id</td>";
                                echo "<td><a href=''><img style='width: 60px; height:40px' src='../image/$team_image' alt='no image' class='img-responsive' style=''></a></td>";
                                echo "<td><a href='../team_players.php?team_id={$team_id}'>$team_name</a></td>";
                                echo "<td>$team_city</td>";
                                echo "<td><a href='update_teams.php?team_id={$team_id}'>Update</a></td>";
                                echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='dashboard.php?delete={$team_id}'> Delete</a></td>";
                                echo "</tr>";
                              }
                            ?>
                            </tbody>
                        </table>

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