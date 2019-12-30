<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Photoline Lite
 */

if ( ! function_exists( 'photoline_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function photoline_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'photoline-lite' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="fa fa-arrow-left"></i>', 'Previous post link', 'photoline-lite' ) . '</span>' ); // %title ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '<span class="meta-nav">' . _x( '<i class="fa fa-arrow-right"></i>', 'Next post link', 'photoline-lite' ) . '</span>' ); // %title ?>

<?php elseif ( $wp_query->max_num_pages > 1 ) : // && ( is_home() || is_category() || is_archive() || is_search() )  ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( 'Older', 'photoline-lite' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer', 'photoline-lite' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // photoline_content_nav

if ( ! function_exists( 'photoline_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function photoline_comment( $comment, $args, $depth ) {

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'photoline-lite' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'photoline-lite' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'photoline-lite' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<time datetime="<?php comment_time( 'c' ); ?>">
	<?php printf( _x( '%1$s &middot; %2$s', '1: date, 2: time', 'photoline-lite' ), get_comment_date(), get_comment_time() ); ?>
					</time>
	<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">#<?php echo $comment->comment_ID; ?></a>
					<?php edit_comment_link( __( 'Edit', 'photoline-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'photoline-lite' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for photoline_comment()

if ( ! function_exists( 'photoline_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function photoline_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'photoline_attachment_size', array( 1200, 9999 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'photoline_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function photoline_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span><span class="byline"> <i>by</i> %2$s</span>', 'photoline-lite' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

if ( ! function_exists( 'photoline_posted_extra' ) ) :
/**
 * Prints HTML with meta info cat/tag
 */
function photoline_posted_extra() {

	$categories_list = get_the_category_list( __( ', ', 'photoline-lite' ) );
	$tags_list = get_the_tag_list( '', __( ', ', 'photoline-lite' ) );

	if ( $categories_list && photoline_categorized_blog() ) {

	echo '<span class="cat-links">' . __( 'Category: ', 'photoline-lite' ), $categories_list . '.</span>';

	}
	if ( $tags_list ) {

	echo '<span class="tags-links">' . __( 'Tag: ', 'photoline-lite' ), $tags_list . '</span>';

	}
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function photoline_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so photoline_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so photoline_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in photoline_categorized_blog
 */
function photoline_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'photoline_category_transient_flusher' );
add_action( 'save_post',     'photoline_category_transient_flusher' );

/**
 * Featured image as the background for some formats posts
 */
function photoline_bgimage_postformats() {
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'photoline-aside' );
	echo 'style="background:';
	echo esc_attr( get_theme_mod( 'photoline_link_color', '#2d2d2d' ) );

	if  ( $thumbnail ) {
		echo ' url(';
		echo $thumbnail[0];
		echo ' ) no-repeat; background-position: 50%; background-size: cover';
	}
echo ';"';
}

/**
 * The page submenu into sidebar
 * @author Oleg Murashov
 */
if ( ! function_exists( 'photoline_get_submenu' ) ) {
  function photoline_get_submenu($args) {
    $defaults = array(
    	'container_id' => '',
    	'container' => 'div',
    	'container_class' => 'submenu',
    	'submenu_id' => 'sidemenu',
    	'submenu_class' => '',
    	'theme_location' => 'primary',
    	'xpath' => "./li[contains(@class,'current-menu-item') or contains(@class,'current-menu-ancestor')]/ul",
    	'echo' => true
    );

    $args = wp_parse_args( $args, $defaults );
    $args = (object) $args;
 
    $menu = wp_nav_menu(
        array(
            'theme_location' => $args->theme_location,
            'container' => '',
            'echo' => false
        )
    );

    $menu = simplexml_load_string($menu);
    $submenu = $menu->xpath($args->xpath);

    if (empty($submenu)) {
        return;
    }

    // Set value of class attribute
    $submenu[0]['class'] = $args->submenu_class;

    // Add "id" attribute
    if ($args->submenu_id) {
        $submenu[0]->addAttribute('id', $args->submenu_id);
    }

    if ($args->container) {
        $submenu_sxe = simplexml_load_string($submenu[0]->saveXML());
        $sdm = dom_import_simplexml($submenu_sxe);

        if ($sdm) {
            $xmlDoc = new DOMDocument('1.0', 'utf-8');
            $container = $xmlDoc->createElement($args->container);

            // Add "class" attribute for container
            if ($args->container_class) {
                $container->setAttribute('class', $args->container_class);
            }

            // Add "id" attribute for container
            if ($args->container_id) {
                $container->setAttribute('id', $args->container_id);
            }
    
            $smsx = $xmlDoc->importNode($sdm, true);
            $container->appendChild($smsx);
            $xmlDoc->appendChild($container);
        }
    }

    if (isset($xmlDoc)) {
        $output = $xmlDoc->saveXML();
    } else {
        $output = $submenu[0]->saveXML();
    }

    if (!$args->echo) {
        return $output;
    }

    echo $output;
  }
}

if ( ! function_exists( 'photoline_header_bg' ) ) :
/**
 * Header Background
 */
function photoline_header_bg() {
	echo 'style="background:';
	echo esc_attr( get_theme_mod( 'photoline_headerbg_color', '#FFF' ) );

	if ( get_header_image() ) {
		echo ' url(';
		echo esc_url( get_header_image() );
		echo ') no-repeat 50%; background-size: cover';
	}
	echo ';"';
}
endif;

if ( ! function_exists( 'photoline_top_menu' ) ) :
/**
 * Top Menu
 */
function photoline_top_menu() {
	if ( has_nav_menu( 'top' ) ) {
		echo '<div class="top-menu">';
			wp_nav_menu(
					array(
					'theme_location'  => 'top',
					'menu_id'         => 'menu-top',
					'depth'           => 1,
					'link_before'     => '<span>',
					'link_after'      => '</span>',
					'fallback_cb'     => '',
					)
			);
		echo '</div>';
	}
}
endif;

if ( ! function_exists( 'photoline_social_links' ) ) :
/**
 * Social Links Menu
 */
function photoline_social_links() {
	if ( has_nav_menu( 'social' ) ) {
		wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'container_class' => 'icon-header', 
			'menu_id'         => 'menu-social',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
		);
	}
}
endif;

/**
 * Footer credits.
 */
function photoline_txt_credits() {
	$text = sprintf( __( 'Powered by %s', 'photoline-lite' ), '<a href="http://wordpress.org/">WordPress</a>' );
	$text .= '<span class="sep"> &middot; </span>';
	$text .= sprintf( __( 'Theme by %s', 'photoline-lite' ), '<a href="http://www.dinevthemes.com/">DinevThemes</a>' );
	echo apply_filters( 'photoline_txt_credits', $text );
}

if ( ! function_exists( 'photoline_post_header' ) ) :
/**
 * Post Header Background Image
 */
function photoline_post_header() {
	global $post;
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'photoline-medium' );

	if ( $thumbnail ) {
		echo 'style="padding: 150px 8px; background: url(';
		echo $thumbnail[0];
		echo ') no-repeat; background-position: 50%; background-size: cover;"';
	}
}
endif;