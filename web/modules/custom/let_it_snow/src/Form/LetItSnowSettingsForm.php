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
        $snow_config = \Drupal::config('let_it_snow.settings');
        $autoStart = $snow_config->get('autoStart');
        $targetElement = $snow_config->get('targetElement');
        $snowColor = $snow_config->get('snowColor');
        $animationInterval = $snow_config->get('animationInterval');
        $flakeBottom = $snow_config->get('flakeBottom');
        $flakesMax = $snow_config->get('flakesMax');
        
        $form['snow_settings'] = [
            '#type' => 'fieldset',
            '#title' => $this
              ->t('Snow settings'),
        ];
        $form['snow_settings']['enable'] = [
            '#type' => 'fieldset',
            '#title' => $this
              ->t('Enable snow'),
        ];
        $form['snow_settings']['enable']['autoStart'] = [
            '#type' => 'checkbox',
            '#title' => $this
              ->t('Turn on snow'),
            '#return_value' => t('true'),
            '#default_value' => $autoStart,
        ];
        $form['snow_settings']['enable']['targetElement'] = [
            '#type' => 'textfield',
            '#title' => $this
              ->t('Enter a target div ID'),
             '#default_value' => $targetDiv ?: '#header',
        ];
        $form['snow_settings']['properties'] = [
            '#type' => 'fieldset',
            '#title' => $this
              ->t('Snow properties*'),
            '#description' => $this
              ->t('*Most values will acquire a default value if left blank or an invalid value is entered.')
        ];
        $form['snow_settings']['properties']['snowColor'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('Snow color'),
            '#default_value' => $snowColor ?: '#fff',
        ];
        $form['snow_settings']['properties']['animationInterval'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('Animation interval'),
            '#description' => $this
                ->t('Theoretical "milliseconds per frame" measurement. 20 = fast + smooth, 
                but high CPU use. 50 = more conservative, but slower.'),
            '#default_value' => $animationInterval ?: 33,
        ];
        $form['snow_settings']['properties']['flakeBottom'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('Flake bottom'),
            '#default_value' => $flakeBottom ?: '',
        ];
        $form['snow_settings']['properties']['flakesMax'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('Flakes max'),
            '#default_value' => $flakesMax ?: 128,
        ];
        return parent::buildForm($form, $form_state);
    }
 
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        $this->config('let_it_snow.settings')
          ->set('autoStart', $values['autoStart'])
          ->set('targetElement', $values['targetElement'])
          ->set('snowColor', $values['snowColor'])
          ->set('animationInterval', $values['animationInterval'])
          ->set('flakeBottom', $values['flakeBottom'])
          ->set('flakesMax', $values['flakesMax'])
          ->save();
    }
}