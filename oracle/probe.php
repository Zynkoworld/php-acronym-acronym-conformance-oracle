<?php

declare(strict_types=1);

/**
 * Abbreviates a phrase.
 *
 * @param string $phrase
 * @return string
 */
function acronym($phrase)
{
    $matches = preg_match_all('/\p{Lu}+\p{Ll}*|\p{Ll}+/u', $phrase, $words);

    if ($matches === false || $matches < 2) {
        return '';
    }

    return array_reduce($words[0], function ($acronym, $word) {
        return $acronym . mb_strtoupper(mb_substr($word, 0, 1));
    });
}

$__in = json_decode('["Portable Network Graphics", "Ruby on Rails", "First In, First Out", "GNU Image Manipulation Program", "Complementary metal-oxide semiconductor", "Rolling On The Floor Laughing So Hard That My Dogs Came Over And Licked Me", "Something - I made up from thin air"]', true);
$__out = [];
foreach ($__in as $x) {
  try { $__out[] = ["ok" => true, "v" => acronym($x)]; }
  catch (\Throwable $e) { $__out[] = ["ok" => false, "e" => get_class($e)]; }
}
echo json_encode(["out" => $__out]);
