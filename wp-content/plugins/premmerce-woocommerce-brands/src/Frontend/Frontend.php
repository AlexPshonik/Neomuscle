<?php namespace Premmerce\Brands\Frontend;

use Premmerce\SDK\V1\FileManager\FileManager;


/**
 * Class Frontend
 * @package Premmerce\Brands\Frontend
 */
class Frontend{

	/**
	 * @var FileManager
	 */
	private $fileManager;

	/**
	 * Frontend constructor.
	 *
	 * @param FileManager $fileManager
	 */
	public function __construct(FileManager $fileManager){
		$this->registerHooks();

		$this->fileManager = $fileManager;
	}

	/**
	 * Register frontend hooks
	 */
	private function registerHooks(){
		// add_action('woocommerce_product_meta_end', [$this, 'addProductBrand']);
		add_filter('woocommerce_get_breadcrumb', [$this, 'changeBreadcrumb']);
		add_shortcode('brands_page', [$this, 'brandsPage']);
		add_action('wp_enqueue_scripts', function(){
			wp_enqueue_style('premmerce-brands', $this->fileManager->locateAsset('frontend/css/premmerce-brands.css'));
		}, 30);
	}

	/**
	 * Change breadcrumbs in brands page
	 *
	 * @param array $breadcrumbs
	 *
	 * @return array
	 */
	public function changeBreadcrumb($breadcrumbs){
		if(is_tax('product_brand')){
			$breadcrumbs[1][1] = get_site_url() . '/brands/';
		}

		return $breadcrumbs;
	}

	/**
	 * Add brand to product page
	 */
	public function addProductBrand(){
		$brands = get_the_terms(get_the_ID(), 'product_brand');

		if(!empty($brands) && !is_wp_error($brands)){
			$this->fileManager->includeTemplate('frontend/brands-meta.php', ['brand' => $brands[0]]);
		}
	}

	/**
	 * Include brands page template
	 */
	public function brandsPage(){
		$args = [
			'taxonomy'   => 'product_brand',
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => false,
		];

		$brands = get_terms( $args );

		if( !is_wp_error($brands) ){
			$this->fileManager->includeTemplate('frontend/brands-page.php', ['brands' => $brands]);
		}
	}
}
