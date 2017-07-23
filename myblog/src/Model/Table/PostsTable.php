<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function initialize(array $config)
    {
        $this -> addBehavior('Timestamp');
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body')
            ->add('body', [
                'length'=>[
                    'rule' =>['minLength', 5],
                    'message' => 'body length must be 5+'
                ]
            ]);
            return $validator;
    }
}
