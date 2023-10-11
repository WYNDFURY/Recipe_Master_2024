<?php
/*
    Variables disponibles
        $recipes ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES RECETTES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Chef</th>
            <th>Description</th>
            <th>Category</th>
            <th>Rating</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?php echo $recipe['recipe_id'] ?></td>
                <td><?php echo $recipe['recipe_name'] ?></td>
                <td><?php echo $recipe['recipe_chef'] ?></td>
                <td><?php echo $recipe['recipe_description'] ?></td>
                <td><?php echo $recipe['recipe_category'] ?></td>
                <td><?php echo $recipe['recipe_rating'] ?></td>
                <td><?php echo $recipe['recipe_date'] ?></td>
                <td>
                    <a href="recipes/updateForm/<?php echo $recipe['recipe_id']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="recipes/delete/<?php echo $recipe['recipe_id']; ?>" class="btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>