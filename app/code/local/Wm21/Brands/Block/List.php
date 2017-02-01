<?php
class Wm21_Brands_Block_List extends Mage_Core_Block_Template
{
    public function getManufacturers()
    {
        $attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'manufacturer');

        $manufacturers = array();

        foreach ($attribute->getSource()->getAllOptions(false) as $option) {
            $productCollection = Mage::getResourceModel('catalog/product_collection')
                #->addFieldToFilter('visibility', Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH) # required for store based access
                ->addStoreFilter()
                ->addAttributeToFilter('manufacturer', $option['value']);

            if ($productCollection->getSize() > 0) {
                $manufacturers[$option['value']] = $option['label'];
            }
        }

        return $manufacturers;
    }

    public function getChar($name)
    {
        return strtoupper(substr($name, 0, 1));
    }

    public function getShortName($name)
    {
        return Mage::helper('wm21_brands')->getShortName($name);
    }
}
