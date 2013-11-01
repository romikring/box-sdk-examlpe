<?php
/**
 * Bootstrap class
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initBox()
    {
        $box = new Box\Box($this->_options['site']['box']);
        Zend_Registry::set('Box', $box);

        return $box;
    }
}
