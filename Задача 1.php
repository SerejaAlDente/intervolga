<?php


function shorttext($a, $link, $maxlength = 180) {
    
    // Проверка длины текста и разрыв слова
    if (mb_strlen($a) > $maxlength) {
        $lastspace = mb_strrpos(mb_substr($a, 0, $maxlength), ' ', 0);
        // Обрезаем текст до указанной длины
        $cutstring = mb_substr($a, 0, $lastspace);
        // Находим последние два слова
        $words = explode(' ', $cutstring);
        $lastword = array_pop($words);
        $predposledword = array_pop($words);
    } else {
        $cutstring = $a;
    }

    // Определение количества символов в двух последних словах
    $countlastword = mb_strlen($lastword);
    $countpredposledword = mb_strlen($predposledword); 
    $sum = $countpredposledword + $countlastword + 2;
    $countcutstring = mb_strlen($cutstring);

    // Сокращенный текст с ссылкой
    $shorttext = mb_substr($cutstring, 0 , $countcutstring - $sum) . ' ' . '<a href="' . htmlspecialchars($link) . '">' . $predposledword . 
    ' ' . $lastword .'...' . '</a>';

    return $shorttext;
}

// Текст новости
$a = "Американское рейтинговое агентство ESRB запросило разрешение Федеральной торговой комиссии США (FTC) на развёртывание технологии 
подтверждения возраста, чтобы несовершеннолетние не могли обходить родительский контроль. Положение потребует от пользователей делать селфи, 
чтобы получить доступ к игровым онлайн-сервисам.";

// Ссылка на полный текст новости
$link = "https://habr.com/ru/news/751300/";

// Сокращенный текст с ссылкой
$b = shorttext($a, $link);

echo $b;

/*Комментарии:
Важно учесть, что работа может быть связана с многобайтовыми строками, необходимо использовать специальные функции, так как в таких кодировках 
два или более последовательных байта могут задавать один символ. Иначе, если применить функцию, не умеющую работать с многобайтовыми строками, 
она, вероятно, не сможет определить начало и конец многобайтовых символов.
Вторая проблема заключается в том, что если мы будем резать строго до 180 символов, то возможны разрывы слов.
*/
