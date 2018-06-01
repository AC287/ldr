<?php
  // PROD-S1.php
  //Product with only sub category2. m0 and s1 are not empty. This will list all s2 inside given s1.

  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> <a href='../categories/?m0=".urlencode($cm0)."'>".stripslashes($cm0)."</a> >> ".stripslashes($cs1);
  echo "</div>";

  $prods2 = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");
  // print_r($prods2);
  
  // $descs1 = $wpdb->get_results("SELECT s1desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1= '$cs1';");
  // print_r($descs1);
  // echo "<div class='prod-cat-desc'>";
  //   echo "<p>".$descs1[0]->s1desc."</p>";
  // echo "</div>";

  // if(!empty($descs1[0]->s1desc)) {
  //   echo "<div class='prod-cat-desc'>";
  //     echo "<p>".$descs1[0]->s1desc."</p>";
  //   echo "</div>";
  // }
  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";
  if(!empty($prods2[0]->s2)) {
    $counter = 0;
    foreach($prods2 as $prods2) {
      $qs2 = addslashes($prods2->s2);
      $img = $wpdb->get_results("SELECT DISTINCT cat2img FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$qs2' AND cat2img IS NOT NULL;");

      /*
      $s3_check = $wpdb->get_var("SELECT COUNT(DISTINCT s3) FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$qs2';");

      if(!$s3_check) {
        $item_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$qs2';");
      } else {
        $item_check = null;
      }

      if(count($item_check)==1) {
        echo "<a href='../item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";
      } else {
        echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";
      }
      */

      echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";


      // print_r(sizeof($img));
      // print_r($img);
      echo "<div class='item-img'>";
      if ($img[0]->cat2img==' ' || $img[0]->cat2img=='') {
        echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
      } else {
        echo "<img src='".$img[0]->cat2img."'>";
      };
      // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
      echo "</div>";
      echo "<div class='s1-cat'>".$prods2->s2."</div>";
      echo "</a>";
      $counter++;
    }
    for($k=$counter; $k%4!=0; $k++){
      echo "<a class='s1-box s1-box-filler'></a>";
    }
  } else {
    //s2 is empty. This should display item thumb or item table.

    $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");

    if($cm0 != "Rough") {
      // main category is not rough. Display thumbnail of item here...
      // echo "Only s1 for this category. This is not rough. need to display thumb here.";
      $catitems = $wpdb->get_results("SELECT item,img0 FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1';");
      include 'prod-itemthumb.php';
    } else {

      $catitems = $wpdb->get_results("SELECT * FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1';");
      include 'prod-itemtable.php';

      // echo "Only s1 for this category. This is rough. need to display table here.";
      // display item table here...
    }
  }
  echo "</div>";	// end s1-box-flex-container
  echo "</div>";	// end s1-box-background
    // $mPos++;
    echo "</div>";  //end group-container div;



?>
