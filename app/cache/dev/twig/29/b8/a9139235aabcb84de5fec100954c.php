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
        $context["steps"] = $this->getAttribute($this->getContext($context, "scenario"), "getStepsCount");
        // line 2
        echo "
";
        // line 3
        $context["passed"] = $this->getAttribute($this->getContext($context, "scenario"), "getStepsHavingStatusCount", array(0 => "passed"), "method");
        // line 4
        $context["passedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "passed") / $this->getContext($context, "steps")) * 100));
        // line 5
        echo "
";
        // line 6
        $context["failed"] = $this->getAttribute($this->getContext($context, "scenario"), "getStepsHavingStatusCount", array(0 => "failed"), "method");
        // line 7
        $context["failedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "failed") / $this->getContext($context, "steps")) * 100));
        // line 8
        echo "
";
        // line 9
        $context["skipped"] = $this->getAttribute($this->getContext($context, "scenario"), "getStepsHavingStatusCount", array(0 => "skipped"), "method");
        // line 10
        $context["skippedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "skipped") / $this->getContext($context, "steps")) * 100));
        // line 11
        echo "
";
        // line 12
        $context["undefined"] = $this->getAttribute($this->getContext($context, "scenario"), "getStepsHavingStatusCount", array(0 => "undefined"), "method");
        // line 13
        $context["undefinedpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "undefined") / $this->getContext($context, "steps")) * 100));
        // line 14
        echo "
";
        // line 15
        $context["pending"] = $this->getAttribute($this->getContext($context, "scenario"), "getStepsHavingStatusCount", array(0 => "pending"), "method");
        // line 16
        $context["pendingpcnt"] = $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "pending") / $this->getContext($context, "steps")) * 100));
        // line 17
        echo "
<h2 id=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "scenario"), "slug"), "html", null, true);
        echo "\">
    ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "scenario"), "name"), "html", null, true);
        echo "
    <small>
        <span>";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
        echo " step(s)</span> /
        ";
        // line 22
        if (($this->getContext($context, "passed") > 0)) {
            echo "<span class=\"success\" style=\"color: #62C462; font-weight: bold\">Passed: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "passed"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getContext($context, "passedpcnt"), "html", null, true);
            echo "%)</span>";
        }
        // line 23
        echo "        ";
        if ((($this->getContext($context, "passed") > 0) && (((($this->getContext($context, "failed") > 0) || ($this->getContext($context, "skipped") > 0)) || ($this->getContext($context, "pending") > 0)) || ($this->getContext($context, "undefined") > 0)))) {
            echo " / ";
        }
        // line 24
        echo "        ";
        if (($this->getContext($context, "failed") > 0)) {
            echo "<span class=\"danger\" style=\"color: #EE5F5B; font-weight: bold\">Failed: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "failed"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getContext($context, "failedpcnt"), "html", null, true);
            echo "%)</span>";
        }
        // line 25
        echo "        ";
        if ((($this->getContext($context, "failed") > 0) && ((($this->getContext($context, "skipped") > 0) || ($this->getContext($context, "pending") > 0)) || ($this->getContext($context, "undefined") > 0)))) {
            echo " / ";
        }
        // line 26
        echo "        ";
        if (($this->getContext($context, "skipped") > 0)) {
            echo "<span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Skipped: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "skipped"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getContext($context, "skippedpcnt"), "html", null, true);
            echo "%)</span>";
        }
        // line 27
        echo "        ";
        if ((($this->getContext($context, "skipped") > 0) && (($this->getContext($context, "pending") > 0) || ($this->getContext($context, "undefined") > 0)))) {
            echo " / ";
        }
        // line 28
        echo "        ";
        if (($this->getContext($context, "pending") > 0)) {
            echo "<span class=\"info\" style=\"color: #5BC0DE; font-weight: bold\">Pending: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "pending"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getContext($context, "pendingpcnt"), "html", null, true);
            echo "%)</span>";
        }
        // line 29
        echo "        ";
        if ((($this->getContext($context, "pending") > 0) && ($this->getContext($context, "undefined") > 0))) {
            echo " / ";
        }
        // line 30
        echo "        ";
        if (($this->getContext($context, "undefined") > 0)) {
            echo "<span class=\"warning\" style=\"color: #FBB450; font-weight: bold\">Undefined: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "undefined"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getContext($context, "steps"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getContext($context, "undefinedpcnt"), "html", null, true);
            echo "%)</span>";
        }
        // line 31
        echo "    </small>
</h2>

<p>
    ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "scenario"), "tags"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 36
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.tag", array("slug" => $this->getAttribute($this->getContext($context, "tag"), "slug"))), "html", null, true);
            echo "\" class=\"label label-info\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tag"), "name"), "html", null, true);
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "scenario"), "steps"));
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
        return array (  201 => 44,  170 => 41,  165 => 38,  154 => 36,  150 => 35,  133 => 30,  128 => 29,  117 => 28,  112 => 27,  96 => 25,  85 => 24,  80 => 23,  70 => 22,  57 => 18,  50 => 15,  43 => 12,  36 => 9,  22 => 3,  270 => 104,  259 => 102,  255 => 101,  247 => 95,  236 => 93,  232 => 92,  224 => 86,  217 => 84,  214 => 83,  211 => 82,  202 => 79,  199 => 78,  190 => 75,  187 => 42,  178 => 71,  175 => 70,  166 => 67,  164 => 66,  159 => 63,  152 => 61,  149 => 60,  146 => 59,  139 => 57,  136 => 56,  134 => 55,  126 => 50,  119 => 45,  113 => 43,  110 => 42,  104 => 40,  101 => 26,  95 => 37,  86 => 34,  75 => 26,  67 => 23,  63 => 21,  54 => 17,  52 => 16,  49 => 15,  47 => 14,  45 => 13,  42 => 12,  40 => 11,  35 => 9,  28 => 6,  24 => 4,  21 => 3,  19 => 2,  30 => 9,  26 => 5,  17 => 1,  151 => 41,  148 => 40,  144 => 31,  141 => 29,  138 => 28,  132 => 36,  118 => 35,  115 => 34,  98 => 33,  94 => 31,  92 => 36,  87 => 25,  84 => 33,  73 => 22,  69 => 24,  66 => 21,  64 => 19,  61 => 19,  59 => 19,  56 => 18,  48 => 14,  44 => 13,  41 => 12,  38 => 10,  33 => 8,  31 => 7,  29 => 6,  27 => 5,  25 => 3,);
    }
}
