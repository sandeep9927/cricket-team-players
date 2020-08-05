<?php include "includes/header.php" ?>
<body>
    <?php 
    if(isset($_GET['delete_player'])){
        $delete_player = $_GET['delete_player'];
        $query = "DELETE FROM `team_players` WHERE `player_id` = ' $delete_player '";
        $delete_query = mysqli_query($conn,$query);
        if($delete_player){
            ?>
    <script>
    alert("player successfully deleted !")
    window.open('players.php', '_self')
    </script>
    <?php
        }else{
            ?>
    <script>
    alert("query failed")
    window.open('players.php', '_self')
    </script>
    <?php
        }
        //header('location:index.php');
    }
?>

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
                        <form action="players.php" method="POST" enctype="multipart/form-data">
                        <div class="col-xs-4" style = "padding:0px">
                            <a class="btn btn-primary" href="add_players.php">Add Player</a>
                        </div>
                            <table class="table table-bordered table hover">
                                <thead>
                                    <tr>
                                        <th>Player ID</th>
                                        <th>Team Name</th>
                                        <th>Image</th>
                                        <th>Player name</th>
                                        <th>Jersey Number</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    
                                $query = "SELECT p.*, t.name FROM `team` AS t INNER JOIN `team_players` AS p ON t.id = p.team_id ";
                                $select_players = mysqli_query($conn, $query);  
                           
                                while($row = mysqli_fetch_assoc($select_players)){
                                    $player_id = $row['player_id'];
                                    $team_id = $row['team_id'];
                                    $player_image = $row['player_img'];
                                    $player_name = $row['player_name'];
                                    $jersey_num = $row['jersey_num'];
                                    $team_name = $row['name'];


                                echo "<tr>";
                                echo "<td>$player_id</td>";
                                echo "<td>$team_name</td>";
                                echo "<td><img style='width: 70px; height:50px' src='../image/$player_image' alt='no image' class='img-responsive' style=''></td>";
                
                                echo "<td>$player_name</td>";
                                echo "<td>$jersey_num</td>";
                                echo "<td><a href='edit_player.php?edit_player={$player_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>";
                                echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='players.php?delete_player={$player_id}'><i class='fa fa-trash'></i></a></td>";
                                
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
