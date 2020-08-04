 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">CTM</a>
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
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="./dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-calendar"></i> Match Fixtures</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Team Structure <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Add New Team</a>
                            </li>
                            <li>
                                <a href="#">View All Teams</a>
                            </li>
                        </ul>
                    <li>
                        <a href="players.php"><i class="fa fa-fw fa-user"></i> Players</a>
                    </li>
                    <li>
                        <a href="add_players.php"><i class="fa fa-fw fa-user"></i> ADD Players</a>
                    </li>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
