<?php
/*
    Variables disponibles
        $ratings ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES RATINGS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Recipe ID</th>
            <th>Recipe name</th>
            <th>Rating</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ratings as $rating) : ?>
            <tr>
                <td><?php echo $rating['rating_user_id'] ?></td>
                <td><?php echo $rating['rating_user_name'] ?></td>
                <td><?php echo $rating['rating_recipe_id'] ?></td>
                <td><?php echo $rating['rating_recipe_name'] ?></td>
                <td><?php echo $rating['rating_value'] ?></td>
                <td><?php echo $rating['rating_date'] ?></td>
                <td>
                    <button><a href="ratings/update/<?php echo $rating['id']; ?>" class="btn btn-primary">Modifier</a></button>
                    <button><a href="ratings/delete/<?php echo $rating['id']; ?>" class="btn btn-secondary">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>