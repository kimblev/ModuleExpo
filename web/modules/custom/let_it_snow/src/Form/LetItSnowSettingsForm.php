<?php

namespace Drupal\let_it_snow\Form;

use \Drupal\Core\Form\ConfigFormBase;
use \Drupal\Core\Form\FormStateInterface;

class LetItSnowSettingsForm extends ConfigFormBase {
    public function getFormId() {
        return 'let_it_snow_settings';
    }

    protected function getEditableConfigNames() {
        return ['let_it_snow.settings'];
    }
    
    public function buildForm(array $form, FormStateInterface $form_state) {
        return parent::buildForm($form, $form_state);
    }
 
    public function submitForm(array &$form, FormStateInterface $form_state) {
        return parent::buildForm($form, $form_state);
    }
}