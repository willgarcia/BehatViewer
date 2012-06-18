#Behat Viewer

##Install as a Symfony2 bundle

*Before installing BehatViewerBundle, you should check that BehatBundle is already installed and working with your project.*
*If it is not, please follow these tutorials : [BehatBundle for Symfony2](http://docs.behat.org/bundle/index.html#behatbundle-for-symfony2) and [MinkBundle for Symfony2](http://mink.behat.org/bundle/index.html).*

###Add these lines to your project’s deps file:
```
[BehatViewerBundle]
    git=https://github.com/jubianchi/BehatViewerBundle.git
    target=/bundles/jubianchi/BehatViewerBundle
```

###Add these lines to your project’s app/AppKernel.php file:
```php
<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    //...

    public function registerBundles()
    {
        //...

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new jubianchi\BehatViewerBundle\BehatViewerBundle();
        }

        //...
    }

    //...
}
```

###Add these lines to your project’s app/autoload.php file:
```php
<?php

//...

$loader->registerNamespaces(array(
    //...

    'jubianchi'           => __DIR__.'/../vendor/bundles',
));

//...
```

###Add these lines to your project’s app/config/routing_dev.yml file:
```
BehatViewerBundle:
    resource: "@BehatViewerBundle/Controller/"
    type:     annotation
    prefix:   /_behat
```

###Create the database:
```sh
$ app/console doctrine:schema:update --dump-sql
$ app/console doctrine:schema:update --force
```

###Install the assets:
```sh
$ app/console assets:install web
```