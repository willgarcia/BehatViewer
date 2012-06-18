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
<tr class=\"navig\">
    <td><strong>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "name"), "html", null, true);
        echo "</strong></td>
    <td style=\"width: 10%\">";
        // line 22
        if (($this->getContext($context, "steps") > 0)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
        } else {
            echo "0";
        }
        echo "%</td>
    <td style=\"min-width: 250px; width: 25%\" data-value=\"";
        // line 23
        if (($this->getContext($context, "steps") > 0)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
        } else {
            echo "0";
        }
        echo "\">
        <div class=\"progress\">
            ";
        // line 25
        if (($this->getContext($context, "steps") > 0)) {
            // line 26
            echo "            ";
            if (($this->getContext($context, "passed") > 0)) {
                // line 27
                echo "            <div class=\"bar progress-success\" style=\"width: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "passedpcnt"), "html", null, true);
                echo "%;\"></div>
            ";
            }
            // line 29
            echo "            ";
            if (($this->getContext($context, "failed") > 0)) {
                // line 30
                echo "            <div class=\"bar progress-danger\" style=\"width: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "failedpcnt"), "html", null, true);
                echo "%;\"></div>
            ";
            }
            // line 32
            echo "            ";
            if ((($this->getContext($context, "skipped") + $this->getContext($context, "pending")) > 0)) {
                // line 33
                echo "            <div class=\"bar progress-info\" style=\"width: ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "skippedpcnt") + $this->getContext($context, "pendingpcnt")), "html", null, true);
                echo "%;\"></div>
            ";
            }
            // line 35
            echo "            ";
            if (($this->getContext($context, "undefined") > 0)) {
                // line 36
                echo "            <div class=\"bar progress-warning\" style=\"width: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "undefinedpcnt"), "html", null, true);
                echo "%;\"></div>
            ";
            }
            // line 38
            echo "            ";
        }
        // line 39
        echo "        </div>
    </td>
    <td data-value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
        echo "\">
        <ul class=\"pull-left\">
            ";
        // line 43
        if (($this->getContext($context, "steps") > 0)) {
            // line 44
            echo "            ";
            if (($this->getContext($context, "passed") > 0)) {
                // line 45
                echo "            <li><span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "passed"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
                echo "%)</span>
            </li>
            ";
            }
            // line 48
            echo "            ";
            if (($this->getContext($context, "failed") > 0)) {
                // line 49
                echo "            <li><span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "failed"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "failedpcnt")), "html", null, true);
                echo "%)</span>
            </li>
            ";
            }
            // line 52
            echo "            ";
            if (($this->getContext($context, "skipped") > 0)) {
                // line 53
                echo "            <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "skipped"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "skippedpcnt")), "html", null, true);
                echo "%)</span>
            </li>
            ";
            }
            // line 56
            echo "            ";
            if (($this->getContext($context, "pending") > 0)) {
                // line 57
                echo "            <li><span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "pending"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "pendingpcnt")), "html", null, true);
                echo "%)</span>
            </li>
            ";
            }
            // line 60
            echo "            ";
            if (($this->getContext($context, "undefined") > 0)) {
                // line 61
                echo "            <li><span class=\"warning\" style=\"color: #FBB450; font-weight: bold\">Undefined: ";
                echo twig_escape_filter($this->env, $this->getContext($context, "undefined"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "undefinedpcnt")), "html", null, true);
                echo "%)</span>
            </li>
            ";
            }
            // line 64
            echo "            ";
        }
        // line 65
        echo "        </ul>
    </td>
    <td class=\"action\">
        <a class=\"btn\" href=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.feature", array("id" => $this->getAttribute($this->getContext($context, "feature"), "id"), "slug" => $this->getAttribute($this->getContext($context, "feature"), "slug"))), "html", null, true);
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
        return array (  212 => 68,  207 => 65,  204 => 64,  193 => 61,  190 => 60,  179 => 57,  176 => 56,  165 => 53,  162 => 52,  151 => 49,  148 => 48,  137 => 45,  134 => 44,  132 => 43,  127 => 41,  123 => 39,  120 => 38,  114 => 36,  111 => 35,  105 => 33,  102 => 32,  96 => 30,  93 => 29,  87 => 27,  84 => 26,  82 => 25,  73 => 23,  65 => 22,  61 => 21,  57 => 19,  54 => 17,  52 => 16,  49 => 15,  47 => 14,  45 => 13,  42 => 12,  40 => 11,  38 => 10,  35 => 9,  33 => 8,  31 => 7,  28 => 6,  26 => 5,  24 => 4,  22 => 3,  19 => 2,  17 => 1,);
    }
}
