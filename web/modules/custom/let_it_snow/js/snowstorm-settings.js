(function ($, Drupal, drupalSettings) {
  
  // Cannot make 'null' with any default value so setting value 
  // only if a form value has been entered.
  if (drupalSettings.letItSnow.letItSnowConfig.targetElement != '') {
    snowStorm.targetElement = drupalSettings.letItSnow.letItSnowConfig.targetElement;
  }
  snowStorm.animationInterval = drupalSettings.letItSnow.letItSnowConfig.animationInterval;
  snowStorm.flakeBottom = drupalSettings.letItSnow.letItSnowConfig.flakeBottom;
  snowStorm.flakesMax = drupalSettings.letItSnow.letItSnowConfig.flakesMax;
  snowStorm.flakesMaxActive = drupalSettings.letItSnow.letItSnowConfig.flakesMaxActive;
  snowStorm.followMouse = drupalSettings.letItSnow.letItSnowConfig.followMouse;
  snowStorm.freezeOnBlur = drupalSettings.letItSnow.letItSnowConfig.freezeOnBlur;

  snowStorm.snowColor = drupalSettings.letItSnow.letItSnowConfig.snowColor;
  
}(jQuery, Drupal, drupalSettings));
console.log(snowStorm.followMouse);