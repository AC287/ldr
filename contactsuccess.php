<!--  Template Name: Contact Success  -->

<?php get_header();?>

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
    <div class='contact-success-message'>
      <?php

        $response = "";

        $message_sent    = "Thanks! Your message has been sent.";
        $message_spam    = "Spam detected. Please send your inquiry to sales@ldrind.com";
        include 'phpsnippet/google_captcha.php';
        //user posted variables
        $name = $_POST['contact-name'];
        $email = $_POST['contact-email'];
        $message = $_POST['contact-message'];
        $company = $_POST['contact-company'];
        $phone = $_POST['contact-phone'];
        $contents = "Name: $name \nEmail: $email \nPhone: $phone \nCompany: $company \nMessage: $message";

        //php mailer variables
        $to = "akennedy@ldrind.com";
        $subject = "LDR web contact from $name";
        $headers = array(
          'Reply-To: '.$email
        );
        $headers = implode("\r\n", $headers);

        if($message !='' && $responseData->success){
          $sent = wp_mail($to,$subject,strip_tags($contents),$headers);
          echo $local;
          echo "<h3>$message_sent</h3>";
          echo "<p>We will respond to you within one to two business days.</p>";
          // unset($name, $email, $message, $company, $phone, $contents);
        } else {
          echo "<h3>$message_spam</h3>";
        }

      ?>
    </div>
    <div class='contact-phaddress'>
      <div class='contact-phaddress-ph'>
        <span>P.800.545.5230</span>
        <span>P.773.265.3000</span>
        <span>F.773.265.3130</span>
      </div>
      <div class='contact-phaddress-address'>
        <p>600 N. Kilbourn Avenue, Chicago, IL 60624</p>
        <p>sales@ldrind.com</p>
      </div>
    </div>

  </div>
</div>

<!-- <div class='contact-salesmanager'>
  <div class='container'>
    <div class="contact-salesmanager-section">
      <span>CONTACT SALES DIRECT</span>
      <div class="contact-salesmanager-section-underline">
      </div>
    </div>
    <div class='contact-salesmanager-container'> -->
      <!-- <?php
      /*
        global $wpdb;
        $salesmanager = $wpdb->get_results("SELECT * FROM wp_ldrsalesmanager ORDER BY sort ASC;");
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
  <!-- </div>   -->
<!-- </div>   -->

<?php get_footer();?>
