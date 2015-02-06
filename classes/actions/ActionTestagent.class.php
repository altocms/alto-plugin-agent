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

class PluginAgent_ActionTestagent extends ActionPlugin {

    public function RegisterEvent() {

        $this->AddEvent('index', 'EventIndex');
    }

    public function Init() {

        $this->SetDefaultEvent('index');
    }

    public function EventIndex() {

        $oAgent = E::Agent_GetAgent();
        E::Viewer_Assign('oAgent', $oAgent);
        $this->SetTemplateAction('index');
    }
}

// EOF