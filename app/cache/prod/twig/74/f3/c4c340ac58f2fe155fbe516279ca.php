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
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["steps"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount");
        // line 2
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["scenarios"] = $this->getAttribute($_feature_, "getScenariosCount");
        // line 3
        echo "
";
        // line 4
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["spassed"] = $this->getAttribute($_feature_, "getPassedScenariosCount");
        // line 5
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["sfailed"] = $this->getAttribute($_feature_, "getFailedScenariosCount");
        // line 6
        echo "
";
        // line 7
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["passed"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "passed"), "method");
        // line 8
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_passed_ / $_steps_) * 100), 3);
        // line 9
        echo "
";
        // line 10
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["failed"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "failed"), "method");
        // line 11
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_failed_ / $_steps_) * 100), 3);
        // line 12
        echo "
";
        // line 13
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["skipped"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "skipped"), "method");
        // line 14
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_skipped_ / $_steps_) * 100), 3);
        // line 15
        echo "
";
        // line 16
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["undefined"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "undefined"), "method");
        // line 17
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_undefined_ / $_steps_) * 100), 3);
        // line 18
        echo "
";
        // line 19
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["pending"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "pending"), "method");
        // line 20
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_pending_ / $_steps_) * 100), 3);
        // line 21
        echo "

";
        // line 23
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        if (($this->getAttribute($_feature_, "description") != "")) {
            // line 24
            echo "<p>";
            if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
            echo twig_escape_filter($this->env, nl2br($this->getAttribute($_feature_, "description")), "html", null, true);
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
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (($_passed_ > 0)) {
            // line 34
            echo "                <div class=\"bar progress-success\" style=\"width: ";
            if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_passedpcnt_, "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 36
        echo "                ";
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (($_failed_ > 0)) {
            // line 37
            echo "                <div class=\"bar progress-danger\" style=\"width: ";
            if (isset($context["failedpcnt"])) { $_failedpcnt_ = $context["failedpcnt"]; } else { $_failedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_failedpcnt_, "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 39
        echo "                ";
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if ((($_skipped_ + $_pending_) > 0)) {
            // line 40
            echo "                <div class=\"bar progress-info\" style=\"width: ";
            if (isset($context["skippedpcnt"])) { $_skippedpcnt_ = $context["skippedpcnt"]; } else { $_skippedpcnt_ = null; }
            if (isset($context["pendingpcnt"])) { $_pendingpcnt_ = $context["pendingpcnt"]; } else { $_pendingpcnt_ = null; }
            echo twig_escape_filter($this->env, ($_skippedpcnt_ + $_pendingpcnt_), "html", null, true);
            echo "%;\"></div>
                ";
        }
        // line 42
        echo "                ";
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (($_undefined_ > 0)) {
            // line 43
            echo "                <div class=\"bar progress-warning\" style=\"width: ";
            if (isset($context["undefinedpcnt"])) { $_undefinedpcnt_ = $context["undefinedpcnt"]; } else { $_undefinedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_undefinedpcnt_, "html", null, true);
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
        if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_passedpcnt_), "html", null, true);
        echo "%</span>
        </li>
    </ul>
    <ul class=\"nav nav-list pull-left\">
        <li class=\"nav-header\">Scenarios:</li>
        ";
        // line 55
        if (isset($context["spassed"])) { $_spassed_ = $context["spassed"]; } else { $_spassed_ = null; }
        if (($_spassed_ > 0)) {
            // line 56
            echo "        <li><span class=\"success\"
                  style=\"color: #62C462; font-weight: bold\">Passed: ";
            // line 57
            if (isset($context["spassed"])) { $_spassed_ = $context["spassed"]; } else { $_spassed_ = null; }
            echo twig_escape_filter($this->env, $_spassed_, "html", null, true);
            echo " / ";
            if (isset($context["scenarios"])) { $_scenarios_ = $context["scenarios"]; } else { $_scenarios_ = null; }
            echo twig_escape_filter($this->env, $_scenarios_, "html", null, true);
            echo "</span></li>
        ";
        }
        // line 59
        echo "        ";
        if (isset($context["sfailed"])) { $_sfailed_ = $context["sfailed"]; } else { $_sfailed_ = null; }
        if (($_sfailed_ > 0)) {
            // line 60
            echo "        <li><span class=\"danger\"
                  style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            // line 61
            if (isset($context["sfailed"])) { $_sfailed_ = $context["sfailed"]; } else { $_sfailed_ = null; }
            echo twig_escape_filter($this->env, $_sfailed_, "html", null, true);
            echo " / ";
            if (isset($context["scenarios"])) { $_scenarios_ = $context["scenarios"]; } else { $_scenarios_ = null; }
            echo twig_escape_filter($this->env, $_scenarios_, "html", null, true);
            echo "</span></li>
        ";
        }
        // line 63
        echo "    </ul>
    <ul class=\"nav nav-list pull-left\">
        <li class=\"nav-header\">Steps:</li>
        ";
        // line 66
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if ($_passed_) {
            // line 67
            echo "        <li><span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
            if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
            echo twig_escape_filter($this->env, $_passed_, "html", null, true);
            echo " / ";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 70
        echo "        ";
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if ($_failed_) {
            // line 71
            echo "        <li><span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
            echo twig_escape_filter($this->env, $_failed_, "html", null, true);
            echo " / ";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 74
        echo "        ";
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if ($_skipped_) {
            // line 75
            echo "        <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
            if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
            echo twig_escape_filter($this->env, $_skipped_, "html", null, true);
            echo " / ";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 78
        echo "        ";
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if ($_pending_) {
            // line 79
            echo "        <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
            if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
            echo twig_escape_filter($this->env, $_pending_, "html", null, true);
            echo " / ";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo "</span>
        </li>
        ";
        }
        // line 82
        echo "        ";
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if ($_undefined_) {
            // line 83
            echo "        <li><span class=\"warning\"
                  style=\"color: #FBB450; font-weight: bold\">Undefined: ";
            // line 84
            if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
            echo twig_escape_filter($this->env, $_undefined_, "html", null, true);
            echo " / ";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
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
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_feature_, "scenarios"));
        foreach ($context['_seq'] as $context["_key"] => $context["scenario"]) {
            // line 93
            echo "        <li><a href=\"#";
            if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_scenario_, "slug"), "html", null, true);
            echo "\">";
            if (isset($context["scenario"])) { $_scenario_ = $context["scenario"]; } else { $_scenario_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_scenario_, "name"), "html", null, true);
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
        if (isset($context["features"])) { $_features_ = $context["features"]; } else { $_features_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_features_);
        foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
            // line 102
            echo "        <li><a href=\"";
            if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("slug" => $this->getAttribute($_feature_, "slug"))), "html", null, true);
            echo "\">";
            if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_feature_, "name"), "html", null, true);
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
        return array (  329 => 104,  316 => 102,  311 => 101,  303 => 95,  290 => 93,  285 => 92,  277 => 86,  268 => 84,  265 => 83,  261 => 82,  250 => 79,  246 => 78,  235 => 75,  231 => 74,  220 => 71,  216 => 70,  205 => 67,  202 => 66,  197 => 63,  188 => 61,  185 => 60,  181 => 59,  172 => 57,  169 => 56,  166 => 55,  150 => 45,  143 => 43,  139 => 42,  126 => 39,  119 => 37,  115 => 36,  108 => 34,  105 => 33,  96 => 26,  89 => 24,  82 => 21,  68 => 17,  65 => 16,  62 => 15,  58 => 14,  55 => 13,  52 => 12,  42 => 9,  32 => 6,  29 => 5,  23 => 3,  20 => 2,  26 => 4,  17 => 1,  167 => 41,  164 => 40,  160 => 30,  157 => 50,  154 => 28,  148 => 36,  134 => 35,  131 => 40,  113 => 33,  109 => 31,  107 => 28,  102 => 25,  99 => 24,  86 => 23,  81 => 21,  78 => 20,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  57 => 14,  51 => 13,  48 => 11,  45 => 10,  38 => 8,  35 => 7,  31 => 9,  28 => 5,  25 => 3,);
    }
}
