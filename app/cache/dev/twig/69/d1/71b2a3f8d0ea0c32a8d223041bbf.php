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
        $context["scenarios"] = $this->getAttribute($this->getContext($context, "feature"), "getScenariosCount");
        // line 5
        $context["passed"] = $this->getAttribute($this->getContext($context, "feature"), "getPassedScenariosCount");
        // line 6
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "passed") / $this->getContext($context, "scenarios")) * 100));
        // line 8
        $context["failed"] = $this->getAttribute($this->getContext($context, "feature"), "getFailedScenariosCount");
        // line 9
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "failed") / $this->getContext($context, "scenarios")) * 100));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_container($context, array $blocks = array())
    {
        // line 12
        echo "<h1 class=\"page-header\">
    ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "name"), "html", null, true);
        echo " ";
        if ($this->getContext($context, "build")) {
            // line 14
            echo "    <small>(#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
            echo " Built on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d \\a\\t H:i:s"), "html", null, true);
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
        if (count($this->getAttribute($this->getContext($context, "feature"), "tags"))) {
            // line 20
            echo "    <br/>
    ";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "feature"), "tags"));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 22
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.tag", array("slug" => $this->getAttribute($this->getContext($context, "tag"), "slug"))), "html", null, true);
                echo "\" class=\"label label-info\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tag"), "name"), "html", null, true);
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "feature"), "scenarios"));
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
        return array (  151 => 41,  148 => 40,  144 => 30,  141 => 29,  138 => 28,  132 => 36,  118 => 35,  115 => 34,  98 => 33,  94 => 31,  92 => 28,  87 => 25,  84 => 24,  73 => 22,  69 => 21,  66 => 20,  64 => 19,  61 => 18,  59 => 17,  56 => 16,  48 => 14,  44 => 13,  41 => 12,  38 => 11,  33 => 9,  31 => 8,  29 => 6,  27 => 5,  25 => 3,);
    }
}
