<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Arthur Tavernini</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item align-self-center">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="/test.php">test</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="/exo.php">Exo</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="/notes.php">notes</a>
                </li>

                <?php if($_SESSION['user']) : ?>
                    <?php if(in_array("ROLE_ADMIN", $_SESSION['user']["role"])) : ?>
                        <li class="nav-item align-self-center">
                            <a class="nav-link" href="/admin.php">Admin</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item align-self-center">
                            <a class="nav-link" href="/account.php">Mon compte</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item align-self-center">
                        <button class="btn btn-warning btn-sm"><a class="nav-link" href="/deconnection.php">Deconnection</a></button>
                    </li>
                <?php else : ?>
                    <li class="nav-item align-self-center">
                        <a class="nav-link" href="/inscription.php">Inscription</a>
                    </li>

                    <li class="nav-item align-self-center">
                        <button class="btn btn-warning btn-sm"><a class="nav-link" href="/connection.php">Connection</a></button>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>