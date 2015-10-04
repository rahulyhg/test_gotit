<?php
  //init memory
  ini_set('memory_limit', '1024M');

  //init file sample
  echo "----- Start init test file -----</br>";
  $myfile = fopen("testfile.txt", "w") or die("Unable to open file!");

  for ($i=0; $i <4000000000; $i++) {
     $number = rand(1,4000000000);
     $number = "$number\n";
     fwrite($myfile, $number);
    }  
  
  fclose($myfile);
  echo "----- Finish init test file -----</br>";

?>