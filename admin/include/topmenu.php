<ul class="nav navbar-right top-nav">
          <a class="navbar-brand" href="../main/view/index.php">Home</a>

            <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown"><?php echo $_SESSION['name'] ?> </a>
            <ul class="dropdown-menu">
              
                
                <li class="divider"></li>
                <li>
                    <a href="../main/view/index.php?logout"><i class="fa fa-fw fa-power-off" ></i> Log Out</a>
                </li>
            </ul>
        </li>
</ul>
