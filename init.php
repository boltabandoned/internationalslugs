<?php
/**
 * Allow bolt to use international slugs
 *
 */
use Bolt\Extension\boltabandoned\internationalslugs\Extension;

$app['extensions']->register(new Extension($app));
