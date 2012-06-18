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
        return array (  30 => 9,  17 => 1,  129 => 41,  126 => 40,  119 => 35,  108 => 29,  95 => 28,  88 => 23,  86 => 22,  83 => 21,  80 => 20,  62 => 19,  55 => 14,  53 => 13,  50 => 12,  42 => 10,  38 => 9,  35 => 8,  32 => 7,  26 => 8,  24 => 3,);
    }
}
