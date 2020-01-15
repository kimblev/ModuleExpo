<?php

namespace Drupal\palindrome_test\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PalindromeTestForm.
 */
class PalindromeTestForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'palindrome_test_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['word'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Word'),
      '#description' => $this->t('Enter a word for testing.'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    $word = $form_state->getValue('word');
    // Check if value is equal to its reverse
    if (strrev($word) == $word) {   
      $form_state->setErrorByName('word', $this->t('This is a palindrome!'));   
    } 
    else { 
      $form_state->setErrorByName('word', $this->t('Sorry, this is not palindrome!')); 
    } 
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}

