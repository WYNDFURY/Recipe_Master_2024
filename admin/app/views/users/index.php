<?php
/*
    Variables disponibles
        $users ARRAY(ARRAY(user_id, user_name, user_email, user_bio, user_picture, user_date))

        u.id AS user_id,
        u.name AS user_name,
        u.email AS user_email,
        u.biography AS user_bio,
        u.picture AS user_picture,
        u.created_at AS user_date
*/
?>
<div class="page-header">
    <h1>LISTE DES CATEGORIES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Biography</th>
            <th>Picture</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['user_id'] ?></td>
                <td><?php echo $user['user_name'] ?></td>
                <td><?php echo $user['user_email'] ?></td>
                <td><?php echo $user['user_bio'] ?></td>
                <td><?php echo $user['user_picture'] ?></td>
                <td><?php echo $user['user_date'] ?></td>
                <td>
                    <button><a href="users/update/<?php echo $user['id']; ?>" class="btn btn-primary">Modifier</a></button>
                    <button><a href="users/delete/<?php echo $user['id']; ?>" class="btn btn-secondary">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>