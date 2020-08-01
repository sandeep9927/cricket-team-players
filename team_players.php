<?php include "includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div style="height: 50px; width:500px;background-color:aqua; ">
      <h1 style="text-align: center;"><?php  $team_name; ?> Team Details</h1>
    </div>
    <table border="" style="height: 50px; width:500px;background-color:lightpink">
        <thead>
            <tr>
                <th>Number</th>
                <th>player name</th>
                <th>player ID</th>
                <th>Delete player</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            if(isset($_GET['player_id'])){
                $player_id = $_GET['player_id'];
                $query = "SELECT * FROM team_players WHERE team_id = {$player_id}";
                $run = mysqli_query($conn,$query);
                $count = 0;
                while($fetch_team_player = mysqli_fetch_assoc($run)){
                    $count++;
                    $player_name = $fetch_team_player['player_name'];
                    $player_id = $fetch_team_player['player_id'];
                    echo "<tr>";
                    echo "<td>$count</td>";
                    echo "<td>$player_name</td>";
                    echo "<td>$player_id</td>";
                    echo "<td><a href=''><i class='fa fa-trash'></i></a></td>";
                    echo "</tr>";
                }
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>