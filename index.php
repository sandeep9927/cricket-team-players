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
          <div style="height: 100px; width:700px;background-color:#4CAF50;;margin-left:25%; margin-top:100px">
            <h1 style="text-align: center; padding-top:25px;">Team List</h1>
          </div>
          <table border="" style="height: 40px; width:700px;margin-left:25% " class="table table-hover">
            <thead>
              <tr>
                <th scope="col">S.N</th>
                <th scope="col">Image</th>
                <th scope="col">Team_Name</th>
                <th scope="col">City</th>
              </tr>
            </thead>

            <tbody>

              <?php
              $query = "SELECT * FROM team";
              $query_run = mysqli_query($conn, $query);
              $count = 0;
              while ($fetch_team = mysqli_fetch_assoc($query_run)) {
                $count++;
                $team_id = $fetch_team['id'];
                $team_name = $fetch_team['name'];
                $team_city = $fetch_team['city'];
                $team_image = $fetch_team['image'];

                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td><a href='team_players.php?team_id={$team_id}'><img style='width: 70px; height:40px' src='image/$team_image' alt='no image' class='img-responsive' style=''></a></td>";
                echo "<td><a href='team_players.php?team_id={$team_id}'>$team_name</a></td>";
                echo "<td>$team_city</td>";
                //echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='index.php?delete_team={$team_id}'><i class='fa fa-trash'></i></a></td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</body>