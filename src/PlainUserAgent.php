<?php


namespace Yuriy\PlainUserAgent;

use Yuriy\UserAgent\UserAgent;

class PlainUserAgent implements UserAgent
{
    protected $data;

    public function browser()
    {
        $popularBrowsers = ["Opera", "OPR/", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $userBrowser = 'Other less popular browsers';
        foreach ($popularBrowsers as $browser) {
            if (strpos($userAgent, $browser) !== false) {
                $userBrowser = $browser;
                break;
            }
        }

        switch ($userBrowser) {
            case 'OPR/':
                $userBrowser = 'Opera';
                break;
            case 'Trident':
            case 'MSIE':
                $userBrowser = 'Internet Explorer';
                break;

            case 'Edg':
                $userBrowser = 'Microsoft Edge';
                break;
        }


        return $userBrowser;
    }

    public function system()
    {
        return PHP_OS;
    }

}
