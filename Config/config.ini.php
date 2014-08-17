<?php
/**
 * @author Zunonia
 * @copyright 2014
 */

$community_list = array(
    'slrclub' => array(
        'target_url'  => "http://www.slrclub.com/",
        'parse_query' => "//div[@id='issue-free']/ul[@class='list']/li/a[1]",
        'base_url'    => "http://www.slrclub.com",
    ),
    'bobaedream' => array(
        'target_url'  => "http://www.bobaedream.co.kr/list?code=best",
        'parse_query' => "//table[@class='clistTable02']/tbody//td[@class='pl14']/a[1]",
        'base_url'    => "http://www.bobaedream.co.kr",
    ),
    '82cook' => array(
        'target_url'  => "http://www.82cook.com/",
        'parse_query' => "//div[@class='leftbox Best']/ul[@class='most']/li/a[1]",
        'base_url'    => "http://www.82cook.com",
    ),
    'mlbpark' => array(
        'target_url'  => "http://mlbpark.donga.com/bbs/mlb_today.php?mode=12&bbs=article_bullpen2",
        'parse_query' => "//td[@class='G12read']/a[1]",
        'base_url'    => "http://mlbpark.donga.com",
    ),
    'todayhumor' => array(
        'target_url'  => "http://www.todayhumor.co.kr/board/list.php?table=bestofbest",
        'parse_query' => "//div[@class='table_container']//table[@class='table_list']//td[@class='table_list_subject']/a[1]",
        'base_url'    => "http://m.todayhumor.co.kr/",
    ),
    'ppomppu' => array(
        'target_url'  => "http://www.ppomppu.co.kr/hot.php?id=freeboard",
        'parse_query' => "//div[@class='board_box']/table[@class='board_table']//td[@align='left']/a[1]",
        'base_url'    => "http://www.ppomppu.co.kr",
    ),
    'nate_pann' => array(
        'target_url'  => "http://pann.nate.com/talk",
        'parse_query' => "//div[@class='takBox']/div[@class='talk-wrap']//ul/li/a[1]",
        'base_url'    => "",
    ),
    'clien'     => array(
        'target_url'  => "http://www.clien.net/cs2/bbs/board.php?bo_table=park",
        'parse_query' => "//div[@class='board_main']//tr[@class='mytr']/td[@class='post_subject']/a[1]",
        'base_url'    => "http://www.clien.net/cs2/bbs/",
    ),
);

