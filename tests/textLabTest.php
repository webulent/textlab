<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * Date: 08.07.2016
 * Time: 18:53
 */
require_once (dirname(__FILE__).'/../textLab.php');
use tlab\textLab as t;

class textLabTest extends PHPUnit_Framework_TestCase
{
    private $textLab;

    public function setUp() {
        $simple_text = "hello @webulent this is your webpage http://www.bulentkocaman.com did you create a project on #github https://github.com/webulent/textlab Ok, so the #textlab is first example project on #github right?";
        $this->textLab = new t($simple_text);
    }

    public function testGetTagFromText(){
        $tags = $this->textLab->getTagFromText();
        $this->assertEquals('#github', $tags[0], 'Check returned tag is correct');
        $this->assertEquals('#textlab', $tags[1], 'Check returned tag is correct');
        $this->assertEquals('#github', $tags[2], 'Check returned tag is correct');
        $this->assertCount(3, $tags);
    }

    public function testGetUrlFromText(){
        $uris = $this->textLab->getUrlFromText();
        $this->assertEquals('http://www.bulentkocaman.com', $uris[0], 'Check returned url is correct');
        $this->assertEquals('https://github.com/webulent/textlab', $uris[1], 'Check returned url is correct');
        $this->assertCount(2, $uris);
    }

    public function testGetAtFromText(){
        $users = $this->textLab->getAtFromText();
        $this->assertEquals('@webulent', $users[0], 'Check returned user is correct');
        $this->assertCount(1, $users);
    }

    public function testWordsCount(){
        $words = $this->textLab->wordsCount();
        $this->assertEquals(33, $words);
    }

    public function testLettersCount(){
        $letters = $this->textLab->lettersCount();
        $this->assertEquals(200, $letters);
    }

    public function testWordsCounter(){
        $words = $this->textLab->wordsCounter();
        $this->assertCount(25, $words);
        $this->assertEquals(2, $words['webulent']);
    }

    public function testUrlCount(){
        $uris = $this->textLab->urlCount();
        $this->assertEquals(2, $uris);
    }

    public function testTagCount(){
        $tags = $this->textLab->tagCount();
        $this->assertEquals(3, $tags);
    }

    public function testAtCount(){
        $ats = $this->textLab->atCount();
        $this->assertEquals(1, $ats);
    }

    public function testGetWords(){
        $words = $this->textLab->getWords();
        $this->assertCount(33, $words);
        $this->assertEquals('bulentkocaman', $words[8]);
    }
}
