<?php

namespace Bolt\Extension\boltabandoned\InternationalSlugs;

use Bolt\Extension\SimpleExtension;
use Cocur\Slugify\Slugify;
use Silex\Application;

/**
 * InternationalSlugs extension class.
 *
 * @author Alan Smithee <alan.smithee@example.com>
 */
class InternationalSlugsExtension extends SimpleExtension
{
    /**
     * @inheritdoc
     */
    protected function registerServices(Application $app)
    {
        $config = $this->getConfig();
        $app['slugify'] = $app->share(
            function ($app) use ($config) {
                if (!isset($config['regexp'])) {
                    $config['regexp'] = '/([^A-Za-z0-9]|-)+/';
                }

                if (!isset($config['lowercase'])) {
                    $config['lowercase'] = true;
                }

                $slugify = new Slugify(
                    $config['regexp'],
                    array('lowercase' => $config['lowercase'])
                );

                foreach($config['rules'] as $key => $value){
                    $slugify->addRule($key, $value);
                }

                return $slugify;
            }
        );
    }
}
