<?php
/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * Date: 04.03.2016
 * Time: 15:03
 */

namespace tcounter;


//a trait
trait textCounter{
    // Get words count from text
    public function wordsCount(){
        return str_word_count($this->content);
    }

    // Get letters count from text
    public function lettersCount(){
        return mb_strlen($this->content);
    }

    // Get words count one by one from text
    public function wordsCounter(){
        $array = array_unique(str_word_count($this->content,1));
        $result = array();
        foreach($array as $word){
            $total = substr_count($this->content,$word);
            $result[$word] = $total;
        }
        return $result;
    }

    // Get url count from text
    public function urlCount(){
        return count($this->getUrlFromText($this->content));
    }

    // Get # count from text
    public function tagCount(){
        return count($this->getTagFromText($this->content));
    }

    // Get @ count from text
    public function atCount(){
        return count($this->getAtFromText($this->content));
    }
}