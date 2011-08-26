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
    
    public function dumpLinks()
    {
        // Download the API reference table of content 
        $url = $this->config['api_ref_toc_url'];
        $html = $this->lib->fetchHtml($url);
        $links = getAllLinks($html);
        
        foreach ($links as $link) {
            echo $link['url'] . " - " . $link['name'] ."\n";
        }
    }
    
    public function dumpMethodData($method)
    {
        $url = $this->getRootUrl() . "user/${method}.html";
        $methodData = fetchMethodData($url);

        print_r($methodData);
    }
    
    public function dumpMethod($method)
    {
        $url = $this->getRootUrl() . "user/${method}.html";
        $methodData = fetchMethodData($url);

        $this->lib->render("method.php.twig", array(
            "method" => $methodData,
            "config" => $this->config,
        ));
    }
    
    public function dumpClass()
    {
        // Download the API reference table of content 
        $html = $this->lib->fetchHtml($this->config['api_ref_toc_url']);

        $methods = array();
        // walk through all links
        foreach (getAllLinks($html) as $link) {
            $url =  $this->getRootUrl() . $link['url'];
            $methods[] = fetchMethodData($url);
        }

        $this->lib->render("class.php.twig", array(
            "methods" => $methods,
            "config" => $this->config,
        ));
    }
    
    public function checkCamelCase()
    {
        // Disable camel case auto lookup
        $this->config['languages']['php']['use_camel_case'] = false;

        // Download the API reference table of content 
        $html = $this->lib->fetchHtml($this->config['api_ref_toc_url']);

        $missingNames = array();
        // walk through all links
        foreach (getAllLinks($html) as $link) {
            $url =  $this->getRootUrl() . $link['url'];
            echo "Fetching $url ...\n";
            $data = fetchMethodData($url);
            foreach ($data['params'] as $param) {
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
