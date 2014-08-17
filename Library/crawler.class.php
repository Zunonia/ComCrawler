<?php
/**
 * @author Zunonia
 * @copyright 2014
 */

final class crawler {    
    public static function get_list($url, $query) 
    {   
        static $cheader = array(
            'http' => array(
                'header'        => 'Content-type: application/x-www-form-urlencoded',
                'max_redirects' => 0,
                'user_agent'    => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/7.0)',
            )
        );
        
        libxml_set_streams_context(stream_context_create($cheader));
        
        $num = 0;
        
        $oDom   = new DOMDocument('1.0');
        $oDom->validateOnParse = true;
        @$oDom->loadHTMLFile($url);
        
        $oXPath = new DOMXPath($oDom);
        $oElement = $oXPath->query($query);
        
        foreach ($oElement as $key => $oDOMnode)
        {
            $node[$num]["link"] = $oDOMnode->getAttribute('href');
            $num++;
        }
        
        return $node;
    }
    
    public static function make_url($base_url, $href_array)
    {
        foreach($href_array as $key => $array_node)
        {
            $href_array[$key] = $base_url.$array_node['link'];
        }
        
        return $href_array;
    }
    
    public static function check_contents($url)
    {
        $pattern = parse_url($url);
        /*
        array (size=4)
          'scheme' => string 'http' (length=4)
          'host' => string 'www.clien.net' (length=13)
          'path' => string '/cs2/bbs/../bbs/board.php' (length=25)
          'query' => string 'bo_table=park&wr_id=31338959' (length=28)
        */
        $pattern['query'] = explode('&s_no=', $pattern['query'])[0];
        
        return $pattern["scheme"]."://".$pattern["host"].$pattern["path"]."?".$pattern["query"];
    }
    
    public static function today_humor_get_contents($get_url)
    {
        static $cheader = array(
            'http' => array(
                'header'        => 'Content-type: application/x-www-form-urlencoded',
                'max_redirects' => 0,
                'user_agent'    => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/7.0)',
            )
        );
        
        libxml_set_streams_context(stream_context_create($cheader));
        
        $oDom   = new DOMDocument('1.0');
        $oDom->validateOnParse = true;
        @$oDom->loadHTMLFile($get_url);
        
        $oXPath = new DOMXPath($oDom);
        $oElement = $oXPath->query("//span[@class='view_no']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_no'] = $oDOMnode->nodeValue;
        }
        $oElement = $oXPath->query("//span[@class='view_subject']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_subject'] = $oDOMnode->nodeValue;
        }
        $oElement = $oXPath->query("//span[@class='view_writer']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_writer'] = $oDOMnode->nodeValue;
        }
        $oElement = $oXPath->query("//span[@class='view_viewCount']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_viewCount'] = str_replace("회", "", $oDOMnode->nodeValue);
        }
        $oElement = $oXPath->query("//span[@class='view_replyCount']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_replyCount'] = str_replace("개", "", $oDOMnode->nodeValue);
        }
        
        return $contents;
    }

    public static function clien_get_contents($get_url)
    {
        $oDom   = new DOMDocument('1.0');
        $oDom->validateOnParse = true;
        @$oDom->loadHTMLFile($get_url);
        $oXPath = new DOMXPath($oDom);
        $oElement = $oXPath->query("//p[@class='user_info']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_writer'] = $oDOMnode->nodeValue;
        }
        $oElement = $oXPath->query("//p[@class='post_info']");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_viewCount'] = $oDOMnode->nodeValue;
        }
        $oElement = $oXPath->query("//div[@class='board_main']/div[@class='view_title']/div/h4/span");
        foreach ($oElement as $key => $oDOMnode)
        {
            $contents['view_subject'] = $oDOMnode->nodeValue;
        }
        var_dump($contents);
        return $contents;
    }
}

