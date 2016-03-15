<?php
/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * Date: 04.03.2016
 * Time: 15:09
 */

require_once ('textLab.php');
use tlab\textLab as t;



//example text
$text = "hello @bulent_kocaman did you check #hepsiburada website for that url http://www.hepsiburada.com and ofcourse http://www.bulentkocaman.com/index.php?naber=iyilik so I said hello to you";


//call the class
$o = new t($text);

echo '<pre>';

##ORIGINAL TEXT
echo '<h1>ORIGINAL TEXT</h1>';
echo '<p>'.$text.'</p>';


##EXAMPLE 1
echo '<h2>Tag - <small>getTagFromText</small></h2>';
print_r($o->getTagFromText());
echo '<br />';


##EXAMPLE 2
echo '<h2>URL - <small>getUrlFromText</small></h2>';
print_r($o->getUrlFromText());
echo '<br />';


##EXAMPLE 3
echo '<h2>@username - <small>getAtFromText</small></h2>';
print_r($o->getAtFromText());
echo '<br />';


##EXAMPLE 4
echo '<h2>wordsCount</h2>';
print_r($o->wordsCount());
echo '<br />';


##EXAMPLE 5
echo '<h2>lettersCount</h2>';
print_r($o->lettersCount());
echo '<br />';


##EXAMPLE 6
echo '<h2>wordsCounter</h2>';
print_r($o->wordsCounter());
echo '<br />';



##EXAMPLE 7
echo '<h2>urlCount</h2>';
print_r($o->urlCount());
echo '<br />';


##EXAMPLE 8
echo '<h2>tagCount</h2>';
print_r($o->tagCount());
echo '<br />';


##EXAMPLE 9
echo '<h2>atCount</h2>';
print_r($o->atCount());
echo '<br />';


##EXAMPLE 10
echo '<h2>getWords</h2>';
print_r($o->getWords());
echo '<br />';

##EXAMPLE 11
echo '<h2>getAllInformations</h2>';
print_r($o->getAllInformations());
echo '<br />';

echo '</pre>';