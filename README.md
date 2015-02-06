Alto CMS Plugin For detecting mobile devices and browsers 
=========================================================

It uses the Mobile_Detect is a lightweight PHP class from http://mobiledetect.net/

Sources of Mobile_Detect is on https://github.com/serbanghita/Mobile-Detect

You need unpack plugin into folder /common/plugins/agent/

Test page is yoursite.com/testagent

#Usage

````
 $oAgent = E::Agent_GetAgent();
 if ($oAgent->isMobile()) {
    Router::Locate('http://m.site.com');
 }
 if ($oAgent->browser->isIE() && $oAgent->browser->version() < 9) {
    echo 'Your browser is very old!';
 }
````
