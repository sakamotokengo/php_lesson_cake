<?php
namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $posts = $this -> Posts -> find('all');
        // $posts = $this -> Posts -> find('all')
        // -> order(['title' => 'DESC'])
        // -> limit(2)
        // -> where(['title like' => '%3']);
        // $this => set('posts', $posts);
        $this -> set(compact('posts'));
    }
    public function view($id = null)
    {
        $post = $this -> Posts ->get($id);
        $this -> set(compact('post'));
    }
    public function add()
    {
        $post = $this -> Posts -> newEntity();
        if($this -> request -> is('post'))
        {
            $post = $this -> Posts -> patchEntity($post, $this -> request -> data);
            if($this -> Posts -> save($post))
            {
                $this -> Flash -> success('Add Success!!!');
                return $this -> redirect(['action' => 'index']);
            }
            else
            {
                //error
                $this -> Flash -> error('Add Error...');
            }
        }
        $this -> set(compact('post'));
    }
}
