
<?php


// store file content as a string in $str
$str = file_get_contents($_FILES["file"]["tmp_name"]);


echo $str;


$json_content = json_decode($str);

print_r($json_content[2]);


?>
