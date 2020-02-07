CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers


INTRODUCTION
------------

Let It Snow is a moderately complex demonstration of a custom module. It does not 
interact with database, configuration or any other module. It implements snowstorm.js 
(version 1.44.20131208), a script created by Scott Schiller (schillmania.com), Copyright (c) 2003,
All rights reserved. Snowstorm is provided under a BSD license.

When enabled, the module will present a form at <my-domain>/admin/config/let_it_snow, 
allowing a user to modify a number of configuration values, including turning it on and off.

***This moudle is not intended for use on production sites.***


REQUIREMENTS
------------

No special requirements.


INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module.
   See: https://www.drupal.org/node/895232 for further information.


CONFIGURATION
-------------

 * Configure the user permissions in Administration » People » Permissions:

   - Administer Let It Snow

 * Customize Let It Snow settings in Administration » Configuration » Let it snow:

   - admin/config/let_it_snow


MAINTAINERS
-----------

Current maintainers:
 * Kimble Vardaman (kimble) - https://www.drupal.org/u/kimble