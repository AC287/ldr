<?php

echo "<table class='item-data-sheet'>";
echo "<tr >";
// Labeling cells.
echo "<th class='col-xs'>".$catlegend[0]->item."</th>";
for ($x=1; $x < 12; $x++) {
  $cell_data = "d".$x;
  // print_r($catlegend[0]->$cell_data);
  // if(($catlegend[0]->d.$x)) {
  // 	print_r($x);
  // }
  if(($catlegend[0]->$cell_data)!=""){
    echo "<th class='col-xs'>".$catlegend[0]->$cell_data."</th>";
  }
}
echo "</tr>";
foreach($catitems as $item_data) {
  echo "<tr>";
  echo "<td class='prod-itemnum'>";
    $ipt_class = str_replace (' ','',$item_data->item);
    $ipt_class = str_replace ('/','',$ipt_class);
    $ipt_class = str_replace ('-','',$ipt_class);
    $ipt_class = str_replace ('*','',$ipt_class);
    // echo $ipt_class;
    echo "<a class='ipt $ipt_class' href='../item/?id=".urlencode($item_data->item)."'>";
      echo $item_data->item;
      // $ipt_img = $item_data->img0;
      echo "<p class='item-preview-thumb ipt-$ipt_class'>";
        $imgCounter = 0;
        for($i = 0; $i <= 9; $i++) {
          $img = "img".$i;
          if ($item_data->$img !="" && $imgCounter == 0 ) {
            echo "<img src=".$item_data->$img.">";
            $imgCounter++;
            break;
          }
        }
        if($imgCounter == 0) {
            echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
        }
      echo "</p>";
    echo "</a>";
  echo "</td>";
  for ($y=1; $y<9; $y++) {
    $cell_data2 = "d".$y;
    if(($item_data->$cell_data2)!="") {
      echo "<td class='prod-data'>".$item_data->$cell_data2."</td>";
    }
  }
  echo "</tr>";
}
echo "</table>";


 ?>
