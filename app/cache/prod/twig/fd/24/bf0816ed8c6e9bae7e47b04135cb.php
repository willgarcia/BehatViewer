<?php

/* BehatViewerBundle::Default/switcher.html.twig */
class __TwigTemplate_fd24bf0816ed8c6e9bae7e47b04135cb extends Twig_Template
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
        echo "<div class=\"pull-right\">
  <div class=\"btn-group\">
    <button data-toggle=\"dropdown\" class=\"btn dropdown-toggle btn-icon\">
      <i class=\"icon-eye-open\"></i> <span>Switch view</span>
      <span class=\"caret\"></span>
    </button>
    <ul class=\"dropdown-menu\">
      <li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.homepagelist"), "html", null, true);
        echo "\" data-action=\"listview\" title=\"List view\"><i class=\"icon-tasks\"></i> List</a></li>
      <li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.homepagethumb"), "html", null, true);
        echo "\" data-action=\"listview\" title=\"Dashboard\"><i class=\"icon-dashboard\"></i> Dashboard</a></li>
    </ul>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Default/switcher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 8,  17 => 1,  240 => 84,  236 => 54,  233 => 53,  230 => 52,  225 => 48,  221 => 41,  218 => 40,  213 => 29,  207 => 85,  205 => 84,  202 => 83,  191 => 75,  187 => 74,  183 => 73,  179 => 72,  175 => 71,  171 => 70,  167 => 69,  163 => 68,  159 => 67,  155 => 66,  151 => 65,  147 => 64,  139 => 62,  135 => 61,  131 => 60,  127 => 59,  122 => 58,  119 => 57,  115 => 55,  113 => 52,  108 => 49,  102 => 46,  97 => 43,  95 => 40,  92 => 39,  86 => 35,  79 => 30,  77 => 29,  73 => 28,  65 => 26,  61 => 25,  53 => 23,  39 => 12,  30 => 9,  27 => 4,  22 => 1,  152 => 51,  148 => 50,  143 => 63,  140 => 48,  133 => 43,  125 => 37,  120 => 34,  106 => 48,  103 => 32,  85 => 31,  72 => 20,  69 => 27,  62 => 14,  60 => 13,  57 => 24,  47 => 10,  41 => 9,  38 => 8,  35 => 7,  28 => 4,  24 => 3,);
    }
}
