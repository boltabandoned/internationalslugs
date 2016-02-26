<?php
namespace Bolt\Extension\boltabandoned\internationalslugs;

use Cocur\Slugify\Slugify;

class Extension extends \Bolt\BaseExtension
{

    public function getName()
    {
        return 'internationalslugs';
    }

    function initialize()
    {

        if (!isset($this->config['regexp'])) {
            $this->config['regexp'] = '/([^A-Za-z0-9]|-)+/';
        }

        if (!isset($this->config['lowercase'])) {
            $this->config['lowercase'] = true;
        }

        $slugify = new Slugify(
            $this->config['regexp'],
            array('lowercase' => $this->config['lowercase'])
        );

        foreach($this->config['rules'] as $key => $value){
            $slugify->addRule($key, $value);
        }

        $this->app['slugify'] = $slugify;
    }
}
