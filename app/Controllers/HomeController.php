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
        $posts = array(
            array(
                'title' => 'Post title #1',
                'content' => 'Post Content #1'
            ),
            array(
                'title' => 'Post title #2',
                'content' => 'Post Content #2'
            ),
        );

        $this->view('home.index.twig', [ 'posts' => $posts, 'haha' => 'test' ]);
    }

    public function test()
    {
        echo 'Test World';
    }
}