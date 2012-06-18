<?php

/* WebProfilerBundle:Profiler:header.html.twig */
class __TwigTemplate_83e2234b0b3cb322093256a412ed72f7 extends Twig_Template
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
        echo "<div id=\"header\" class=\"clear_fix\">
    <h1>
        <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/logo_symfony_profiler.gif"), "html", null, true);
        echo "\" alt=\"Symfony profiler\"/>
    </h1>

    <div class=\"search\">
        <form method=\"get\" action=\"http://symfony.com/search\">
            <div class=\"form_row\">
                <label for=\"search_id\">
                    <img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/grey_magnifier.png"), "html", null, true);
        echo "\" alt=\"Search on Symfony website\"/>
                </label>

                <input name=\"q\" id=\"search_id\" type=\"search\" placeholder=\"Search on Symfony website\"/>

                <button type=\"submit\">
                    <span class=\"border_l\">
                        <span class=\"border_r\">
                            <span class=\"btn_bg\">OK</span>
                        </span>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 70,  206 => 67,  194 => 62,  155 => 51,  173 => 56,  170 => 55,  270 => 104,  259 => 102,  255 => 101,  214 => 83,  166 => 54,  149 => 60,  110 => 37,  101 => 26,  21 => 3,  201 => 65,  198 => 64,  191 => 69,  186 => 67,  183 => 59,  174 => 63,  169 => 55,  130 => 75,  61 => 21,  151 => 91,  175 => 70,  159 => 52,  150 => 35,  138 => 46,  98 => 32,  207 => 69,  202 => 79,  182 => 59,  157 => 52,  154 => 92,  118 => 66,  112 => 27,  66 => 21,  45 => 13,  36 => 9,  292 => 148,  287 => 147,  284 => 146,  278 => 142,  272 => 139,  266 => 135,  257 => 128,  248 => 125,  242 => 124,  239 => 123,  236 => 93,  232 => 92,  187 => 42,  147 => 58,  143 => 51,  83 => 21,  247 => 95,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 48,  225 => 41,  222 => 40,  217 => 84,  203 => 66,  199 => 78,  184 => 59,  180 => 58,  172 => 59,  168 => 55,  164 => 66,  160 => 68,  144 => 31,  140 => 47,  136 => 79,  119 => 35,  106 => 57,  100 => 33,  85 => 24,  76 => 29,  68 => 27,  56 => 18,  209 => 75,  205 => 82,  196 => 63,  192 => 78,  189 => 62,  178 => 71,  176 => 72,  165 => 38,  161 => 61,  152 => 50,  148 => 40,  145 => 48,  141 => 47,  134 => 49,  132 => 36,  127 => 43,  123 => 49,  109 => 39,  93 => 37,  90 => 32,  54 => 17,  133 => 30,  124 => 43,  111 => 34,  80 => 26,  60 => 26,  52 => 16,  72 => 25,  64 => 20,  53 => 13,  34 => 6,  26 => 4,  42 => 10,  97 => 33,  95 => 31,  88 => 23,  78 => 24,  71 => 23,  40 => 11,  224 => 86,  215 => 90,  211 => 82,  204 => 84,  200 => 97,  195 => 80,  193 => 79,  190 => 75,  188 => 68,  185 => 60,  179 => 72,  177 => 71,  171 => 62,  162 => 63,  158 => 61,  156 => 51,  153 => 47,  146 => 59,  142 => 47,  137 => 51,  126 => 40,  120 => 40,  117 => 40,  103 => 39,  74 => 26,  47 => 16,  32 => 7,  22 => 3,  25 => 3,  23 => 3,  17 => 1,  92 => 47,  86 => 28,  79 => 26,  29 => 6,  24 => 3,  19 => 2,  69 => 24,  63 => 21,  58 => 22,  49 => 15,  43 => 12,  37 => 9,  20 => 2,  139 => 50,  131 => 48,  128 => 74,  125 => 42,  121 => 43,  115 => 39,  107 => 35,  99 => 34,  96 => 25,  91 => 30,  82 => 27,  77 => 31,  75 => 24,  57 => 19,  50 => 17,  46 => 15,  44 => 13,  39 => 10,  33 => 8,  30 => 4,  27 => 3,  135 => 64,  129 => 41,  122 => 41,  116 => 65,  113 => 37,  108 => 29,  104 => 56,  102 => 35,  94 => 48,  89 => 29,  87 => 25,  84 => 33,  81 => 39,  73 => 24,  70 => 31,  67 => 23,  62 => 19,  59 => 19,  55 => 14,  51 => 18,  48 => 16,  41 => 12,  38 => 9,  35 => 8,  31 => 10,  28 => 6,);
    }
}
