<?php set_time_limit(0);
require 'vendor/autoload.php';

use Google\Cloud\Translate\V2\TranslateClient;

$translate = new TranslateClient([
    'key' => 'AIzaSyAHxeZ4nc839BBouAIqbK3sXWhALaIUnzg'
]);

$arra=array("Sign Up","Browse","Create a campaign","Email Address","Don't have an account?");
foreach ($arra as $key => $value) {
	
	$orginal_line=str_replace("%s", "@@", $value);
	$translate_line = $translate->translate($value, ['target' => 'fr']); 
	$new_line=str_replace( "@@", "%s",$translate_line['text']);
	$language=$set='french';
	$tags="";
	$key="";
	echo $new_line."<br>";
}

die;
 
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}