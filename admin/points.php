<?php include "includes/header.php" ?>

<body>
    <?php
    if (isset($_GET['delete_match'])) {
        $delete_point = $_GET['delete_match'];
        $query = "DELETE FROM `points` WHERE `ponits_id` = '$delete_point'";
        $delete_query = mysqli_query($conn, $query);
        if ($delete_query) {
    ?>
    
            <script>
                alert("match successfully deleted !")
                window.open('points.php', '_self')
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("query failed")
                window.open('points.php', '_self')
            </script>
    <?php
        }
        //header('location:index.php');
    }
    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center page-header">
                            Points Table
                        </h1>
                        <form action="players.php" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered table hover">
                                <thead>
                                    <tr>
                                        <th>Standings</th>
                                        <th>Team</th>
                                        <th>Game Played</th>
                                        <th>Wins</th>
                                        <th>Tie</th>
                                        <th>Points</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    //$show_query = "SELECT m.*, t.* FROM team AS t INNER JOIN match_fixtures AS m ON t.id = m.teamID1";
                                    $query = "SELECT p.*, t.name FROM `team` AS t INNER JOIN `points` AS p ON t.id = p.team_id ";
                                    //$query = "SELECT * FROM match_fixtures";
                                    $select_match = mysqli_query($conn, $query);
                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($select_match)) {
                                       
                                        $team_id = $row['team_id'];
                                        $ponits_id = $row['ponits_id'];
                                        $game_played = $row['game_played'];
                                        $wins = $row['wins'];
                                        $tie = $row['tie'];
                                        $get_points = $row['get_points'];
                                        $team_name = $row['name'];
                                        $count++;

                                        echo "<tr>";
                                        echo "<td>$count</td>";
                                        echo "<td>$team_name</td>";
                                        echo "<td>$game_played</td>";
                                        echo "<td>$wins</td>";
                                        echo "<td>$tie</td>";
                                        echo "<td>$get_points</td>";
                                       
                                        echo "<tr>";
                                    }

                                    ?>


                                    <!-- Modal HTML -->
                                   

                                </tbody>
                            </table>
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