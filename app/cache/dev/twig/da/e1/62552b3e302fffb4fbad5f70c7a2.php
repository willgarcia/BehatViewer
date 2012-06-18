<?php

/* BehatViewerBundle:Default:list.html.twig */
class __TwigTemplate_dae162552b3e302fffb4fbad5f70c7a2 extends Twig_Template
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
        // line 3
        if (((!$this->getContext($context, "features")) && $this->getContext($context, "build"))) {
            // line 4
            $context["features"] = $this->getAttribute($this->getContext($context, "build"), "features");
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_container($context, array $blocks = array())
    {
        // line 8
        echo "<h1 class=\"page-header\">
    Features for ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
        echo " ";
        if ($this->getContext($context, "build")) {
            // line 10
            echo "    <small>(#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "id"), "html", null, true);
            echo " Built on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "build"), "date"), "Y-m-d \\a\\t H:i:s"), "html", null, true);
            echo ")</small>
    ";
        }
        // line 12
        echo "
    ";
        // line 13
        $this->env->loadTemplate("BehatViewerBundle::Default/switcher.html.twig")->display($context);
        // line 14
        echo "</h1>

<div class=\"row-fluid\">
    <div class=\"span12\">
        <div class=\"row-fluid\">
            ";
        // line 19
        if ($this->getContext($context, "features")) {
            // line 20
            echo "            <table class=\"table table-bordered table-striped tablesorter {sortlist: [[1,0]]}\">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Completion</th>
                    <th>Progress</th>
                    <th>Details</th>
                    <th class=\"{sorter: false}\">Action</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 31
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "features"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
                // line 32
                echo "                ";
                $this->env->loadTemplate("BehatViewerBundle::Default/feature-row.html.twig")->display($context);
                // line 33
                echo "                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 34
            echo "                </tbody>
            </table>
            ";
        } else {
            // line 37
            echo "            <div class=\"alert alert-block alert-info\">
                <h4 class=\"alert-heading\">No feature</h4>

                <p>This project has not been built yet. Click on the build button to launch test suite.</p>
            </div>
            ";
        }
        // line 43
        echo "        </div>
    </div>
</div>
";
    }

    // line 48
    public function block_javascript($context, array $blocks = array())
    {
        // line 49
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.metadata.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.tablesorter.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/controller/home.js"), "html", null, true);
        echo "\"></script>
<script>
    behat.application.setController(behat.home);

    if (\$.fn.tablesorter) {
        \$('.tablesorter').tablesorter({
            textExtraction:{
                2:function (node, table, cellIndex) {
                    return \$(node).attr('data-value');
                },
                3:function (node, table, cellIndex) {
                    return \$(node).attr('data-value');
                }
            }
        });
    }

    \$('.tablesorter').fixedTable();
</script>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Default:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 51,  139 => 50,  134 => 49,  131 => 48,  124 => 43,  116 => 37,  111 => 34,  97 => 33,  94 => 32,  77 => 31,  64 => 20,  62 => 19,  55 => 14,  53 => 13,  50 => 12,  42 => 10,  38 => 9,  35 => 8,  32 => 7,  26 => 4,  24 => 3,);
    }
}
