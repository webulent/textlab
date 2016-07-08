<?php
/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * Date: 04.03.2016
 * Time: 13:06
 */


//namespace
namespace tlab;

require_once ('textCounter.php');

// a class
class textLab
{
    //lets use the trait
    use \tcounter\textCounter;

    //some regex pattern
    private $regEx   = array(
       'url'        =>  '/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/',
       'tag'          =>  '/\#(\w+)/',
       'at'          =>  '/\@(\w+)/'
    );

    //context
    public $content;

    //a construct
    /**
     * textLab constructor.
     * @param $content
     */
    public function __construct($content){
        $this->content = $content;
    }

    //get url list from text
    /**
     * @return array
     */
    public function getUrlFromText(){
        $result = array();
        if (preg_match_all($this->regEx['url'], $this->content, $data)) {
            foreach ($data[0] as $key => $val) {
                $result[] = $val;
            }
        }
        return $result;
    }

    //get tag (#) list from text
    /**
     * @return array
     */
    public function getTagFromText(){
        $result = array();
        if (preg_match_all($this->regEx['tag'], $this->content, $data)) {
            foreach ($data[0] as $key => $val) {
                $result[] = $val;
            }
        }
        return $result;
    }

    // get persons (@) from text
    /**
     * @return array
     */
    public function getAtFromText(){
        $result = array();
        if (preg_match_all($this->regEx['at'], $this->content, $data)) {
            foreach ($data[0] as $key => $val) {
                $result[] = $val;
            }
        }
        return $result;
    }

    /**
     * @param string $type
     * @return array|string
     */
    public function getAllInformations($type = 'array'){
        $result = array(
            'letters'   => array(
                'count'             => $this->lettersCount()
            ),
            'tags'      => array(
                'count'             => $this->tagCount(),
                'items'             => $this->getTagFromText()
            ),
            'links'     => array(
                'count'             => $this->urlCount(),
                'items'             => $this->getUrlFromText()
            ),
            'users'     => array(
                'count'             =>$this->atCount(),
                'items'             => $this->getAtFromText()
            ),
            'words'     => array(
                'count'             => $this->wordsCount(),
                'items_counted'     => $this->wordsCounter(),
                'items'             => $this->getWords()
            )
        );
        if($type == 'json'){
            $result = json_encode($result);
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getWords(){
        return str_word_count($this->content,1);
    }
}











