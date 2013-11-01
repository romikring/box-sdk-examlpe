<?php
/**
 * Description of Action
 *
 * @author Roman Habrusionok <romikring@gmail.com>
 */
class Rabox_Controller_Action extends Zend_Controller_Action
{
    /**
     * Box object instance, library entry point
     *
     * @var Box\Box
     */
    protected $box;

    /**
     * Set box property
     */
    public function init()
    {
        $this->box = Zend_Registry::get('Box');
    }
}
