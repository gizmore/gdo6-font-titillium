<?php
namespace GDO\FontTitillium;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_FontWeight;
use GDO\DB\GDT_Checkbox;

/**
 * Includes Titillium Font CSS on init.
 * Do not forget to run yarn.sh before installation.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 * @license OFL
 */
final class Module_FontTitillium extends GDO_Module
{
    ##############
    ### Module ###
    ##############
    public $module_priority = 90;
    
    public $module_license = "OFL";
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/titillium'); }
    
    ##############
    ### Config ###
    ##############
    public function getConfig()
    {
        return array(
            GDT_FontWeight::make('font_weight')->enumValues('200', '300', '400', '600', '700', '900')->initial('400'),
            GDT_Checkbox::make('font_include')->initial('1'),
        );
    }
    public function cfgFontWeight() { return $this->getConfigVar('font_weight'); }
    public function cfgIncludeFont() { return $this->getConfigVar('font_include'); }
    
    ###########
    ### CSS ###
    ###########
    public function onIncludeScripts()
    {
        $weight = $this->cfgFontWeight();
        $this->addBowerCSS("fontsource-titillium-web/{$weight}.css"); # Font face
        if ($this->cfgIncludeFont())
        {
            $this->addCSS('css/gdo6-titillium.css'); # Body style
        }
    }
    
}
