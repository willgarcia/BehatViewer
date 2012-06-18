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
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "status") == "failed")) {
            // line 4
            $context["class"] = "danger";
        }
        // line 6
        echo "
";
        // line 7
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "status") == "skipped")) {
            // line 8
            $context["class"] = "info";
        }
        // line 10
        echo "
";
        // line 11
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "status") == "pending")) {
            // line 12
            $context["class"] = "info";
        }
        // line 14
        echo "
";
        // line 15
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "status") == "undefined")) {
            // line 16
            $context["class"] = "warning";
        }
        // line 18
        echo "
<div class=\"alert alert-";
        // line 19
        if (isset($context["class"])) { $_class_ = $context["class"]; } else { $_class_ = null; }
        echo twig_escape_filter($this->env, $_class_, "html", null, true);
        echo " clearfix\">
    <h4 class=\"alert-heading\">
        ";
        // line 21
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if ($this->getAttribute($_step_, "background")) {
            echo "[Background]";
        }
        // line 22
        echo "        ";
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_step_, "type"), "html", null, true);
        echo " ";
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_step_, "text"), "html", null, true);
        echo "
    </h4>

    ";
        // line 25
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "argument") != "")) {
            // line 26
            echo "    <pre class=\"prettyprint linenums argument\" id=\"argument-";
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "id"), "html", null, true);
            echo "\"><code>";
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "argument"), "html", null, true);
            echo "</code></pre>
    ";
        }
        // line 28
        echo "
    <div class=\"clearfix\">
        ";
        // line 30
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_step_, "file"), "html", null, true);
        echo " : ";
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_step_, "line"), "html", null, true);
        echo "
        ";
        // line 31
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "definition") != "")) {
            // line 32
            echo "        <br/>
        <small>";
            // line 33
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "definition"), "html", null, true);
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
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "status") == "failed")) {
            // line 40
            echo "            ";
            $context["class"] = "danger";
            // line 41
            echo "            ";
        }
        // line 42
        echo "            ";
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "status") == "undefined")) {
            // line 43
            echo "            ";
            $context["class"] = "warning";
            // line 44
            echo "            ";
        }
        // line 45
        echo "            ";
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (twig_in_filter($this->getAttribute($_step_, "status"), array(0 => "skipped", 1 => "pending"))) {
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
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (((!twig_in_filter($this->getAttribute($_step_, "status"), array(0 => "skipped", 1 => "pending", 2 => "undefined"))) && ($this->getAttribute($_step_, "screen") != ""))) {
            // line 50
            echo "            <button class=\"btn btn-";
            if (isset($context["class"])) { $_class_ = $context["class"]; } else { $_class_ = null; }
            echo twig_escape_filter($this->env, $_class_, "html", null, true);
            echo "\" data-rel=\"screenshot\" data-toggle=\"screenshot-";
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "id"), "html", null, true);
            echo "\">
                Screenshot
            </button>
            ";
        }
        // line 54
        echo "
            ";
        // line 55
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "snippet") != "")) {
            // line 56
            echo "            <button class=\"btn btn-";
            if (isset($context["class"])) { $_class_ = $context["class"]; } else { $_class_ = null; }
            echo twig_escape_filter($this->env, $_class_, "html", null, true);
            echo "\" data-rel=\"snippet\" data-toggle=\"snippet-";
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "id"), "html", null, true);
            echo "\">Snippet</button>
            ";
        }
        // line 58
        echo "        </div>
    </div>

    ";
        // line 61
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "snippet") != "")) {
            // line 62
            echo "    <br/>
    <pre class=\"prettyprint linenums snippet\" id=\"snippet-";
            // line 63
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "id"), "html", null, true);
            echo "\"><code
        class=\"language-php\">";
            // line 64
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "snippet"), "html", null, true);
            echo "</code></pre>
    ";
        }
        // line 66
        echo "
    ";
        // line 67
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "exception") != "")) {
            // line 68
            echo "    <br/>
    <pre class=\"exception\" id=\"exception-";
            // line 69
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "exception"), "html", null, true);
            echo "</pre>
    ";
        }
        // line 71
        echo "
    ";
        // line 72
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        if (($this->getAttribute($_step_, "screen") != "")) {
            // line 73
            echo "    <p style=\"text-align: center\" id=\"screenshot-";
            if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_step_, "id"), "html", null, true);
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
        return array (  241 => 75,  234 => 73,  228 => 71,  219 => 69,  213 => 67,  210 => 66,  204 => 64,  199 => 63,  196 => 62,  193 => 61,  178 => 56,  151 => 47,  144 => 45,  141 => 44,  138 => 43,  124 => 39,  122 => 38,  117 => 35,  111 => 33,  97 => 30,  93 => 28,  83 => 26,  80 => 25,  69 => 22,  64 => 21,  49 => 15,  37 => 10,  34 => 8,  22 => 3,  19 => 2,  258 => 44,  244 => 42,  226 => 41,  221 => 38,  208 => 36,  203 => 35,  182 => 30,  175 => 55,  152 => 27,  137 => 26,  128 => 40,  103 => 23,  84 => 21,  73 => 18,  66 => 16,  63 => 15,  60 => 14,  56 => 13,  53 => 12,  50 => 11,  46 => 14,  43 => 12,  40 => 11,  36 => 7,  33 => 6,  30 => 5,  329 => 104,  316 => 102,  311 => 101,  303 => 95,  290 => 93,  285 => 92,  277 => 86,  268 => 84,  265 => 83,  261 => 82,  250 => 79,  246 => 78,  235 => 75,  231 => 72,  220 => 71,  216 => 68,  205 => 67,  202 => 66,  197 => 31,  188 => 58,  185 => 60,  181 => 59,  172 => 54,  169 => 56,  166 => 55,  150 => 45,  143 => 43,  139 => 42,  126 => 39,  119 => 37,  115 => 36,  108 => 32,  105 => 31,  96 => 26,  89 => 22,  82 => 21,  68 => 17,  65 => 16,  62 => 15,  58 => 19,  55 => 18,  52 => 16,  42 => 9,  32 => 6,  29 => 5,  23 => 3,  20 => 2,  26 => 4,  17 => 1,  167 => 41,  164 => 40,  160 => 50,  157 => 49,  154 => 48,  148 => 46,  134 => 42,  131 => 41,  113 => 24,  109 => 31,  107 => 28,  102 => 25,  99 => 24,  86 => 23,  81 => 21,  78 => 19,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  57 => 14,  51 => 13,  48 => 11,  45 => 10,  38 => 8,  35 => 7,  31 => 7,  28 => 6,  25 => 4,);
    }
}
