
<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
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
                window.open('index.php','_self')
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("query failed")
                window.open('team_players.php','_self')
            </script>
            <?php
        }
        //header('location:index.php');
    }
?>
<div style="height: 50px; width:500px;background-color:aqua; ">
      <h1 style="text-align: center;"><?php  $team_name; ?> Team Deatails</h1>
    </div>
    <table border="" style="background-color:lightpink">
        <thead>
            <tr>
                <th>Number</th>
                <th>Photo</th>
                <th>player name</th>
                <th>player ID</th>
                <th>player jersey</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            if(isset($_GET['team_id'])){
                $player_id = $_GET['team_id'];
                $query = "SELECT * FROM team_players WHERE team_id = {$player_id}";
                $run = mysqli_query($conn,$query);
                $count = 0;
                while($fetch_team_player = mysqli_fetch_assoc($run)){
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
                    echo "<td><a href='admin/add_players.php?add_player={$player_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>";
                    echo "<td><a onClick=\"Javascript:return confirm('Please confirm deletion');\" href='team_players.php?delete_player={$player_id}'><i class='fa fa-trash'></i></a></td>";
                    echo "</tr>";
                }
            }
        
            ?>
        </tbody>
    </table>
</body>
</html>