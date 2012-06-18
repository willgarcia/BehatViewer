<?php

/* BehatViewerBundle:Stats:index.html.twig */
class __TwigTemplate_547b3e8c7a58cbf06312441378008958 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BehatViewerBundle::layout.html.twig");

        $this->blocks = array(
            'container' => array($this, 'block_container'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BehatViewerBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row-fluid\">
    <h1 class=\"page-header\">
        Stats for ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
        echo "
    </h1>

    ";
        // line 9
        if ((count($this->getContext($context, "builds")) > 0)) {
            // line 10
            echo "    <section class=\"row-fluid\">
        <h2>Completion</h2>

        <div class=\"span5\">
            <table class=\"table table-striped highchart\" data-graph-container=\".. .. .highchart-container\"
                   data-graph-type=\"area\" data-graph-yaxis-1-title-text=\"%\" data-graph-color-1=\"#EE5F5B\"
                   data-graph-color-2=\"#5EB95E\">
                <caption>Build completion</caption>
                <thead>
                <tr>
                    <th>Build</th>
                    <th data-graph-stack-group=\"percent\">Error</th>
                    <th data-graph-stack-group=\"percent\">Completion</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "builds"));
            foreach ($context['_seq'] as $context["_key"] => $context["build"]) {
                // line 27
                echo "                ";
                $context["total"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(), "method");
                // line 28
                echo "                ";
                $context["errors"] = ((($this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "failed"), "method") + $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "skipped"), "method")) + $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "pending"), "method")) + $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "undefined"), "method"));
                // line 29
                echo "                <tr>
                    <td>#";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d"), "html", null, true);
                echo "</td>
                    <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round((($this->getContext($context, "errors") / $this->getContext($context, "total")) * 100), 0), "html", null, true);
                echo "%</td>
                    <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->round((($this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "passed"), "method") / $this->getContext($context, "total")) * 100), 0), "html", null, true);
                echo "%</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['build'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 35
            echo "                </tbody>
            </table>
        </div>

        <div class=\"span6 highchart-container\"></div>
    </section>

    <section class=\"row-fluid\">
        <h2>Errors</h2>

        <div class=\"span5\">
            <table class=\"table table-striped highchart\" data-graph-container=\".. .. .highchart-container\"
                   data-graph-type=\"area\" data-graph-yaxis-1-title-text=\"Errors\" data-graph-color-1=\"#EE5F5B\"
                   data-graph-color-2=\"#5BC0DE\" data-graph-color-3=\"#5BC0DE\" data-graph-color-4=\"#C09853\">
                <caption>Number of errors</caption>
                <thead>
                <tr>
                    <th>Build</th>
                    <th data-graph-stack-group=\"percent\">Failed</th>
                    <th data-graph-stack-group=\"percent\">Skipped</th>
                    <th data-graph-stack-group=\"percent\">Pending</th>
                    <th data-graph-stack-group=\"percent\">Undefined</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 60
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "builds"));
            foreach ($context['_seq'] as $context["_key"] => $context["build"]) {
                // line 61
                echo "                ";
                $context["total"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(), "method");
                // line 62
                echo "                <tr>
                    <td>#";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d"), "html", null, true);
                echo "</td>
                    <td>";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "failed"), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "skipped"), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "pending"), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(0 => "undefined"), "method"), "html", null, true);
                echo "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['build'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 70
            echo "                </tbody>
            </table>
        </div>

        <div class=\"span6 highchart-container\"></div>
    </section>

    <section class=\"row-fluid\">
        <h2>Features &amp; Scenarios</h2>

        <div class=\"span5\">
            <table class=\"table table-striped highchart\" data-graph-container=\".. .. .highchart-container\"
                   data-graph-type=\"line\" data-graph-yaxis-1-title-text=\"Features / Scenarios\">
                <caption>Number of features &amp; scenarios</caption>
                <thead>
                <tr>
                    <th>Build</th>
                    <th>Features</th>
                    <th>Scenarios</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 92
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "builds"));
            foreach ($context['_seq'] as $context["_key"] => $context["build"]) {
                // line 93
                echo "                ";
                $context["total"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(), "method");
                // line 94
                echo "                <tr>
                    <td>#";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d"), "html", null, true);
                echo "</td>
                    <td>";
                // line 96
                echo twig_escape_filter($this->env, count($this->getAttribute($this->getContext($context, "build"), "getFeatures", array(), "method")), "html", null, true);
                echo "</td>
                    <td>";
                // line 97
                echo twig_escape_filter($this->env, count($this->getAttribute($this->getContext($context, "build"), "getScenarios", array(), "method")), "html", null, true);
                echo "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['build'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 100
            echo "                </tbody>
            </table>
        </div>

        <div class=\"span6 highchart-container\"></div>
    </section>

    <section class=\"row-fluid\">
        <h2>Steps</h2>

        <div class=\"span5\">
            <table class=\"table table-striped highchart\" data-graph-container=\".. .. .highchart-container\"
                   data-graph-type=\"line\" data-graph-yaxis-1-title-text=\"Steps\">
                <caption>Number of steps</caption>
                <thead>
                <tr>
                    <th>Build</th>
                    <th>Steps</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 121
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "builds"));
            foreach ($context['_seq'] as $context["_key"] => $context["build"]) {
                // line 122
                echo "                ";
                $context["total"] = $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(), "method");
                // line 123
                echo "                <tr>
                    <td>#";
                // line 124
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d"), "html", null, true);
                echo "</td>
                    <td>";
                // line 125
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "getStepsHavingStatusCount", array(), "method"), "html", null, true);
                echo "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['build'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 128
            echo "                </tbody>
            </table>
        </div>

        <div class=\"span6 highchart-container\"></div>
    </section>
    ";
        } else {
            // line 135
            echo "    <div class=\"alert alert-info\">
        <h4 class=\"alert-heading\">No build</h4>

        <p>This project has not been built yet. To build it, please run <code>app/console
            behat-viewer:build ";
            // line 139
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "slug"), "html", null, true);
            echo "</code>.</p>
    </div>
    ";
        }
        // line 142
        echo "
</div>
";
    }

    // line 146
    public function block_javascript($context, array $blocks = array())
    {
        // line 147
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/highchart.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.highchartTable.js"), "html", null, true);
        echo "\"></script>
<script>
    \$('table.highchart').highchartTable();
</script>
    ";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Stats:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 148,  287 => 147,  284 => 146,  278 => 142,  272 => 139,  266 => 135,  257 => 128,  248 => 125,  242 => 124,  239 => 123,  236 => 122,  232 => 121,  209 => 100,  200 => 97,  196 => 96,  190 => 95,  187 => 94,  184 => 93,  180 => 92,  156 => 70,  147 => 67,  143 => 66,  139 => 65,  135 => 64,  129 => 63,  126 => 62,  123 => 61,  119 => 60,  92 => 35,  83 => 32,  79 => 31,  73 => 30,  70 => 29,  67 => 28,  64 => 27,  60 => 26,  42 => 10,  40 => 9,  34 => 6,  30 => 4,  27 => 3,);
    }
}
