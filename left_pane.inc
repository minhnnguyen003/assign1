<nav class="left-pane">
        <form class="search-pane" method="get" action="./manage.php">
            <input type="text" placeholder="Search" name="searchContent">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <div class="menu-button">
            <a href="./manage.php">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>Dashboard</span>
            </a>
        </div>
        <div class="menu-button">
            <a href="">
                <i class="fa-solid fa-filter"></i>
                <span>Filter</span>
            </a>
        </div>
        <div class="menu-button">
            <a href="./edit.php">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </a>
        </div>
        <div class="menu-button">
            <a href="./delete.php">
                <i class="fa-solid fa-x"></i>
                <span>Delete</span>
            </a>
        </div>
        <hr>
        <div class="menu-button" id="logout-btn">
            <a href="./index.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Log out</span>
            </a>
        </div>
    </nav>