<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

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

        // behatviewer.help
        if (0 === strpos($pathinfo, '/help') && preg_match('#^/help(?:/(?P<page>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  'page' => 'home',  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\HelpController::indexAction',)), array('_route' => 'behatviewer.help'));
        }

        // behatviewer.feature
        if (0 === strpos($pathinfo, '/feature') && preg_match('#^/feature/(?P<id>\\d+)/(?P<slug>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::indexAction',)), array('_route' => 'behatviewer.feature'));
        }

        // behatviewer.source
        if (0 === strpos($pathinfo, '/feature') && preg_match('#^/feature/(?P<id>\\d+)/(?P<slug>[^/]+?)/source$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'jubianchi\\BehatViewerBundle\\Controller\\FeatureController::sourceAction',)), array('_route' => 'behatviewer.source'));
        }

        // behatviewer.screenshot
        if (0 === strpos($pathinfo, '/feature/screenshot') && preg_match('#^/feature/screenshot/(?P<id>[^/]+?)$#s', $pathinfo, $matches)) {
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
