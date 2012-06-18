<?php

/* BehatViewerBundle::Default/feature-row.html.twig */
class __TwigTemplate_7b7c36fe1c7cf991586ce0cc39774f21 extends Twig_Template
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
        $context["steps"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(), "method");
        // line 2
        echo "
";
        // line 3
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["passed"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "passed"), "method");
        // line 4
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_passed_ / $_steps_) * 100), 3);
        // line 5
        echo "
";
        // line 6
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["failed"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "failed"), "method");
        // line 7
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_failed_ / $_steps_) * 100), 3);
        // line 8
        echo "
";
        // line 9
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["skipped"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "skipped"), "method");
        // line 10
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_skipped_ / $_steps_) * 100), 3);
        // line 11
        echo "
";
        // line 12
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["undefined"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "undefined"), "method");
        // line 13
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_undefined_ / $_steps_) * 100), 3);
        // line 14
        echo "
";
        // line 15
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        $context["pending"] = $this->getAttribute($_feature_, "getStepsHavingStatusCount", array(0 => "pending"), "method");
        // line 16
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($_pending_ / $_steps_) * 100), 3);
        // line 17
        echo "
<tr class=\"navig\">
    <td><strong>";
        // line 19
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_feature_, "name"), "html", null, true);
        echo "</strong></td>
    <td style=\"width: 10%\">";
        // line 20
        if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_passedpcnt_), "html", null, true);
        echo "%</td>
    <td style=\"min-width: 250px; width: 25%\" data-value=\"";
        // line 21
        if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
        echo twig_escape_filter($this->env, $_passedpcnt_, "html", null, true);
        echo "\">
        <div class=\"progress\">
            ";
        // line 23
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (($_passed_ > 0)) {
            // line 24
            echo "            <div class=\"bar progress-success\" style=\"width: ";
            if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_passedpcnt_, "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 26
        echo "            ";
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (($_failed_ > 0)) {
            // line 27
            echo "            <div class=\"bar progress-danger\" style=\"width: ";
            if (isset($context["failedpcnt"])) { $_failedpcnt_ = $context["failedpcnt"]; } else { $_failedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_failedpcnt_, "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 29
        echo "            ";
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if ((($_skipped_ + $_pending_) > 0)) {
            // line 30
            echo "            <div class=\"bar progress-info\" style=\"width: ";
            if (isset($context["skippedpcnt"])) { $_skippedpcnt_ = $context["skippedpcnt"]; } else { $_skippedpcnt_ = null; }
            if (isset($context["pendingpcnt"])) { $_pendingpcnt_ = $context["pendingpcnt"]; } else { $_pendingpcnt_ = null; }
            echo twig_escape_filter($this->env, ($_skippedpcnt_ + $_pendingpcnt_), "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 32
        echo "            ";
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (($_undefined_ > 0)) {
            // line 33
            echo "            <div class=\"bar progress-warning\" style=\"width: ";
            if (isset($context["undefinedpcnt"])) { $_undefinedpcnt_ = $context["undefinedpcnt"]; } else { $_undefinedpcnt_ = null; }
            echo twig_escape_filter($this->env, $_undefinedpcnt_, "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 35
        echo "        </div>
    </td>
    <td data-value=\"";
        // line 37
        if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
        echo twig_escape_filter($this->env, $_steps_, "html", null, true);
        echo "\">
        <ul class=\"pull-left\">
            ";
        // line 39
        if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
        if (($_passed_ > 0)) {
            // line 40
            echo "            <li><span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
            if (isset($context["passed"])) { $_passed_ = $context["passed"]; } else { $_passed_ = null; }
            echo twig_escape_filter($this->env, $_passed_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["passedpcnt"])) { $_passedpcnt_ = $context["passedpcnt"]; } else { $_passedpcnt_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_passedpcnt_), "html", null, true);
            echo "%)</span>
            </li>
            ";
        }
        // line 43
        echo "            ";
        if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
        if (($_failed_ > 0)) {
            // line 44
            echo "            <li><span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            if (isset($context["failed"])) { $_failed_ = $context["failed"]; } else { $_failed_ = null; }
            echo twig_escape_filter($this->env, $_failed_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["failedpcnt"])) { $_failedpcnt_ = $context["failedpcnt"]; } else { $_failedpcnt_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_failedpcnt_), "html", null, true);
            echo "%)</span>
            </li>
            ";
        }
        // line 47
        echo "            ";
        if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
        if (($_skipped_ > 0)) {
            // line 48
            echo "            <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
            if (isset($context["skipped"])) { $_skipped_ = $context["skipped"]; } else { $_skipped_ = null; }
            echo twig_escape_filter($this->env, $_skipped_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["skippedpcnt"])) { $_skippedpcnt_ = $context["skippedpcnt"]; } else { $_skippedpcnt_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_skippedpcnt_), "html", null, true);
            echo "%)</span>
            </li>
            ";
        }
        // line 51
        echo "            ";
        if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
        if (($_pending_ > 0)) {
            // line 52
            echo "            <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
            if (isset($context["pending"])) { $_pending_ = $context["pending"]; } else { $_pending_ = null; }
            echo twig_escape_filter($this->env, $_pending_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["pendingpcnt"])) { $_pendingpcnt_ = $context["pendingpcnt"]; } else { $_pendingpcnt_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_pendingpcnt_), "html", null, true);
            echo "%)</span>
            </li>
            ";
        }
        // line 55
        echo "            ";
        if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
        if (($_undefined_ > 0)) {
            // line 56
            echo "            <li><span class=\"warning\" style=\"color: #FBB450; font-weight: bold\">Undefined: ";
            if (isset($context["undefined"])) { $_undefined_ = $context["undefined"]; } else { $_undefined_ = null; }
            echo twig_escape_filter($this->env, $_undefined_, "html", null, true);
            echo "/";
            if (isset($context["steps"])) { $_steps_ = $context["steps"]; } else { $_steps_ = null; }
            echo twig_escape_filter($this->env, $_steps_, "html", null, true);
            echo " (";
            if (isset($context["undefinedpcnt"])) { $_undefinedpcnt_ = $context["undefinedpcnt"]; } else { $_undefinedpcnt_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($_undefinedpcnt_), "html", null, true);
            echo "%)</span>
            </li>
            ";
        }
        // line 59
        echo "        </ul>
    </td>
    <td class=\"action\">
        <a class=\"btn\" href=\"";
        // line 62
        if (isset($context["feature"])) { $_feature_ = $context["feature"]; } else { $_feature_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("slug" => $this->getAttribute($_feature_, "slug"))), "html", null, true);
        echo "\"
           data-action=\"details\">Details &raquo;</a>
    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Default/feature-row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 62,  234 => 59,  220 => 56,  216 => 55,  202 => 52,  198 => 51,  184 => 48,  180 => 47,  166 => 44,  162 => 43,  148 => 40,  145 => 39,  139 => 37,  135 => 35,  128 => 33,  124 => 32,  116 => 30,  111 => 29,  104 => 27,  100 => 26,  93 => 24,  90 => 23,  84 => 21,  79 => 20,  74 => 19,  70 => 17,  66 => 16,  63 => 15,  60 => 14,  56 => 13,  53 => 12,  43 => 9,  40 => 8,  36 => 7,  33 => 6,  30 => 5,  26 => 4,  23 => 3,  20 => 2,  58 => 17,  54 => 16,  50 => 11,  46 => 10,  42 => 13,  27 => 9,  17 => 1,);
    }
}
