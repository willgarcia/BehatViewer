<?php

/* BehatViewerBundle:Feature:source.html.twig */
class __TwigTemplate_bfee227dd435f71decb54b975f149095 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BehatViewerBundle::layout.html.twig");

        $this->blocks = array(
            'container' => array($this, 'block_container'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BehatViewerBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "<h1 class=\"page-header\">
    ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "name"), "html", null, true);
        echo " ";
        if ($this->getContext($context, "build")) {
            // line 6
            echo "    <small>(#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
            echo " Built on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d \\a\\t H:i:s"), "html", null, true);
            echo ")</small>
    ";
        }
        // line 8
        echo "
    ";
        // line 9
        $this->env->loadTemplate("BehatViewerBundle::Feature/switcher.html.twig")->display($context);
        // line 10
        echo "</h1>
<div class=\"row-fluid\">
    ";
        // line 12
        if ($this->getContext($context, "source")) {
            // line 13
            echo "    <pre class=\"prettyprint linenums lang-feature\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "source"), "html", null, true);
            echo "</pre>
    ";
        } else {
            // line 15
            echo "    <div class=\"alert alert-danger alert-block\">
        <h4 class=\"alert-heading\">Error</h4>

        <p>The file ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "getFile", array(), "method"), "html", null, true);
            echo " is not accessible.</p>
    </div>
    ";
        }
        // line 21
        echo "</div>
";
    }

    // line 24
    public function block_javascript($context, array $blocks = array())
    {
        // line 25
        echo "<script>window.prettyPrint();</script>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Feature:source.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 25,  78 => 24,  73 => 21,  67 => 18,  62 => 15,  56 => 13,  54 => 12,  50 => 10,  48 => 9,  45 => 8,  37 => 6,  33 => 5,  30 => 4,  27 => 3,);
    }
}
