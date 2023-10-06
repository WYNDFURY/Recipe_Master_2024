<?php 

namespace App\Models\CategoriesModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT * FROM types_of_dishes;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}