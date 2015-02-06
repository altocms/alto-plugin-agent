<!DOCTYPE html>
<html lang="en" class="">
<head>
    <style>
        table {
            border: 1px solid #ccc;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 2px 6px;
            vertical-align: top;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Plugin Agent</h1>
{$oAgent->signature}
<br/><br/>
<table>
    <tr>
        <td>Browser</td>
        <td>{$oAgent->browser->name} {$oAgent->browser->version}</td>
    </tr>
    <tr>
        <td>browser->isIE()</td>
        <td>{if $oAgent->browser->isIE()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>browser->isOpera()</td>
        <td>{if $oAgent->browser->isOpera()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>browser->isFF()</td>
        <td>{if $oAgent->browser->isFF()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>browser->isChrome()</td>
        <td>{if $oAgent->browser->isChrome()}Yes{else}No{/if}</td>
    </tr>
</table>
<br/>
<table>
    <tr>
        <td>isPhone()</td>
        <td>{if $oAgent->isPhone()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>isTablet()</td>
        <td>{if $oAgent->isTablet()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>isMobile()</td>
        <td>{if $oAgent->isMobile()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>isComputer()</td>
        <td>{if $oAgent->isComputer()}Yes{else}No{/if}</td>
    </tr>
</table>

<br/>
<table>
    <tr>
        <td>isIOS()</td>
        <td>{if $oAgent->isIOS()}Yes{else}No{/if}</td>
    </tr>
    <tr>
        <td>isAndroidOs()</td>
        <td>{if $oAgent->isAndroidOs()}Yes{else}No{/if}</td>
    </tr>
</table>

<br/>
<table>
    <tr>
        <td>version('iPad')</td>
        <td>{$oAgent->version('iPad')}</td>
    </tr>
    <tr>
        <td>version('iPhone')</td>
        <td>{$oAgent->version('iPhone')}</td>
    </tr>
    <tr>
        <td>version('Android')</td>
        <td>{$oAgent->version('Android')}</td>
    </tr>
</table>
</body>
</html>