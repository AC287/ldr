<?php
  //Product with all query present.
  //lowest product category.

  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> <a href='../categories/?m0=".urlencode($cm0)."'>".stripslashes($cm0)."</a> >> ";
    echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."'>".stripslashes($cs1)."</a> >> ";
    echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."'>".stripslashes($cs2)."</a> >> ";
    echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."&s3=".urlencode($cs3)."'>".stripslashes($cs3)."</a> >> ".stripslashes($cs4);
  echo "</div>";

  // $prods4 = $wpdb->get_results("SELECT DISTINCT s4 FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3';");
  // print_r($prods4);
  $descs4 = $wpdb->get_results("SELECT DISTINCT s4desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3' AND s4 = '$cs4' AND s4desc IS NOT NULL;");
  // print_r($descs2);

  if(!empty($descs4[0]->s4desc)) {
    echo "<div class='prod-cat-desc'>";
      echo "<p>".$descs4[0]->s4desc."</p>";
    echo "</div>";
  }

  if(stripslashes($cm0)!="Rough") {
    $catitems = $wpdb->get_results("SELECT item,img0 FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3' AND s4 = '$cs4';");

    echo "<div class='s1-box-background'>";
    echo "<div class='s1-box-flex-container'>";

    // print_r($catitems);

      include 'prod-itemthumb.php';

    echo "</div>";	// end s1-box-flex-container
    echo "</div>";	// end s1-box-background
    // $mPos++;
    echo "</div>";  //end group-container div;

  } else {
    $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3' AND s4 = '$cs4';");

    $catitems = $wpdb->get_results("SELECT * FROM wp_ldrproddb WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3' AND s4 = '$cs4';");

    include 'prod-itemtable.php';
    // echo "THIS IS ROUGH. IT NEEDS GRAPH";
  }





?>