<?php 
error_reporting(E_ALL && E_PARSE);

 $cv = file_get_contents("C:/xampp/apache/logs/access.log");

	$f = fopen("access.txt", "wa+");	
	fwrite($f, $cv);

	

$naked_dear_url="access.txt";
 $contents = file_get_contents($naked_dear_url);
 $val=explode("- -",$contents);
 //echo count($val);
 $rrrr=count($val)-2;
 for($i=0;$i<=$rrrr;$i++)
 {
	
	// echo $val[$i]."</br></br>";
	
		 $ddd=str_replace('::1','127.0.0.1    ',$val[$i]);
	  $res .= substr($ddd, -14).",";
	 
 }
  $dddd=$res;

 //echo rtrim($res);
//echo $val[2];

$res1=explode(",",$dddd);
// echo count($res1);
 $gh=0;
for($j=1;$j<=count($res1);$j++)
{
		
		 $jj=$j-1;
	 $current=$res1[$j];
	$previous=$res1[$jj];
	echo $current.",".$previous."<br>";

	if($current==$previous)
	{
		$ghh=$gh+1;
		$gh++;
			//echo "in";exit;
	}
	$gh==$ghh;

	if($gh==5)
	{
		echo "in";  echo $previous;
		$f = fopen(".htaccess", "a+");
fwrite($f, PHP_EOL . "deny from ".$previous); $gh=0;

	}
	
	
	
	
}
//echo $ddt;

?>