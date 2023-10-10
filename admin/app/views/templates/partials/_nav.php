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
                        <li class="dropdown-header">GESTION DES USERS</li>
                        <li><a href="users">Liste des users</a></li>
                        <li><a href="users/add">Ajouter un user</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES RECETTES</li>
                        <li><a href="recipes">Liste des recettes</a></li>
                        <li><a href="recipes/add">Ajouter une recette</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES COMMENTS</li>
                        <li><a href="comments">Liste des comments</a></li>
                        <li><a href="comments/add">Ajouter un commentaire</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES INGREDIENTS</li>
                        <li><a href="ingredients">Liste des ingrédients</a></li>
                        <li><a href="ingredients/add">Ajouter un ingrédient</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">GESTION DES CATÉGORIES</li>
                        <li><a href="categories">Liste des catégories</a></li>
                        <li><a href="categories/add">Ajouter une catégorie</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>
                <li><a href="users/logout">LOGOUT</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>