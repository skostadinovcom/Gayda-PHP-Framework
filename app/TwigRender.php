<?php

class TwigRender{

    private $file;
    private $data;
    private $twig;

    public function __construct($file, $data)
    {
        $this->file = $file;
        $this->data = $data;

        $twigLoader = new Twig_Loader_Filesystem(APPLICATION_DIR . '/app/views', '__main__');
        $this->twig = new Twig_Environment($twigLoader);

        //TODO: Cache & check last modified
    }

    public function parseView()
    {
        $file = $this->file . '.php';

        try
        {
            if(is_null($this->data))
            {
                return $this->twig->render($file);
            }

            return $this->twig->render($file, $this->data);
        }

        catch(Twig_Error_Loader $e)
        {
            return $this->getErrorMessage('loader', $e->getMessage());
        }

        catch(Twig_Error_Runtime $e)
        {
            return $this->getErrorMessage('runtime', $e->getMessage());
        }

        catch(Twig_Error_Syntax $e)
        {
            return $this->getErrorMessage('syntax', $e->getMessage());
        }
    }

    public function __toString()
    {
        return $this->parseView();
    }

    private function getErrorMessage($errorType, $errorMessage)
    {
        return sprintf("A %s error occured: %s", $errorType, $errorMessage);
    }
}