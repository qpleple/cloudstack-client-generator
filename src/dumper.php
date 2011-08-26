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
            echo "{$link['url']} - {$link['name']}\n";
        }
    }
}
