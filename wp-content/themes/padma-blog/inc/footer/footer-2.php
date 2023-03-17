<?php
/**
 * Footer action
 * @package Padma
 */

function padma_blog_footer_style_1(){ ?>
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright text-center">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'padma-blog' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'padma-blog' ), 'WordPress' );
						?>
					</a>
					<p> &copy;
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( ' %1$s by %2$s.', 'padma-blog' ), '<a href="'. esc_url ('https://ashathemes.com/index.php/product/padma-blog-personal-blog-wordpress-theme/').'">Padma Blog</a>', 'ashathemes' );
						?>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php }
add_action('padma_blog_footer_style','padma_blog_footer_style_1');