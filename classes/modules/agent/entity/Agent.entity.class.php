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

class PluginAgent_ModuleAgent_EntityAgent extends Entity {

    /** @var  Mobile_Detect */
    protected $oDetector;

    /** @var  PluginAgent_ModuleAgent_EntityBrowser */
    protected $oBrowser;

    public function Init() {

        parent::Init();
        if (!$this->oDetector) {
            $this->oDetector = new Mobile_Detect();
            $this->oBrowser = E::GetEntity('PluginAgent_ModuleAgent_EntityBrowser');
        }
    }

    /**
     * @return Mobile_Detect
     */
    public function getMobileDetector() {

        return $this->oDetector;
    }

    /**
     * @return PluginAgent_ModuleAgent_EntityBrowser
     */
    public function getBrowserInfo() {

        return $this->$oBrowser;
    }

    /**
     * @param null $sUserAgent
     * @param null $sHttpHeaders
     *
     * @return bool
     */
    public function isPhone($sUserAgent = null, $sHttpHeaders = null) {

        return $this->oDetector->isMobile($sUserAgent, $sHttpHeaders);
    }

    /**
     * @param null $sUserAgent
     * @param null $sHttpHeaders
     *
     * @return bool
     */
    public function isMobile($sUserAgent = null, $sHttpHeaders = null) {

        return $this->oDetector->isMobile($sUserAgent, $sHttpHeaders) || $this->oDetector->isTablet($sUserAgent, $sHttpHeaders);
    }

    /**
     * @param null $sUserAgent
     * @param null $sHttpHeaders
     *
     * @return bool
     */
    public function isComputer($sUserAgent = null, $sHttpHeaders = null) {

        return !$this->isMobile($sUserAgent, $sHttpHeaders);
    }

    /**
     * @param string $sMethod
     * @param array  $aArgs
     *
     * @return mixed
     */
    public function __call($sMethod, $aArgs = array()) {

        return call_user_func_array(array($this->oDetector, $sMethod), $aArgs);
    }

    public function __get($sProperty) {

        if ($sProperty == 'browser') {
            return $this->oBrowser;
        } elseif ($sProperty == 'signature') {
            return $this->oDetector->getUserAgent();
        }
    }
}

// EOF