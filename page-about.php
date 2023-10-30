<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 */

get_header();

?>

<div class="page-header">
	<div class="container">
		<h2 class="page-title"><?php echo get_the_title(); ?></h2>
		<?php the_archive_description('<div class="page-description">', '</div>'); ?>
	</div>
</div>

<div class="container">
	<h2 style="text-align:center;">이 부분을 지우고 여러분이 원하는 대로 자유롭게 꾸며보세요.</h2>
</div>

<?php get_footer(); ?>