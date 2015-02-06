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

class PluginAgent_ModuleAgent extends Module {

    /** @var  PluginAgent_ModuleAgent_EntityAgent */
    protected $oAgent;

    public function Init() {

        $this->oAgent = E::GetEntity('Agent');
    }

    public function getAgent() {

        return $this->oAgent;
    }

    public function getBrowser() {

        return $this->getAgent()->getBrowserInfo();
    }
}

// EOF