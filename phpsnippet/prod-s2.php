<?php
  //Product with only sub category3. m0, s1, and s2 are not empty. This will list all s3 inside given s2.

  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> <a href='../categories/?m0=".urlencode($cm0)."'>".stripslashes($cm0)."</a> >> ";
    echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."'>".stripslashes($cs1)."</a> >> ".stripslashes($cs2);
  echo "</div>";

  $prods3 = $wpdb->get_results("SELECT DISTINCT s3 FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2';");
  // print_r($prods3);
  $descs2 = $wpdb->get_results("SELECT s2desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2';");
  // print_r($descs2);
  echo "<div class='prod-cat-desc'>";
    // echo "<p>".$descs2[0]->s1desc."</p>";
    echo "<p>".$descs2[0]->s2desc."</p>";
  echo "</div>";
  // if(!empty($descs2[0]->s2desc)) {
  //   echo "<div class='prod-cat-desc'>";
  //     echo "<p>".$descs2[0]->s2desc."</p>";
  //   echo "</div>";
  // }
  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";
  if(!empty($prods3[0]->s3)) {
    $counter = 0;
    foreach($prods3 as $prods3) {
      $qs3 = addslashes($prods3->s3);
      $img = $wpdb->get_results("SELECT DISTINCT cat3img FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$qs3' AND cat3img IS NOT NULL;");
      // print_r(sizeof($img));
      // print_r($img);

      /*
      $s4_check = $wpdb->get_var("SELECT COUNT(DISTINCT s4) FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$qs3';");

      if(!$s4_check) {
        $item_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$qs3';");
      } else {
        $item_check = null;
      }

      if(count($item_check)==1){
        echo "<a href='../item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."&s3=".urlencode($prods3->s3)."' class='s1-box'>";
      } else {
        echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."&s3=".urlencode($prods3->s3)."' class='s1-box'>";
      }
      */

      echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."&s3=".urlencode($prods3->s3)."' class='s1-box'>";

      echo "<div class='item-img'>";
      if ($img[0]->cat3img==' ' || $img[0]->cat3img=='') {
        echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
      } else {
        echo "<img src='".$img[0]->cat3img."'>";
      };
      // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
      echo "</div>";
      echo "<div class='s1-cat'>".$prods3->s3."</div>";
      echo "</a>";
      $counter++;
    }
    for($k=$counter; $k%4!=0; $k++){
      echo "<a class='s1-box s1-box-filler'></a>";
    }
    }
    else {
      //s2 is empty. This should display item thumb or item table.

      $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2';");

      if($cm0 != "Rough") {
        // echo "triggered.";
        // main category is not rough. Display thumbnail of item here...
        // echo "Only s2 for this category. This is not rough. need to display thumb here.";
        $catitems = $wpdb->get_results("SELECT item,img0 FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2';");
        include 'prod-itemthumb.php';
      } else {

        $catitems = $wpdb->get_results("SELECT * FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2';");
        include 'prod-itemtable.php';

        // echo "Only s2 for this category. This is rough. need to display table here.";
        // display item table here...
      }
    }
    echo "</div>";	// end s1-box-flex-container
    echo "</div>";	// end s1-box-background
    // $mPos++;
    echo "</div>";  //end group-container div;



?>
