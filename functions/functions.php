<?php

function manipulateStudentRecord($obj, $operation, $prop, $newValue = NULL)
{
	if(property_exists($obj, $prop)){
		if($operation == "delete"){
        	unset($obj->{$prop});
        } else if($operation == "edit"){
        	$obj->{$prop} = $newValue;
        }
    }
    return $obj;
}

function readTestFile($path)
{
	if (file_exists($path)){
		$fp = @fopen($path, 'r');
		if($fp){
			$content = explode("\n", fread($fp, filesize($path)));
			//$content = file_get_contents($path);
			return $content;
		}
		throw new Exception("Can't open file", 1);
	}
	throw new Exception("File not exists", 1);
	
}
?>