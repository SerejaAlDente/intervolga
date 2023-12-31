<?php


function mas($length) {
    for ($i = 0; $length > $i; $i++) {
        $mas[] = rand(1, 20);
    }
    return $mas;
}

function posledovpars($mas) {
    $count = 0;
    $length = count($mas);
    
    // Хэш-таблица
    $hashtabl = array();

    for ($i = 0; $i < $length; $i++) {
        $elem = $mas[$i];

        // Увеличиваем счетчик для текущего элемента
        if (isset($hashtabl[$elem])) {
            $hashtabl[$elem]++;
        } else {
            $hashtabl[$elem] = 1;
        }

        // Подсчитываем количество пар в хэш-таблице
        if ($i > 0 && $mas[$i] === $mas[$i - 1]) {
            $count += 1;
        }
    }
    return $count;
}
$mas = mas(100);
print_r($mas);
echo posledovpars($mas);
