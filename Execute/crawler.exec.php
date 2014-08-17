<?php

/**
 * @author Zunonia
 * @copyright 2014
 */
 
header('Content-Type: text/html; charset=utf-8');

require_once '../Config/config.ini.php';
require_once '../Library/crawler.class.php';

//$community_name = 'todayhumor';
$community_name = 'clien';

$crawler = new crawler();
$list = $crawler->get_list($community_list[$community_name]['target_url'], $community_list[$community_name]['parse_query']);
$crawl_target = $crawler->make_url($community_list[$community_name]['base_url'], $list);

foreach($crawl_target as $key => $node)
{
    //var_dump($node);
    $checked = $crawler->check_contents($node);
    switch($community_name)
    {
        case 'todayhumor':
            $contents = $crawler->today_humor_get_contents($checked);
            break;
        case 'clien':
            $contents = $crawler->clien_get_contents($checked);
            break;
        case 'slrclub':
            $contents = $crawler->slrclub_get_contents($checked);
            break;
        default:
            break;
    }

    exit;
    var_dump($contents);
}
?>