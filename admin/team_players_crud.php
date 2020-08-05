<?php include "includes/header.php" ?>
<?php
    if (isset($_GET['delete_player'])) {
        $delete_player = $_GET['delete_player'];
        $query = "DELETE FROM `team_players` WHERE `player_id` = ' $delete_player '";
        $delete_query = mysqli_query($conn, $query);
        if ($delete_player) {
?>
            <script>
                alert("player successfully deleted !")
                window.open('players.php', '_self')
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("query failed")
                window.open('team_players.php', '_self')
            </script>
    <?php
        }
        //header('location:index.php');
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
                        <table class="table table-bordered table hover">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>image</th>
                                    <th>Player_Name</th>
                                    <th>Player ID</th>
                                    <th>Jersey Number</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
            <?php
            if (isset($_GET['team_id'])) {
                $team_id = $_GET['team_id'];
                $query = "SELECT * FROM team_players WHERE team_id = {$team_id}";
                $run = mysqli_query($conn, $query);

                $count = 0;
                while ($fetch_team_player = mysqli_fetch_assoc($run)) {
                    $count++;

                    $player_name = $fetch_team_player['player_name'];
                    $player_id = $fetch_team_player['player_id'];
                    $player_image = $fetch_team_player['player_img'];
                    $player_jersey_number = $fetch_team_player['jersey_num'];
                    echo "<tr>";
                    echo "<td>$count</td>";
                    echo "<td><img style='width: 70px; height:50px' src='../image/$player_image' alt='no image' class='img-responsive' style=''></td>";
                    echo "<td>$player_name</td>";
                    echo "<td>$player_id</td>";
                    echo "<td>$player_jersey_number</td>";
                    echo "<td><a href='edit_player.php?edit_player={$player_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>";
                    echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='team_players_crud.php?delete_player={$player_id}'><i class='fa fa-trash'></i></a></td>";
                    echo "</tr>";
                }
            }

            ?>
        </tbody>
    </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
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
