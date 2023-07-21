<?php
function myfilter($value){
					$newphrase = trim($value);
					$newphrase = strip_tags($newphrase);
					$newphrase = htmlspecialchars($newphrase);
					return $newphrase;
				   }
				   
if(isset($_GET["ver"])){
     $ver=myfilter($_GET["ver"]);
    if($ver>=115 && strlen($ver)==3){
        $isExist=false;
        $fname="versions.txt";
        $file=fopen($fname,"a+") or die("Unable to open file!");
        while (($line = fgets($file)) !== false) {
            if(strpos($line, $ver)!== false){
                $isExist=true;
                echo $line;
                break;
            }
        }
        if(!$isExist){ echo "Not Found"; }
        fclose($file);
        
        
    }else{ echo "ver not valid"; }
}else{ 
    
 $siteData=file_get_contents("https://googlechromelabs.github.io/chrome-for-testing/");
$siteData=explode("^",str_replace("<code>","^",$siteData))[1];   
    if(count(explode(".",$siteData))>1){
        $isExist=false;
        $fname="versions.txt";
        $release= str_replace("</code><td>","",$siteData);
        $file=fopen($fname,"a+") or die("Unable to open file!");
        while (($line = fgets($file)) !== false) {
            if($release==trim($line)){
                $isExist=true;
                break;
            }
        }
        if(!$isExist){
            fwrite($file, $release.PHP_EOL);
        }else{echo "Already Exist"; }
        fclose($file);
    }
    
}


?>
