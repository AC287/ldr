<!--  Template Name: LDR Search Page  -->

<?php get_header();?>
<div class="container">

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div id="product-main-page">

        <div class="cat-bar">
          <?php include 'phpsnippet/productaccordion.php';?>
        </div>

        <div class="search-display">

          <?php
          // $searchValue = strtoupper($_REQUEST['isearch']);
          $searchValue = $_REQUEST['isearch'];
          // echo $searchValue;
          global $wp_query, $wpdb;
          //help link: https://wordpress.stackexchange.com/questions/53194/wordpress-paginate-wpdb-get-results
          #Need to add keyword LIKE search in below $prodquery.

          $searchArray = explode(" ", $searchValue);
          $prodqueryArr = array();
          $prodqueryArrCont0 = array();
          $prodqueryArrCont1 = array(); //SELECT clause container for keyword and all remaining attribute search.
          $prodqueryArrAll = array(); //WHERE LIKE clause for all attributes.
          $prodqueryArr0 = array(); //WHERE LIKE clause m0s1s2s3jointcat search
          $prodqueryArr1 = array(); //WHERE LIKE clause keyword and all remaining attribute search.
          $conCatArr = array();
          $prodquery = "";
          $prodquery0 = "";
          $prodquery1 = "";

          $catSearchm0 = array();
          $catSearchObj = $wpdb->get_results("SELECT m0,s1,s2,s3,s4 FROM wp_prodlegend");

          $catSearchArr = array();
          foreach($catSearchObj as $tempVal) {
            $catSearchArrI = "";
            foreach($tempVal as $tempVal0) {
              $catSearchArrI .= $tempVal0.", ";
            }
            $catSearchArr[] = $catSearchArrI;
          }

          function sampling($chars, $size, $combinations = array()) {
            //This is possible combination of search words.
            //https://stackoverflow.com/questions/19067556/php-algorithm-to-generate-all-combinations-of-a-specific-size-from-a-single-set

            if (empty($combinations)) {
                $combinations = $chars;
            }

            # we're done if we're at size 1
            if ($size == 1) {
                return $combinations;
            }

            # initialise array to put new values in
            $new_combinations = array();

            # loop through existing combinations and character set to create strings
            foreach ($combinations as $combination) {
                foreach ($chars as $char) {
                    $new_combinations[] = $combination . " " . $char;
                }
            }

            # call same function again for the next iteration
            return sampling($chars, $size - 1, $new_combinations);

          }

          $combiTest = array();
          for($a=1; $a<=count($searchArray); $a++) {
            //This combine all possible array.
            $combiTest[]= sampling($searchArray, $a);
          }

          $matchArr = array();

          foreach($catSearchArr as $catSearchArrTemp) {
            //Get matching results from search vs category.
            foreach($combiTest as $combiTestTemp) {
              foreach($combiTestTemp as $combiTestTemp1) {
                if(preg_match("/\b$combiTestTemp1\b/i",$catSearchArrTemp)) {
                  if(!in_array($combiTestTemp1, $matchArr)) {
                    $matchArr[] = $combiTestTemp1;
                  }
                }
              }
            }
          }

          function lengthSort($a,$b) {
            return strlen($b)-strlen($a);
          }

          usort($matchArr,'lengthSort');
          // stored longest length array first.
          $catArrQuery = array();

          foreach($matchArr as $matchArr0) {
            $catArrQuery[] = "SELECT * FROM wp_ldrproddb WHERE m0 LIKE '%$matchArr0%' OR s1 LIKE '%$matchArr0%' OR s2 LIKE '%$matchArr0%' OR s3 LIKE '%$matchArr0%' OR s4 LIKE '%$matchArr0%'";
          }

          for ($i=0; $i < count($searchArray); $i++) {

            $prodqueryArrAll[] = "
            WHERE
            item LIKE '%$searchArray[$i]%'
            OR REPLACE(item, ' ', '') LIKE '%$searchArray[$i]%'
            OR m0 LIKE '%$searchArray[$i]%'
            OR s1 LIKE '%$searchArray[$i]%'
            OR s2 LIKE '%$searchArray[$i]%'
            OR s3 LIKE '%$searchArray[$i]%'
            OR s4 LIKE '%$searchArray[$i]%'
            OR d0 LIKE '%$searchArray[$i]%'
            OR d1 LIKE '%$searchArray[$i]%'
            OR d2 LIKE '%$searchArray[$i]%'
            OR d3 LIKE '%$searchArray[$i]%'
            OR d4 LIKE '%$searchArray[$i]%'
            OR d5 LIKE '%$searchArray[$i]%'
            OR d6 LIKE '%$searchArray[$i]%'
            OR d7 LIKE '%$searchArray[$i]%'
            OR d8 LIKE '%$searchArray[$i]%'
            OR d9 LIKE '%$searchArray[$i]%'
            OR d10 LIKE '%$searchArray[$i]%'
            OR d11 LIKE '%$searchArray[$i]%'
            OR d12 LIKE '%$searchArray[$i]%'
            ";
            $prodqueryArr0[] = "
            WHERE
            item LIKE '%$searchArray[$i]%'
            OR REPLACE(item, ' ', '') LIKE '%$searchArray[$i]%'
            OR m0 LIKE '%$searchArray[$i]%'
            OR s1 LIKE '%$searchArray[$i]%'
            OR s2 LIKE '%$searchArray[$i]%'
            OR s3 LIKE '%$searchArray[$i]%'
            OR s4 LIKE '%$searchArray[$i]%'
            ";
            $prodqueryArr1[] = "
            WHERE
            item LIKE '%$searchArray[$i]%'
            OR REPLACE(item, ' ', '') LIKE '%$searchArray[$i]%'
            OR d0  LIKE '%$searchArray[$i]%'
            OR d1 LIKE '%$searchArray[$i]%'
            OR d2 LIKE '%$searchArray[$i]%'
            OR d3 LIKE '%$searchArray[$i]%'
            OR d4 LIKE '%$searchArray[$i]%'
            OR d5 LIKE '%$searchArray[$i]%'
            OR d6 LIKE '%$searchArray[$i]%'
            OR d7 LIKE '%$searchArray[$i]%'
            OR d8 LIKE '%$searchArray[$i]%'
            OR d9 LIKE '%$searchArray[$i]%'
            OR d10 LIKE '%$searchArray[$i]%'
            OR d11 LIKE '%$searchArray[$i]%'
            OR d12 LIKE '%$searchArray[$i]%'
            ";
          }

          for($j=0; $j < count($searchArray); $j++) {

            $prodqueryArrCont0[] = "SELECT * from wp_ldrproddb ".$prodqueryArr0[$j];
            $prodqueryArrCont1[] = "SELECT * from wp_ldrproddb ".$prodqueryArr1[$j];
          }

          //Initial get data. group by m0s1s2s3jointcat first, then the rest of the attribute.

          // $prodquery = "(".implode(' UNION ', $catArrQuery).' UNION '.implode(' UNION ', $prodqueryArrCont0).' UNION '.implode(' UNION ',$prodqueryArrCont1).") AS tempTable";
          if($catArrQuery) {
            $prodquery = "(".implode(' UNION ', $catArrQuery).' UNION '.implode(' UNION ',$prodqueryArrCont1).") AS tempTable";
          } else {
            // catArrQuery is empty
            // $prodquery = "(".implode(' UNION ',$prodqueryArrCont1).") AS tempTable";
            $prodquery = "(".implode(' UNION ', $prodqueryArrCont0).' UNION '.implode(' UNION ',$prodqueryArrCont1).") AS tempTable";
          }


          // print_r($prodquery);
          //SEarch filter.
          for($k=0; $k < count($searchArray); $k++) {
            switch ($k) {
              case 0:
              if(count($searchArray) > 1) {
                $prodquery = "(SELECT * from ".$prodquery.$prodqueryArrAll[$k].") AS tempTable$k";
              } else {
                // print_r("only one word in search");
                $prodquery = "SELECT * from ".$prodquery.$prodqueryArrAll[$k];
              }
              break;
              case (count($searchArray)-1):
                $prodquery = "SELECT * from ".$prodquery." ".$prodqueryArrAll[$k];
              break;
              default:
                $prodquery = "(SELECT * FROM ".$prodquery." ".$prodqueryArrAll[$k].") AS tempTable$k";
              break;
            }
          }

          $total = $wpdb -> get_var("SELECT COUNT(1) FROM (${prodquery}) AS combined_table");
          // echo "$total";
          // $total_query = "SELECT COUNT(*) FROM wp_prod0";
          // $total = $wpdb->get_var($total_query);
          $items_per_page = 10;
          $page = isset($_GET['cpage']) ? abs((int) $_GET['cpage']) : 1;

          $offset = ($page * $items_per_page) - $items_per_page;
          $prodSearch = $wpdb->get_results($prodquery . "LIMIT ${offset}, ${items_per_page}");
          // $prodSearch = $wpdb->get_results($prodquery);
          // print_r($prodquery);
          // print_r($prodSearch);
          echo "<div class='ps-result-header'>";
          echo "<div class='ps-topinfo'>";
            echo "<div class='ps-search-results'>";
              echo "<p>".$total."&nbsp;".((int)$total > 1 ? 'items' : 'item' )."</p>";
            echo "</div>";
            echo "<div class='ps-pages pagination'>";
              echo paginate_links( array(
                'base' => add_query_arg('cpage','%#%'),
                'format' => '',
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'total' => ceil($total/$items_per_page),
                'current' => $page,
                'mid_size' => 2,
                // 'type' => 'list'
              ));
            echo "</div>";
          echo "</div>";

          if (sizeof($prodSearch) != 0) {
            //product search is correct and exist.
            echo "<div class='search-found'>";
              echo "<p>Displaying ".((int)$total > 1 ? 'results' : 'result')." for ".stripslashes($searchValue)."&nbsp;. . .</p>";
            echo "</div>";
            echo "</div>";  // end if for ps-result-header.

            foreach ($prodSearch as $exactProd) {
              echo "<div class='search-each-container'>";
                echo "<div class='sec-thumb'>";
                  echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."&s4=".urlencode($exactProd->s4)."' target='_blank' rel='noopener noreferrer'>";
                  $thumbCounter = 0;
                  for($x=0; $x<=9; $x++) {
                    //This will loop through all 10 image slots and see if there are any images.
                    $img = "img".$x;
                    if(($exactProd->$img) !=""){
                      echo "<img src='".$exactProd->$img."'>";
                      $thumbCounter++;
                      break;
                    }
                  }
                  if($thumbCounter == 0) {
                    //if no images are found, it will default to image placeholder.
                    echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
                  }
                  echo "</a>";
                echo "</div>";
                echo "<div class='sec-items'>";
                  echo "<div class='seci-title'>";
                    // if($exactProd->s2!=''){
                    //   echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."&nbsp;|&nbsp;".$exactProd->s2."&nbsp;".$exactProd->m0."</a>";
                    // } else {
                    //   echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."&nbsp;|&nbsp;".$exactProd->s1."&nbsp;".$exactProd->m0."</a>";
                    // }
                    echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."&s4=".urlencode($exactProd->s4)."' target='_blank' rel='noopener noreferrer'>".$exactProd->item."</a>";
                      echo "<p>";
                      echo "<a class='search-catlink' href='".home_url()."/products/categories/?m0=".urlencode($exactProd->m0)."'>";
                      echo $exactProd->m0;
                      echo "</a>";
                      if($exactProd->s1){
                        echo " > ";
                        echo "<a class='search-catlink' href='".home_url()."/products/categories/?m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."'>";
                        echo $exactProd->s1;
                        echo "</a>";
                      }
                      if($exactProd->s2){
                        echo " > ";
                        echo "<a class='search-catlink' href='".home_url()."/products/categories/?m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."'>";
                        echo $exactProd->s2;
                        echo "</a>";
                      }
                      if($exactProd->s3){
                        echo " > ";
                        echo "<a class='search-catlink' href='".home_url()."/products/categories/?m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."'>";
                        echo $exactProd->s3;
                        echo "</a>";
                      }
                      if($exactProd->s4){
                        echo " > ";
                        echo "<a class='search-catlink' href='".home_url()."/products/categories/?m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."&s4=".urlencode($exactProd->s4)."'>";
                        echo $exactProd->s4;
                        echo "</a>";
                      }
                    echo "</p>";
                  echo "</div>";  // end seci-title
                  echo "<div class='seci-spec'>";
                    $m0 = addslashes($exactProd->m0);
                    $s1 = addslashes($exactProd->s1);
                    $s2 = addslashes($exactProd->s2);

                    if($s1 != "" and $s2 != ""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1' AND s2='$s2';");
                    } elseif ($s1 != "" and $s2 == ""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1';");
                    } else {
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0';");
                    }

                    // print_r($get_item_legend);

                    echo "<table class='secis-each-data-table'>";
                      for ($y=1; $y < 9; $y++) {
                        $d = "d".$y;
                        if ($exactProd->$d !="") {
                          echo "<tr class='secis-each-data'>";
                          echo "<th class='secis-legend'>".$get_item_legend[0]->$d."</th><td class='secis-data'>".$exactProd->$d."</td>";
                          echo "</tr>";
                        }
                      }
                    echo "</table>";
                    echo "<div class='secis-blur'></div>";
                  echo "</div>";  // end seci-spec;
                  echo "<div class='seci-button'>";
                    echo "<a class='btn btn-secondary' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."&s4=".urlencode($exactProd->s4)."' role='button' target='_blank' rel='noopener noreferrer'>View Details</a>";
                  echo "</div>";
                echo "</div>";  // end sec-items.
              echo "</div>";  // end search-each-container class.
            }
          } else {
            //product search is incorrect. Searching for keyword.
            echo "<div class='search-notfound'>";
              echo "<p>No match found for ".stripslashes($searchValue).".</p>";
            echo "</div>";
            echo "</div>";  // end else for ps-result-header.

          };

          echo "<div class='ps-pages pagination'>";
            echo paginate_links( array(
            'base' => add_query_arg('cpage','%#%'),
            'format' => '',
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
            'total' => ceil($total/$items_per_page),
            'current' => $page,
            'mid_size' => 2,
            // 'type' => 'list'
            ));
            echo "</div>";

            ?>

          </div>  <!--  end search display  -->

      </div>  <!--  end product-main-page id  -->

    </main> <!--  end main tag  -->
  </div>  <!--  end id primary  -->


</div>


<?php get_footer();?>
