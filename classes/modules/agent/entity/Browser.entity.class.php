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

class PluginAgent_ModuleAgent_EntityBrowser extends Entity {

    protected $aBrowsecap;

    public function Init() {

        if (!$this->aBrowsecap) {
            if (ini_get('browscap')) {
                $this->aBrowsecap = new DataArray(get_browser(null, true));
            } else {
                $this->aBrowsecap = new DataArray();
            }
            if (!$this->aBrowsecap['browser'] || $this->aBrowsecap['browser'] == 'Default Browser') {
                $aInfo = $this->_getBrowserInfo();
                $this->aBrowsecap['browser'] = $aInfo['name'];
                $this->aBrowsecap['version'] = $aInfo['version'];
                $aVersion = explode('.', $aInfo['version']);
                if (isset($aVersion[0])) {
                    $this->aBrowsecap['majorver'] = $aVersion[0];
                }
                if (isset($aVersion[1])) {
                    $this->aBrowsecap['minorver'] = $aVersion[1];
                }
            }
        }
    }

    protected function _getBrowserInfo($sAgent = null) {

        if (!$sAgent && !empty($_SERVER['HTTP_USER_AGENT'])) {
            $sAgent = $_SERVER['HTTP_USER_AGENT'];
        }
        $aBrowserInfo = array();
        // регулярное выражение, которое позволяет отпределить 90% браузеров
        if ($sAgent && preg_match('/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/', $sAgent, $aMatches)) {
            $aBrowserInfo['name'] = $sBrowser = $aMatches[1];
            $aBrowserInfo['version'] = $sVersion = $aMatches[2];

            // если браузер определён как IE
            if ($sBrowser == 'MSIE' && preg_match('/(Maxthon|Avant Browser|MyIE2)/i', $sAgent, $aMatches)) {
                // браузер ли это на основе IE
                $aBrowserInfo['realname'] = $aMatches[1];
            }
            // если браузер определён как Firefox
            if ($sBrowser == 'Firefox' && preg_match('/(Flock|Navigator|Epiphany)\/([0-9.]+)/', $sAgent, $aMatches)) {
                // браузер на основе Firefox
                $aBrowserInfo['realname'] = $aMatches[1];
                $aBrowserInfo['version'] = $aMatches[2];
            }

            if (stripos($sBrowser, 'Opera') !== false) {
                $aBrowserInfo['name'] = 'Opera';
                if (preg_match('/Opera ([0-9.]+)/i', $sAgent, $aMatches)) {
                    // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
                    $aBrowserInfo['version'] = $aMatches[2];
                } elseif ($sVersion == '9.80') {
                    // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
                    $aBrowserInfo['version'] = substr($sAgent, -5);
                }
            }

            // определяем Сафари
            if ($sBrowser == 'Version') {
                $aBrowserInfo['name'] = 'Safari';
            }

            if (!$sBrowser && strpos($sAgent, 'Gecko')) {
                return 'Browser based on Gecko';
            } // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        } else {
            $aBrowserInfo['name'] = 'Unknown';
            $aBrowserInfo['version'] = '0.0';
        }

        return $aBrowserInfo;
    }

    public function name() {

        return $this->aBrowsecap['name'];
    }

    public function version() {

        return $this->aBrowsecap['version'];
    }

    public function __get($sProperty) {

        if ($sProperty == 'name') {
            return $this->aBrowsecap['browser'];
        }
        if ($sProperty == 'version') {
            return $this->aBrowsecap['version'];
        }
    }

    public function __call($sName, $aArgs = array()) {

        if (stripos($sName, 'is') === 0) {
            $sName = strtolower(substr($sName, 2));
            if ($sName == 'ff') {
                $sName = 'firefox';
            }
            return stripos($this->aBrowsecap['browser'], $sName) !== false;
        }
    }
}

// EOF
