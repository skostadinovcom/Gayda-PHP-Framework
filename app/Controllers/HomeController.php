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
                'title' => 'zaglavie',
                'content' => 'sydyrjane'
            ),
            array(
                'title' => 'zaglavie',
                'content' => 'sydyrjane'
            ),
            array(
                'title' => 'zaglavie',
                'content' => 'sydyrjane'
            ),
            array(
                'title' => 'zaglavie',
                'content' => 'sydyrjane'
            ),
            array(
                'title' => 'zaglavie',
                'content' => 'sydyrjane'
            ),
        );

        $this->view('home.index', [ 'posts' => $posts, 'haha' => 'test' ]);
    }

    public function test()
    {
        echo 'Test World';
    }
}