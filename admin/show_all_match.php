<?php include "includes/header.php" ?>

<body>
    <?php
    if (isset($_GET['delete_match'])) {
        $delete_match = $_GET['delete_match'];
        $query = "DELETE FROM `match_fixtures` WHERE `matchFixtureID` = '{$delete_match}'";
        $delete_query = mysqli_query($conn, $query);
        if ($delete_query) {
    ?>
    <script>
    alert("match successfully deleted !")
    window.open('show_all_match.php', '_self')
    </script>
    <?php
        } else {
        ?>
    <script>
    alert("query failed")
    window.open('show_all_match.php', '_self')
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
                            Welcome
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <form action="players.php" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered table hover">
                                <thead>
                                    <tr>
                                        <th>matchFixtureID </th>
                                        <th>team1</th>
                                        <th>team2</th>
                                        <th>venue</th>
                                        <th>scoreTeam1</th>
                                        <th>scoreTeam2</th>
                                        <th>matchDate</th>
                                        <th>matchTime</th>
                                        <th>EDit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    //$query = "SELECT p.*, t.name FROM `team` AS t INNER JOIN `match_fixtures` AS p ON t.id = p.team_id ";
                                    $query = "SELECT * FROM match_fixtures";
                                    $select_match = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($select_match)) {
                                        $matchFixtureID = $row['matchFixtureID'];
                                        $teamID1 = $row['teamID1'];
                                        $teamID2 = $row['teamID2'];
                                        $venue = $row['venue'];
                                        $scoreTeam1 = $row['scoreTeam1'];
                                        $scoreTeam2 = $row['scoreTeam2'];
                                        $matchDate = $row['matchDate'];
                                        $matchTime = $row['matchTime'];


                                        echo "<tr>";
                                        echo "<td>$matchFixtureID</td>";
                                        echo "<td>$teamID1</td>";
                                        echo "<td>$teamID2</td>";
                                        echo "<td>$venue</td>";
                                        echo "<td>$scoreTeam1</td>";
                                        echo "<td>$scoreTeam2</td>";
                                        echo "<td>$matchDate</td>";
                                        echo "<td>$matchTime</td>";
                                        echo "<td><a href='show_all_match.php?'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>";
                                        echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='show_all_match.php?delete_match={$matchFixtureID}'><i class='fa fa-trash'></i></a></td>";

                                        echo "<tr>";
                                    }

                                    ?>

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
