<?php

/**
 * Base Controller Class
 *
 * This base Controller Class is for all other controllers.
 * Extend this class for each controller in the app.
 */

class BaseController
{
    /**
     * Load a model
     *
     * @param string $name The name of the model
     *
     * @return object
     */
    public function model( $name )
    {
        require_once APPLICATION_DIR . 'app/Models/' . ucfirst($name) . '.php';
        return new $name();
    }

    /**
     * Return a view
     */
    public function view( $viewName, $data )
    {

        //TODO NAPRAVI CHECK DALI DA RENDIRA TWIG ILI OBIKNOVEN PHP
    }

    public function redirect( $to )
    {
        header("Location: $to");
    }
}