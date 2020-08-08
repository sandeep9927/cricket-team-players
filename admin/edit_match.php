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
                        <h1  class="text-center page-header">MATCH</h1>


                        <?php 
                                    if(isset($_GET['edit_match'])){
                                        $get_id_match_edit = $_GET['edit_match'];
                                    
                                   
                                       // $query ="SELECT * FROM `match_fixtures` WHERE `matchFixtureID` = '{$get_id_match_edit}'";

                                        $query = "SELECT m.*, t1.name AS team1name, t2.name AS team2name FROM match_fixtures AS m  JOIN team AS t1 ON m.teamID1= t1.id JOIN team AS t2 ON m.teamID2 = t2.id WHERE matchFixtureID = $get_id_match_edit";
                                        $run = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($run)){
                                        $teamname1 = $row['team1name'];
                                        $teamname2 = $row['team2name'];
                                        $teamID1 = $row['teamID1'];
                                        $teamID2 = $row['teamID2'];
                                        $venue = $row['venue'];
                                        $scoreTeam1 = $row['scoreTeam1'];
                                        $scoreTeam2 = $row['scoreTeam2'];
                                        $matchDate = $row['matchDate'];
                                        $matchTime = $row['matchTime'];
                                        if(isset($_POST['submit'])){
                                            $teamID1 = $_POST['team1'];
                                            $teamID2 = $_POST['team2'];
                                            $venue = $_POST['venue'];
                                            $scoreTeam1 = $_POST['score1'];
                                            $scoreTeam2 = $_POST['score2'];
                                            $matchDate = $_POST['fixdate'];
                                            $matchTime = $_POST['fixtime'];
                                            $update_query = "UPDATE `match_fixtures` SET `teamID1`='$teamID1',`teamID2`='$teamID2',`venue`='$venue',`scoreTeam1`='$scoreTeam1',
                                            `scoreTeam2`='$scoreTeam2',`matchDate`='$matchDate',`matchTime`='$matchTime' WHERE `matchFixtureID` = '$get_id_match_edit'";
                                            // print_r($update_query);die;
                                            $upadte_match = mysqli_query($conn,$update_query);
                                            if ($upadte_match) {
                                                ?>
                                                    <script>
                                                        alert("Match Fixture Updated !")
                                                        window.open('show_all_match.php', '_self')
                                                    </script>
                                                <?php
                                                } else {
                                                ?>
                                                    <script>
                                                        alert("Failed to update !")
                                                        window.open(<?php echo "edit_match.php?edit_match=$get_id_match_edit" ;?>, '_self')
                                                    </script>
                                                    <?php
                                                }
                                        }
                                        
                                    }
                                }
                                    ?>
                        <form method="post" name="form1" action="" enctype="multipart/form-data">
                            <table  border="1" class="table table-bordered table hover">
                                <tr>
                                    
                                     <td width="73" align="center"><strong>Teams</strong></td>
                                    <td><strong>Venue</strong></td>
                                    <td><strong>Date / Time</strong></td>
                                    <td><strong>Team1 Score</strong></td>
                                    <td><strong>Team2 Score</strong></td>
                                    <td><strong>Action</strong></td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <select name="team1">
                                            <option value="<?php echo $teamID1;?>"><?php echo $teamname1;?></option>
                                            <?php
                                            $select_team = "SELECT * FROM `team`";
                                            $select_team_query = mysqli_query($conn, $select_team);
                                            while ($fetch_all_team = mysqli_fetch_assoc($select_team_query)) {
                                                $team_id = $fetch_all_team['id'];
                                                $team_name = $fetch_all_team['name'];
                                                echo " <option value='{$team_id}'>$team_name</option>";
                                            }?>
                                        </select>

                                        <select name="team2">
                                        <option value="<?php echo $teamID2;?>"><?php echo $teamname2;?></option>
                                            <?php
                                            $select_team = "SELECT * FROM `team`";
                                            $select_team_query = mysqli_query($conn, $select_team);
                                            while ($fetch_all_team = mysqli_fetch_assoc($select_team_query)) {
                                                $team_id = $fetch_all_team['id'];
                                                $team_name = $fetch_all_team['name'];
                                                echo " <option value='{$team_id}'>$team_name</option>";
                                            }?>
                                        </select>
                                    </td>
                                    <td><input type="text" name="venue" id="venue" value="<?php echo $venue; ?>">
                                    </td>
                                    <td>
                                        <?php
                                            $mysqldate = date('Y-m-d');
                                            $mysqltime = date('h:i:s');
                                        
                                        ?>
                                        <input type="date" name="fixdate" value="<?php echo $matchDate; ?>" /><input type="time" name="fixtime" value="<?php echo $matchTime; ?>" /></td>
                                        <td ><input type="number" name="score1" style="width:40px"  value="<?php echo $scoreTeam1; ?>"></td>
                                        <td><input type="number" name="score2" style="width:40px"  value="<?php echo $scoreTeam2; ?>"></td>
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