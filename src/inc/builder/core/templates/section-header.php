<?php
/**
 * @package Make
 */

global $ttfmake_section_data, $ttfmake_is_js_template;
$links = apply_filters( 'make_builder_section_links', apply_filters( 'ttfmake_builder_section_footer_links', array(
	100 => array(
		'href'  => '#',
		'class' => 'ttfmake-section-remove',
		'label' => __( 'Remove this section', 'make' )
	)
) ) );
ksort( $links );
?>

<?php if ( ! isset( $ttfmake_is_js_template ) || true !== $ttfmake_is_js_template ) : ?>
<div class="ttfmake-section <?php if ( isset( $ttfmake_section_data['data']['state'] ) && 'open' === $ttfmake_section_data['data']['state'] ) echo 'ttfmake-section-open'; ?> ttfmake-section-<?php echo esc_attr( $ttfmake_section_data['section']['id'] ); ?>" id="<?php echo 'ttfmake-section-' . esc_attr( $ttfmake_section_data['data']['id'] ); ?>" data-id="<?php echo esc_attr( $ttfmake_section_data['data']['id'] ); ?>" data-section-type="<?php echo esc_attr( $ttfmake_section_data['section']['id'] ); ?>">
<?php endif; ?>
	<div class="ttfmake-section-header">
		<?php $header_title = ( isset( $ttfmake_section_data['data']['label'] ) ) ? $ttfmake_section_data['data']['label'] : ''; ?>
		<h3>
			<span class="ttfmake-section-header-title"><?php echo esc_html( $header_title ); ?></span><em><?php echo ( esc_html( $ttfmake_section_data['section']['label'] ) ); ?></em>
		</h3>
		<?php foreach ( $links as $link ) : ?>
			<?php
			$href  = ( isset( $link['href'] ) ) ? ' href="' . esc_url( $link['href'] ) . '"' : '';
			$id    = ( isset( $link['id'] ) ) ? ' id="' . esc_attr( $link['id'] ) . '"' : '';
			$label = ( isset( $link['label'] ) ) ? esc_html( $link['label'] ) : '';

			// Set up the class value with a base class
			$class_base = ' class="ttfmake-builder-section-link';
			$class      = ( isset( $link['class'] ) ) ? $class_base . ' ' . esc_attr( $link['class'] ) . '"' : '"';
			?>
			<a<?php echo $href . $id . $class; ?>>
				<span>
					<?php echo $label; ?>
				</span>
			</a>
		<?php endforeach; ?>
		<a href="#" class="ttfmake-section-toggle" title="<?php esc_attr_e( 'Click to toggle', 'make' ); ?>">
			<div class="handlediv"></div>
		</a>
	</div>
	<div class="clear"></div>
	<div class="ttfmake-section-body">
		<input type="hidden" value="<?php echo $ttfmake_section_data['section']['id']; ?>" name="<?php echo ttfmake_get_section_name( $ttfmake_section_data, $ttfmake_is_js_template ); ?>[section-type]" />
