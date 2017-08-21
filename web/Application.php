<?php

class Application
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $requestParts = $this->explodeRequestParts();
        $config = $this->getConfigs();

        if ( file_exists(APPLICATION_DIR . '/app/Controllers/' . ucfirst($requestParts[0]) . 'Controller.php') ) {
            $this->controller = $requestParts[0];
        }

        $controllerName = ucfirst($this->controller) . 'Controller';
        require_once APPLICATION_DIR . '/app/Controllers/' . $controllerName .'.php';
        $this->controller = new $controllerName;


        if ( isset($requestParts[1]) && !empty($requestParts[1]) ){
            if ( method_exists($this->controller, $requestParts[1]) ){
                $this->method = $requestParts[1];
            }
        }

        if ( isset($requestParts) && !empty($requestParts) ){
            $this->params = $requestParts;
        }else{
            $this->params = [];
        }

        call_user_func_array( [ $this->controller, $this->method ], $this->params );
    }

    /**
     * Explode the Request URL to Parts
     *
     * @return void
     */
    public function explodeRequestParts()
    {
        $requestParts = null;

        if ( isset($_GET['params']) && !empty($_GET['params']) ) {
            $requestParts = explode( '/', filter_var( rtrim( $_GET['params'], '/' ), FILTER_SANITIZE_URL ) );
        }

        return $requestParts;
    }
}