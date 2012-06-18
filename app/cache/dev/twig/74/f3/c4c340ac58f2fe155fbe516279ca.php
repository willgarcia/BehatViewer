<?php

/* BehatViewerBundle::Feature/sidebar.html.twig */
class __TwigTemplate_74f3c4c340ac58f2fe155fbe516279ca extends Twig_Template
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
        $context["steps"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount");
        // line 2
        $context["scenarios"] = $this->getAttribute($this->getContext($context, "feature"), "getScenariosCount");
        // line 3
        echo "
";
        // line 4
        $context["spassed"] = $this->getAttribute($this->getContext($context, "feature"), "getPassedScenariosCount");
        // line 5
        $context["sfailed"] = $this->getAttribute($this->getContext($context, "feature"), "getFailedScenariosCount");
        // line 6
        echo "
";
        // line 7
        $context["passed"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "passed"), "method");
        // line 8
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "passed") / $this->getContext($context, "steps")) * 100), 3);
        // line 9
        echo "
";
        // line 10
        $context["failed"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "failed"), "method");
        // line 11
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "failed") / $this->getContext($context, "steps")) * 100), 3);
        // line 12
        echo "
";
        // line 13
        $context["skipped"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "skipped"), "method");
        // line 14
        $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "skipped") / $this->getContext($context, "steps")) * 100), 3);
        // line 15
        echo "
";
        // line 16
        $context["undefined"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "undefined"), "method");
        // line 17
        $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "undefined") / $this->getContext($context, "steps")) * 100), 3);
        // line 18
        echo "
";
        // line 19
        $context["pending"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "pending"), "method");
        // line 20
        $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "pending") / $this->getContext($context, "steps")) * 100), 3);
        // line 21
        echo "

";
        // line 23
        if (($this->getAttribute($this->getContext($context, "feature"), "description") != "")) {
            // line 24
            echo "<p>";
            echo twig_escape_filter($this->env, nl2br($this->getAttribute($this->getContext($context, "feature"), "description")), "html", null, true);
            echo "</p>
";
        }
        // line 26
        echo "

<div class=\"well sidebar-nav clearfix\">
    <ul class=\"nav nav-list\">
        <li class=\"nav-header\">Summary</li>
        <li>
            <div class=\"progress\">
                ";
        // line 33
        if (($this->getContext($context, "passed") > 0)) {
            // line 34
            echo "                <div class=\"bar progress-success\" style=\"width: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "passedpcnt"), "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 36
        echo "                ";
        if (($this->getContext($context, "failed") > 0)) {
            // line 37
            echo "                <div class=\"bar progress-danger\" style=\"width: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "failedpcnt"), "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 39
        echo "                ";
        if ((($this->getContext($context, "skipped") + $this->getContext($context, "pending")) > 0)) {
            // line 40
            echo "                <div class=\"bar progress-info\" style=\"width: ";
            echo twig_escape_filter($this->env, ($this->getContext($context, "skippedpcnt") + $this->getContext($context, "pendingpcnt")), "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 42
        echo "                ";
        if (($this->getContext($context, "undefined") > 0)) {
            // line 43
            echo "                <div class=\"bar progress-warning\" style=\"width: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "undefinedpcnt"), "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 45
        echo "            </div>
        </li>
    </ul>
    <ul class=\"nav nav-list pull-left\">
        <li class=\"nav-header\">Feature:</li>
        <li><span class=\"success\" style=\"color: #62C462; font-weight: bold\">Completion: ";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
        echo "%</span>
        </li>
    </ul>
    <ul class=\"nav nav-list pull-left\">
        <li class=\"nav-header\">Scenarios:</li>
        ";
        // line 55
        if (($this->getContext($context, "spassed") > 0)) {
            // line 56
            echo "        <li><span class=\"success\"
                  style=\"color: #62C462; font-weight: bold\">Passed: ";
            // line 57
            echo twig_escape_filter($this->env, $this->getContext($context, "spassed"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "scenarios"), "html", null, true);
            echo "</span></li>
        ";
        }
        // line 59
        echo "        ";
        if (($this->getContext($context, "sfailed") > 0)) {
            // line 60
            echo "        <li><span class=\"danger\"
                  style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            // line 61
            echo twig_escape_filter($this->env, $this->getContext($context, "sfailed"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "scenarios"), "html", null, true);
            echo "</span></li>
        ";
        }
        // line 63
        echo "    </ul>
    <ul class=\"nav nav-list pull-left\">
        <li class=\"nav-header\">Steps:</li>
        ";
        // line 66
        if ($this->getContext($context, "passed")) {
            // line 67
            echo "        <li><span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "passed"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 70
        echo "        ";
        if ($this->getContext($context, "failed")) {
            // line 71
            echo "        <li><span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "failed"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 74
        echo "        ";
        if ($this->getContext($context, "skipped")) {
            // line 75
            echo "        <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "skipped"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 78
        echo "        ";
        if ($this->getContext($context, "pending")) {
            // line 79
            echo "        <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "pending"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 82
        echo "        ";
        if ($this->getContext($context, "undefined")) {
            // line 83
            echo "        <li><span class=\"warning\"
                  style=\"color: #FBB450; font-weight: bold\">Undefined: ";
            // line 84
            echo twig_escape_filter($this->env, $this->getContext($context, "undefined"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo "</span></li>
        ";
        }
        // line 86
        echo "    </ul>
</div>

<div class=\"well sidebar-nav\">
    <ul class=\"nav nav-list\">
        <li class=\"nav-header\">Scenarios</li>
        ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "feature"), "scenarios"));
        foreach ($context['_seq'] as $context["_key"] => $context["scenario"]) {
            // line 93
            echo "        <li><a href=\"#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "scenario"), "slug"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "scenario"), "name"), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scenario'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 95
        echo "    </ul>
</div>

<div class=\"well sidebar-nav\">
    <ul class=\"nav nav-list\">
        <li class=\"nav-header\">Features</li>
        ";
        // line 101
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "features"));
        foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
            // line 102
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("id" => $this->getAttribute($this->getContext($context, "feature"), "id"), "slug" => $this->getAttribute($this->getContext($context, "feature"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "name"), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 104
        echo "    </ul>
</div>


";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Feature/sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 104,  259 => 102,  255 => 101,  247 => 95,  236 => 93,  232 => 92,  224 => 86,  217 => 84,  214 => 83,  211 => 82,  202 => 79,  199 => 78,  190 => 75,  187 => 74,  178 => 71,  175 => 70,  166 => 67,  164 => 66,  159 => 63,  152 => 61,  149 => 60,  146 => 59,  139 => 57,  136 => 56,  134 => 55,  126 => 50,  119 => 45,  113 => 43,  110 => 42,  104 => 40,  101 => 39,  95 => 37,  92 => 36,  86 => 34,  84 => 33,  75 => 26,  69 => 24,  67 => 23,  63 => 21,  61 => 20,  59 => 19,  56 => 18,  54 => 17,  52 => 16,  49 => 15,  47 => 14,  45 => 13,  42 => 12,  40 => 11,  38 => 10,  35 => 9,  33 => 8,  31 => 7,  28 => 6,  26 => 5,  24 => 4,  21 => 3,  19 => 2,  17 => 1,);
    }
}
