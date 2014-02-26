<?php
/**
 * @package WordPress
 * @subpackage emcc
 template name: login
 */

 get_header(); ?>
 <body>

<div class="body">
    
    	<?php include 'includes/header.php'; ?>
        
        <div class="content">
        	<div class="banner">
				<?php 
            	$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
				if($image[0] != '') echo '<img src="'.$image[0].'" />'; ?>
                <?php include 'includes/badgeBanners.php'; ?>
            </div>
            <?php include 'includes/badges.php'; ?>
            <div class="clear"></div>
            
            <div class="colLeft">
            	<?php include 'includes/news.php'; ?>
            </div>

 			<div class="colMain">
 			
 			
 			
 				<!--login -->

 				<div class="login-form">
 					<?php if (!(current_user_can('level_0'))){ ?>
	 					<h1>Members Area</h1><?php $content = get_post($post_ID);
$content = $content ->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content; ?>

	 					
	 					<!--<p>          
	 						<form action="<?php echo get_option('home'); ?>/wp-login.php" onsubmit="" method="post" autocomplete="none">
	 							Username<br/>
	 							<input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" /><br/><br/>
	 							Password<br/>
	 							<input type="password" name="pwd" id="pwd" size="20" /><br/>

	 							<p>
	 								<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label>
	 								<br/><br/>

	 								<input type="submit" name="submit" value="Login" class="button" />


	 								<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
	 							</p>-->

	 						<!--</form> 
	 						<h2>Don&#8217;t have a username or password?</h2>
	 						<p>You need to be a registered user to access this section   </p>
	 					</div>
-->
 					<?php } else { ?>  

						<!--<h2>Logout</h2>
	 					<a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="Logout">Logout</a>
	 					<h2>Change your password</h2>-->
	 					<h1>Welcome to the EMCC UK Members Area</h1>
	 					<p class="intro">We are keen to develop this area of the web site to help our members in their coaching and mentoring practice. If you have any suggestions or comments about what new information or features would be of value to you as a member, please email <a href="mailto:jeremy.gomm@emccuk.org">jeremy.gomm@emccuk.org.</a></p>

<p>As a member, you also have full access to the EMCC European web site, www.emccouncil.org, which can be accessed via the EC flag at the top of the page. For members, this will be the gateway to other great benefits of EMCC membership:</p>

• The International Journal of Mentoring & Coaching<br/>
• EMCC Newsletter<br/>
• Find a mentor coach, where members can upload details of their coaching or mentoring credentials so potential clients can check you out.</p>
<p>Because the web sites are being developed separately, members will need to maintain separate passwords for each site – though they can be the same password for each if you prefer.</p>
	<hr style="border: 0;
    height: 1px;
    background: #333;
    background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc); 
    background-image:    -moz-linear-gradient(left, #ccc, #333, #ccc); 
    background-image:     -ms-linear-gradient(left, #ccc, #333, #ccc); 
    background-image:      -o-linear-gradient(left, #ccc, #333, #ccc);">
<p>If you would like to change your password on this site, you can do so here: 
</p>
 			
	 					<iframe style="border:none; width:300px; height:300px;" src="https://www5.shocklogic.com/scripts/jmevent/MemberChangePassword.asp?Client_Id='EMCC'&Project_Id='EMCC'&System_Id=4" ></iframe>
 					<?php }?>
 					<!-- end login -->
 				
 	 	
        </div>
        </div>
     </div>
    	
		<?php include 'includes/cufon.php'; ?>
        
    	<?php get_footer() ?>