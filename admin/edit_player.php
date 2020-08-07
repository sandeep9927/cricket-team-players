<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/add_form_validate.js"></script>
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

                        <?php
                    if (isset($_GET['edit_player'])) {
                        $get_player_id = $_GET['edit_player'];
                    }
                    $query = "SELECT * FROM team_players WHERE player_id = '$get_player_id'";
                    $run = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($run)) {
                        $player_image = $row['player_img'];
                        $player_name = $row['player_name'];
                        $jersey_num = $row['jersey_num'];

                        if (isset($_POST['update_player'])) {   
                            $player_name = $_POST['name'];
                            $jersey_num = $_POST['jsnumber'];

                            $player_image = $_FILES['image']['name'];
                            $player_image_tmp = $_FILES['image']['tmp_name'];

                            move_uploaded_file($player_image_tmp, "../image/$player_image");
                            
                            if (empty($player_image)) {
                                $query = "SELECT * FROM team_players WHERE player_id = '$get_player_id'";
                                $select_image = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($select_image)) {
                                    $player_image = $row['player_img'];
                                }
                            }
                            $query = "UPDATE `team_players` SET `player_name`=' $player_name',`player_img`='$player_image',`jersey_num`='$jersey_num' WHERE `player_id` ='$get_player_id'";
                            $update_player = mysqli_query($conn, $query);
                            if (!$update_player) {
                                die("Failed...") . mysqli_error($conn);
                            }
                        }
                    }

                    ?>
                    <form action="" method="post" enctype="multipart/form-data"
                        onsubmit="return validate_form()">
                        <table class="table table-bordered table hover">
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

                                <tr>
                                    <td><input type="text" name="name" value="<?php echo  $player_name; ?>" id="playerName">
                                        <br>
                                        <span id="nameError" style="color: red;"></span></td>

                                    <td><input type="text" name="jsnumber" value="<?php echo  $jersey_num; ?>" id="jsnumber">
                                        <br>
                                        <span id="jsError" style="color: red;"></span></td>
                                    <td><img width=60 src="../image/<?php echo $player_image?>"><input type="file" name="image" id="image">
                                        <br>
                                        <span id="ImageError" style="color: red;"></span></td>
                                    <td><select name="team" id="" style="width:100px;">
                                        <?php
                                        $select_team = "SELECT * FROM `team`";
                                        $select_team_query = mysqli_query($conn, $select_team);
                                        while ($fetch_all_team = mysqli_fetch_assoc($select_team_query)) {
                                            $team_id = $fetch_all_team['id'];
                                            $team_name = $fetch_all_team['name'];
                                            echo " <option value='{$team_id}'>$team_id.$team_name</option>";
                                        }

                                        ?>
                                        </select></td>
                                    <td><input type="submit" name="update_player" value="Update"></td>
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
