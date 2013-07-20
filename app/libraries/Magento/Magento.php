<?php
/**
 * User: rrogers
 * Date: 7/19/13
 * Time: 11:38 PM
 */

namespace Magento;
use Magento\TFSN\CommandLine;
use Magento\TFSN\Get;
use Magento\TFSN\Projects;

class Magento
{
    public static $title;
    public static $projectsList;

    static function initMage()
    {
        $get = new Get();
        $params = $get->getParams();

        $commandLine = new CommandLine();
        $projects = new Projects();


        self::$projectsList = $title = $errors = '';
        self::$projectsList .= $projects->renderProjects();

        $siteDirectory = '';
        if(array_key_exists('a', $params) && $params['a'] == 'debug' && array_key_exists('site', $params)){
            $site = $params['site'];
            $siteDirectory = $projects->getDirectoryFromSiteName($site);

            $mageFile = $siteDirectory . 'app/Mage.php';
            if(file_exists($mageFile)){
                require_once $mageFile;
                Varien_Profiler::enable();
                Mage::setIsDeveloperMode(true);
                umask(0);
                Mage::app((array_key_exists('isAdmin', $params) && $params['isAdmin']) ? 'admin' : '');
                self::$title = '<img src="' . Mage::getDesign()->getSkinUrl() . Mage::getStoreConfig('design/header/logo_src') .  '" /><br />' .
                    (array_key_exists('site', $params) ? $params['site'] . ' (<a target="_blank" href="' . Mage::app()->getStore()->getBaseUrl() . '">' . Mage::app()->getStore()->getBaseUrl() . '</a>)': '');

            }


        }
    }
}