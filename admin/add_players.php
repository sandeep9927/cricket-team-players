<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/add_form_validate.js"></script>
    <title>Add Player</title>
</head>
<?php include "includes/header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="width: auto;">
                    <div class="col-lg-12">
                        <h1 class="text-center page-header">
                            Welcome
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>


                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate_form()">
                            <table class="table table-bordered table hover" >
                                <thead>
                                    <tr>
                                        <th>Player Name</th>
                                        <th>Player Jersey Number</th>
                                        <th>Player Image</th>
                                        <th>Choose Team</th>
                                        <th>Add player</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $player_name = $_POST['name'];
                                    $player_image = ($_FILES['image']['name']);
                                    $player_image_tmp = ($_FILES['image']['tmp_name']);
                                    $Player_Jersey_Number = $_POST['jsnumber'];
                                    $team_id = $_POST['team'];
                                    //  <----store player image in image folder---->
                                    move_uploaded_file($player_image_tmp, "../image/$player_image");

                                    $query = "INSERT INTO `team_players`( `player_name`,`player_img`,`team_id`,`jersey_num`) 
                                    VALUES ('$player_name','$player_image','$team_id','$Player_Jersey_Number')";
                                    $run_add_player = mysqli_query($conn, $query);
                                    if ($run_add_player) {
                                ?>
                                    <script>
                                        alert("player successfully Added !")
<<<<<<< HEAD
=======
                                        //window.open('players.php', '_self')
>>>>>>> origin
                                        window.open('team_players_crud.php?team_id=<?php echo $team_id?>', '_self')
                                    </script>
                                <?php
                                } else {
                                ?>
                                    <script>
                                        alert("Failed to Added !")
                                        window.open('add_players.php', '_self')
                                    </script>
                                    <?php
                                        }
                                    }

                                    ?>
                                    <tr>
                                    <td><input type="text" name="name" placeholder="player name" id="playerName"> <br>
                                        <span id="nameError" style="color: red;"></span></td>

                                    <td><input type="text" name="jsnumber" placeholder="Jersey Number" id="jsnumber">
                                        <br>
                                        <span id="jsError" style="color: red;"></span></td>
                                    <td><input type="file" name="image" id="image">
                                        <br>
                                        <span id="ImageError" style="color: red;"></span></td>
                                    <td><select name="team" id="" style="width:100px;">
                                            <?php
                                            // $select_team = "SELECT * FROM `team`";
                                            // $select_team_query = mysqli_query($conn, $select_team);
                                            // while ($fetch_all_team = mysqli_fetch_assoc($select_team_query)) {
                                            //     $team_id = $fetch_all_team['id'];
                                            //     $team_name = $fetch_all_team['name'];
                                                echo " <option value='{$team_id}'>$team_id</option>";
                                            //}

                                            ?>
                                        </select></td>
                                    <td><input type="submit" name="submit" value="ADD"></td>
                                    </tr>
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