<?php

/* BehatViewerBundle::header.html.twig */
class __TwigTemplate_72bf4d7cf4687703c55445386b9b8dc2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"toolbar\" class=\"navbar navbar-fixed-top\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </a>
            <a class=\"brand\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.homepage"), "html", null, true);
        echo "\">Behat Viewer <span id=\"project\">";
        if ($this->getAttribute($this->getContext($context, "project"), "name")) {
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
            echo "]";
        }
        echo "</span></a>

            <div class=\"nav-collapse\">
                <ul class=\"nav\">
                    <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.homepage"), "html", null, true);
        echo "\">Home</a></li>
                    <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.history"), "html", null, true);
        echo "\">History</a></li>
                    <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.stats"), "html", null, true);
        echo "\">Stats</a></li>
                    <li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.definitions"), "html", null, true);
        echo "\">Definitions</a></li>
                    <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.config"), "html", null, true);
        echo "\">Config</a></li>
                    <li><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.help"), "html", null, true);
        echo "\">Help</a></li>
                    <li>
                        <div id=\"loader\"></div>
                    </li>
                </ul>
                <ul class=\"nav pull-right\" id=\"last-build\">
                    <li><button href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.homepage"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Last build &raquo;</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 24,  48 => 15,  44 => 14,  40 => 13,  17 => 1,  247 => 89,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 48,  225 => 41,  222 => 40,  217 => 29,  211 => 91,  209 => 88,  203 => 85,  199 => 83,  188 => 75,  184 => 74,  180 => 73,  176 => 72,  172 => 71,  168 => 70,  164 => 69,  160 => 68,  156 => 67,  152 => 66,  148 => 65,  144 => 64,  140 => 63,  136 => 62,  132 => 61,  128 => 60,  124 => 59,  119 => 58,  117 => 57,  113 => 55,  111 => 52,  106 => 49,  104 => 48,  100 => 46,  95 => 43,  93 => 40,  91 => 39,  85 => 35,  78 => 30,  76 => 29,  72 => 28,  68 => 27,  64 => 26,  60 => 18,  56 => 17,  52 => 16,  38 => 12,  27 => 9,  22 => 1,  29 => 5,  26 => 3,);
    }
}
