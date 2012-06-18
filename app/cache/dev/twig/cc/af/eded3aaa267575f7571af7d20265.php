<?php

/* BehatViewerBundle:Help:index.html.twig */
class __TwigTemplate_ccafeded3aaa267575f7571af7d20265 extends Twig_Template
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
        echo "<div class=\"row-fluid\">
    <div class=\"span3\">
        <div class=\"well sidebar-nav\">
            <ul class=\"nav nav-list\">
                <li class=\"nav-header\">Navigation</li>
                <li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.help"), "html", null, true);
        echo "\">Home</a></li>

                ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "sections"));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 12
            echo "                    <li class=\"nav-header\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "section"), "html", null, true);
            echo "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "            </ul>
        </div>
    </div>

    <div class=\"span9\">
        ";
        // line 19
        echo $this->env->getExtension('markdown')->markdown($this->getContext($context, "help"));
        echo "
    </div>
</div>
";
    }

    // line 24
    public function block_javascript($context, array $blocks = array())
    {
        // line 25
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/prettify.js"), "html", null, true);
        echo "\"></script>
<script>
  window.prettyPrint();
</script>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Help:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 25,  70 => 24,  62 => 19,  55 => 14,  46 => 12,  42 => 11,  37 => 9,  30 => 4,  27 => 3,);
    }
}
