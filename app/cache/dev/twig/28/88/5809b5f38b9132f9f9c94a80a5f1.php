<?php

/* SensioDistributionBundle:Configurator:check.html.twig */
class __TwigTemplate_28885809b5f38b9132f9f9c94a80a5f1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (twig_length_filter($this->env, $this->getContext($context, "majors"))) {
            // line 5
            echo "        <h1>Major Problems that need to be fixed now</h1>
        <p>
            We have detected <strong>";
            // line 7
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "majors")), "html", null, true);
            echo "</strong> major problems.
            You <em>must</em> fix them before continuing:
        </p>
        <ol>
            ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "majors"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 12
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 14
            echo "        </ol>
    ";
        }
        // line 16
        echo "
    ";
        // line 17
        if (twig_length_filter($this->env, $this->getContext($context, "minors"))) {
            // line 18
            echo "        <h1>Some Recommandations</h1>

        <p>
            ";
            // line 21
            if (twig_length_filter($this->env, $this->getContext($context, "majors"))) {
                // line 22
                echo "            Additionally, we
            ";
            } else {
                // line 24
                echo "            We
            ";
            }
            // line 26
            echo "            have detected some minor problems that we <em>recommend</em> you to fix to have a better Symfony
            experience:

            <ol>
                ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "minors"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 31
                echo "                    <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 33
            echo "            </ol>
        </p>

    ";
        }
        // line 37
        echo "
    ";
        // line 38
        if ((!twig_length_filter($this->env, $this->getContext($context, "majors")))) {
            // line 39
            echo "        <ul class=\"symfony_list\">
            <li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
            echo "\">Configure your Symfony Application online</a></li>
        </p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:check.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 37,  1000 => 291,  995 => 290,  993 => 289,  990 => 288,  974 => 284,  952 => 283,  950 => 282,  947 => 281,  935 => 276,  931 => 275,  926 => 274,  924 => 273,  921 => 272,  912 => 266,  906 => 264,  903 => 263,  898 => 262,  896 => 261,  893 => 260,  886 => 255,  877 => 253,  873 => 252,  870 => 251,  867 => 250,  865 => 249,  862 => 248,  854 => 244,  852 => 243,  849 => 242,  842 => 237,  839 => 236,  831 => 231,  827 => 230,  823 => 229,  820 => 228,  818 => 227,  815 => 226,  807 => 222,  805 => 221,  802 => 220,  794 => 214,  792 => 213,  789 => 212,  781 => 208,  778 => 207,  776 => 206,  773 => 205,  752 => 201,  749 => 200,  746 => 199,  743 => 198,  741 => 197,  738 => 196,  730 => 190,  727 => 189,  725 => 188,  722 => 187,  715 => 184,  712 => 183,  709 => 182,  701 => 178,  698 => 177,  696 => 176,  693 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  502 => 92,  498 => 91,  494 => 90,  490 => 89,  485 => 88,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 78,  450 => 77,  434 => 73,  432 => 72,  429 => 71,  419 => 65,  416 => 64,  413 => 63,  407 => 61,  405 => 60,  400 => 59,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  374 => 51,  366 => 49,  361 => 48,  357 => 47,  352 => 46,  349 => 45,  347 => 44,  344 => 43,  335 => 39,  319 => 35,  300 => 32,  295 => 31,  285 => 28,  267 => 21,  256 => 16,  253 => 15,  245 => 12,  233 => 6,  226 => 4,  223 => 3,  219 => 288,  216 => 287,  167 => 217,  332 => 137,  329 => 136,  323 => 37,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 33,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 27,  276 => 117,  238 => 99,  231 => 95,  213 => 85,  114 => 146,  271 => 114,  262 => 111,  258 => 110,  250 => 14,  235 => 107,  228 => 5,  221 => 99,  65 => 18,  212 => 70,  206 => 271,  194 => 76,  155 => 196,  173 => 220,  170 => 219,  270 => 22,  259 => 17,  255 => 109,  214 => 281,  166 => 54,  149 => 193,  110 => 39,  101 => 26,  21 => 3,  201 => 260,  198 => 259,  191 => 242,  186 => 67,  183 => 236,  174 => 63,  169 => 55,  130 => 48,  61 => 16,  151 => 53,  175 => 225,  159 => 52,  150 => 43,  138 => 46,  98 => 32,  207 => 83,  202 => 79,  182 => 59,  157 => 204,  154 => 54,  118 => 36,  112 => 141,  66 => 23,  45 => 9,  36 => 7,  292 => 30,  287 => 29,  284 => 146,  278 => 142,  272 => 23,  266 => 135,  257 => 128,  248 => 13,  242 => 124,  239 => 123,  236 => 98,  232 => 92,  187 => 42,  147 => 187,  143 => 49,  83 => 26,  247 => 95,  244 => 88,  240 => 54,  237 => 7,  234 => 52,  229 => 94,  225 => 41,  222 => 90,  217 => 87,  203 => 269,  199 => 78,  184 => 59,  180 => 235,  172 => 59,  168 => 55,  164 => 59,  160 => 205,  144 => 186,  140 => 52,  136 => 79,  119 => 153,  106 => 35,  100 => 39,  85 => 28,  76 => 24,  68 => 20,  56 => 14,  209 => 272,  205 => 82,  196 => 248,  192 => 78,  189 => 73,  178 => 226,  176 => 72,  165 => 212,  161 => 58,  152 => 195,  148 => 40,  145 => 49,  141 => 47,  134 => 174,  132 => 168,  127 => 161,  123 => 38,  109 => 140,  93 => 28,  90 => 31,  54 => 11,  133 => 49,  124 => 160,  111 => 33,  80 => 26,  60 => 16,  52 => 3,  72 => 22,  64 => 26,  53 => 23,  34 => 5,  26 => 3,  42 => 8,  97 => 114,  95 => 30,  88 => 32,  78 => 24,  71 => 20,  40 => 8,  224 => 91,  215 => 90,  211 => 280,  204 => 84,  200 => 87,  195 => 80,  193 => 247,  190 => 75,  188 => 241,  185 => 239,  179 => 72,  177 => 67,  171 => 67,  162 => 211,  158 => 57,  156 => 56,  153 => 47,  146 => 59,  142 => 182,  137 => 175,  126 => 39,  120 => 37,  117 => 147,  103 => 28,  74 => 70,  47 => 12,  32 => 5,  22 => 3,  25 => 5,  23 => 3,  17 => 1,  92 => 98,  86 => 30,  79 => 76,  29 => 4,  24 => 3,  19 => 1,  69 => 42,  63 => 17,  58 => 16,  49 => 2,  43 => 11,  37 => 9,  20 => 2,  139 => 181,  131 => 48,  128 => 74,  125 => 36,  121 => 43,  115 => 39,  107 => 134,  99 => 33,  96 => 25,  91 => 27,  82 => 77,  77 => 71,  75 => 21,  57 => 12,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 5,  30 => 7,  27 => 4,  135 => 41,  129 => 167,  122 => 154,  116 => 65,  113 => 40,  108 => 38,  104 => 133,  102 => 126,  94 => 113,  89 => 97,  87 => 83,  84 => 82,  81 => 24,  73 => 23,  70 => 21,  67 => 27,  62 => 21,  59 => 20,  55 => 20,  51 => 18,  48 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
