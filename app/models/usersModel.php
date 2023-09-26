<?php

namespace App\Models\UsersModel;

function findOneByPseudo(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE pseudo = :pseudo;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':pseudo', $data['pseudo'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}
