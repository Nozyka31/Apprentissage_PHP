<?php

include('./script/globals.php');

function treatFormData(array $data, string ...$wanted): array
{
    $values = [];

    foreach($wanted as $value)
    {
        if(array_key_exists($value, $data))
        {
            $actualData = stripslashes($data[$value]);
            $actualData = htmlspecialchars($actualData);
            $values[$value] = $actualData;
        }
    }
    return $values;
}

function openDB(): array
{
    $data = file_get_contents(DBJSON);
    $array = json_decode($data, true);
    if (!$array) {
        $array = [];
    }
    foreach (DBTABLE as $index => $table) {
        if (!array_key_exists($table, $array)) {
            $array[$table] = [];
        }
    }
    return $array;
}
/**
 * function to write data in DB
 */
function writeDB(array $data): bool
{
    
    $correct = true;
    $jsonData = json_encode($data);
    if (!$jsonData) {
        $correct = false;
    } else {
        $size = file_put_contents(DBJSON, $jsonData);
        if (!$size) {
            $correct = false;
        }
    }
    return $correct;
}
