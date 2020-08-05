<?php include "includes/header.php" ?>

<body>
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
                        <h1  class="text-center page-header">MATCH</h1>
                        <form method="post" name="form1" action="" enctype="multipart/form-data">
                            <table  border="1" class="table table-bordered table hover">
                                <tr>
                                    
                                    <td width="73" align="center"><strong>Teams</strong></td>
                                    <td style="width: 100px;" align="center"><strong>Venue</strong></td>
                                    <td width="147" align="center"><strong>Date / Time</strong></td>
                                    <td width="50" ><strong>Team1 Score</strong></td>
                                    <td width="50" ><strong>Team2 Score</strong></td>
                                    <td width="64" align="center"><strong>Action</strong></td>
                                </tr>
                                <tr>
                                    <?php 
                                    if(isset($_POST['submit'])){
                                        $get_team1 = $_POST['team1'];
                                        $get_team2 = $_POST['team2'];
                                        $venue = $_POST['venue'];
                                        $date = $_POST['fixdate'];
                                        $time = $_POST['fixtime'];
                                        $score1 = $_POST['score1'];
                                        $score2 = $_POST['score2'];
                                        $query = "INSERT INTO `match_fixtures`(`teamID1`, `teamID2`,`matchDate`, `matchTime`, `venue`, `scoreTeam1`, `scoreTeam2`)
                                        VALUES (' $get_team1','$get_team2','$date','$time','$venue','$score1','$score2')";
                                        $run = mysqli_query($conn,$query);
                                        if ($run) {
                                            ?>
                                                <script>
                                                    alert("Match successfully Fixed !")
                                                    window.open('match_fixture.php', '_self')
                                                </script>
                                            <?php
                                            } else {
                                            ?>
                                                <script>
                                                    alert("Failed to Fixed !")
                                                    window.open('match_fixture.php', '_self')
                                                </script>
                                                <?php
                                                    }

                                    }
                                    
                                    ?>
                                    <td>
                                        <select name="team1">
                                            <option value="">Select</option>
                                            <?php
                                            $select_team = "SELECT * FROM `team`";
                                            $select_team_query = mysqli_query($conn, $select_team);
                                            while ($fetch_all_team = mysqli_fetch_assoc($select_team_query)) {
                                                $team_id = $fetch_all_team['id'];
                                                $team_name = $fetch_all_team['name'];
                                                echo " <option value='{$team_id}'>$team_id.$team_name</option>";
                                            }?>
                                        </select>

                                        <select name="team2">
                                        <option value="">Select</option>
                                            <?php
                                            $select_team = "SELECT * FROM `team`";
                                            $select_team_query = mysqli_query($conn, $select_team);
                                            while ($fetch_all_team = mysqli_fetch_assoc($select_team_query)) {
                                                $team_id = $fetch_all_team['id'];
                                                $team_name = $fetch_all_team['name'];
                                                echo " <option value='{$team_id}'>$team_id.$team_name</option>";
                                            }?>
                                        </select>
                                    </td>
                                    <td><input type="text" name="venue" id="venue">
                                    </td>
                                    <td>
                                        <?php
                                            $mysqldate = date('Y-m-d');
                                            $mysqltime = date('h:i:s');
                                        
                                        ?>
                                        <input type="date" name="fixdate" value="<?php echo $mysqldate; ?>" /><input type="time" name="fixtime" value="<?php echo $mysqltime; ?>" /></td>
                                        <td ><input type="number" name="score1" style="width:40px"></td>
                                        <td><input type="number" name="score2" style="width:40px"></td>
                                    <td><input type="submit" value="submit" name="submit" />
                                        <input type="reset" />

                                    </td>
                                </tr>
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