<?php
/*
    Variables to be used
        $chefs ARRAY(ARRAY(user_id, user_name))
        $categories ARRAY(ARRAY(id, name))
        $ingredients ARRAY(ARRAY(id, name))
*/
?>

<div class="container">
    <div class="page-header mt-5">
        <h1>CREATION D'UNE NOUVELLE RECETTE</h1>
    </div>

    <form action="recipes/create" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" />
        </div>

        <div class="form-group">
            <label for="chef">Chef</label>
            <select class="form-control" id="chef" name="chef">
                <?php foreach ($chefs as $chef): ?>
                    <option value="<?php echo $chef['user_id']; ?>"><?php echo $chef['user_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Recipe Description" style="height: 200px;resize: vertical;"></textarea>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <?php foreach ($ingredients as $ingredient): ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ingredient_<?php echo $ingredient['id']; ?>" name="ingredients[]" value="<?php echo $ingredient['id']; ?>">
                    <label class="form-check-label" for="ingredient_<?php echo $ingredient['id']; ?>"><?php echo $ingredient['name']; ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Recipe</button>
        </div>
    </form>
</div>
