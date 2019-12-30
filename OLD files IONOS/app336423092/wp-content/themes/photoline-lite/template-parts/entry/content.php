<?php
/**
 * @package Photoline Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content<?php if ( !has_post_thumbnail() ) { ?> no-thumbnail<?php } ?>">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('photoline-aside'); ?></a></div>
	<?php } ?>
		<span class="entry-meta"><?php photoline_posted_on(); ?></span>
			<h1 class="entry-title<?php if ( !has_post_thumbnail() ) { ?> no-thumb<?php } ?>">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>

		<?php if ( has_post_thumbnail() ) : ?>
			<?php photoline_excerpt( 32 ); ?>
		<?php else : ?>
			<?php photoline_excerpt( 95 ); ?>
		<?php endif; ?>

</div><!-- .entry-content -->
</article><!-- #post-## -->