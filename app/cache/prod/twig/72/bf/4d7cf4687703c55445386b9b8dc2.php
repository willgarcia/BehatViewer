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
        if (isset($context["project"])) { $_project_ = $context["project"]; } else { $_project_ = null; }
        if ($this->getAttribute($_project_, "name")) {
            echo "[";
            if (isset($context["project"])) { $_project_ = $context["project"]; } else { $_project_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_project_, "name"), "html", null, true);
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
                    <li>
                        <div id=\"loader\"></div>
                    </li>
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
        return array (  58 => 17,  54 => 16,  50 => 15,  46 => 14,  42 => 13,  27 => 9,  17 => 1,);
    }
}
