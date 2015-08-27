<?php
/**
 * Created by PhpStorm.
 * User: mmauzerr
 * Date: 24.8.15.
 * Time: 21.15
 */

namespace common\components;




class Hangman
{
    public $mainWord = 'DanGuba';
    public $allLetters = ['a', 'b', 'v', 'g', 'd', 'đ', 'e', 'ž', 'z', 'i', 'j', 'k',
        'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'ć', 'u', 'f', 'h', 'c', 'č', 'q', 'š'];
    public $usedLetters = ['a', 'r', 'f', 'd', 'u', 's', 'l', 'g', 'k', 'p'];
    public $imageSet = ['sl1.jpg', 'sl2.jpg', 'sl3.jpg', 'sl4.jpg', 'sl5.jpg', 'sl6.jpg'];
    public $inputLetter = ['g']; // get from $_POST['letter']
    public $maxNumOfFailedTry = 6;

    public function getMainWordLetters()
    {
        $letters = str_split(strtolower($this->mainWord));
        return $letters;
    }

    public function getMaskedMainWord()
    {
        $letters = $this->getMainWordLetters();

        foreach ($letters as $key => $letter) {
            if (in_array($letter, $this->usedLetters) === false && $letter !== ' ') {
                $letters[$key] = '_';
            }
        }
        return $letters;
    }

    public function getUsedLetters()
    {
        return $this->usedLetters;
    }

    public function getTryNumb()
    {
        return count($this->getUsedLetters());
    }

    public function getRemainingLetters()
    {
        $remainingLetters = array_count_values($this->getMaskedMainWord());
        return $remainingLetters['_'];
    }

    public function getRemainingBoardLetters()
    {
        return array_diff($this->allLetters, $this->usedLetters);
    }

    public function getNumOfFailedTry()
    {
        $numOfRemaining = $this->getRemainingNumOfTry();
        return $this->maxNumOfFailedTry - $numOfRemaining;
    }

    public function getRemainingNumOfTry()
    {
        $letters = $this->getMainWordLetters();
        $letters = array_diff($letters, [' ']);
        $numOfFails = count(array_diff($this->usedLetters, $letters));
        $num = $this->maxNumOfFailedTry - $numOfFails;

        return $num || !$num <0 ?: 'No More';
    }

    public function getNumOfRemainingLetters()
    {
            $letters = $this->getMainWordLetters();
            $letters = array_diff($letters, [' ']);
            $letters = array_diff($letters, $this->usedLetters);
            return count(array_count_values($letters));
    }

    public function getImages()
    {
        return array_slice($this->imageSet, 0, $this->getNumOfFailedTry());
    }
}

$hangman = new Hangman('DanGuBA');

echo ' Main Word Letters : ';
print_r($hangman->getMainWordLetters());

echo ' Masked Main Word : ';
print_r($hangman->getMaskedMainWord());

echo ' Used Letters : ';
print_r($hangman->getUsedLetters());

echo "\n Remaining Board Letters : \t";
print_r($hangman->getRemainingBoardLetters());

echo "\n Placed False Images : \t";
print_r($hangman->getImages());

echo "\n Number of remaining Letters : \t";
print_r($hangman->getNumOfRemainingLetters());

echo "\n Number of Failed Try : \t";
print_r($hangman->getNumOfFailedTry());

echo "\n Remaining Number of Try : \t";
print_r($hangman->getRemainingNumOfTry());

echo "\n Try Number : ";
print_r($hangman->getTryNumb());

echo "\n Remaining Letters : \t";
print_r($hangman->getRemainingLetters());