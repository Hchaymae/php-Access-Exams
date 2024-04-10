<nav class="navbar navbar-expand-lg bg-color :#ffe6e6">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">Concours</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php 
                if(isset($_SESSION['log'])){
                    if($_SESSION['log'] == "admin"){
                        print'
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="lister.php">Profile</a>
                            </li>
                        ';
                    }else{
                        print'
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="recap.php">Profile</a>
                            </li>
                        ';
                    }
                }else{
                print '<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="authen.php">Authentification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inscription.php">Inscription </a>
                </li>';
                }
                ?>
            </ul>





            <?php
            if(isset($_SESSION['log'])){
            print'<a href="deconnect.php" class="btn btn-primary">deconnection</a>';
                
            }?>
        </div>
    </div>
</nav>