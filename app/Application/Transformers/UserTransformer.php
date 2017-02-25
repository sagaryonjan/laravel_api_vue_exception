<?php

namespace Application\Transformers;

class UserTransformer extends Transformer{

    public function transform($lesson)
    {
        return[
            'id'       => (int) $lesson['id'],
            'username' => $lesson['name'],
            'email'    => $lesson['email'],
        ];
    }
}