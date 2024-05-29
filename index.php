<?php
$words = array(
    'apple' => 'a fruit',
    'banana' => 'a fruit',
    'star wars' => 'a science fiction movie',
    'php' => 'a programming language',
    'html' => 'a markup language',
    'led' => 'a light emitting diode',
    'keyboard' => 'an input device',
    'monitor' => 'an output device',
    'mouse' => 'an input device',
    'fruit' => 'a food',
    'vegetable' => 'a food',
    'cactus' => 'a plant',
    'rose' => 'a flower',
    'bed' => 'a furniture',
    'table' => 'a furniture',
    'chair' => 'a furniture',
    'laptop' => 'a computer',
    'shoes' => 'a footwear',
    'socks' => 'a clothing',
    'shirt' => 'a clothing',
    'pants' => 'a clothing',
    'hat' => 'a clothing'
);


$tries = 6;

$word = array_rand($words);

$word = strtolower($word);

$guessedLetters = [];

$wordLength = strlen($word);

$wordArray = str_split($word);

function displayWord($wordArray, $guessedLetters)
{
    $output = '';
    foreach ($wordArray as $letter) {
        if (in_array($letter, $guessedLetters)) {
            $output .= $letter;
        } else {
            $output .= '_';
        }
    }
    return $output;
}


echo "Welcome to the Hangman Game! \n\n";
echo "You can type 'hint' to get a hint. \n";
echo "You can type the word to guess the word. \n";
echo "You can type a letter to guess the word. \n \n";
echo "The word has $wordLength letters. \n";

while ($tries > 0) {
    echo "You have $tries tries left. \n \n";
    echo displayWord($wordArray, $guessedLetters);
    echo "\n";


    $guess = readline('Enter a letter: ');

    if ($guess == $word) {
        echo "Congratulations! You guessed the word. \n";
        break;
    }

    if ($guess == 'hint') {
        echo "Hint: " . $words[$word] . "\n";
        continue;
    }

    if (strlen($guess) != 1) {
        echo "Please enter only one letter. \n";
        continue;
    }

    if (in_array($guess, $guessedLetters)) {
        echo "You already guessed that letter. \n";
        continue;
    }

    array_push($guessedLetters, $guess);

    if (!in_array($guess, $wordArray)) {
        $tries--;
    }

    echo "\n \n";

    if (!in_array('_', str_split(displayWord($wordArray, $guessedLetters)))) {
        echo "Congratulations! You guessed the word. \n ";
        break;
    }
    system('clear');
}

if ($tries == 0) {
    echo "You lost! The word was $word. \n";
}
