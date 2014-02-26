<div class="news">
    <div class="newsHeader">Latest News</div>
    
    
                        
<?php $news = query_posts('cat=3&showposts=2');

for($i=0; $i<sizeof($news); $i++)
{
 echo '<div class="newsStory">';
 echo '<div class="newsStoryHeader"><a href="/'.$news[$i]->post_name.'/">'.$news[$i]->post_title.'</a></div>';
 echo $news[$i]->post_excerpt;
 echo '<br/><a href="/'.$news[$i]->post_name.'/">more...</a>';
 echo '</div>';
}
?> </div>
<div style="padding-top:6px"><a href="<?php bloginfo('url'); ?>/about-us/latest-survey/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/questionnaire-button.jpg"></a></div>

            	<a href="<?php bloginfo('url'); ?>/news-events/downloads/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/resources-downloads.gif" width="192" height="81" alt="Resources & Downloads" /></a>