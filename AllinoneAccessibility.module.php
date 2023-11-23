<?php

/**
 * MarkupCookieConsent
 *
 * This module is intended to add a little cookie notice to your front-end.
 * It's doing this by hooking into page render and altering the output
 * to include the form at the end of the page (right before </body>).
 * 
 * more infos in readme.md
 * 
 */
class AllinoneAccessibility extends WireData implements Module {

    /**
     * getModuleInfo is a module required by all modules to tell ProcessWire about them
     *
     * @return array
     */
    public static function getModuleInfo() {
        return array(
            'title'    => 'All in one Accessibility',
            'summary'  => __('All in One Accessibility widget improves Processwire website ADA compliance and browser experience for ADA, 
WCAG 2.1, Section 508, Australian DDA, European EAA EN 301 549, UK Equality Act (EA), Israeli Standard 5568, 
California Unruh, Ontario AODA, Canada ACA, German BITV, and France RGAA Standards.'),
            'author'   => 'Can Rau',
            'href'     => 'https://processwire.com/talk/topic/12253-markupcookieconsent/',
            'version'  => 35,
            'autoload' => true,
            'singular' => true,
            'requires' => 'ProcessWire>=2.8.15'
        );
    }


    public function init() {
        $input      = $this->wire('input');
        $config     = $this->wire('config');
        $session    = $this->wire('session');
        $requestUri = $this->wire('sanitizer')->pagePathName($_SERVER['REQUEST_URI']);

        // if already accepted and not module edit screen return, to stop module

        if ($input->cookie($this->cookieName) && strpos($requestUri, "$this") === false) return;

        // set cookie if accept cookie button pressed

        if ($input->post->action === 'acceptCookies') {
            setcookie($this->cookieName, 1, time() + $this->cookieExpire, '/', $this->cookieDomain, $this->cookieSSL, $this->cookieHttp);

            // start a ProcessWire session and set the wire/s cookie
            if ($config->sessionAllow && !$session->hasCookie()) $session->init();

            // if it's ajax request we just exit here
            if ($config->ajax) exit;

            // reload page to prevent duplicate form submissions
            $session->redirect('./');
        }

        if ($input->get->cookie === 'remove') {
            setcookie($this->cookieName, 1, time() -3600, '/', $this->cookieDomain, $this->cookieSSL, $this->cookieHttp);
            $session->redirect("edit?name=$this");
        }

        // no cookie present and no submission, let's invoke the hook to render everything
        $this->addHookAfter('Page::render', $this, 'renderCookieForm');
    }


    public function renderCookieForm($event) {


        $page  = $event->object;
        $pages = $this->wire('pages');
        $debug = $this->wire('config')->debug;

        // we stop here when on admin pages except this modules config page (for demonstration) or out of pageSelector
        if(($page->template != 'admin' && $this->pageSelector &&  $pages->find($this->pageSelector)->has($page) == false)
         || ($page->template == 'admin' && $this->wire('input')->get->name != $this))
            return;

        $classPrefix    = empty($this->classPrefix) ? 'mCCF' : $this->classPrefix;
        $position       = empty($this->position) ? 'bottom' : $this->position;
        $colorTheme     = empty($this->colorTheme) ? 'dark' : $this->colorTheme;
        $classContainer = "$classPrefix {$classPrefix}--{$position} {$classPrefix}--{$colorTheme}";
        $classButton    = "{$classPrefix}__accept";
        $classPrivacy   = "{$classPrefix}__link";

        if($this->wire('languages')) {
            $userLanguage = $this->wire('user')->language;
            $lang         = $userLanguage->isDefault() ? '' : "__$userLanguage->id";
        }
        else {
            $lang = '';
        }

        $target = $this->privacyTarget === 'custom' ? $this->privacyTargetCustom : $this->privacyTarget;

        $folder = $this->wire('config')->urls->$this;

        $min = $debug? '':'.min';

        if ($this->moduleStyles) $event->return = $this->str_replace_once("<link ", "<link rel='stylesheet' type='text/css' href='{$folder}{$this}{$min}.css' /><link ", $event->return);

        $folder_file_name = $this->wire('config')->urls->$this;
        $include_js_file = $folder_file_name.'AllinoneAccessibility.js';

        if ($this->moduleStyles) $event->return = $this->str_replace_once("<script ", "<script type='text/javascript' src='$include_js_file' /><script ", $event->return);

        $license_key = $this['license_key'];
        $colorcode= $this['colorcode'];
        $position = $this['position'];
        $select_icon_type = $this['aioa_icon_type'];
        $select_icon_size = $this['aioa_icon_size'];
        $explode =  (explode("-mb",$select_icon_size));

        if($page->template == 'admin') return;

        $jsFile = "<script id='aioa-adawidget' src='https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=".$colorcode."&token=". $license_key."&position=".$position.".".$select_icon_type.".".$explode[0]."'></script>\n";


        $event->return = str_replace("</body>", "{$jsFile}</body>", $event->return);
    }


    /**
     * helper function
     */
    function str_replace_once($str_pattern, $str_replacement, $string) {

        if (strpos($string, $str_pattern) !== false){
            $occurrence = strpos($string, $str_pattern);
            return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
        }
        return $string;
    }


//    public function cookieExists() {
//        if ($this->wire('input')->cookie($this->cookieName)) {
//            return __('Cookie is set');
//        } else {
//            return __('No cookie set');
//        }
//    }

}
