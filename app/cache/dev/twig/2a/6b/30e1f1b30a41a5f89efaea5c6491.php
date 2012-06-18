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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("id" => $this->getAttribute($this->getContext($context, "feature"), "id"), "slug" => $this->getAttribute($this->getContext($context, "feature"), "slug"))), "html", null, true);
        echo "\" data-action=\"summary\" title=\"Summary\"><i class=\"icon-reorder\"></i> Summary</a></li>
      <li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.source", array("id" => $this->getAttribute($this->getContext($context, "feature"), "id"), "slug" => $this->getAttribute($this->getContext($context, "feature"), "slug"))), "html", null, true);
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
        return array (  30 => 9,  26 => 8,  17 => 1,);
    }
}
