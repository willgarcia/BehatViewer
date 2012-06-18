<?php

/* BehatViewerBundle::Feature/switcher.html.twig */
class __TwigTemplate_2a6b30e1f1b30a41a5f89efaea5c6491 extends Twig_Template
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
        echo "<div class=\"pull-right\" xmlns=\"http://www.w3.org/1999/html\">
  <div class=\"btn-group\">
    <button data-toggle=\"dropdown\" class=\"btn dropdown-toggle btn-icon\">
      <i class=\"icon-eye-open\"></i> <span>Switch view</span>
      <span class=\"caret\"></span>
    </button>
    <ul class=\"dropdown-menu\">
      <li><a href=\"";
        // line 8
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("slug" => $this->getAttribute($_feature_, "slug"))), "html", null, true);
        echo "\" data-action=\"summary\" title=\"Summary\"><i class=\"icon-reorder\"></i> Summary</a></li>
      <li><a href=\"";
        // line 9
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.source", array("slug" => $this->getAttribute($_feature_, "slug"))), "html", null, true);
        echo "\" data-action=\"source\" title=\"Source\"><i class=\"icon-file\"></i> Source</a></li>
    </ul>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Feature/switcher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 8,  17 => 1,  167 => 41,  164 => 40,  160 => 30,  157 => 29,  154 => 28,  148 => 36,  134 => 35,  131 => 34,  113 => 33,  109 => 31,  107 => 28,  102 => 25,  99 => 24,  86 => 22,  81 => 21,  78 => 20,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  57 => 14,  51 => 13,  48 => 12,  45 => 11,  38 => 9,  35 => 8,  31 => 9,  28 => 5,  25 => 3,);
    }
}
