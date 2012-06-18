<?php

/* TwigBundle:Exception:error.xml.twig */
class __TwigTemplate_24f3017e6924381124ff64f8b6b9f729 extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"";
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" ?>

<error code=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo "\" message=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 16,  64 => 15,  53 => 13,  34 => 7,  26 => 3,  42 => 10,  97 => 22,  95 => 21,  88 => 19,  78 => 17,  71 => 14,  40 => 7,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 45,  117 => 44,  103 => 36,  74 => 27,  47 => 19,  32 => 11,  22 => 3,  25 => 4,  23 => 3,  17 => 1,  92 => 20,  86 => 6,  79 => 40,  29 => 5,  24 => 3,  19 => 2,  69 => 14,  63 => 10,  58 => 9,  49 => 12,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 19,  77 => 28,  75 => 16,  57 => 9,  50 => 13,  46 => 14,  44 => 11,  39 => 9,  33 => 5,  30 => 4,  27 => 4,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 43,  108 => 40,  104 => 24,  102 => 37,  94 => 31,  89 => 20,  87 => 32,  84 => 31,  81 => 26,  73 => 21,  70 => 26,  67 => 12,  62 => 24,  59 => 23,  55 => 14,  51 => 11,  48 => 10,  41 => 6,  38 => 6,  35 => 8,  31 => 4,  28 => 3,);
    }
}
