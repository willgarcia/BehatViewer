<?php

/* BehatViewerBundle::Feature/step.html.twig */
class __TwigTemplate_1db19a1b7fa23eef7e28fda8c72cdb1f extends Twig_Template
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
        $context["class"] = "success";
        // line 2
        echo "
";
        // line 3
        if (($this->getAttribute($this->getContext($context, "step"), "status") == "failed")) {
            // line 4
            $context["class"] = "danger";
        }
        // line 6
        echo "
";
        // line 7
        if (($this->getAttribute($this->getContext($context, "step"), "status") == "skipped")) {
            // line 8
            $context["class"] = "info";
        }
        // line 10
        echo "
";
        // line 11
        if (($this->getAttribute($this->getContext($context, "step"), "status") == "pending")) {
            // line 12
            $context["class"] = "info";
        }
        // line 14
        echo "
";
        // line 15
        if (($this->getAttribute($this->getContext($context, "step"), "status") == "undefined")) {
            // line 16
            $context["class"] = "warning";
        }
        // line 18
        echo "
<div class=\"alert alert-";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "class"), "html", null, true);
        echo " clearfix\">
    <h4 class=\"alert-heading\">
        ";
        // line 21
        if ($this->getAttribute($this->getContext($context, "step"), "background")) {
            echo "[Background]";
        }
        // line 22
        echo "        ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "type"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "text"), "html", null, true);
        echo "
    </h4>

    ";
        // line 25
        if (($this->getAttribute($this->getContext($context, "step"), "argument") != "")) {
            // line 26
            echo "    <pre class=\"prettyprint linenums argument\" id=\"argument-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "id"), "html", null, true);
            echo "\"><code>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "argument"), "html", null, true);
            echo "</code></pre>
    ";
        }
        // line 28
        echo "
    <div class=\"clearfix\">
        ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "file"), "html", null, true);
        echo " : ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "line"), "html", null, true);
        echo "
        ";
        // line 31
        if (($this->getAttribute($this->getContext($context, "step"), "definition") != "")) {
            // line 32
            echo "        <br/>
        <small>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "definition"), "html", null, true);
            echo "</small>
        ";
        }
        // line 35
        echo "

        <div class=\"btn-group pull-right\">
            ";
        // line 38
        $context["class"] = "success";
        // line 39
        echo "            ";
        if (($this->getAttribute($this->getContext($context, "step"), "status") == "failed")) {
            // line 40
            echo "            ";
            $context["class"] = "danger";
            // line 41
            echo "            ";
        }
        // line 42
        echo "            ";
        if (($this->getAttribute($this->getContext($context, "step"), "status") == "undefined")) {
            // line 43
            echo "            ";
            $context["class"] = "warning";
            // line 44
            echo "            ";
        }
        // line 45
        echo "            ";
        if (twig_in_filter($this->getAttribute($this->getContext($context, "step"), "status"), array(0 => "skipped", 1 => "pending"))) {
            // line 46
            echo "            ";
            $context["class"] = "info";
            // line 47
            echo "            ";
        }
        // line 48
        echo "
            ";
        // line 49
        if (((!twig_in_filter($this->getAttribute($this->getContext($context, "step"), "status"), array(0 => "skipped", 1 => "pending", 2 => "undefined"))) && ($this->getAttribute($this->getContext($context, "step"), "screen") != ""))) {
            // line 50
            echo "            <button class=\"btn btn-";
            echo twig_escape_filter($this->env, $this->getContext($context, "class"), "html", null, true);
            echo "\" data-rel=\"screenshot\" data-toggle=\"screenshot-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "id"), "html", null, true);
            echo "\">
                Screenshot
            </button>
            ";
        }
        // line 54
        echo "
            ";
        // line 55
        if (($this->getAttribute($this->getContext($context, "step"), "snippet") != "")) {
            // line 56
            echo "            <button class=\"btn btn-";
            echo twig_escape_filter($this->env, $this->getContext($context, "class"), "html", null, true);
            echo "\" data-rel=\"snippet\" data-toggle=\"snippet-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "id"), "html", null, true);
            echo "\">Snippet</button>
            ";
        }
        // line 58
        echo "        </div>
    </div>

    ";
        // line 61
        if (($this->getAttribute($this->getContext($context, "step"), "snippet") != "")) {
            // line 62
            echo "    <br/>
    <pre class=\"prettyprint linenums snippet\" id=\"snippet-";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "id"), "html", null, true);
            echo "\"><code
        class=\"language-php\">";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "snippet"), "html", null, true);
            echo "</code></pre>
    ";
        }
        // line 66
        echo "
    ";
        // line 67
        if (($this->getAttribute($this->getContext($context, "step"), "exception") != "")) {
            // line 68
            echo "    <br/>
    <pre class=\"exception\" id=\"exception-";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "exception"), "html", null, true);
            echo "</pre>
    ";
        }
        // line 71
        echo "
    ";
        // line 72
        if (($this->getAttribute($this->getContext($context, "step"), "screen") != "")) {
            // line 73
            echo "    <p style=\"text-align: center\" id=\"screenshot-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "step"), "id"), "html", null, true);
            echo "\" class=\"screenshot\"></p>
    ";
        }
        // line 75
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Feature/step.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 75,  203 => 73,  198 => 71,  191 => 69,  188 => 68,  186 => 67,  183 => 66,  174 => 63,  171 => 62,  169 => 61,  156 => 56,  130 => 46,  127 => 45,  124 => 44,  121 => 43,  109 => 39,  107 => 38,  102 => 35,  97 => 33,  82 => 28,  74 => 26,  72 => 25,  51 => 18,  46 => 15,  32 => 8,  201 => 72,  170 => 41,  165 => 38,  154 => 55,  150 => 35,  133 => 47,  128 => 29,  117 => 28,  112 => 40,  96 => 25,  85 => 24,  80 => 23,  70 => 22,  57 => 18,  50 => 15,  43 => 14,  36 => 9,  22 => 3,  270 => 104,  259 => 102,  255 => 101,  247 => 95,  236 => 93,  232 => 92,  224 => 86,  217 => 84,  214 => 83,  211 => 82,  202 => 79,  199 => 78,  190 => 75,  187 => 42,  178 => 64,  175 => 70,  166 => 67,  164 => 58,  159 => 63,  152 => 61,  149 => 60,  146 => 59,  139 => 49,  136 => 48,  134 => 55,  126 => 50,  119 => 45,  113 => 43,  110 => 42,  104 => 40,  101 => 26,  95 => 37,  86 => 30,  75 => 26,  67 => 23,  63 => 22,  54 => 19,  52 => 16,  49 => 15,  47 => 14,  45 => 13,  42 => 12,  40 => 12,  35 => 10,  28 => 6,  24 => 4,  21 => 3,  19 => 2,  30 => 7,  26 => 5,  17 => 1,  151 => 54,  148 => 40,  144 => 31,  141 => 50,  138 => 28,  132 => 36,  118 => 42,  115 => 41,  98 => 33,  94 => 32,  92 => 31,  87 => 25,  84 => 33,  73 => 22,  69 => 24,  66 => 21,  64 => 19,  61 => 19,  59 => 21,  56 => 18,  48 => 16,  44 => 13,  41 => 12,  38 => 11,  33 => 8,  31 => 7,  29 => 6,  27 => 6,  25 => 3,);
    }
}
