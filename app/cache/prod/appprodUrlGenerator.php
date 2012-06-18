<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appprodUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       'behatviewer.history' => true,
       'behatviewer.historypage' => true,
       'behatviewer.historyentry' => true,
       'behatviewer.historyentrylist' => true,
       'behatviewer.historydelete' => true,
       'behatviewer.historydeletesel' => true,
       'behatviewer.feature' => true,
       'behatviewer.source' => true,
       'behatviewer.screenshot' => true,
       'behatviewer.config' => true,
       'behatviewer.stats' => true,
       'behatviewer.definitions' => true,
       'behatviewer.homepage' => true,
       'behatviewer.homepagelist' => true,
       'behatviewer.homepagethumb' => true,
       'behatviewer.tag' => true,
       'fos_js_routing_js' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function getbehatviewer__historyRouteInfo()
    {
        return array(array (), array (  'page' => 1,  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/history/',  ),));
    }

    private function getbehatviewer__historypageRouteInfo()
    {
        return array(array (  0 => 'page',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::indexAction',), array (  'page' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'page',  ),  1 =>   array (    0 => 'text',    1 => '/history/page',  ),));
    }

    private function getbehatviewer__historyentryRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::entryAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/history',  ),));
    }

    private function getbehatviewer__historyentrylistRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::entrylistAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/list',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/history',  ),));
    }

    private function getbehatviewer__historydeleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::deleteAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/history/delete',  ),));
    }

    private function getbehatviewer__historydeleteselRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::deleteSelectedAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/history/delete',  ),));
    }

    private function getbehatviewer__featureRouteInfo()
    {
        return array(array (  0 => 'slug',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'text',    1 => '/feature',  ),));
    }

    private function getbehatviewer__sourceRouteInfo()
    {
        return array(array (  0 => 'slug',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::sourceAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/source',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  2 =>   array (    0 => 'text',    1 => '/feature',  ),));
    }

    private function getbehatviewer__screenshotRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::screenshotAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/screenshot',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/feature',  ),));
    }

    private function getbehatviewer__configRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\ConfigController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/config/',  ),));
    }

    private function getbehatviewer__statsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\StatsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/',  ),));
    }

    private function getbehatviewer__definitionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefinitionsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/definitions/',  ),));
    }

    private function getbehatviewer__homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getbehatviewer__homepagelistRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefaultController::indexlistAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/list',  ),));
    }

    private function getbehatviewer__homepagethumbRouteInfo()
    {
        return array(array (), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefaultController::indexthumbAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/thumb',  ),));
    }

    private function getbehatviewer__tagRouteInfo()
    {
        return array(array (  0 => 'slug',), array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\TagController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'text',    1 => '/tag',  ),));
    }

    private function getfos_js_routing_jsRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',), array (  '_format' => 'js|json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'js|json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/js/routing',  ),));
    }
}
