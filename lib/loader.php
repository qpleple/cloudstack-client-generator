<?php
/*
 * This file is part of the CloudStack Client Generator.
 *
 * (c) Quentin Pleplé <quentin.pleple@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
// Templating library
// see http://www.twig-project.org/
require_once dirname(__FILE__) . "/Twig/Autoloader.php";
Twig_Autoloader::register();

// Twig Extentions
// see https://github.com/fabpot/Twig-extensions
require_once  dirname(__FILE__) . "/Twig-extensions/Twig/Extensions/Autoloader.php";
Twig_Extensions_Autoloader::register();

// YAML format parser libray
// see http://components.symfony-project.org/yaml/
require_once dirname(__FILE__) . "/Yaml/sfYamlParser.php";

// HTML parsing lirary
// see http://simplehtmldom.sourceforge.net/
require_once dirname(__FILE__) . "/simple_html_dom.php";


/**
* Initiate external libraries and proxies some methods
* for better readability
*/
class Lib {
    private $yaml;
    private $twig;
    
    function __construct() {
        // Initialize templating engine
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem(dirname(__FILE__) . "/../templates");
        $this->twig = new Twig_Environment($loader);
        $this->twig->addExtension(new Twig_Extensions_Extension_Text());

        // Loading config file (Yaml format)
        $this->yaml = new sfYamlParser();
    }
    
    public function loadYaml($filename) {
        try {
            $configFileContent = file_get_contents(dirname(__FILE__) . "/../" . $filename);
            return $this->yaml->parse($configFileContent);
        } catch (InvalidArgumentException $e) {
          // an error occurred during parsing
          echo "Unable to parse the configuration file : " . $e->getMessage();
        }
        return null;
    }
    
    public function fetchHtml($url) {
        return file_get_html($url);
    }
    
    public function render($template, $args = array()) {
        $this->twig->loadTemplate($template)->display($args);
    }
    
}