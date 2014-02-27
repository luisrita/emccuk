<?php

/**

 * @package WordPress

 * @subpackage emcc

 Template Name: home-test

 */



get_header(); ?>

<body>
	<div class="body">
    	<?php
//get user id from email
if(!$_SESSION['personid']) {
	$url = 'http://dev.shocklogic.com/Scripts/participantlogiclite/emcc/getUserId.php?clientid=EMCC&projectid=EMCC&email=' . $current_user->user_email;
	$_SESSION['personid'] = file_get_contents($url);

}

echo '<script>personid="' . $_SESSION['personid'] . '";</script>';

if(isset($_GET['act']) && $_GET['act']=='yes' ){
    getUrl();
}

function getUrl(){
  if(isset($_POST['submit'])) {
  	if(isset($_POST['field_email']) && isset($_POST['field_password'])){
      $urlredirect = "https://www5.shocklogic.com/scripts/jmevent/MemberLogin.asp?Client_Id='EMCC'&Project_Id='EMCC'&";
      $encrypted = "Person_Id=" . $_POST['field_email'] . "&A=&Language_Code=&System_Id=4&System_Area=&Password=" . $_POST['field_password'] . "&Flag=R";
      $urlredirect .= $encrypted;
      //echo $urlredirect;
      //header("Location: $urlredirect ");
    }

    } else {
        echo $_SERVER['PHP_SELF'];
    }
  }
?>
<div class="header">
  <div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/emcc-uk.gif" width="162" height="101" alt="EMCC UK" border="0"  /></a></div>
  <div class="navi home-test">
  <?php if (function_exists('pixopoint_menu')) {pixopoint_menu();} ?>
  </div>
  <div class="tabs">
    <div class="tab"><a href="http://www.emccouncil.org" target="_blank"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/tab-international.gif" width="154" height="24" alt="International EMCC" /></a></div>
    <div class="tab"><img id="ssSwitch" src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/tab-fontSize.gif" width="64" height="24" alt="Change Font Size" /></div>
    <?php
			if ( is_user_logged_in() ) {
		?>
    <div class="tab" style="position:relative; top:-10px; left:5px"><a href="#" class="myAccount">Hi <?php echo wp_get_current_user()->user_firstname ?></a>, <a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></div>
    <?php
		} else {
		?>
		<div class="tab"><img id="memberLogin" src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/tab-memberLogin.gif" width="134" height="24" alt="Member Login" /></div>
		<div class="loginBox">
			<form class="loginBox" method="post" action="<?php bloginfo('url'); ?>/wp-login.php" data-action="<?php bloginfo('url');?>/wp-content/themes/emcc/includes/header.php?act=yes">
				<input type="text" value="Email" name="log"/>
				<input type="password" value="Passworda" name="pwd"/>
				<input type="hidden" name="rememberme"  />
				<input type="hidden" name="redirect_to" value="%2Fmembers-area%2Flogin%2F" />
				<div class="more">
          <input type="submit" name="submit" value="Submit" style="background-image:<?php bloginfo('url');?>/wp-content/themes/emcc/images/button-login.gif;"  />
        </div>
			</form>
		</div>
		<?php
		}
		?>
  </div>
</div>
<div class="content">
<?php
  $banners = get_posts('category=2&orderby=menu_order&order=ASC&numberposts=-1');
	for($i=0; $i<sizeof($banners); $i++){
		$image = substr($banners[$i]->post_content, strpos($banners[$i]->post_content, '/wp-content'));
		$image = substr($image, 0, strpos($image, '"'));
		$bannersList[] = array($image, $banners[$i]->post_title, $banners[$i]->post_excerpt);
	}
  echo '<script type="text/javascript">'."\n";
  echo 'var banners = new Array();'."\n";
  for($i=0; $i<sizeof($bannersList); $i++) {
    echo 'banners['.$i.'] = new Array("'.$bannersList[$i][0].'", "'.$bannersList[$i][1].'", "'.$bannersList[$i][2].'");'."\n";
  }
  echo 'function preload(arrayOfImages) ';
  echo '{';
  echo '	$(arrayOfImages).each(function(){';
  echo '		(new Image()).src = this;';
  echo '	});';
  echo '}';
  echo 'preload([';
	echo '"/wp-content/themes/emcc/badgeHigh-eia.jpg",';
	echo '"/wp-content/themes/emcc/badgeHigh-eqa.jpg",';
	echo '"/wp-content/themes/emcc/badgeHigh-membership.jpg",';
  for($i=0; $i<sizeof($bannersList); $i++) {
    echo '"'.$bannersList[$i][0].'"';
    if($i< sizeof($bannersList))
        echo ',';
  }
  echo ']);';
  echo '</script>'."\n";
  ?>
  <div class="banner">
    <div class="bannerInner1"></div><div class="bannerInner2"></div>
    <?php include 'includes/badgeBanners.php'; ?>
  </div>
  <?php include 'includes/badges.php'; ?>
  <div class="clear"></div>
  <div class="colLeft">
    <?php include 'includes/news.php'; ?>
  </div>
  <div class="colMain">
  <?php $content = get_post($post_ID);
    $content = $content ->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);
    echo $content; ?>
  </div>
  <div class="colRight">            	
    <div> <?php get_search_form( $echo ); ?> <br/></div>
      <?php include 'includes/stories.php'; ?>
  </div>
</div>
<?php include 'includes/cufon.php'; ?>
<?php get_footer() ?>

