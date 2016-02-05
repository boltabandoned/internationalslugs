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
        
        if (isset($this->config['rulesets'])) {
            $config = [
                'rulesets' => $this->config['rulesets'],
                'lowercase' => $this->config['lowercase']
            ];
        } else {
            $config = [
                'rulesets' => ['default'],
                'lowercase' => $this->config['lowercase']
            ];
        }
        $slugify = new Slugify($this->config['regex'], $config);

        foreach($this->config['rules'] as $key => $value){
            $slugify->addRule($key, $value);
        }

        $this->app['slugify'] = $slugify;
    }
}
