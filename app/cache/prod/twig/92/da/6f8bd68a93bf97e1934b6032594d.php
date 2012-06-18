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
        if (isset($context["xhr"])) { $_xhr_ = $context["xhr"]; } else { $_xhr_ = null; }
        if ((!$_xhr_)) {
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
        if (isset($context["xhr"])) { $_xhr_ = $context["xhr"]; } else { $_xhr_ = null; }
        if ((!$_xhr_)) {
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
        if (isset($context["xhr"])) { $_xhr_ = $context["xhr"]; } else { $_xhr_ = null; }
        if ((!$_xhr_)) {
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
";
        // line 84
        $this->displayBlock('javascript', $context, $blocks);
        // line 85
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

    // line 84
    public function block_javascript($context, array $blocks = array())
    {
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
        return array (  240 => 84,  236 => 54,  233 => 53,  230 => 52,  225 => 48,  221 => 41,  218 => 40,  213 => 29,  207 => 85,  205 => 84,  202 => 83,  191 => 75,  187 => 74,  183 => 73,  179 => 72,  175 => 71,  171 => 70,  167 => 69,  163 => 68,  159 => 67,  155 => 66,  151 => 65,  147 => 64,  139 => 62,  135 => 61,  131 => 60,  127 => 59,  122 => 58,  119 => 57,  115 => 55,  113 => 52,  108 => 49,  102 => 46,  97 => 43,  95 => 40,  92 => 39,  86 => 35,  79 => 30,  77 => 29,  73 => 28,  65 => 26,  61 => 25,  53 => 23,  39 => 12,  30 => 5,  27 => 4,  22 => 1,  152 => 51,  148 => 50,  143 => 63,  140 => 48,  133 => 43,  125 => 37,  120 => 34,  106 => 48,  103 => 32,  85 => 31,  72 => 20,  69 => 27,  62 => 14,  60 => 13,  57 => 24,  47 => 10,  41 => 9,  38 => 8,  35 => 7,  28 => 4,  24 => 3,);
    }
}
