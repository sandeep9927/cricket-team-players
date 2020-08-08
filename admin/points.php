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
                                       <th>S.N.</th>
                                        <th>Team</th>
                                        <th>Wins</th>
                                        <th>loss</th>
                                        <th>Tie</th>
                                        <th>Points</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    
                                     $query = "select team, sum(is_win) as num_wins, sum(is_loss) as num_losses,sum(is_points) as points, sum(is_tie) as num_ties
                                     from ((select teamID1 as team,
                                                    (case when winner = teamID1 then 1 else 0 end) as is_win,
                                                    (case when winner = teamID2 then 1 else 0 end) as is_loss,
                                                        (case when winner = teamID1 then 2 else 0 end) as is_points,
                                                    (case when winner is  null then 1 else 0 end) as is_tie
                                             from match_fixtures
                                            ) union all
                                            (select teamID2,
                                                    (case when winner = teamID2 then 1 else 0 end) as is_win,
                                                    (case when winner = teamID1 then 1 else 0 end) as is_loss,
                                             (case when winner = teamID2 then 2 else 0 end) as is_points,
                                                    (case when winner is  null then 1 else 0 end) as is_tie
                                             from match_fixtures
                                            )
                                           
                                           ) t
                                     group by team";

                                    
                                    $select_match = mysqli_query($conn, $query);
                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($select_match)) {
                                       
                                        
                                       
                                        $team = $row['team'];
                                        $wins = $row['num_wins'];
                                        $loss = $row['num_losses'];
                                        $tie = $row['num_ties'];
                                        $get_points = $row['points'];
                                        
                                        $count++;

                                        echo "<tr>";
                                        echo "<td>$count</td>";
                                        echo "<td>$team</td>";
                                        echo "<td>$wins</td>";
                                        echo "<td>$loss</td>";
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