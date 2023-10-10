<?php

namespace Core\Tools;

function slugify($str, $delimiter = '-')
{
    // Étape 1 : Conversion des caractères spéciaux
    $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

    // Étape 2 : Suppression des apostrophes
    $str = str_replace("'", "", $str);

    // Étape 3 : Remplacement des "&"
    $str = str_replace("&", "and", $str);

    // Étape 4 et 5 : Remplacement et suppression des caractères
    $patterns = [
        '/[^A-Za-z0-9-]+/',  // Caractères non alphanumériques
        '/[\s-]+/'           // Espaces et tirets multiples
    ];
    foreach ($patterns as $pattern) {
        $str = preg_replace($pattern, $delimiter, $str);
    }

    // Étape 6 : Suppression des espaces blancs et conversion en minuscules
    $str = strtolower(trim($str, $delimiter));

    return $str;
}

function truncateText($text, $maxLength) 
{
    // Permet de trouver le dernier espace dans la limite de caractère donné.
    $lastSpace = strrpos(substr($text, 0, $maxLength), ' ');

    // Permet de réduire le texte jusqu'à l'espace trouvé dans la variable du dessus.
    $truncatedText = substr($text, 0, $lastSpace);

    // Rajoute "..." à la fin du texte tronqué.
    $truncatedText .= '...';

    // Retrourne le texte tronqué.
    return $truncatedText;
}

