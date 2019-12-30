<?php
$byline = sprintf(
		_x( 'Posted By: %s &nbsp;', 'post author', 'mk' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta('user_nicename') ) . '</a></span>'
	);
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$cats = get_the_category();
	$unique = 'gallery-'.rand(1,2400000);
?>	
<div class="col-md-6 col-sm-12 col-xs-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(array('class__c'));?>>
<?php if(has_post_format('audio')): ?>
	<div class="audio__player__wrapper">
	<?php echo lnt_themes_media_grabber(array('type'=>'audio')); ?>
	</div>
<?php endif; ?>
<div class="post__featured__media">
<?php
	if(has_post_format('gallery')):
		?>
			<?php if ( get_post_gallery() ) : ?>
			<?php
			$gallery = get_post_gallery( get_the_ID(), false );
			?>
			<div class="gallery-slideshow">
			<div class="gallery-image-slider cycle-slideshow" data-cycle-swipe="true" data-cycle-swipe-fx="fadeout" data-cycle-fx="tileBlind" data-cycle-next="#next-<?php echo $unique;?>" data-cycle-prev="#prev-<?php echo $unique;?>" data-cycle-speed = "800" data-cycle-timeout="8000" data-cycle-pause-on-hover = "true">
			<?php
			foreach( $gallery['src'] as $src ) {  ?> 
			<?php $image = mk_image_resize($src,750,680, true, true, true);?>
			<img src="<?php echo esc_url($image); ?>" class="mk-post-galleries" alt="Gallery image" /> 
			<?php
			} //foreach 
			?>
			</div>			 
			</div>
			<?php endif; /* get_post_gallery*/ ?>
		<?php
		
	elseif(has_post_format('video')):
	
		echo lnt_themes_media_grabber(array('type'=>'video'));
		
	elseif(has_post_format('audio')):
	
	$image = mk_get_the_Image(array('format'=>'array','size'=>'full'));
	
	if($image['src']):
		
	$image = mk_image_resize($image['src'],750,680, true, true, true);
	
	?>
	<img class="ft__image" src="<?php echo esc_url($image);?>" alt="" />
	<?php
	
	endif;	
	
	else:
	$image = mk_get_the_Image(array('format'=>'array','size'=>'full'));
	if($image['src']){
	$image = mk_image_resize($image['src'],750,680, true, true, true);
	
	?>
	<img class="ft__image" src="<?php echo esc_url($image);?>" alt="" />
	<?php
	}
endif;
?>	
</div>
<?php if(has_post_format('gallery') && get_post_gallery()): ?>
<div class="_latest_posts_pagination">
<span id="prev-<?php echo $unique;?>" class="_latprev">&larr;</span><span id="next-<?php echo $unique;?>" class="_latnext">&rarr;</span>
</div>
<?php endif;?>
<?php /* Remove image mask on video post formats */ ?>		
	
<?php if(!has_post_format('video')): ?>		
<span class="ft__imagemask"></span>
<?php endif; ?>
<?php if(has_post_format('quote')): ?>
<span class="cat__button"><?php the_title();?></span>
<?php else: ?>
	<?php if(!empty($cats)): ?>
	<a href="<?php echo esc_url(get_category_link($cats[0]->term_id));?>"><span class="cat__button"><?php echo esc_html($cats[0]->name);?></span></a>
	<?php endif;?>
<?php endif;?>
	<?php /* skip post meta on quote post formats */ ?>	
	<div class="inner__post">
		<div class="summary__content">
		<?php if(has_post_format('quote')): ?>
		<blockquote><span class="quotes fa fa-quote-left"></span><?php the_excerpt();?></blockquote>
			<?php else: ?>
			<div class="post__date"><?php echo $time_string;?></div>
			<div class="post__author"><?php echo $byline; ?></div>
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<div class="entry-summary"><?php the_excerpt();?></div>			
			<?php endif; ?>
		</div>
	</div>
</article>
</div>	
	