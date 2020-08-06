<?php include "includes/header.php" ?>
<?php

if (isset($_GET['delete'])) {
    $delete_team_id = $_GET['delete'];
    $query = "DELETE FROM team WHERE id = {$delete_team_id}";

    $delete_team = mysqli_query($conn, $query);
    if ($delete_team) {
?>

        <script>
            alert("player successfully deleted !")
            window.open('dashboard.php', '_self')
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("query failed")
            window.open('dashboard.php', '_self')
        </script>
<?php
    }
}
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center page-header">
                            Welcome
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <div class="col-xs-4" style="padding:0px">
                            <a class="btn btn-primary" href="add_team.php">Add New</a>
                        </div>
                        <table class="table table-bordered table hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>image</th>
                                    <th>Team_Name</th>
                                    <th>State</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT * FROM team";
                                $query_run = mysqli_query($conn, $query);
                                while ($fetch_team = mysqli_fetch_assoc($query_run)) {
                                    $team_id = $fetch_team['id'];
                                    $team_name = $fetch_team['name'];
                                    $team_city = $fetch_team['city'];
                                    $team_image = $fetch_team['image'];

                                    echo "<tr>";
                                    echo "<td>$team_id</td>";
                                    echo "<td><a href=''><img style='width: 60px; height:40px' src='../image/$team_image' alt='no image' class='img-responsive' style=''></a></td>";
                                    echo "<td><a href='team_players_crud.php?team_id={$team_id}'>$team_name</a></td>";
                                    echo "<td>$team_city</td>";
                                    echo "<td><a href='update_teams.php?team_id={$team_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>";
                                    echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='dashboard.php?delete={$team_id}'> <i class='fa fa-trash'></i></a></td>";
                                    //echo "<td><a href='#myModal'  data-toggle='modal'><i class='fa fa-trash'></i></a></td>";

                                    echo "</tr>";
                                }
                                ?>
                                <!-- Modal HTML -->
                                <div id="myModal" class="modal fade">
                                    <div class="modal-dialog modal-confirm">
                                        <div class="modal-content">
                                            <div class="modal-header flex-column">
                                                <div class="icon-box">
                                                    <i class="material-icons">&#xE5CD;</i>
                                                </div>
                                                <h4 class="modal-title w-100">Are you sure?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you really want to delete these records? This process cannot
                                                    be undone.</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger">
                                                    <?php
                                                    echo "<a href='dashboard.php?delete={$team_id}'>Delete</a>";
                                                    ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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