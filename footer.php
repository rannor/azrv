<div id="footer">
<?php truethemes_begin_footer_hook()// action hook, see truethemes_framework/global/hooks.php ?>
<?php
add_filter('pre_get_posts','wploop_exclude');

// retrieve values from site options panel
global $ttso;
$boxedlayout = $ttso->ka_boxedlayout;
$footer_layout = $ttso->ka_footer_layout;
$ka_footer_columns = $ttso->ka_footer_columns;
$ka_scrolltoplink = $ttso->ka_scrolltoplink;
$ka_scrolltoptext = $ttso->ka_scrolltoplinktext;

if (($footer_layout == "full_bottom") || ($footer_layout == "full")){ ?>
<div class="footer-area">
<div class="footer-wrapper">
<div class="footer-holder">

<?php $footer_columns = range(1,$ka_footer_columns);$footer_count = 1;$sidebar = 6;
foreach ($footer_columns as $footer => $column){
$class = ($ka_footer_columns == 1) ? '' : '';
$class = ($ka_footer_columns == 2) ? 'one_half' : $class;
$class = ($ka_footer_columns == 3) ? 'one_third' : $class;
$class = ($ka_footer_columns == 4) ? 'one_fourth' : $class;
$class = ($ka_footer_columns == 5) ? 'one_fifth' : $class;
$class = ($ka_footer_columns == 6) ? 'one_sixth' : $class; 
$lastclass = (($footer_count == $ka_footer_columns) && ($ka_footer_columns != 1)) ? '_last': '';
?><div class="<?php echo $class.$lastclass; ?>"><?php dynamic_sidebar($sidebar) ?></div><?php $footer_count++; $sidebar++; } ?>

<!-- begin az logo -->
<div id="footerlogo" style="clear:left; float:left; width:98%; text-align:right; height:34px; margin:0, padding:0">
<a href="http://www.astrazeneca.ee" target="_blank"><img class="alignnone  wp-image-5402" alt="AstraZeneca" src="http://14277150.la01.neti.ee/rinnavahk/wp-content/uploads/azlogo.png" width="130" height="34" /></a></p>
</div>
<!-- end az logo -->

</div><!-- footer-holder -->
</div><!-- end footer-wrapper -->
</div><!-- end footer-area -->
<?php } else {echo '<br />';} ?>
</div><!-- end footer -->


<?php if (($footer_layout == "full_bottom") || ($footer_layout == "bottom")){ ?>
<div id="footer_bottom">
  <div class="info">
      <div id="foot_left">&nbsp;<?php truethemes_begin_footer_left_hook()// action hook, see truethemes_framework/global/hooks.php ?><?php dynamic_sidebar("Footer Copyright - Left Side"); ?></div><!-- end foot_left -->
      <div id="foot_right"><?php if ($ka_scrolltoplink == "true"){ echo '<div class="top-footer"><a href="#" class="link-top">'.$ka_scrolltoptext.'</a></div>'; }?>


<?php // Check to see if user has footer menu set, if so display it 

if(has_nav_menu('Footer Navigation')): ?>
<ul>
<?php wp_nav_menu(array('theme_location' => 'Footer Navigation' , 'depth' => 0 , 'container' =>false)); ?>
</ul>
      
		<?php elseif(is_active_sidebar(13)): ?>
      		<ul><?php dynamic_sidebar("Footer Menu - Right Side"); ?></ul>
		<?php endif; ?>

        <?php truethemes_end_footer_right_hook()// action hook, see truethemes_framework/global/hooks.php ?>
            
      </div><!-- end foot_right -->
  </div><!-- end info -->
</div><!-- end footer_bottom -->
<?php } ?>


</div><!-- end main -->
</div><!-- end wrapper -->
<?php if ( 'true' == $boxedlayout ) {echo '</div><!-- end .tt-boxed-layout -->';}else{echo '</div><!-- end .tt-wide-layout -->';}

//codes to load scripts has been moved to truethemes_framework/global/javascript.php
wp_footer();
?>
</body>
</html>