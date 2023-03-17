<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Padma
 */
$padma_style_settings      = get_theme_mod('padma_style_settings','false'); 
if( $padma_style_settings == 'true'){
    $padma_style_settings ='2';
}else{
    $padma_style_settings ='1';
}
$padma_single_siderbar_settings  = get_theme_mod('padma_single_siderbar_settings','right-sidebar');
$padma_breadcrumb = get_theme_mod('padma_breadcrumb','true');
get_header();
?>
<?php if( $padma_breadcrumb == 'true'): ?>
<section class="breadcrumbs-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><?php  the_title(); ?></h2>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="single-area <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>" id="content">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'sidebar-1' ) &&  $padma_single_siderbar_settings == 'left-sidebar') : ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
			<div class="<?php if( ! is_active_sidebar( 'sidebar-1' ) || $padma_single_siderbar_settings =='full-width'): ?>col-md-12<?php else: ?>col-md-8<?php endif; ?>">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-'.esc_html( $padma_style_settings ).'', get_post_type() );
						the_post_navigation(); 
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) &&  $padma_single_siderbar_settings == 'right-sidebar') : ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();
