<!--  Template Name: Contact Us  -->

<?php
  wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js');
  get_header();
?>

<div class='contact-banner'>
  <div class='cb-img'>
    <img src="<?php bloginfo('template_directory')?>/images/banners/contact-banner.jpg">
  </div>
  <div class='cb-textbox'>
    <div class='cb-textbox3'>
      <span class='cb3-i1'>DO YOU HAVE A </span>
      <span class='cb3-i2'>QUESTION OR PROJECT IN MIND? </span>
      <span class='cb3-i1'>JUST WANT TO SAY HI? </span>
      <span class='cb3-i2'>TALK TO US </span>
    </div>
  </div>
</div>

<div class='contact-form'>
  <div class='contact-container'>
    <div class='col-sm-12 contact-maintitle'>
      <span>CONTACT</span>
    </div>
    <div class='.contact-form-input'>
      <?php echo $response; ?>
      <form action='<?php the_permalink();?>success' method='post' class='row' autocomplete="off" id="contact_form">
      <!-- <form action='<?php //echo esc_url(admin_url('admin-post.php'));?>' method='post' class='row'> -->
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-name' placeholder='Name' required>
        </div>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-company' placeholder='Company' >
        </div>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='email' name='contact-email' placeholder='E-mail Address' required>
        </div>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-phone' placeholder='Phone Number' required>
        </div>
        <div class='form-group contact-message col-sm-12'>
          <textarea type='text' name='contact-message' placeholder='Type your message here' required></textarea>
        </div>
        <div class='form-group contact-nonrobot col-sm-12'>
          <div class='g-recaptcha' data-sitekey='6LfmTHYUAAAAAJ3clYNDURExFe6U7bQtqkxuci96'></div>
        </div>
        <div class='form-group contact-submit'>
          <input type='hidden' name='submitted' value='1'>
          <!-- <input type='hidden' name='action' value='contact_form'> -->
          <button type='submit'>SEND</button>
        </div>
      </form>
    </div>
    <div class='contact-phaddress'>
      <div class='contact-phaddress-ph'>
        <span>P.800.545.5230</span>
        <span>P.773.265.3000</span>
        <span>F.773.265.3130</span>
      </div>
      <div class='contact-phaddress-address'>
        <p>600 N. Kilbourn Avenue, Chicago, IL 60624</p>
        <p>orders@ldrind.com</p>
      </div>
    </div>

  </div>
</div>
<!-- <div class='contact-salesmanager'> -->
  <!-- <div class='container'> -->
    <!-- <div class="contact-salesmanager-section"> -->
      <!-- <span>CONTACT SALES DIRECT</span> -->
      <!-- <div class="contact-salesmanager-section-underline"> -->
      <!-- </div> -->
    <!-- </div> -->
    <!-- <div class='contact-salesmanager-container'> -->
      <!-- <?php
      /*
        global $wpdb;
        $salesmanager = $wpdb->get_results("SELECT * FROM wp_camsalesmanager ORDER BY sort ASC;");
        foreach ($salesmanager as $salesmanager1){
          echo "<div class='contact-salesmanager-each'>";
            echo "<div class='contact-salesmanager-img'>";
              echo "<a href='mailto:".$salesmanager1->email."'><img class='contact-state-".$salesmanager1->si."' src='".$salesmanager1->img."'></a>";
            echo "</div>";
            echo "<div class='contact-salesmanager-name'><span>".ucfirst($salesmanager1->first)." ".ucfirst($salesmanager1->last)."</span></div>";
            echo "<div class='contact-salesmanager-title'><span>".ucfirst($salesmanager1->title)."</span></div>";
            echo "<div class='contact-salesmanager-email'><a href='mailto:".$salesmanager1->email."'>".$salesmanager1->email."</a></div>";
            echo "<div class='contact-salesmanager-phone'><span>".$salesmanager1->phone."</span></div>";
            echo "<div class='contact-salesmanager-text'><span>".strtoupper($salesmanager1->text)."</span></div>";
          echo "</div>";
        }
        */
      ?> -->
    <!-- </div> -->
  <!-- </div> -->
<!-- </div>  -->

<?php get_footer();?>
