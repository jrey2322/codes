<?php

class App {
    protected $controller = "home";
    protected $method = "index";
    protected $params = array();


    public function __construct()
    {
       $URL = $this->getURL();
       if (file_exists("../app/controller/" . $URL[0] . ".php")) 
    {
        $this->controller = ucfirst($URL[0]);
        unset($URL[0]);
       }


       require "../app/controller/" . $this->controller . ".php";
       $this->controller = new $this->controller();
    }

    private function getURL() 
    {
        $url = isset($_GET["url"]) ? $_GET["url"] : "home";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }
}