<?php if (is_home()): ?>
	<?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', 'posts');
?>
        <?php elseif (is_author()): ?>
   <?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', 'author');
?>
   <?php elseif (is_category()): ?>
   <?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', 'category');
?>
   <?php elseif (is_search()): ?>
   <?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', 'search');
?>
   <?php elseif (is_date()): ?>
   <?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', 'category');
?>
   <?php elseif (is_tag()): ?>
   <?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', 'category');
?>
   <?php elseif (is_404()): ?>
   <?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
get_template_part('loop', '404');
?>
   <?php else: ?>

   <?php if (have_posts()): while (have_posts()): the_post();?>
		   <div class="row">
		   	<div class="small-12 columns">
		   		<h1><?php the_title();?></h1>
		   		<?php the_content();?>
		   	</div><!-- columns -->
		   </div><!-- row -->
		   <!-- END LOOP -->
		 <?php endwhile;else: ?>
 <div class="row top100 bottom100">
 	<div class="small-12 columns">
 		<p><?php _e('Sorry, no posts matched your criteria.');?></p>
 	</div>
 </div>
<?php endif;
wp_reset_query();?>
<?php endif;?>
