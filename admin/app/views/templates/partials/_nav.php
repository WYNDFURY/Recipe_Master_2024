<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BACKOFFICE <?php echo PROJECT_NAME; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">DASHBOARD</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GESTION <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">GESTION DES POSTS</li>
                        <li><a href="#">Liste des books</a></li>
                        <li><a href="#">Ajouter un book</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES AUTHORS</li>
                        <li><a href="#">Liste des authors</a></li>
                        <li><a href="#">Ajouter un author</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES CATÉGORIES</li>
                        <li><a href="categories">Liste des catégories</a></li>
                        <li><a href="categories/add">Ajouter une catégorie</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES TAGS</li>
                        <li><a href="#">Liste des tags</a></li>
                        <li><a href="#">Ajouter un tag</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES USERS</li>
                        <li><a href="#">Liste des users</a></li>
                        <li><a href="#">Ajouter un user</a></li>
                    </ul>
                </li>
                <li><a href="users/logout">LOGOUT</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>