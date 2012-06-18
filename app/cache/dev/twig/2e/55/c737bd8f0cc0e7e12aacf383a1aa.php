<?php

/* BehatViewerBundle:Default:index.html.twig */
class __TwigTemplate_2e55c737bd8f0cc0e7e12aacf383a1aa extends Twig_Template
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
        // line 3
        if (((!$this->getContext($context, "features")) && $this->getContext($context, "build"))) {
            // line 4
            $context["features"] = $this->getAttribute($this->getContext($context, "build"), "features");
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_container($context, array $blocks = array())
    {
        // line 8
        echo "<h1 class=\"page-header\" xmlns=\"http://www.w3.org/1999/html\">
    Features for ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
        echo " ";
        if ($this->getContext($context, "build")) {
            // line 10
            echo "    <small>(#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
            echo " Built on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d \\a\\t H:i:s"), "html", null, true);
            echo ")</small>
    ";
        }
        // line 12
        echo "
    ";
        // line 13
        $this->env->loadTemplate("BehatViewerBundle::Default/switcher.html.twig")->display($context);
        // line 14
        echo "</h1>

<div class=\"row-fluid\">
    <div class=\"span12\">
        <div class=\"row-fluid\">
            ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "features"));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
            // line 20
            echo "            ";
            $this->env->loadTemplate("BehatViewerBundle::Default/feature.html.twig")->display($context);
            // line 21
            echo "
            ";
            // line 22
            if ((0 == $this->getAttribute($this->getContext($context, "loop"), "index") % 3)) {
                // line 23
                echo "        </div>
        <br/>

        <div class=\"row-fluid\">
            ";
            }
            // line 28
            echo "            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 29
            echo "            <div class=\"alert alert-block alert-info\">
                <h4 class=\"alert-heading\">No feature</h4>

                <p>This project has not been built yet. Click on the build button to launch test suite.</p>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 35
        echo "        </div>
    </div>
</div>
";
    }

    // line 40
    public function block_javascript($context, array $blocks = array())
    {
        // line 41
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/controller/home.js"), "html", null, true);
        echo "\"></script>
<script>
    behat.application.setController(behat.home);
</script>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 41,  126 => 40,  119 => 35,  108 => 29,  95 => 28,  88 => 23,  86 => 22,  83 => 21,  80 => 20,  62 => 19,  55 => 14,  53 => 13,  50 => 12,  42 => 10,  38 => 9,  35 => 8,  32 => 7,  26 => 4,  24 => 3,);
    }
}
