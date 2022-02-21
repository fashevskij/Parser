<?php
header('Content-type: text/html; charset=utf-8');
require_once 'parser.php';
echo 'sad';

$urls = 'http://polifarb.ua/products/akriltiks/';
$file = file_get_contents($urls);
var_dump($file);
$dock = phpQuery::newDocument($file);
$arrays = [
    'title' => $dock->find('.page-title')->text(),
    'short-desc' => $dock->find('.short-description')->text(),
    'img' => $dock->find('.attachment-post-image')->attr('src'),
    'description' => $dock->find('.post-content div'),
    'weights' => $dock->find('.product-price-item'),
    'specifications' => $dock->find('.table tr')->text()
];
$newFile = fopen('text.txt', 'w');
fwrite($newFile,$arrays['title'].';'.$arrays['short-desc'].';'.$arrays['img'].';'.$arrays['description'].';'.$arrays['weights'].';'.$arrays['specifications']);
foreach ($arrays['weights'] as $item){
    print $item->textContent . '/';
}
foreach ($arrays['description'] as $item){
    print $item->textContent . '<hr>';
}
