<?php

/* SensioDistributionBundle:Configurator:steps.html.twig */
class __TwigTemplate_12668742739d6062812b725dbaa12eab extends Twig_Template
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
        echo "<div class=\"symfony-block-steps\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "count")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 3
            echo "
      ";
            // line 4
            if (($this->getContext($context, "i") == ($this->getContext($context, "index") + 1))) {
                // line 5
                echo "          <span class=\"selected\">Step ";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</span>
      ";
            } else {
                // line 7
                echo "          <span>Step ";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</span>
      ";
            }
            // line 9
            echo "
      ";
            // line 10
            if (($this->getContext($context, "i") != $this->getContext($context, "count"))) {
                // line 11
                echo "        &gt;
      ";
            }
            // line 13
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:steps.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  238 => 99,  231 => 95,  213 => 85,  114 => 34,  271 => 114,  262 => 111,  258 => 110,  250 => 108,  235 => 107,  228 => 103,  221 => 99,  65 => 17,  212 => 70,  206 => 67,  194 => 76,  155 => 51,  173 => 56,  170 => 56,  270 => 104,  259 => 102,  255 => 109,  214 => 95,  166 => 54,  149 => 60,  110 => 37,  101 => 26,  21 => 3,  201 => 80,  198 => 64,  191 => 69,  186 => 67,  183 => 69,  174 => 63,  169 => 55,  130 => 48,  61 => 16,  151 => 53,  175 => 66,  159 => 52,  150 => 43,  138 => 46,  98 => 32,  207 => 83,  202 => 79,  182 => 59,  157 => 55,  154 => 54,  118 => 36,  112 => 27,  66 => 23,  45 => 9,  36 => 6,  292 => 148,  287 => 147,  284 => 146,  278 => 142,  272 => 139,  266 => 135,  257 => 128,  248 => 107,  242 => 124,  239 => 123,  236 => 98,  232 => 92,  187 => 42,  147 => 58,  143 => 49,  83 => 26,  247 => 95,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 94,  225 => 41,  222 => 90,  217 => 87,  203 => 81,  199 => 78,  184 => 59,  180 => 68,  172 => 59,  168 => 55,  164 => 59,  160 => 68,  144 => 31,  140 => 52,  136 => 79,  119 => 47,  106 => 35,  100 => 39,  85 => 28,  76 => 25,  68 => 20,  56 => 14,  209 => 75,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 72,  165 => 38,  161 => 58,  152 => 50,  148 => 40,  145 => 49,  141 => 47,  134 => 49,  132 => 43,  127 => 43,  123 => 38,  109 => 36,  93 => 37,  90 => 36,  54 => 13,  133 => 49,  124 => 43,  111 => 33,  80 => 25,  60 => 16,  52 => 13,  72 => 17,  64 => 35,  53 => 23,  34 => 5,  26 => 3,  42 => 8,  97 => 38,  95 => 30,  88 => 32,  78 => 24,  71 => 20,  40 => 8,  224 => 91,  215 => 90,  211 => 82,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 75,  188 => 68,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 47,  146 => 59,  142 => 48,  137 => 51,  126 => 39,  120 => 37,  117 => 40,  103 => 28,  74 => 21,  47 => 15,  32 => 6,  22 => 3,  25 => 5,  23 => 3,  17 => 1,  92 => 37,  86 => 27,  79 => 28,  29 => 5,  24 => 3,  19 => 1,  69 => 21,  63 => 28,  58 => 16,  49 => 16,  43 => 12,  37 => 9,  20 => 2,  139 => 47,  131 => 48,  128 => 74,  125 => 36,  121 => 43,  115 => 39,  107 => 35,  99 => 34,  96 => 25,  91 => 31,  82 => 20,  77 => 24,  75 => 21,  57 => 15,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 5,  30 => 7,  27 => 4,  135 => 41,  129 => 38,  122 => 41,  116 => 65,  113 => 43,  108 => 29,  104 => 40,  102 => 35,  94 => 32,  89 => 22,  87 => 25,  84 => 29,  81 => 24,  73 => 23,  70 => 31,  67 => 15,  62 => 17,  59 => 21,  55 => 20,  51 => 18,  48 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
