<nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The Company</h1>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <?= $_SESSION['username'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="../actions/logout.php" class="nav-link text-danger">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>