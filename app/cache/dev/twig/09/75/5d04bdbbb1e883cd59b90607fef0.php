<?php

/* BehatViewerBundle::History/build-row.html.twig */
class __TwigTemplate_09755d04bdbbb1e883cd59b90607fef0 extends Twig_Template
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
        $context["steps"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(), "method");
        // line 2
        echo "
";
        // line 3
        $context["passed"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "passed"), "method");
        // line 4
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "passed") / $this->getContext($context, "steps")) * 100), 3);
        // line 5
        echo "
";
        // line 6
        $context["failed"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "failed"), "method");
        // line 7
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "failed") / $this->getContext($context, "steps")) * 100), 3);
        // line 8
        echo "
";
        // line 9
        $context["skipped"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "skipped"), "method");
        // line 10
        $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "skipped") / $this->getContext($context, "steps")) * 100), 3);
        // line 11
        echo "
";
        // line 12
        $context["undefined"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "undefined"), "method");
        // line 13
        $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "undefined") / $this->getContext($context, "steps")) * 100), 3);
        // line 14
        echo "
";
        // line 15
        $context["pending"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "pending"), "method");
        // line 16
        $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "pending") / $this->getContext($context, "steps")) * 100), 3);
        // line 17
        echo "
<tr>
    <td style=\"width: 15px\">
        <input type=\"checkbox\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
        echo "\" name=\"delete[]\" id=\"Build_delete_";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
        echo "\"/>
    </td>
    <td style=\"width: 5%\"><strong>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
        echo "</strong></td>
    <td>";
        // line 23
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
    <td style=\"width: 10%\">";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round($this->getContext($context, "passedpcnt")), "html", null, true);
        echo "%</td>
    <td style=\"min-width: 250px; width: 25%\" data-value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, "passedpcnt"), "html", null, true);
        echo "\">
        <div class=\"progress\">
            ";
        // line 27
        if (($this->getContext($context, "passed") > 0)) {
            // line 28
            echo "                <div class=\"bar progress-success\" style=\"width: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "passedpcnt"), "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 30
        echo "            ";
        if (($this->getContext($context, "failed") > 0)) {
            // line 31
            echo "                <div class=\"bar progress-danger\" style=\"width: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "failedpcnt"), "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 33
        echo "            ";
        if ((($this->getContext($context, "skipped") + $this->getContext($context, "pending")) > 0)) {
            // line 34
            echo "                <div class=\"bar progress-info\" style=\"width: ";
            echo twig_escape_filter($this->env, ($this->getContext($context, "skippedpcnt") + $this->getContext($context, "pendingpcnt")), "html", null, true);
            echo "%;\"></div>
            ";
        }
        // line 36
        echo "            ";
        if (($this->getContext($context, "undefined") > 0)) {
            // line 37
            echo "                <div class=\"bar progress-warning\" style=\"width: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "undefinedpcnt"), "html", null, true);
            echo "%;\"></div>
            ";
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
        if (($this->getContext($context, "passed") > 0)) {
            // line 44
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
        // line 47
        echo "            ";
        if (($this->getContext($context, "failed") > 0)) {
            // line 48
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
        // line 51
        echo "            ";
        if (($this->getContext($context, "skipped") > 0)) {
            // line 52
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
        // line 55
        echo "            ";
        if (($this->getContext($context, "pending") > 0)) {
            // line 56
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
        // line 59
        echo "            ";
        if (($this->getContext($context, "undefined") > 0)) {
            // line 60
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
        // line 63
        echo "        </ul>
    </td>
    <td class=\"action\" style=\"min-width: 150px; width: 10%\">
        <div class=\"btn-group\" id=\"toolbar\">
            <a href=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.historyentry", array("id" => $this->getAttribute($this->getContext($context, "build"), "id"))), "html", null, true);
        echo "\" class=\"btn\"
               data-action=\"details\">Details</a>
            <a href=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.historydelete", array("id" => $this->getAttribute($this->getContext($context, "build"), "id"))), "html", null, true);
        echo "\" class=\"btn btn-danger\"
               data-action=\"delete\">Delete</a>
        </div>
    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle::History/build-row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 69,  202 => 67,  196 => 63,  185 => 60,  182 => 59,  171 => 56,  168 => 55,  157 => 52,  154 => 51,  143 => 48,  140 => 47,  129 => 44,  127 => 43,  122 => 41,  118 => 39,  112 => 37,  109 => 36,  103 => 34,  100 => 33,  94 => 31,  91 => 30,  85 => 28,  83 => 27,  74 => 24,  70 => 23,  66 => 22,  59 => 20,  54 => 17,  52 => 16,  50 => 15,  47 => 14,  45 => 13,  40 => 11,  38 => 10,  36 => 9,  33 => 8,  31 => 7,  29 => 6,  26 => 5,  24 => 4,  22 => 3,  19 => 2,  17 => 1,  184 => 62,  180 => 61,  175 => 60,  172 => 59,  165 => 54,  159 => 51,  153 => 47,  150 => 46,  138 => 42,  123 => 40,  119 => 39,  111 => 38,  106 => 35,  104 => 34,  98 => 31,  92 => 27,  78 => 25,  75 => 25,  58 => 24,  43 => 12,  41 => 10,  35 => 7,  30 => 4,  27 => 3,);
    }
}
