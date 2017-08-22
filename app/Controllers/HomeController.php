<?php
/**
 * Created by PhpStorm.
 * User: stoya
 * Date: 8/21/2017
 * Time: 19:31
 */

class HomeController extends BaseController
{
    public function index()
    {
        $model = $this->model('Home');

        $posts = $model->test();

        $this->view('home.index.twig', [ 'posts' => $posts, 'haha' => 'test' ]);
    }

    public function test()
    {
        echo 'Test World';
    }
}