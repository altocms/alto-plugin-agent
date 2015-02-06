<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Plugin Name: Agent
 * @Plugin Id: agent
 * @Plugin URI:
 * @Description: AntiBot Plugin for Alto CMS
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

class PluginAgent extends Plugin {

    public $aDelegates = array(
    );

    // Объявление переопределений (модули, мапперы и сущности)
    protected $aInherits = array(
        'action' => array(
            'ActionAgent',
        ),
        'module' => array(
            'ModuleAgent',
        ),
        'entity' => array(
            'ModuleAgent_EntityAgent',
        ),
    );

    // Активация плагина
    public function Activate() {

        return true;
    }

    // Деактивация плагина
    public function Deactivate() {

        return true;
    }


    // Инициализация плагина
    public function Init() {

        return true;
    }

}

// EOF
