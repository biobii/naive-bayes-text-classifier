<?php

namespace Biobii;

use Sastrawi\Stemmer\StemmerFactory;

class Stemmer
{
    /**
     * Stemmer factory.
     *
     * @var StemmerFactory
     */
    protected $stemmerFactory;

    /**
     * Stemmer object.
     *
     * @var StemmerFactory
     */
    protected $stemmer;

    /**
     * Stemmed words.
     *
     * @var array
     */
    protected $words;

    /**
     * Constructor.
     * 
     * @param void
     * @return void
     */
    public function __construct()
    {
        $this->stemmerFactory = new StemmerFactory();
        $this->stemmer = $this->stemmerFactory->createStemmer();
    }

    /**
     * Stemming process.
     *
     * @param string $text
     * @return string
     */
    public function stem(string $text)
    {
        $stemmed = $this->stemmer->stem($text);
        $words = explode(' ', $stemmed);
        foreach ($words as $word) {
            $this->words[] = $word;
        }

        return $stemmed;
    }

    /**
     * Get all words.
     *
     * @param void
     * @return array
     */
    public function getWords()
    {
        $unique = array_unique($this->words);
        $this->words = array_values($unique);
        return $this->words;
    }
}