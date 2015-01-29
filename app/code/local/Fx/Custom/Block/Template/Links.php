<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Links
 *
 * @author Siraj
 */
class Fx_Custom_Block_Template_Links extends Mage_Page_Block_Template_Links
{
	protected function _construct()
    {
       $this->setTemplate('custom/template/links.phtml');
    }
}
