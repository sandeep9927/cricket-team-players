<?php include "includes/header.php" ?>

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


                                    $show_query = "SELECT m.*, t.* FROM team AS t INNER JOIN match_fixtures AS m ON t.id = m.teamID1";
                                    //$query = "SELECT * FROM match_fixtures";
                                    $select_match = mysqli_query($conn, $show_query);

                                    while ($row = mysqli_fetch_assoc($select_match)) {
                                        $matchFixtureID = $row['matchFixtureID'];
                                        $teamID1 = $row['teamID1'];
                                        $teamID2 = $row['teamID2'];
                                        $venue = $row['venue'];
                                        $scoreTeam1 = $row['scoreTeam1'];
                                        $scoreTeam2 = $row['scoreTeam2'];
                                        $matchDate = $row['matchDate'];
                                        $matchTime = $row['matchTime'];
                                        $team_name = $row['name'];


                                        echo "<tr>";
                                        echo "<td>$matchFixtureID</td>";
                                        echo "<td>$team_name</td>";
                                        echo "<td>$teamID2</td>";
                                        echo "<td>$venue</td>";
                                        echo "<td>$scoreTeam1</td>";
                                        echo "<td>$scoreTeam2</td>";
                                        echo "<td>$matchDate</td>";
                                        echo "<td>$matchTime</td>";
                                        echo "<td><a href='edit_match.php?edit_match={$matchFixtureID}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>";
                                        echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='show_all_match.php?delete_match={$matchFixtureID}'><i class='fa fa-trash'></i></a></td>";
                                        // echo "<td><a href='#myModal'  data-toggle='modal'><i class='fa fa-trash'></i></a></td>";



                                    ?>
                                        <?php
                                        if (isset($_GET['delete_match'])) {
                                            $delete_match = $_GET['delete_match'];
                                            $query = "DELETE FROM `match_fixtures` WHERE `matchFixtureID` = '{$delete_match}'";
                                            $delete_query = mysqli_query($conn, $query);
                                        }

                                        ?>

                                        <script>
                                            function popUp() {
                                                swal("Good job!", "You clicked the button!", "success");
                                                window.open("show_all_match.php", "_self");
                                            }
                                        </script>

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
                                                        <button  type="button" class="btn btn-danger">
                                                            <?php
                                                            echo "<a onclick='popUp()' href='show_all_match.php?delete_match={$matchFixtureID}'>Delete</a>";
                                                            echo "<tr>"; ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }; ?>
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