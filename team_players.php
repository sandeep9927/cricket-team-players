<?php include "includes/db.php" ?>
<?php include "includes/navbar.php" ?>
<?php include "includes/bootstrap.php" ?>
<!DOCTYPE html>
<html lang="en">



<body style="background-color:lightblue;">
  <div style="text-align: center;">

    <div>
      <form action="" method="POST">
        <div class="table-responsive">
        <?php
    if (isset($_GET['team_id'])) {
        $team_id = $_GET['team_id'];
        $team_query = "SELECT * FROM `team` WHERE `id` = {$team_id}";
        $run = mysqli_query($conn, $team_query);
        $run = mysqli_fetch_assoc($run);
        $team_name = $run['name'];
        
    }

    ?>
          <div style="height: 100px; width:700px;background-color:#4CAF50;;margin-left:25%; margin-top:100px">
            <h1 style="text-align: center; padding-top:25px;"> <?php echo  $team_name; ?></h1>
          </div>
          <table border="" style="height: 40px; width:700px;margin-left:25% " class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Number</th>
                <th scope="col">Photo</th>
                <th scope="col">player name</th>
                <th scope="col">player ID</th>
                <th scope="col">player jersey</th>
              </tr>
            </thead>

            <tbody>
            <?php
            if (isset($_GET['team_id'])) {
                $team_id = $_GET['team_id'];
                $query = "SELECT * FROM team_players WHERE team_id = {$team_id}";
                $run = mysqli_query($conn, $query);

                $count = 0;
                while ($fetch_team_player = mysqli_fetch_assoc($run)) {
                    $count++;

                    $player_name = $fetch_team_player['player_name'];
                    $player_id = $fetch_team_player['player_id'];
                    $player_image = $fetch_team_player['player_img'];
                    $player_jersey_number = $fetch_team_player['jersey_num'];
                    echo "<tr>";
                    echo "<td>$count</td>";
                    echo "<td><img style='width: 70px; height:50px' src='image/$player_image' alt='no image' class='img-responsive' style=''></td>";
                    echo "<td>$player_name</td>";
                    echo "<td>$player_id</td>";
                    echo "<td>$player_jersey_number</td>";
                    echo "</tr>";
                }
            }

            ?>
        </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</body>