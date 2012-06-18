<?php

/* BehatViewerBundle:History:index.html.twig */
class __TwigTemplate_9aa3e3cc9e59160436b3b1879e4ca7e6 extends Twig_Template
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
        echo "    <div class=\"row-fluid\">
        <div class=\"span12\">
            <h1 class=\"page-header\">
                Builds for ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
        echo "
            </h1>

            ";
        // line 10
        if ((count($this->getContext($context, "builds")) > 0)) {
            // line 11
            echo "                <table id=\"definitions\" class=\"table table-bordered table-striped tablesorter {sortlist: [[1,1]]}\">
                    <thead>
                    <tr>
                        <th class=\"{sorter: false}\"><input type=\"checkbox\" /></th>
                        <th>#</th>
                        <th>Date</th>
                        <th>Completion</th>
                        <th>Progress</th>
                        <th>Details</th>
                        <th class=\"{sorter: false}\">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "builds"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["build"]) {
                // line 25
                echo "                            ";
                $this->env->loadTemplate("BehatViewerBundle::History/build-row.html.twig")->display($context);
                // line 26
                echo "                        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['build'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 27
            echo "                    </tbody>
                </table>

                <div class=\"btn-group\">
                    <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.historydeletesel"), "html", null, true);
            echo "\" class=\"btn btn-danger\" data-action=\"delete-selected\">Delete selected</a>
                </div>

                ";
            // line 34
            if (($this->getContext($context, "pages") > 1)) {
                // line 35
                echo "                    <div id=\"content-nav\" class=\"pagination pagination-centered menu\">
                        <ul>

                            <li class=\"prev";
                // line 38
                if (($this->getContext($context, "current") == 1)) {
                    echo " disabled";
                }
                echo "\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.historypage", array("page" => ($this->getContext($context, "current") - 1))), "html", null, true);
                echo "\" title=\"Previous\">«</a></li>
                            ";
                // line 39
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "pages")));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 40
                    echo "                                <li";
                    if (($this->getContext($context, "i") == $this->getContext($context, "current"))) {
                        echo " class=\"active\"";
                    }
                    echo "><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.historypage", array("page" => $this->getContext($context, "i"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                    echo "</a></li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 42
                echo "                            <li class=\"next";
                if (($this->getContext($context, "current") == $this->getContext($context, "pages"))) {
                    echo " disabled";
                }
                echo "\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.historypage", array("page" => ($this->getContext($context, "current") + 1))), "html", null, true);
                echo "\" title=\"Next\">»</a></li>
                        </ul>
                    </div>
                ";
            }
            // line 46
            echo "            ";
        } else {
            // line 47
            echo "                <div class=\"alert alert-info alert-block\">
                    <h4 class=\"alert-heading\">No build</h4>

                    <p>This project has not been built yet. To build it, please run <code>app/console
                        behat-viewer:build ";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "slug"), "html", null, true);
            echo "</code>.</p>
                </div>
            ";
        }
        // line 54
        echo "        </div>
    </div>

";
    }

    // line 59
    public function block_javascript($context, array $blocks = array())
    {
        // line 60
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.metadata.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.tablesorter.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/controller/build.js"), "html", null, true);
        echo "\"></script>
    <script>
        behat.application.setController(behat.build);
    </script>
";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:History:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 62,  180 => 61,  175 => 60,  172 => 59,  165 => 54,  159 => 51,  153 => 47,  150 => 46,  138 => 42,  123 => 40,  119 => 39,  111 => 38,  106 => 35,  104 => 34,  98 => 31,  92 => 27,  78 => 26,  75 => 25,  58 => 24,  43 => 11,  41 => 10,  35 => 7,  30 => 4,  27 => 3,);
    }
}
