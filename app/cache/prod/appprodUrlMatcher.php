<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // behatviewer.history
        if (rtrim($pathinfo, '/') === '/history') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'behatviewer.history');
            }
            return array (  'page' => 1,  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::indexAction',  '_route' => 'behatviewer.history',);
        }

        // behatviewer.historypage
        if (0 === strpos($pathinfo, '/history/page') && preg_match('#^/history/page/(?P<page>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::indexAction',)), array('_route' => 'behatviewer.historypage'));
        }

        // behatviewer.historyentry
        if (0 === strpos($pathinfo, '/history') && preg_match('#^/history/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::entryAction',)), array('_route' => 'behatviewer.historyentry'));
        }

        // behatviewer.historyentrylist
        if (0 === strpos($pathinfo, '/history') && preg_match('#^/history/(?P<id>\\d+)/list$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::entrylistAction',)), array('_route' => 'behatviewer.historyentrylist'));
        }

        // behatviewer.historydelete
        if (0 === strpos($pathinfo, '/history/delete') && preg_match('#^/history/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::deleteAction',)), array('_route' => 'behatviewer.historydelete'));
        }

        // behatviewer.historydeletesel
        if ($pathinfo === '/history/delete') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_behatviewerhistorydeletesel;
            }
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HistoryController::deleteSelectedAction',  '_route' => 'behatviewer.historydeletesel',);
        }
        not_behatviewerhistorydeletesel:

        // behatviewer.feature
        if (0 === strpos($pathinfo, '/feature') && preg_match('#^/feature/(?P<slug>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::indexAction',)), array('_route' => 'behatviewer.feature'));
        }

        // behatviewer.source
        if (0 === strpos($pathinfo, '/feature') && preg_match('#^/feature/(?P<slug>[^/]+?)/source$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::sourceAction',)), array('_route' => 'behatviewer.source'));
        }

        // behatviewer.screenshot
        if (0 === strpos($pathinfo, '/feature') && preg_match('#^/feature/(?P<id>[^/]+?)/screenshot$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::screenshotAction',)), array('_route' => 'behatviewer.screenshot'));
        }

        // behatviewer.config
        if (rtrim($pathinfo, '/') === '/config') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'behatviewer.config');
            }
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\ConfigController::indexAction',  '_route' => 'behatviewer.config',);
        }

        // behatviewer.stats
        if (rtrim($pathinfo, '/') === '/stats') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'behatviewer.stats');
            }
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\StatsController::indexAction',  '_route' => 'behatviewer.stats',);
        }

        // behatviewer.definitions
        if (rtrim($pathinfo, '/') === '/definitions') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'behatviewer.definitions');
            }
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefinitionsController::indexAction',  '_route' => 'behatviewer.definitions',);
        }

        // behatviewer.homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'behatviewer.homepage');
            }
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefaultController::indexAction',  '_route' => 'behatviewer.homepage',);
        }

        // behatviewer.homepagelist
        if ($pathinfo === '/list') {
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefaultController::indexlistAction',  '_route' => 'behatviewer.homepagelist',);
        }

        // behatviewer.homepagethumb
        if ($pathinfo === '/thumb') {
            return array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\DefaultController::indexthumbAction',  '_route' => 'behatviewer.homepagethumb',);
        }

        // behatviewer.tag
        if (0 === strpos($pathinfo, '/tag') && preg_match('#^/tag/(?P<slug>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\TagController::indexAction',)), array('_route' => 'behatviewer.tag'));
        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',)), array('_route' => 'fos_js_routing_js'));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
