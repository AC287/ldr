<?php

  global $wpdb;
  $main_category = $wpdb->get_results("SELECT DISTINCT m0 From wp_prodlegend;");
  echo "<h4 class='productaccordion-maintitle-container'>";
    echo "<a class='productaccordion-maintitle' href='".home_url()."/products'>PRODUCT CATEGORIES</a>";
    echo "<div class='productaccordion-mobilemenu'>";
      echo "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>";
    echo "</div>";
  echo "</h4>";
  echo "<div class='productaccordion-content-container'>";

    foreach ($main_category as $each_mc) {
      $s1_category = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$each_mc->m0';");
      $m0class = $each_mc->m0;
      $m0class = preg_replace("/[^a-zA-Z0-9]/","",$m0class);
      if(!empty($s1_category[0]->s1)) {
        //This is m0
        echo "<div class='custaccord-m0 m0-$m0class'>";
        // echo "<img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
        echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."'>".strtoupper($each_mc->m0)."</a>";
        echo "</div>";
        echo "<div class='custpanel-m0 m0i-$m0class'>";

        foreach ($s1_category as $each_s1) {
          $s1class = $each_s1->s1;
          $s1class = preg_replace("/[^a-zA-Z0-9]/","",$s1class);
          //s1 is not empty > get s2.
          $s2_category = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
          if(!empty($s2_category[0]->s2)){
            // s2 is not empty
            echo "<div class='custaccordion s1-$s1class'>";
            echo "<div class='accord-s1container'>";
            echo "<img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
            echo "<a class='custaccordion-s1a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a>";
            echo "</div>"; // end accord-s1container;
            echo "</div>";
            echo "<div class='custpanel s1i-$s1class'>";

            foreach($s2_category as $each_s2) {
              $s2class = $each_s2->s2;
              $s2class = preg_replace("/[^a-zA-Z0-9]/","",$s2class);
              //s2 is not empty > get s3.
              $s3_category = $wpdb->get_results("SELECT DISTINCT s3 FROM wp_prodlegend WHERE s2 = '$each_s2->s2' AND s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
              if(!empty($s3_category[0]->s3)) {
                echo "<div class='custaccordion s2-$s2class'>";
                echo "<div class='accord-s2container'>";
                echo "<img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
                echo "<a class='custaccordion-s2a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a>";
                echo "</div>"; // end accord-s2container;
                echo "</div>";
                echo "<div class='custpanel s2i-$s2class'>";

                foreach($s3_category as $each_s3) {
                  $s3class = $each_s3->s3;
                  $s3class = preg_replace("/[^a-zA-Z0-9]/","",$s3class);
                  //s3 is not empty > get s4.
                  $s4_category = $wpdb->get_results("SELECT DISTINCT s4 FROM wp_prodlegend WHERE s3 = '$each_s3->s3' AND s2 = '$each_s2->s2' AND s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
                  if(!empty($s4_category[0]->s4)) {
                    echo "<div class='custaccordion s3-$s3class'>";
                    echo "<div class='accord-s3container'>";
                    echo "<img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
                    echo "<a class='custaccordion-s3a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."&s3=".urlencode($each_s3->s3)."'>".$each_s3->s3."</a>";
                    echo "</div>"; // end accord-s3container;
                    echo "</div>";

                    echo "<div class='custpanel s3i-$s3class'>";

                    foreach($s4_category as $each_s4) {
                      $s4class = $each_s4->s4;
                      $s4class = preg_replace("/[^a-zA-Z0-9]/","",$s4class);
                      echo "<div class='custaccordion no-sub s4-$s4class'>";
                      echo "<div class='accord-s4container'>";
                      echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."&s3=".urlencode($each_s3->s3)."&s4=".urlencode($each_s4->s4)."'>".$each_s4->s4."</a>";
                      echo "</div>"; // end accord-s4container;
                      echo "</div>";
                    }
                    echo "</div>";  // end panel
                  } else {
                    //s4 is empty.
                    echo "<div class='custaccordion no-sub s3-$s3class'>";
                    echo "<div class='accord-s3container'>";
                    echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."&s3=".urlencode($each_s3->s3)."'>".$each_s3->s3."</a>";
                    echo "</div>"; // end accord-s3container;
                    echo "</div>";
                  }
                } // end foreach for s3 cat.
                echo "</div>";  // end panel
              } else {
                // s3 is empty
                echo "<div class='custaccordion no-sub s2-$s2class'>";
                echo "<div class='accord-s2container'>";
                echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a>";
                echo "</div>";
                echo "</div>";
              }
            }
            echo "</div>";  // end panel
          } else {
            // s2 is empty
            echo "<div class='custaccordion no-sub s1-$s1class'>";
            echo "<div class='accord-s1container'>";
            echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a>";
            echo "</div>";
            echo "</div>";
          }
        }
        echo "</div>";  // end panel
      } else {
        // s1 is empty
        echo "<div class='custaccordion m0-$m0class'><a href='".home_url()."/products/pm0/?m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a></div>";
      }
    }
  echo "</div>";

?>
