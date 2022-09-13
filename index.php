<?php
include_once __DIR__."/functions/functions.php";
include_once __DIR__."/models/StudentRecord.php";
$tests = include "settings.php";

function makeTest($path)
{
    try {
        $test = readTestFile(__DIR__.$path);
        $stud = new StudentRecord();
        $prop_count = $test[0];
        for ($i=1; $i < $prop_count+1; $i++) {
            $prop = explode(' ', $test[$i]);
            if( $prop[0] == 'edit' or $prop[0] == 'delete'){
                break;
            }
            $stud->{$prop[0]} = $prop[1];
        }
        $operation_arr = explode(' ', $test[$prop_count+1]);
        $newVal = isset($operation_arr[2]) ? $operation_arr[2]: NULL;
        $stud = manipulateStudentRecord($stud, $operation_arr[0], $operation_arr[1], $newVal);
        var_dump($stud);
    } catch (\Throwable $th) {
        echo($th);
    }
}

function main($tests)
{
    foreach ($tests as $test) {
        makeTest($test);
    }
}

main($tests);

?>