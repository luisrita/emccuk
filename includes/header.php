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
        	<div class="logo"><a href="<?php bloginfo('url');�?>"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/emcc-uk.gif" width="162" height="101" alt="EMCC UK" border="0"  /></a></div>
            
            <div class="navi">
            <?php
				$pages = get_pages('parent=0&post_type=page&sort_column=menu_order&sort_order=ASC&exclude=2');
				
				for($i=0; $i<sizeof($pages); $i++)
				{
					echo '<div class="naviItem">';
					echo '<a ';
					if(is_tree($pages[$i]->ID))
						echo 'class="active" ';
					echo 'href="/'.$pages[$i]->post_name.'/" title="Go to '.$pages[$i]->post_title.'">'.ucwords($pages[$i]->post_title).'</a>';
					echo '</div>';
				}
			?>
            </div>
            
            <div class="tabs">
            	<div class="tab"><a href="http://www.emccouncil.org" target="_blank"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/tab-international.gif" width="154" height="24" alt="International EMCC" /></a></div>
            	<div class="tab"><img id="ssSwitch" src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/tab-fontSize.gif" width="64" height="24" alt="Change Font Size" /></div>
            	<?php
				if ( is_user_logged_in() ) {
					?>
                    <div class="tab" style="position:relative; top:-10px; left:5px"><a href="#" class="myAccount">Hi <?php echo wp_get_current_user()->user_firstname ?></a>, <a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></div>
                    <?php
				}
				else {
					?>
					
					
					<div class="tab"><img id="memberLogin" src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/tab-memberLogin.gif" width="134" height="24" alt="Member Login" /></div>
					<div class="loginBox">
					<form class="loginBox" method="post" action="<?php bloginfo('url'); ?>/wp-login.php" data-action="<?php bloginfo('url');?>/wp-content/themes/emcc/includes/header.php?act=yes">
						<input type="text" value="Email" name="log"/>
						<input type="password" value="Passworda" name="pwd"/>
						<input type="hidden" name="rememberme"  />
						<input type="hidden" name="redirect_to" value="%2Fmembers-area%2Flogin%2F" />
						
						<div class="more"><input type="submit" name="submit" value="Submit" style="background-image:<?php bloginfo('url');?>/wp-content/themes/emcc/images/button-login.gif;"  /></div>
						</form>
					</div>
					<?php
				}
				?>
            </div>
            
            <div class="subnavi">
            	<div class="subnaviBlock">
                
                <?php
					if($depth == 2) //Third tier page
					{
						$grandfather = get_post($post->post_parent);
						$pages = get_pages('parent='.$grandfather->post_parent.'&child_of='.$grandfather->post_parent.'&post_type=page&sort_column=menu_order&sort_order=ASC&exclude=525');
					}
					else if($post->post_parent != 0) //Second tier page
						$pages = get_pages('parent='.$post->post_parent.'&child_of='.$post->post_parent.'&post_type=page&sort_column=menu_order&sort_order=ASC&exclude=525');
					else
						$pages = get_pages('parent='.$post->ID.'&child_of='.$post->ID.'&post_type=page&sort_column=menu_order&sort_order=ASC&exclude=2,525');
					
					for($i=0; $i<sizeof($pages); $i++)
                    {
                        echo '<div class="subnaviItem">';
                        echo '<a ';
						if(is_tree($pages[$i]->ID))
                            echo 'class="active" ';
                        echo 'href="/'.$pages[$i]->post_name.'/" title="Go to '.$pages[$i]->post_title.'">';
						echo ucwords($pages[$i]->post_title).'</a>';
                        echo '</div>';
						
						if((($i+1)%3) == 0 && (($i+1) != sizeof($pages)))
							echo '</div><div class="subnaviBlock">';
                    }
                ?>
                </div>
            </div>
            
        </div>