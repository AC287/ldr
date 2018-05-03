<!--  Template Name: Contact Success  -->

<?php

  // source: https://premium.wpmudev.org/blog/how-to-build-your-own-wordpress-contact-form-and-why/
  //response generation function
  $response = "";

  //function to generate response
  // function my_contact_form_generate_response($type, $message){
  //
  //   global $response;
  //
  //   if($type == "success") $response = "<div class='success'>{$message}</div>";
  //   else $response = "<div class='error'>{$message}</div>";
  //
  // }
  //response messages
  // $not_human       = "Human verification incorrect.";
  // $missing_content = "Please supply all information.";
  // $email_invalid   = "Email Address Invalid.";
  // $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['contact-name'];
  $email = $_POST['contact-email'];
  $message = $_POST['contact-message'];
  $company = $_POST['contact-company'];
  $phone = $_POST['contact-phone'];
  // $human = $_POST['message_human'];
  $contents = "Name: $name \nEmail: $email \nPhone: $phone \nCompany: $company \nMessage: $message";

  //php mailer variables
  $to = "arthurchen287@gmail.com";
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: no-reply@cambridgeresources.com'."\r\n" .'Reply-To: ' . $email . "\r\n";
  if($message !=''){
    $sent = wp_mail($to,$subject,strip_tags($contents),$headers);
    // unset($name, $email, $message, $company, $phone, $contents);
  }

  // if($sent) my_contact_form_generate_response('success',$message_sent);
  // else my_contact_form_generate_response('error',$message_unsent);
?>
<!-- <?php
  // $homeurl = home_url();
  // header('refresh:5; url='.home_url());
?> -->
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
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID();?>"<?php post_class();?>>
          <header class="entry-header">
            <h1 class="entry-title"><?php the_title();?></h1>
          </header>
          <div class="entry-content">
            <h4><?php the_content();?></h4>
          </div>
        </article>  <!-- end article post -->
      <?php endwhile;?>
    </div>
    <div class='contact-phaddress'>
      <div class='contact-phaddress-ph'>
        <span>P.718.927.0009</span><span>P.877.922.2538</span><span>F.718.445.4403</span>
      </div>
      <div class='contact-phaddress-address'>
        <p><strong>New York Office:</strong> 960 Alabama Avenue Brooklyn, NY 11207</p>
        <p><strong>Chicago Office:</strong> 600 N. Kilbourn Chicago, IL 60624</p>
      </div>
    </div>

  </div>
</div>
<div class='contact-salesmanager'>
  <div class='container'>
    <div class="contact-salesmanager-section">
      <span>CONTACT SALES DIRECT</span>
      <div class="contact-salesmanager-section-underline">
      </div>
    </div>
    <div class='contact-salesmanager-container'>
      <?php
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
      ?>
    </div>
  </div>  <!--  end container  -->
</div>  <!--  end contact-salesmanager class -->

<?php get_footer();?>
