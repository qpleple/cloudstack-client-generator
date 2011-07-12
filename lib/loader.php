<?php
// Templating library
// see http://www.twig-project.org/
require_once dirname(__FILE__) . "/Twig/Autoloader.php";

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
    
    public function render($template, $args) {
        $this->twig->loadTemplate($template)->display($args);
    }
    
}

return new Lib();