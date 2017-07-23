<?php
namespace App\Controller;

class CommentsController extends AppController
{
    public function add()
    {
         $comment = $this -> Comments -> newEntity();
        if($this -> request -> is('post'))
        {
            $comment = $this -> Comments -> patchEntity($comment, $this -> request -> data);
            if($this -> Comments -> save($comment))
            {
                $this -> Flash -> success('Comment Add Success!!!');
                return $this -> redirect(['controller' => 'Posts', 'action' => 'view', $comment -> post_id]);
            }
            else
            {
                //error
                $this -> Flash -> error('Comment Add Error...');
            }
        }
        $this -> set(compact('comment'));
     }

    public function delete($id = null)
    {
    //     $this -> request -> allowMethod(['post', 'delete']);
    //     $post = $this -> Posts -> get($id);
    //     if($this -> Posts -> delete($post))
    //     {
    //         $this -> Flash -> success('delete Success!!!');
    //
    //     }else{
    //         $this -> Flash -> error('delete Error...');
    //     }
    //     return $this -> redirect(['action' => 'index']);
    }
}
