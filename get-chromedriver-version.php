<?php
function myfilter($value){
					$newphrase = trim($value);
					$newphrase = strip_tags($newphrase);
					$newphrase = htmlspecialchars($newphrase);
					return $newphrase;
				   }
$verArray=array("115"=>"115.0.5790.98");

if(isset($_GET["ver"])){
     $ver=myfilter($_GET["ver"]);
    if($ver>=115 && strlen($ver)==3){
        echo $verArray[$ver];
    }else{ echo "ver not valid"; }
}else{ 
    
 $siteData=file_get_contents("https://googlechromelabs.github.io/chrome-for-testing/");
$siteData=explode("^",str_replace("<code>","^",$siteData))[1];   
    if(count(explode(".",$siteData))>1){
        echo str_replace("</code><td>","",$siteData);
    }
    
}


?>
