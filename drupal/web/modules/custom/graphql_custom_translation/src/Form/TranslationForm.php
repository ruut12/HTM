<?php

namespace Drupal\graphql_custom_translation\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class TranslationForm.
 */
class TranslationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'graphql_custom_translation.translation',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'translation_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('graphql_custom_translation.translation');
    //dump($config);
    $form['testfield'] = [
      '#type' => 'textfield',
      '#title' => $this->t('TestField'),
      '#description' => $this->t('Testfield description'),
      '#maxlength' => 255,
      '#size' => 64,
      '#default_value' => $config->get('testfield'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('graphql_custom_translation.translation')
      ->set('testfield', $form_state->getValue('testfield'))
      ->save();
  }

}
