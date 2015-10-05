<?php
  //init memory
  ini_set('memory_limit', '10M');
  /*
  *init file sample
  *=========Begin=========
  */
  function creat_test_file($filename,$max){
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    for ($i=0; $i <$max; $i++) {
       $number = rand(1,$max);
       $number = "$number\n";
       fwrite($myfile, $number);
      }  
    fclose($myfile);
  }
  /*
  *=========End=========
  */

//=========================================================
  //read all file and save to result array
  // creat_test_file("testfile5000000.txt",5000000);
  $handle = fopen("testfile5000000.txt", "r");
  //$handle = false;
  $max_number = 5000000;
  // $max_number = 2147483647;//max number of integer 32bit
  $rs_arr = array();
  $rs_arr[0] = 0;
  if ($handle) {
    while (($number = fgets($handle)) !== false) {
      // process the line read.
      //get the key of array
      $m = (int)($number/32);
      //get the offset of number in $bin_str
      $n = $number % 32;
      //if $rs_arr[$m] is null => init this element = 0
      if (!isset($rs_arr[$m])) {
        $rs_arr[$m] = 0;
      }
      //get binary string of value $rs_arr[$m] (with full length: 32)
      $bin_str = decbin($rs_arr[$m]);
      $bin_str = substr("00000000000000000000000000000000",0,32 - strlen($bin_str)) . $bin_str;
      //save $number is exits
      $bin_str[$n] = "1";
      //convert binary string to number
      $new_num = bindec($bin_str);
      $rs_arr[$m] = $new_num;
    }
    fclose($handle);
    //ksort($rs_arr);
    //read array to print value
    $rs_file = fopen("rs_file.txt", "w") or die("Unable to open file!");
    foreach ($rs_arr as $key => $n) {
      $bin_str = decbin($n);
      $bin_str = substr("00000000000000000000000000000000",0,32 - strlen($bin_str)) . $bin_str;
      for ($j=0; $j < strlen($bin_str); $j++) {
        if( ($bin_str[$j] == "0") && ( ($key*32 + $j) < $max_number ) ){
          $num =  ($key*32) + $j;
          // echo "$num<br>";
          fwrite($rs_file, "$num\n");
        }
      }
    }
    fclose($rs_file);
  } else {
    // error opening the file.
  }
  

?>