<?php

/* BehatViewerBundle::Feature/scenario.html.twig */
class __TwigTemplate_29b8a9139235aabcb84de5fec100954c extends Twig_Template
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
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context["steps"] = $this->getAttribute($_scenario_, "getStepsCount");
        // line 2
        echo "
";
        // line 3
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context["passed"] = $this->getAttribute($_scenario_, "getStepsHavingStatusCount", array(0 => "passed"), "method");
        // line 4
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_passed_ / $_steps_) * 100));
        // line 5
        echo "
";
        // line 6
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context["failed"] = $this->getAttribute($_scenario_, "getStepsHavingStatusCount", array(0 => "failed"), "method");
        // line 7
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_failed_ / $_steps_) * 100));
        // line 8
        echo "
";
        // line 9
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context["skipped"] = $this->getAttribute($_scenario_, "getStepsHavingStatusCount", array(0 => "skipped"), "method");
        // line 10
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_skipped_ / $_steps_) * 100));
        // line 11
        echo "
";
        // line 12
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context["undefined"] = $this->getAttribute($_scenario_, "getStepsHavingStatusCount", array(0 => "undefined"), "method");
        // line 13
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_undefined_ / $_steps_) * 100));
        // line 14
        echo "
";
        // line 15
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context["pending"] = $this->getAttribute($_scenario_, "getStepsHavingStatusCount", array(0 => "pending"), "method");
        // line 16
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_pending_ / $_steps_) * 100));
        // line 17
        echo "
<h2 id=\"";
        // line 18
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_scenario_, "slug"), "html", null, true);
        echo "\">
    ";
        // line 19
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_scenario_, "name"), "html", null, true);
        echo "
    <small>
        <span>";
        // line 21
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        echo twig_escape_filter($this->env, $_steps_, "html", null, true);
        echo " step(s)</span> /
        ";
        // line 22
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (($_passed_ > 0)) {
            echo "<span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
            if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
            echo twig_escape_filter($this->env, $_passed_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_passedpcnt_, "html", null, true);
            echo "%)</span>";
        }
        // line 23
        echo "        ";
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if ((($_passed_ > 0) && (((($_failed_ > 0) || ($_skipped_ > 0)) || ($_pending_ > 0)) || ($_undefined_ > 0)))) {
            echo " / ";
        }
        // line 24
        echo "        ";
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (($_failed_ > 0)) {
            echo "<span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
            echo twig_escape_filter($this->env, $_failed_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["failedpcnt"])) { $_failedpcnt_ = $context["failedpcnt"]; } else { $_failedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_failedpcnt_, "html", null, true);
            echo "%)</span>";
        }
        // line 25
        echo "        ";
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if ((($_failed_ > 0) && ((($_skipped_ > 0) || ($_pending_ > 0)) || ($_undefined_ > 0)))) {
            echo " / ";
        }
        // line 26
        echo "        ";
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (($_skipped_ > 0)) {
            echo "<span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
            if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
            echo twig_escape_filter($this->env, $_skipped_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["skippedpcnt"])) { $_skippedpcnt_ = $context["skippedpcnt"]; } else { $_skippedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_skippedpcnt_, "html", null, true);
            echo "%)</span>";
        }
        // line 27
        echo "        ";
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if ((($_skipped_ > 0) && (($_pending_ > 0) || ($_undefined_ > 0)))) {
            echo " / ";
        }
        // line 28
        echo "        ";
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (($_pending_ > 0)) {
            echo "<span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
            if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
            echo twig_escape_filter($this->env, $_pending_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["pendingpcnt"])) { $_pendingpcnt_ = $context["pendingpcnt"]; } else { $_pendingpcnt_ = null; }
            echo twig_escape_filter($this->env, $_pendingpcnt_, "html", null, true);
            echo "%)</span>";
        }
        // line 29
        echo "        ";
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if ((($_pending_ > 0) && ($_undefined_ > 0))) {
            echo " / ";
        }
        // line 30
        echo "        ";
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (($_undefined_ > 0)) {
            echo "<span class=\"warning\" style=\"color: #FBB450; font-weight: bold\">Undefined: ";
            if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
            echo twig_escape_filter($this->env, $_undefined_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["undefinedpcnt"])) { $_undefinedpcnt_ = $context["undefinedpcnt"]; } else { $_undefinedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_undefinedpcnt_, "html", null, true);
            echo "%)</span>";
        }
        // line 31
        echo "    </small>
</h2>

<p>
    ";
        // line 35
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_scenario_, "tags"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 36
            echo "    <a href=\"";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.tag", array("slug" => $this->getAttribute($_tag_, "slug"))), "html", null, true);
            echo "\" class=\"label label-info\">";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tag_, "name"), "html", null, true);
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 38
        echo "</p>


";
        // line 41
        if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_scenario_, "steps"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["step"]) {
            // line 42
            $this->env->loadTemplate("BehatViewerBundle::Feature/step.html.twig")->display($context);
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['step'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 44
        echo "
<hr class=\"soften\"/>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Feature/scenario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 44,  244 => 42,  226 => 41,  221 => 38,  208 => 36,  203 => 35,  182 => 30,  175 => 29,  152 => 27,  137 => 26,  128 => 25,  103 => 23,  84 => 21,  73 => 18,  66 => 16,  63 => 15,  60 => 14,  56 => 13,  53 => 12,  50 => 11,  46 => 10,  43 => 9,  40 => 8,  36 => 7,  33 => 6,  30 => 5,  329 => 104,  316 => 102,  311 => 101,  303 => 95,  290 => 93,  285 => 92,  277 => 86,  268 => 84,  265 => 83,  261 => 82,  250 => 79,  246 => 78,  235 => 75,  231 => 74,  220 => 71,  216 => 70,  205 => 67,  202 => 66,  197 => 31,  188 => 61,  185 => 60,  181 => 59,  172 => 57,  169 => 56,  166 => 55,  150 => 45,  143 => 43,  139 => 42,  126 => 39,  119 => 37,  115 => 36,  108 => 34,  105 => 33,  96 => 26,  89 => 22,  82 => 21,  68 => 17,  65 => 16,  62 => 15,  58 => 14,  55 => 13,  52 => 12,  42 => 9,  32 => 6,  29 => 5,  23 => 3,  20 => 2,  26 => 4,  17 => 1,  167 => 41,  164 => 40,  160 => 28,  157 => 50,  154 => 28,  148 => 36,  134 => 35,  131 => 40,  113 => 24,  109 => 31,  107 => 28,  102 => 25,  99 => 24,  86 => 23,  81 => 21,  78 => 19,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  57 => 14,  51 => 13,  48 => 11,  45 => 10,  38 => 8,  35 => 7,  31 => 9,  28 => 5,  25 => 3,);
    }
}
