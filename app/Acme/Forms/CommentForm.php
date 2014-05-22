<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class CommentForm extends FormValidator {

    protected $rules = [
        'comment'    => 'required'
    ];
}