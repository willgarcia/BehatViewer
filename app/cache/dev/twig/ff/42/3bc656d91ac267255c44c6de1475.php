<?php

/* BehatViewerBundle:DataCollector:behatviewer.html.twig */
class __TwigTemplate_ff423bc656d91ac267255c44c6de1475 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        $context["text"] = ('' === $tmp = "<span>Behat Viewer</span>
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 7
        echo "
<a style=\"text-decoration: none; margin: 0; padding: 0;\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.homepage"), "html", null, true);
        echo "\">
    <img width=\"17\" height=\"20\"
         src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAUCAYAAABroNZJAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9wEExMoG9dcUioAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAABqElEQVQ4y63UT4hOYRTH8Y8xC6MpTSE0olGsppM/ZRb2ZDcWVtQoGxtpNspCsZkUNrZIFmyUFWrIRpk0Q53GhoVihoWNIvlThs25db3mZRZO3X7n+d36Puc599yH/xDLFjMjYh0OYR+GsRqf8QQTmfmwKyQiVuIMjuMxrmEGXzCCi1iLg5l56w9IRKzHPWzDGGaxHUMYyMzxiNiPO5jHpsxcgN4CrChA4EBm3o6IGeysPSZLm2MMYiNeQ0+Z4wWYLEBfrZuYLu1veQtN0kDGSm+U7miqrJgp3Vs6X89vkKHS56UjHR9sOiL6cbrW5zPzZyfkTem3RSAfsBX3S2/iUnuHBnIMr+rLdEIGqqGNN4pzEbG867BFxAa8bVkncQFbcB27yz+VmRPtStrR2Y9HmfkjM1/WEDZxtPM43SDf8ay1zla+eamQp5n5rQPaxKdFIRHRi10ta6pjg8FWPtutkmH0/QUy2srvNknvP5r6MSKO1CTvwdnyP+NKt0rakDmswVV8xQOsqncnMvP9UiBTNWQvWt47HM7My/+82Tqa3VO/Pcw1d0g7fgEo+XZ1CE4h+wAAAABJRU5ErkJggg==\"
         style=\"border-width: 0\" alt=\"Behat Viewer\">
</a>
";
        // line 13
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => "")));
        // line 14
        echo "    ";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:DataCollector:behatviewer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 84,  205 => 82,  192 => 78,  176 => 70,  165 => 63,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  127 => 46,  93 => 33,  78 => 25,  124 => 41,  88 => 29,  122 => 46,  116 => 42,  108 => 40,  102 => 37,  70 => 20,  51 => 13,  26 => 3,  150 => 43,  135 => 54,  94 => 33,  85 => 28,  61 => 17,  47 => 11,  34 => 5,  157 => 55,  133 => 44,  130 => 48,  113 => 40,  104 => 38,  90 => 32,  79 => 28,  62 => 16,  59 => 15,  32 => 7,  29 => 4,  24 => 3,  81 => 26,  73 => 21,  56 => 14,  54 => 14,  48 => 10,  45 => 14,  42 => 10,  36 => 8,  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  238 => 99,  236 => 98,  231 => 95,  229 => 94,  224 => 91,  222 => 90,  217 => 87,  213 => 85,  203 => 81,  201 => 80,  196 => 79,  194 => 76,  189 => 77,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  161 => 61,  158 => 57,  156 => 56,  145 => 56,  142 => 48,  126 => 39,  123 => 44,  120 => 39,  118 => 36,  114 => 34,  103 => 36,  97 => 34,  92 => 37,  72 => 17,  66 => 19,  52 => 12,  69 => 20,  63 => 18,  58 => 16,  37 => 12,  20 => 1,  139 => 47,  131 => 44,  128 => 43,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 31,  87 => 28,  84 => 28,  82 => 27,  75 => 24,  67 => 19,  57 => 15,  50 => 12,  44 => 10,  39 => 8,  33 => 7,  30 => 4,  27 => 6,  271 => 114,  262 => 111,  258 => 110,  255 => 109,  250 => 108,  248 => 107,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  207 => 83,  200 => 87,  185 => 76,  178 => 71,  171 => 67,  164 => 59,  154 => 45,  151 => 53,  143 => 49,  140 => 52,  137 => 51,  132 => 49,  129 => 50,  125 => 36,  119 => 34,  111 => 37,  109 => 39,  106 => 35,  100 => 39,  95 => 30,  89 => 29,  86 => 28,  83 => 26,  80 => 26,  77 => 25,  74 => 21,  71 => 21,  68 => 20,  65 => 18,  60 => 16,  55 => 13,  49 => 11,  46 => 10,  43 => 13,  41 => 9,  38 => 8,  35 => 8,  31 => 4,  28 => 3,);
    }
}
