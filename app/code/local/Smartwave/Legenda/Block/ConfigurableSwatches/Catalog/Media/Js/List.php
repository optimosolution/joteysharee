<?php
class Smartwave_Legenda_Block_ConfigurableSwatches_Catalog_Media_Js_List extends Mage_ConfigurableSwatches_Block_Catalog_Media_Js_List {
    public function getProductImageFallbacks($keepFrame = null) {
        /* @var $helper Mage_ConfigurableSwatches_Helper_Mediafallback */
        $helper = Mage::helper('legenda/mediafallback');

        $fallbacks = array();

        $products = $this->getProducts();
		$keepFrame = Mage::getStoreConfig('zoom/image/aspect_ratio');
        /* @var $product Mage_Catalog_Model_Product */
        foreach ($products as $product) {
            $imageFallback = $helper->getConfigurableImagesFallbackArray($product, $this->_getImageSizes(), $keepFrame, 350);
            $fallbacks[$product->getId()] = array(
                'product' => $product,
                'image_fallback' => $this->_getJsImageFallbackString($imageFallback)
            );
        }

        return $fallbacks;
    }
}
?>