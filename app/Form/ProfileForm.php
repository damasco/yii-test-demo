<?php

namespace App\Form;

use App\Component\FormModel;

class ProfileForm extends FormModel
{
    /**
     * @var string
     */
    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'length', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
        ];
    }
}
