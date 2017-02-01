<?php
class Wm21_Brands_Helper_Data extends Mage_Core_Helper_Data
{
    public function getShortName($name)
    {
        return Mage::getModel('catalog/category')->formatUrlKey($name);
    }
}
