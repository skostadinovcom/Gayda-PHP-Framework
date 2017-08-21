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
     * @param string $model The name of the model
     *
     * @return object
     */
    public function model( $model )
    {
        require_once APPLICATION_DIR . 'app/Models/' . ucfirst($model) . '.php';
        return new model();
    }

    /**
     * Return a view
     *
     * @param string $view The path, view name. Split the folders with dots (.) & add .twig after the file name if you want to use twig
     * Example: articles.show.twig
     *
     * @param array $data Send data to view
     */
    public function view( $view, $data )
    {
        $view = explode( '.', $view );

        $view_path = null;
        foreach ( $view as $road ){
            if ( $road != 'twig' ){
                $view_path = $view_path . '/' . $road;
            }
        }

        if ( end($view)  == 'twig' ){
            $view = new TwigRender( $view_path, $data );

            echo $view;
        }else{
            foreach ( $data as $var => $content ){
                ${$var} = $content;
            }

            include('app/Views/' . $view_path . '.php' );
        }
    }

    /**
     * Redirect
     *
     * @param string $to Redirect to
     */
    public function redirect( $to )
    {
        header("Location: $to");
    }
}