<?php

/* BehatViewerBundle:Feature:index.html.twig */
class __TwigTemplate_69d171b2a3f8d0ea0c32a8d223041bbf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BehatViewerBundle::layout.html.twig");

        $this->blocks = array(
            'container' => array($this, 'block_container'),
            'sidebar' => array($this, 'block_sidebar'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BehatViewerBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["scenarios"] = $this->getAttribute($_feature_, "getScenariosCount");
        // line 5
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["passed"] = $this->getAttribute($_feature_, "getPassedScenariosCount");
        // line 6
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (isset($context["scenarios"])) { $_scenarios_ = $context["scenarios"]; } else { $_scenarios_ = null; }
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_passed_ / $_scenarios_) * 100));
        // line 8
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["failed"] = $this->getAttribute($_feature_, "getFailedScenariosCount");
        // line 9
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (isset($context["scenarios"])) { $_scenarios_ = $context["scenarios"]; } else { $_scenarios_ = null; }
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_failed_ / $_scenarios_) * 100));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_container($context, array $blocks = array())
    {
        // line 12
        echo "<h1 class=\"page-header\">
    ";
        // line 13
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_feature_, "name"), "html", null, true);
        echo " ";
        if (isset($context["build"])) { $_build_ = $context["build"]; } else { $_build_ = null; }
        if ($_build_) {
            // line 14
            echo "    <small>(#";
            if (isset($context["build"])) { $_build_ = $context["build"]; } else { $_build_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_build_, "id"), "html", null, true);
            echo " Built on ";
            if (isset($context["build"])) { $_build_ = $context["build"]; } else { $_build_ = null; }
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_build_, "date"), "Y-m-d \\a\\t H:i:s"), "html", null, true);
            echo ")</small>
    ";
        }
        // line 16
        echo "
    ";
        // line 17
        $this->env->loadTemplate("BehatViewerBundle::Feature/switcher.html.twig")->display($context);
        // line 18
        echo "
    ";
        // line 19
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        if (count($this->getAttribute($_feature_, "tags"))) {
            // line 20
            echo "    <br/>
    ";
            // line 21
            if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_feature_, "tags"));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 22
                echo "    <a href=\"";
                if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.tag", array("slug" => $this->getAttribute($_tag_, "slug"))), "html", null, true);
                echo "\" class=\"label label-info\"> ";
                if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_tag_, "name"), "html", null, true);
                echo " </a>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 24
            echo "    ";
        }
        // line 25
        echo "</h1>
<div class=\"row-fluid\">
    <div class=\"fix-scroll span3\">
        ";
        // line 28
        $this->displayBlock('sidebar', $context, $blocks);
        // line 31
        echo "    </div>
    <div class=\"span9\">
        ";
        // line 33
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_feature_, "scenarios"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["scenario"]) {
            // line 34
            echo "        ";
            $this->env->loadTemplate("BehatViewerBundle::Feature/scenario.html.twig")->display($context);
            // line 35
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scenario'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 36
        echo "    </div>
</div>
";
    }

    // line 28
    public function block_sidebar($context, array $blocks = array())
    {
        // line 29
        echo "        ";
        $this->env->loadTemplate("BehatViewerBundle::Feature/sidebar.html.twig")->display($context);
        // line 30
        echo "        ";
    }

    // line 40
    public function block_javascript($context, array $blocks = array())
    {
        // line 41
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/controller/feature.js"), "html", null, true);
        echo "\"></script>
<script>
    behat.application.setController(behat.feature);
</script>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Feature:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 41,  164 => 40,  160 => 30,  157 => 29,  154 => 28,  148 => 36,  134 => 35,  131 => 34,  113 => 33,  109 => 31,  107 => 28,  102 => 25,  99 => 24,  86 => 22,  81 => 21,  78 => 20,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  57 => 14,  51 => 13,  48 => 12,  45 => 11,  38 => 9,  35 => 8,  31 => 6,  28 => 5,  25 => 3,);
    }
}
