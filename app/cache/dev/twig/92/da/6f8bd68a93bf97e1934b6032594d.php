<?php

/* BehatViewerBundle::layout.html.twig */
class __TwigTemplate_92da6f8bd68a93bf97e1934b6032594d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
            'header' => array($this, 'block_header'),
            'container' => array($this, 'block_container'),
            'footer' => array($this, 'block_footer'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    ";
        // line 4
        if ((!$this->getContext($context, "xhr"))) {
            // line 5
            echo "    <meta charset=\"utf-8\">
    <title>Behat Viewer</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"Behat Viewer, from PMSIpilot\">
    <meta name=\"author\" content=\"Julien Bianchi <contact@jubianchi.fr>\">


    <link href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/bootstrap.css"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <style type=\"text/css\">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <link rel=\"stylesheet\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/bootstrap-responsive.css"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/font-awesome.css"), "html", null, true);
            echo "\">
    <link rel=\"stylesheet\" href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/chosen.css"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/jquery.noty.css"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/noty_theme_twitter.css"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/css/behat.css"), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    ";
            // line 29
            $this->displayBlock('stylesheet', $context, $blocks);
            // line 30
            echo "
    <!--[if lt IE 9]>
    <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->
    ";
        }
        // line 35
        echo "</head>

<body>

";
        // line 39
        if ((!$this->getContext($context, "xhr"))) {
            // line 40
            $this->displayBlock('header', $context, $blocks);
            // line 43
            echo "
<div id=\"notification\"></div>
";
        }
        // line 46
        echo "
<div class=\"container-fluid\" id=\"container\">
    ";
        // line 48
        $this->displayBlock('container', $context, $blocks);
        // line 49
        echo "
    <hr class=\"soften\"/>

    ";
        // line 52
        $this->displayBlock('footer', $context, $blocks);
        // line 55
        echo "</div>

";
        // line 57
        if ((!$this->getContext($context, "xhr"))) {
            // line 58
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/bootstrap.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/bootstrap.fixed-table.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/prettify.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/prettify.feature.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/chosen.jquery.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/promise.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.noty.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/spin.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/moment.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/helper.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/loader.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/notifier.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/toolbar.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/server.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/application.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
            echo "\"></script>
<script type=\"text/javascript\" src=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData")), "html", null, true);
            echo "\"></script>

<script>
    \$(function () {
        behat.application.init();
    });
</script>
";
        }
        // line 83
        echo "
<script>
    behat.toolbar.lastBuild(";
        // line 85
        echo twig_escape_filter($this->env, $this->getContext($context, "lastbuild"), "html", null, true);
        echo ");
</script>

";
        // line 88
        $this->displayBlock('javascript', $context, $blocks);
        // line 91
        echo "</body>
</html>
";
    }

    // line 29
    public function block_stylesheet($context, array $blocks = array())
    {
    }

    // line 40
    public function block_header($context, array $blocks = array())
    {
        // line 41
        $this->env->loadTemplate("BehatViewerBundle::header.html.twig")->display($context);
    }

    // line 48
    public function block_container($context, array $blocks = array())
    {
    }

    // line 52
    public function block_footer($context, array $blocks = array())
    {
        // line 53
        echo "    ";
        $this->env->loadTemplate("BehatViewerBundle::footer.html.twig")->display($context);
        // line 54
        echo "    ";
    }

    // line 88
    public function block_javascript($context, array $blocks = array())
    {
        // line 89
        echo "
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 89,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 48,  225 => 41,  222 => 40,  217 => 29,  211 => 91,  209 => 88,  203 => 85,  199 => 83,  188 => 75,  184 => 74,  180 => 73,  176 => 72,  172 => 71,  168 => 70,  164 => 69,  160 => 68,  156 => 67,  152 => 66,  148 => 65,  144 => 64,  140 => 63,  136 => 62,  132 => 61,  128 => 60,  124 => 59,  119 => 58,  117 => 57,  113 => 55,  111 => 52,  106 => 49,  104 => 48,  100 => 46,  95 => 43,  93 => 40,  91 => 39,  85 => 35,  78 => 30,  76 => 29,  72 => 28,  68 => 27,  64 => 26,  60 => 25,  56 => 24,  52 => 23,  38 => 12,  27 => 4,  22 => 1,  29 => 5,  26 => 3,);
    }
}
