<?php

/* BehatViewerBundle::Default/feature.html.twig */
class __TwigTemplate_beda333a1896062ff9afab3818ee1baa extends Twig_Template
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
        $context["steps"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(), "method");
        // line 2
        echo "
";
        // line 3
        if (($this->getContext($context, "steps") > 0)) {
            // line 4
            $context["passed"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "passed"), "method");
            // line 5
            $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "passed") / $this->getContext($context, "steps")) * 100), 3);
            // line 6
            echo "
";
            // line 7
            $context["failed"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "failed"), "method");
            // line 8
            $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "failed") / $this->getContext($context, "steps")) * 100), 3);
            // line 9
            echo "
";
            // line 10
            $context["skipped"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "skipped"), "method");
            // line 11
            $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "skipped") / $this->getContext($context, "steps")) * 100), 3);
            // line 12
            echo "
";
            // line 13
            $context["undefined"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "undefined"), "method");
            // line 14
            $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "undefined") / $this->getContext($context, "steps")) * 100), 3);
            // line 15
            echo "
";
            // line 16
            $context["pending"] = $this->getAttribute($this->getContext($context, "feature"), "getStepsHavingStatusCount", array(0 => "pending"), "method");
            // line 17
            $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "pending") / $this->getContext($context, "steps")) * 100), 3);
        }
        // line 19
        echo "
<div class=\"span4 clearfix\">
    <h2>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "name"), "html", null, true);
        echo " ";
        if (($this->getContext($context, "steps") > 0)) {
            echo "(";
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
            echo "%)";
        } else {
            echo "(No steps)";
        }
        echo "</h2>

    <div class=\"progress\">
        ";
        // line 24
        if (($this->getContext($context, "steps") > 0)) {
            // line 25
            echo "        ";
            if (($this->getContext($context, "passed") > 0)) {
                // line 26
                echo "        <div class=\"bar progress-success\" style=\"width: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "passedpcnt"), "html", null, true);
                echo "%;\"></div>
        ";
            }
            // line 28
            echo "        ";
            if (($this->getContext($context, "failed") > 0)) {
                // line 29
                echo "        <div class=\"bar progress-danger\" style=\"width: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "failedpcnt"), "html", null, true);
                echo "%;\"></div>
        ";
            }
            // line 31
            echo "        ";
            if ((($this->getContext($context, "skipped") + $this->getContext($context, "pending")) > 0)) {
                // line 32
                echo "        <div class=\"bar progress-info\" style=\"width: ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "skippedpcnt") + $this->getContext($context, "pendingpcnt")), "html", null, true);
                echo "%;\"></div>
        ";
            }
            // line 34
            echo "        ";
            if (($this->getContext($context, "undefined") > 0)) {
                // line 35
                echo "        <div class=\"bar progress-warning\" style=\"width: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "undefinedpcnt"), "html", null, true);
                echo "%;\"></div>
        ";
            }
            // line 37
            echo "        ";
        }
        // line 38
        echo "    </div>

    ";
        // line 40
        if (($this->getContext($context, "steps") > 0)) {
            // line 41
            echo "    <ul class=\"pull-left\">
        ";
            // line 42
            if (($this->getContext($context, "passed") > 0)) {
                // line 43
                echo "        <li><span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "passed"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
                echo "%)</span>
        </li>
        ";
            }
            // line 46
            echo "        ";
            if (($this->getContext($context, "failed") > 0)) {
                // line 47
                echo "        <li><span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "failed"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "failedpcnt")), "html", null, true);
                echo "%)</span>
        </li>
        ";
            }
            // line 50
            echo "        ";
            if (($this->getContext($context, "skipped") > 0)) {
                // line 51
                echo "        <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "skipped"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "skippedpcnt")), "html", null, true);
                echo "%)</span>
        </li>
        ";
            }
            // line 54
            echo "        ";
            if (($this->getContext($context, "pending") > 0)) {
                // line 55
                echo "        <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "pending"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "pendingpcnt")), "html", null, true);
                echo "%)</span>
        </li>
        ";
            }
            // line 58
            echo "        ";
            if (($this->getContext($context, "undefined") > 0)) {
                // line 59
                echo "        <li><span class=\"warning\" style=\"color: #FBB450; font-weight: bold\">Undefined: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "undefined"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "undefinedpcnt")), "html", null, true);
                echo "%)</span>
        </li>
        ";
            }
            // line 62
            echo "    </ul>
    ";
        }
        // line 64
        echo "
    ";
        // line 65
        if (($this->getContext($context, "steps") > 0)) {
            // line 66
            echo "    <p class=\"pull-right\">
        <a class=\"btn\" href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("id" => $this->getAttribute($this->getContext($context, "feature"), "id"), "slug" => $this->getAttribute($this->getContext($context, "feature"), "slug"))), "html", null, true);
            echo "\" data-action=\"details\">Details &raquo;</a>
    </p>
    ";
        }
        // line 70
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::Default/feature.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 70,  206 => 67,  203 => 66,  201 => 65,  198 => 64,  194 => 62,  183 => 59,  180 => 58,  169 => 55,  166 => 54,  155 => 51,  152 => 50,  141 => 47,  138 => 46,  127 => 43,  125 => 42,  122 => 41,  120 => 40,  116 => 38,  113 => 37,  107 => 35,  104 => 34,  98 => 32,  95 => 31,  89 => 29,  86 => 28,  80 => 26,  77 => 25,  75 => 24,  61 => 21,  57 => 19,  54 => 17,  52 => 16,  49 => 15,  47 => 14,  45 => 13,  42 => 12,  40 => 11,  38 => 10,  35 => 9,  33 => 8,  31 => 7,  28 => 6,  26 => 5,  24 => 4,  22 => 3,  19 => 2,  17 => 1,);
    }
}
