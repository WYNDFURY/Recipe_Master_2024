<?php
/*
    Variables disponibles
        $comments ARRAY(ARRAY(comment_id, comment_content, comment_created_at, user_name, user_id, dish_id, dish_name))
*/
?>
<div class="page-header">
    <h1>LIST OF COMMENTS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Comment ID</th>
            <th>Content</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Dish ID</th>
            <th>Dish name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?php echo $comment['comment_id'] ?></td>
                <td><?php echo $comment['comment_content'] ?></td>
                <td><?php echo $comment['user_id'] ?></td>
                <td><?php echo $comment['user_name'] ?></td>
                <td><?php echo $comment['dish_id'] ?></td>
                <td><?php echo $comment['dish_name'] ?></td>
                <td><?php echo $comment['comment_date'] ?></td>
                <td>
                    <button><a href="comments/update/<?php echo $comment['id']; ?>" class="btn btn-primary">Modifier</a></button>
                    <button><a href="comments/delete/<?php echo $comment['id']; ?>" class="btn btn-secondary">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>