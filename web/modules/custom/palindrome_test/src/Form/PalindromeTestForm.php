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

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    $word = strtoupper($form_state->getValue('word'));
    // Check if value is equal to its reverse
    // and assign the proper message.
    if (strrev($word) == $word && !empty($word)) {
      $prefix = "(-: ";
      $msg = $this->t(' is a palindrome!');   
    }
    else { 
      $prefix = ")-: ";
      $msg = $this->t(' is not palindrome!'); 
    }
    // Print result
    \Drupal::messenger()->addMessage($prefix . $word . $msg);
  }

}

