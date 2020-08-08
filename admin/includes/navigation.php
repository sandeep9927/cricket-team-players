 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="../index.php">CTM</a> -->
                <a class="navbar-brand" href=""><img src="../image/ckt.jpg" alt="Girl in a jacket"  style=" border-radius: 50%; width:40px;
"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 

                        <?php 
                            if(isset($_SESSION['username']))
                            {
                                echo $_SESSION['username'];
                            }
                        ?> 
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav" >
                    <li>
                        <a href="./dashboard.php"><i class="fa fa-users"></i> Team Listing</a>
                    </li>

                    <li>
                        <a href="match_fixture.php" ><i class="fa fa-calendar"></i> Match Fixtures</a>
                    </li>
                    <li>
                        <a href="show_all_match.php" ><i class="fa fa-eye" ></i> Show Match </a>
                    </li>
                    <li>
                        <a href="points.php" ><i class="fa fa-eye" ></i> points </a>
                    </li>
                   

                    <?php 
                     
                     $query = "SELECT * FROM team";
                     $query_run = mysqli_query($conn,$query);
                     while($fetch_team = mysqli_fetch_assoc($query_run)){
                       $team_id = $fetch_team['id'];}
                    ?>
                   <!--  <li>
                        <a href='players.php'><i class="fa fa-fw fa-user"></i> Players</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<!-- <style>
    @media (min-width: 768px){
#wrapper {
    padding-left: 225px;
    background-color: darkslategray;
}
    }
</style> -->