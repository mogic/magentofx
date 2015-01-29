<?php

class Fx_Custom_Block_Thumbnails extends Mage_Core_Block_Template
{
	public function test(){
		echo '<h1>hello world</h1>';

		$helper = Mage::helper('catalog/category');

		echo '<pre>';
		print_r($helper);
		echo '</pre>';
	}

    /**
     * Get categories of current store
     *
     * @return Varien_Data_Tree_Node_Collection
     */
    public function getStoreCategories()
    {
        $helper = Mage::helper('catalog/category');
        return $helper->getStoreCategories();
    }
}
