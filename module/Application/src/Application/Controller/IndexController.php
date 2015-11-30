<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Form\ContactForm;
use Application\Form\ContactFormFieldset;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new ContactForm();
        $formFieldset = new ContactFormFieldset();
        $formFieldset->remove('terms');
        $formFieldset->getInputFilterSpecification();
        $formFieldset->setUseAsBaseFieldset(true);
        $form->setBaseFieldset($formFieldset);
        $form->add($formFieldset);

        $form->setValidationGroup(array(
            'security',
            'contact_fieldset',
        ));

        $formValid = false;
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $formValid = true;
            }
        }

        return new ViewModel(array('formValid' => $formValid, 'form' => $form));
    }
}
