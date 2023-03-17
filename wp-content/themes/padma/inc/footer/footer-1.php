<?php
/**
 * Footer action
 * @package Padma
 */

function padma_footer_style_1(){ ?>
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright text-center">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'padma' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'padma' ), 'WordPress' );
						?>
					</a>
					<p> &copy;
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( ' %1$s by %2$s.', 'padma' ), '<a href="'. esc_url ('https://ashathemes.com/index.php/product/padma-personal-blog-wordpress-theme/').'">Padma</a>', 'ashathemes' );
						?>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php }
add_action('padma_footer_style','padma_footer_style_1');