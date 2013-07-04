<?php
/**
 * User: rrogers
 * Date: 7/4/13
 * Time: 4:01 PM
 */

require_once 'TFSN/Projects.php';

class Zend_View_Helper_Magento extends Zend_View_Helper_Abstract
{
    protected $_projects;
    protected $_title;

    public function __construct()
    {
        $title = '<a class="" href="./index.php"><i class="icon icon-remove-sign"></i></a>';
        $params = Zend_Controller_Front::getInstance()->getRequest()->getParams();
        $projects = $this->getProjects();
        $siteDirectory = '';

        if (array_key_exists('a', $params) && $params['a'] == 'debug' && array_key_exists('site', $params)) {
            $site = $params['site'];
            $siteDirectory = $projects->getDirectoryFromSiteName($site);

            $mageFile = $siteDirectory . 'app/Mage.php';
            if (file_exists($mageFile)) {
                require_once $mageFile;
                error_reporting(E_ALL & ~E_STRICT);
                Varien_Profiler::enable();
                Mage::setIsDeveloperMode(true);
                umask(0);
                Mage::app((array_key_exists('isAdmin', $params) && $params['isAdmin']) ? 'admin' : '');
                $title = '<img src="' . Mage::getDesign()->getSkinUrl() . Mage::getStoreConfig('design/header/logo_src') . '" /><br />';
                $title .= (array_key_exists('site', $params) ? $params['site'] . ' (<a target="_blank" href="' . Mage::app()->getStore()->getBaseUrl() . '">' . Mage::app()->getStore()->getBaseUrl() . '</a>)' : '');
            }
        }
        $this->_title = $title;
    }

    public function getProjects()
    {
        if (!isset($this->_projects)) {
            $this->_projects = new Projects();
        }
        return $this->_projects;
    }

    public function getProjectList()
    {
        return $this->getProjects()->renderProjects();
    }

    public function getTitle()
    {
        return $this->_title;
    }
}