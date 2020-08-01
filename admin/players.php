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
                        
                        <table class="table table-bordered table hover">
                            <thead>
                                <tr>
                                    <th>Player ID</th>
                                    <th>Team ID</th>
                                    <th>Image</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Team</th>
                                    <th>Jersey Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = "SELECT * FROM players";
                                    $select_players = mysqli_query($conn, $query);  

                                    while($row = mysqli_fetch_assoc($select_players)){
                                        $player_id = $row['player_id'];
                                        $team_id = $row['team_id'];
                                        $player_img = $row['player_img'];
                                        $player_first_name = $row['player_first_name'];
                                        $player_last_name = $row['player_last_name'];
                                        $team_name = $row['team_name'];
                                        $jersey_num = $row['jersey_num'];

                                echo "<tr>";
                                    echo "<td>$player_id</td>";
                                    echo "<td>$team_id</td>";
                                    echo "<td>$player_img</td>";
                                    echo "<td>$player_first_name</td>";
                                    echo "<td>$player_last_name</td>";
                                    echo "<td>$team_name</td>";
                                    echo "<td>$jersey_num</td>";
                                echo "<tr>";
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
