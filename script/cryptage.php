<?php 

function vigenereCode(string $code, string $keyCode):string
{
    //CREATION D'UNE TABLE DE VIGENERE
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphTab = str_split($alphabet);
    $alphTab2 = array_merge($alphTab, $alphTab);

    for($i = 0; $i < count($alphTab); $i++) {
        for($j = 0; $j < count($alphTab); $j++) {
            $line = $alphTab[$i];
            $column = $alphTab[$j];
            $vigenere[$line][$column] = $alphTab2[$i + $j];
        }   
    } 

    $message = $code;
    $key = $keyCode;

    $messageTab = str_split($message);
    $keyTab = str_split($key);
    $keySize = count($keyTab);

    $count = 0;
    foreach ($messageTab as $index => $letterToEncode) {
    $positionKeyLetter = $count % $keySize;
    $keyLetter = $keyTab[$positionKeyLetter];
    if($letterToEncode != " ") {
        $encodedMessage[] = $vigenere[$letterToEncode][$keyLetter];
    } else {
        $encodedMessage[] = " ";
    }
    $count++;
    }

    $encodedMessage = implode($encodedMessage);

    return $encodedMessage;
}

function vigenereDecode(string $code, string $keyCode):string
{
    //CREATION D'UNE TABLE DE VIGENERE
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphTab = str_split($alphabet);
    $alphTab2 = array_merge($alphTab, $alphTab);

    for($i = 0; $i < count($alphTab); $i++) {
        for($j = 0; $j < count($alphTab); $j++) {
            $line = $alphTab[$i];
            $column = $alphTab[$j];
            $vigenere[$line][$column] = $alphTab2[$i + $j];
        }   
    } 

    $encodedMessage = $code;
    $key = $keyCode;
    $key4decode = $key;
    $encodedMessageTab = str_split($encodedMessage);
    $key4decodeTab = str_split($key4decode);
    $key4decodeSize = count($key4decodeTab);

    $keyCounter = 0;
    foreach ($encodedMessageTab as $pointer => $letterToDecode) {
    $positionKeyLetter = $keyCounter % $key4decodeSize;
    $keyLetter = $key4decodeTab[$positionKeyLetter];
    if($letterToDecode != " ") {
        for($i = 0; $i < 25; $i++)
        {
        $lineToDecode = $alphTab[$i];
        if($vigenere[$lineToDecode][$keyLetter] == $letterToDecode)
        {
            $decryptedMessage[] = $lineToDecode;
        }
        }
    } else {
        $decryptedMessage[] = " ";
    }
    $keyCounter++;
    }

    $message = implode($decryptedMessage);

    return $message;
}

function cesarCode(string $code):string
{
    $message = $code;
    $messageTab = str_split($message);
    $messageTabSize = count($messageTab);
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphTab = str_split($alphabet);
    $cesarAlphabet = "DEFGHIJKLMNOPQRSTUVWXYZABC";
    $cesarAlphabetTab = str_split($cesarAlphabet);

    $keyCounter = 0;
    foreach ($messageTab as $pointer => $letterToDecode) {
    if($letterToDecode != " ") {
        $index = 0;
        while($alphTab[$index] != $letterToDecode)
        {
            $index++;
        }
        $lineToDecode = $cesarAlphabetTab[$index];
        $decryptedMessage[] = $lineToDecode;
    } else {
        $decryptedMessage[] = " ";
    }
    $keyCounter++;
    }
    
    $encodedMessage = implode($decryptedMessage);

    return $encodedMessage;
}

function cesarDecode(string $code):string
{
    $message = $code;
    $messageTab = str_split($message);
    $messageTabSize = count($messageTab);
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphTab = str_split($alphabet);
    $cesarAlphabet = "DEFGHIJKLMNOPQRSTUVWXYZABC";
    $cesarAlphabetTab = str_split($cesarAlphabet);

    $keyCounter = 0;
    foreach ($messageTab as $pointer => $letterToDecode) {
    if($letterToDecode != " ") {
        $index = 0;
        while($cesarAlphabet[$index] != $letterToDecode)
        {
            $index++;
        }
        $lineToDecode = $alphTab[$index];
        $decryptedMessage[] = $lineToDecode;
    } else {
        $decryptedMessage[] = " ";
    }
    $keyCounter++;
    }
    
    $encodedMessage = implode($decryptedMessage);

    return $encodedMessage;
}

?>