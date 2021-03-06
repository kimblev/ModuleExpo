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
        $animationInterval = $snow_config->get('animationInterval');
        $flakeBottom = $snow_config->get('flakeBottom');
        $flakesMax = $snow_config->get('flakesMax');
        $flakesMaxActive = $snow_config->get('flakesMaxActive');
        $followMouse = $snow_config->get('followMouse');
        $freezeOnBlur = $snow_config->get('freezeOnBlur');      
        $snowColor = $snow_config->get('snowColor');
        $snowStick = $snow_config->get('snowStick');
        $useTwinkleEffect = $snow_config->get('useTwinkleEffect');
        
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
              ->t('Enter a target element'),
             '#default_value' => $targetElement,
             '#description' => $this
              ->t('An HTML element which snow will be appended to (default: document body.) 
                  Can be an element ID string eg. \'myDiv\', or a DOM node reference. See relative 
                  and absolute-positioned examples.')
        ];
        $form['snow_settings']['properties'] = [
            '#type' => 'fieldset',
            '#title' => $this
              ->t('Snow properties*'),
            '#description' => $this
              ->t('*Most values will acquire a default value if left blank or an invalid value is entered.')
        ];
        $form['snow_settings']['properties']['animationInterval'] = [
            '#type' => 'number',
            '#title' => $this
                ->t('Animation interval'),
            '#description' => $this
                ->t('Theoretical "milliseconds per frame" measurement. 20 = fast + smooth, 
                but high CPU use. 50 = more conservative, but slower.'),
            '#default_value' => $animationInterval ?: 33,
        ];
        $form['snow_settings']['properties']['flakeBottom'] = [
            '#type' => 'number',
            '#title' => $this
                ->t('Flake bottom'),
            '#description' => $this
                ->t('Limits the "floor" (pixels) of the snow. If unspecified, snow will 
                "stick" to the bottom of the browser window and persists through browser 
                resize/scrolling.'),
            '#default_value' => $flakeBottom ?: '',
        ];
        $form['snow_settings']['properties']['flakesMax'] = [
            '#type' => 'number',
            '#title' => $this
                ->t('Flakes max'),
            '#description' => $this
                ->t('Sets the maximum number of snowflakes that can exist on the screen at 
                any given time.'),
            '#default_value' => $flakesMax ?: 128,
        ];
        $form['snow_settings']['properties']['flakesMaxActive'] = [
            '#type' => 'number',
            '#title' => $this
                ->t('Flakes max active'),
            '#description' => $this
                ->t('Sets the limit of "falling" snowflakes (ie. moving on the screen, thus 
                considered to be active.)'),
            '#default_value' => $flakesMaxActive ?: 64,
        ];
        $form['snow_settings']['properties']['followMouse'] = [
            '#type' => 'checkbox',
            '#title' => $this
                ->t('Follow mouse'),
            '#description' => $this
                ->t('Allows snow to move dynamically with the "wind", relative to the mouse\'s X (left/right) coordinates.'),
            '#default_value' => $followMouse,
            '#return_value' => t('true'),
        ];
        $form['snow_settings']['properties']['freezeOnBlur'] = [
            '#type' => 'checkbox',
            '#title' => $this
                ->t('Freeze on blur'),
            '#description' => $this
                ->t('Stops the snow effect when the browser window goes out of focus, eg., user is in another tab. Saves CPU, nicer to user.'),
            '#default_value' => $freezeOnBlur,
            '#return_value' => t('true'),
        ];
        $form['snow_settings']['properties']['snowColor'] = [
            '#type' => 'textfield',
            '#title' => $this
                ->t('Snow color'),
            '#description' => $this
                ->t("Don't eat (or use?) yellow snow."),
            '#default_value' => $snowColor ?: '#fff',
        ];
        $form['snow_settings']['properties']['snowStick'] = [
            '#type' => 'checkbox',
            '#title' => $this
                ->t('Snow stick'),
            '#description' => $this
                ->t('Allows the snow to "stick" to the bottom of the window. 
                     When off, snow will never sit at the bottom.'),
            '#default_value' => $snowStick,
            '#return_value' => t('true'),
        ];
        $form['snow_settings']['properties']['useTwinkleEffect'] = [
            '#type' => 'checkbox',
            '#title' => $this
                ->t('Use twinkle effect'),
            '#description' => $this
                ->t('Allow snow to randomly "flicker" in and out of view while falling.'),
            '#default_value' => $useTwinkleEffect,
            '#return_value' => t('true'),
        ];
        return parent::buildForm($form, $form_state);
    }
    
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        $this->config('let_it_snow.settings')
          ->set('autoStart', $values['autoStart'])
          ->set('targetElement', $values['targetElement'])
          ->set('animationInterval', $values['animationInterval'])
          ->set('flakeBottom', $values['flakeBottom'])
          ->set('flakesMax', $values['flakesMax'])
          ->set('flakesMaxActive', $values['flakesMaxActive'])
          ->set('followMouse', $values['followMouse'])
          ->set('freezeOnBlur', $values['freezeOnBlur'])
          ->set('snowColor', $values['snowColor'])
          ->set('snowStick', $values['snowStick'])
          ->set('useTwinkleEffect', $values['useTwinkleEffect'])
          ->save();
    }
}