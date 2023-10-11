<?php
/*
    Variables disponibles
        $INGREDIENTS ARRAY(ARRAY(id, name, quantity, unit, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES INGREDIENTS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?php echo $ingredient['id'] ?></td>
                <td><?php echo $ingredient['name'] ?></td>
                <td><?php echo $ingredient['unit'] ?></td>
                <td><?php echo $ingredient['created_at'] ?></td>
                <td>
                    <button><a href="ingredients/update/<?php echo $ingredient['id']; ?>" class="btn btn-primary">Modifier</a></button>
                    <button><a href="ingredients/delete/<?php echo $ingredient['id']; ?>" class="btn btn-secondary">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>