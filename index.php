<?php include "admin/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div style="text-align: center;">
    <div style="height: 50px; width:500px;background-color:aqua;">
      <h1 style="text-align: center;">Select Team</h1>
    </div>
    <div>
      <form action="" method="POST">
      <table border="" style="height: 50px; width:500px;">
        <thead>
          <tr>
            <th>id</th>
            <th>image</th>
            <th>Team_Name</th>
            <th>City</th>
            
          </tr>
        </thead>
        <tbody>

        <?php 
          $query = "SELECT * FROM team";
          $query_run = mysqli_query($conn,$query);
          while($fetch_team = mysqli_fetch_assoc($query_run)){
            $team_id = $fetch_team['id'];
            $team_name = $fetch_team['name'];
            $team_city = $fetch_team['city'];
            $team_image = $fetch_team['image'];

            echo "<tr>";
            echo "<td>$team_id</td>";
            echo "<td><a href=''><img style='width: 70px; height:50px' src='image/$team_image' alt='no image' class='img-responsive' style=''></a></td>";
            echo "<td><a href='team_players.php?player_id={$team_id}'>$team_name</a></td>";
            echo "<td>$team_city</td>";
            echo "</tr>";
          }
        ?>
        </tbody>
      </table>
      </form>
    </div>
  </div>
</body>
</html>