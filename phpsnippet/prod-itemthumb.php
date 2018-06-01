<?php
  // This is non Rough item thumbnail page.
  // echo "snippet triggered.";

  echo "<div class='prod-desclist-container'>";
    echo "<ul>";
    for ($l=0; $l<10; $l++) {
      $list_data = "l".$l;
      if($catlegend[0]->$list_data!=null && $catlegend[0]->$list_data!=' '){
        echo "<li>".$catlegend[0]->$list_data."</li>";
      }
    }
    echo "</ul>";
  echo "</div>";
  
  $counter = 0;
  // print_r($catitems);
  foreach($catitems as $eachitem) {
    // $qs4 = addslashes($prods4->s4);
    // $img = $wpdb->get_results("SELECT DISTINCT cat4img FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3' AND s4 = '$cs4' AND cat4img IS NOT NULL;");
    // print_r(sizeof($img));
    // print_r($img);
    echo "<a href='../item/?id=".urlencode($eachitem->item)."&m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."&s3=".urlencode($cs3)."&s4=".urlencode($cs4)."' class='s1-box'>";
    echo "<div class='item-img'>";
    if ($eachitem->img0==' ' || $eachitem->img0=='') {
      echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
    } else {
      echo "<img src='".$eachitem->img0."'>";
    };
    // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
    echo "</div>";
    echo "<div class='s1-cat'>".$eachitem->item."</div>";
    echo "</a>";
    $counter++;
  }
  for($k=$counter; $k%4!=0; $k++){
    echo "<a class='s1-box s1-box-filler'></a>";
  }
?>
