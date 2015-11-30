<?php

namespace Application\Form;

use Zend\Form\Form;

class ContactForm extends Form
{
    protected $objectManager;

    public function __construct()
    {
        parent::__construct('contact');

        $this->add(array(
            'name' => 'security',
            'type' => 'Zend\Form\Element\Csrf'
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Invia',
                'id' => 'submitbutton',
            ),
            'options' => array()
        ));
    }
}
