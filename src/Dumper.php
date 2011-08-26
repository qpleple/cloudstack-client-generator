<?php

class Dumper
{
    protected $lib;
    protected $config;
    
    function __construct($lib, $config)
    {
        $this->lib = $lib;
        $this->config = $config;
    }
    
    public function dumpMethodData($method)
    {
        $methodData = $this->fetchMethodData("user/${method}.html");
        print_r($methodData);
    }
    
    public function dumpMethod($method)
    {
        $methodData = $this->fetchMethodData("user/${method}.html");
        $this->lib->render("method.php.twig", array(
            "method" => $methodData,
            "config" => $this->config,
        ));
    }
    
    public function dumpLinks()
    {
        $links = Parser::getAllLinks($this->fetchTOC());
        foreach ($links as $link) {
            echo $link['url'] . " - " . $link['name'] ."\n";
        }
    }
    
    public function dumpClass()
    {
        $links = Parser::getAllLinks($this->fetchTOC());
        $methodsData = array();

        // walk through all links
        foreach ($links as $link) {
            $methodsData[] = $this->fetchMethodData($link['url']);
        }

        $this->lib->render("class.php.twig", array(
            "methods" => $methodsData,
            "config" => $this->config,
        ));
    }
    
    public function checkCamelCase()
    {
        // Disable camel case auto lookup
        $this->config['use_camel_case'] = false;

        $links = Parser::getAllLinks($this->fetchTOC());
        $missingNames = array();

        // walk through all links
        foreach ($links as $link) {
            echo "Fetching " . $link['url'] . " ...\n";
            $methodData = $this->fetchMethodData($link['url']);
            
            foreach ($methodData['params'] as $param) {
                if (!array_key_exists($param['name'], $this->config['camel_case'])) {
                    $missingNames[] = $param['name'];
                }
            }
        }

        if (empty($missingNames)) {
            echo "No missing camel case values :)\n";
        } else {
            echo "Add the following values to the config file under \"camel_case\"\n :";
            print_r($missingNames);
        }
    }
    
    private function fetchMethodData($path) {
        $url = $this->getRootUrl() . $path;
        $html = $this->lib->fetchHtml($url);
        return Parser::getMethodData($html, $this->config['use_camel_case'], $this->config['camel_case']);
    }
    
    private function fetchTOC() {
        // Download the API reference table of content 
        $url = $this->config['api_ref_toc_url'];
        return $this->lib->fetchHtml($url);
    }
    
    /**
     * Match the root of the table of content
     * for http://download.cloud.com/releases/2.2.0/api_2.2.4/TOC_User.html
     * the root is http://download.cloud.com/releases/2.2.0/api_2.2.4/
     */
    private function getRootUrl() {
        preg_match("/^(.*\/)[^\/]+$/", $this->config['api_ref_toc_url'], $matches);
        return $matches[1];
    }
}
