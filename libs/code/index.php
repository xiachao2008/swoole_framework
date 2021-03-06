<?php
require('config.php');
//$php->db->debug = true;
//$php->tpl->debugging = true;

$php->runMVC('mvc_get');
//$php->runMVC('mvc_rewrite');

/**
 * 采用URL GET参数的映射方式
*/
function url_process_mvc_get()
{  
    $array = array('controller'=>'page','view'=>'index','segs'=>'');
    if(empty($_GET['q'])) return $array;
    
    $request = explode('/',$_GET['q'],3);
    if(count($request)!==3)
    {
    	header("HTTP/1.1 404 Not Found");
    	Error::info('URL Error',"HTTP 404!Page Not Found!<p>Error request:<b>{$_SERVER['REQUEST_URI']}</b>");
    }
    $array['controller']=$request[1];
    $array['view']=$request[2];
    return $array;
}
/**
 * 采用URL rewrite后的URL映射方式
*/
function url_process_mvc_rewrite()
{
    $array = array('controller'=>'page','view'=>'index','segs'=>'');
    if(empty($_GET['q'])) return $array;

    $request = explode('/',$_GET['q'],3);
    if(count($request)!==3)
    {
    	header("HTTP/1.1 404 Not Found");
    	Error::info('URL Error',"HTTP 404!Page Not Found!<p>Error request:<b>{$_SERVER['REQUEST_URI']}</b>");
    }
    $array['controller']=$request[1];
    $array['view']=$request[2];
    return $array;
}
?>