<?php get_header(); ?>

<!-- <p>Envelope icon: <span class="glyphicon glyphicon-envelope"></span></p> -->
<?php
/*
  if (have_posts()):
  while (have_posts()) : the_post();?>

  <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
  <!-- the_permalink enable wordpress to link to that post page automatically. -->
  <?php the_content(); ?>
  <?php endwhile;

  else:
    echo '<p>No content found</p>';

  endif;
*/
include 'phpsnippet/serverlocation.php';
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <img src="<?php bloginfo('template_directory')?>/images/banners/ldr_fashion.jpg">
      <div class="index-banner-textbox ibt-fashion">
        <div class="ibt-text">
          <span>WHERE PLUMBING MEETS FASHION</span>
        </div>
        <div class="ibt-underline">
        </div>
      </div>
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/banners/ldr_repair.jpg">
      <div class="index-banner-textbox ibt-repair">
        <div class="ibt-text">
          <span>REPAIR TO GET YOU OUT OF HOT WATER</span>
        </div>
        <div class="ibt-underline">
        </div>
      </div>
    </div>


  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--  GENERAL-CATEGORY -->
<div class="general-category">
  <div class="container">

    <div class="gc-overallinnercontainer">

      <div class="gc-indexcontainer">
        <div class="gc-indeximages">
          <img src="<?php bloginfo('template_directory')?>/images/icons/home-rough.svg">
        </div>
        <div class="gc-txtbox">
          <div class="gc-indextitle">
            <p>Rough</p>
          </div>
          <div class="gc-indextxt">
            <p>LDR's rough line is comprised of thousands of plumbing sku's made from copper, brass, and plastic.</p>
            <p>With LDR's rail system which includes channel and rail cards, and their slanted cut case box design, the rough products are easy to find even on lower shelves.</p>
          </div>
        </div>
      </div>

      <div class="gc-indexcontainer">
        <div class="gc-indeximages">
          <img src="<?php bloginfo('template_directory')?>/images/icons/home-faucet.svg">
        </div>
        <div class="gc-txtbox">
          <div class="gc-indextitle">
            <p>Fashion</p>
          </div>
          <div class="gc-indextxt">
            <p>LDR carries a complete line of high quality fashion plumbing kitchen, bath and laundry products. The product offering covers accessories, organization, and safety.</p>
            <p>LDR offers both old school nostalgic  items useful when replacing old parts, and cutting edge modern products ready to make any space shine.</p>
          </div>
        </div>
      </div>

      <div class="gc-indexcontainer">
        <div class="gc-indeximages">
          <img src="<?php bloginfo('template_directory')?>/images/icons/home-repair.svg">
        </div>
        <div class="gc-txtbox">
          <div class="gc-indextitle">
            <p>Repair</p>
          </div>
          <div class="gc-indextxt">
            <p>LDR offers an extensive line of carded plumbing repair products, specializing in pipe repair, water supply, and sink and faucet repair.</p>
            <p>The packaging clearly defines which category the item belongs to and is color coded to size making it very easy for consumers to shop.</p>
          </div>
        </div>
      </div>

    </div>  <!--  end gc-overallinnercontainer -->


  </div> <!-- end container -->
</div> <!-- end general-category-->
<!--  MID-MENU  -->
<div class="mid-menu" style='height:45px'>
  <div class="container">
    <span id="mid-menu-menu">
      <!-- <a href="">NEW PRODUCTS</a>
      <span class="mm-divider">|</span> -->
      <!-- <a href="<?php //echo home_url();?>/tradeshows/">TRADESHOWS</a> -->
      <!-- <span class="mm-divider">|</span>
      <a href="<?php //echo home_url();?>/news/">NEWS</a> -->
    </span>
  </div> <!-- end container -->
</div> <!-- end mid-menu -->
<!--  MID-CATEGORY  -->
<div id="mid-category">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="index-midcategory">
          <!-- <img src="<?php //bloginfo('template_directory')?>/images/distribution01.png"></img> -->
          <div class="index-midcategory-imgholder index-indexretail"></div>
          <div class="mc-header" >RETAIL</div>
        </div>
        <div class="index-midcategory-contents" id="imc-indexretail">
          <!-- <div class="mc-border">INDUSTRY DISTRIBUTORS <br/>CARRY CAMBRIDGE</div> -->
          <div class="mc-txt">
            <p>LDR has a firm understanding of the retail marketplace giving your retail space a great edge.</p>
            <p>LDR's label and UPC color coding system allows easy shopping for the customer and quick restocking by store personnel. The small pack quantities allow for quick turn around.</p>
            <p>LDR's ability to customize product assortments, program updates, and  competitive pricing makes us the retailers #1 choice.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="index-midcategory">
          <!-- <img src="<?php bloginfo('template_directory')?>/images/retail01.png"></img> -->
          <div class="index-midcategory-imgholder index-index2step"></div>
          <div class="mc-header" >2 STEP DISTRIBUTION</div>
        </div>
        <div class="index-midcategory-contents" id="imc-index2step">
          <!-- <div class="mc-border">INTERNATIONAL RETAILERS <br/>SELL CAMBRIDGE</div> -->
          <div class="mc-txt">
            <p>LDR's two-step distribution process keeps the product easily accessible to the distributor. Global access points, and local headquartered support allow for quick turn around and instant service.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end mid-category -->

<?php get_footer(); ?>
