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
    /**
     * @return mixed
     */
    public function wordsCount(){
        return str_word_count($this->content);
    }

    // Get letters count from text
    /**
     * @return int
     */
    public function lettersCount(){
        if(extension_loaded('mb_strlen')){
            return mb_strlen($this->content);
        }
        return strlen($this->content);
    }

    // Get words count one by one from text
    /**
     * @return array
     */
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
    /**
     * @return int
     */
    public function urlCount(){
        return count($this->getUrlFromText());
    }

    // Get # count from text
    /**
     * @return int
     */
    public function tagCount(){
        return count($this->getTagFromText());
    }

    // Get (at) count from text
    /**
     * @return int
     */
    public function atCount(){
        return count($this->getAtFromText());
    }
}