<?php
  $curLocation = $_SERVER['REQUEST_URI'];
  $curServer = $_SERVER['SERVER_NAME'];
  $curLocationArr = array_values(array_filter(explode('/',$curLocation)));
  //Split string at "/" and make the string into array. array_filter remove empty array element. array_values restructure array.
  // print_r($_SERVER);
  if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){   //Set whether this is dev or live.
    $local=True;
    // array_splice($curLocationArr, 0, 1); // This removes local 1st folder path.
    unset($curLocationArr[0]);
    $curLocationArr = array_values($curLocationArr);

  } else {
    $local=False;

  }

  for($x=0; $x < count($curLocationArr); $x++){
    if((int)$curLocationArr[$x]!=0) {
      $curLocationArr[$x] = (int)$curLocationArr[$x];
    }
  }

  //This determine which link to use for local/test/live sites...
  $cambridgeSite = "";
  $codaSite = "";
  $ldrSite = "";
  if($curServer=="127.0.0.1") {
    $cambridgeSite = "http://127.0.0.1/product-demo/";
    $codaSite = "http://127.0.0.1/codadev/";
    $ldrSite = "http://127.0.0.1/ldr/";
  } elseif ($curServer=="test1.arthurchen.info" || $curServer=="test2.arthurchen.info" || $curServer=="test3.arthurchen.info") {
    $cambridgeSite = "http://test1.arthurchen.info/";
    $codaSite = "http://test2.arthurchen.info/";
    $ldrSite = "http://test3.arthurchen.info/";
  } elseif ($curServer=="cambridge.codacambridge.com" || $curServer=="coda.codacambridge.com" || $curServer=="ldr.codacambridge.com") {
    $cambridgeSite = "https://cambridge.codacambridge.com/";
    $codaSite = "https://coda.codacambridge.com/";
    $ldrSite = "https://ldr.codacambridge.com";
  } else {
    $cambridgeSite = "http://cambridgeresources.com/";
    $codaSite = "http://codaresources.com/";
    $ldrSite = "http://ldrind.com/";
  }

?>
