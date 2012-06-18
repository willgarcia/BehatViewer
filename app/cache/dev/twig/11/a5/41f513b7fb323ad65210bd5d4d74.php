<?php

/* BehatViewerBundle:Definitions:index.html.twig */
class __TwigTemplate_11a541f513b7fb323ad65210bd5d4d74 extends Twig_Template
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
    <div class=\"span12\">
        <h1 class=\"page-header\">
            Definitions for ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
        echo "
        </h1>

        ";
        // line 10
        if ((count($this->getContext($context, "definitions")) > 0)) {
            // line 11
            echo "        <table id=\"definitions\" class=\"table table-bordered table-striped tablesorter\">
            <thead>
            <tr>
                <th>Step</th>
                <th>Context</th>
                <th>Description</th>
            </tr>
            <tr>
                <th>
                    <input type=\"text\" id=\"search\" class=\"search-query\" style=\"width: 80%\"
                           placeholder=\"Search through definitions...\"/>
                </th>
                <th>
                    <select id=\"contexts\" style=\"width: 80%\" multiple=\"\">
                        ";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "contexts"));
            foreach ($context['_seq'] as $context["_key"] => $context["context"]) {
                // line 26
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "context"), "context"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "context"), "context"), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['context'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 28
            echo "                    </select>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 34
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "definitions"));
            foreach ($context['_seq'] as $context["_key"] => $context["definition"]) {
                // line 35
                echo "            <tr>
                <td style=\"width: 60%\" class=\"snippet\" data-search=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('behat_viewer_ext')->clean($this->getAttribute($this->getContext($context, "definition"), "snippet")), "html", null, true);
                echo "\">
                    <strong>";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "definition"), "snippet"), "html", null, true);
                echo "</strong></td>
                <td style=\"width: 10%\" class=\"context\">";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "definition"), "context"), "html", null, true);
                echo "::";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "definition"), "method"), "html", null, true);
                echo "</td>
                <td style=\"width: 30%\">";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "definition"), "description"), "html", null, true);
                echo "</td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['definition'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 42
            echo "            </tbody>
        </table>
        ";
        } else {
            // line 45
            echo "        <div class=\"alert alert-info\">
            <h4 class=\"alert-heading\">No definitions</h4>

            <p>No step definition found. To load definitions from your context library, please run <code>app/console
                behat-viewer:definitions ";
            // line 49
            if ($this->getAttribute($this->getContext($context, "project"), "name")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
            } else {
                echo "foo-bar";
            }
            echo "</code>.</p>
        </div>
        ";
        }
        // line 52
        echo "    </div>
</div>
";
    }

    // line 56
    public function block_javascript($context, array $blocks = array())
    {
        // line 57
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.metadata.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/jquery.tablesorter.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/controller/definitions.js"), "html", null, true);
        echo "\"></script>
<script>
    behat.application.setController(behat.definitions);
</script>
    ";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Definitions:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 59,  175 => 60,  159 => 51,  150 => 46,  138 => 42,  98 => 31,  207 => 69,  202 => 67,  182 => 59,  157 => 52,  154 => 51,  118 => 39,  112 => 42,  66 => 22,  45 => 13,  36 => 9,  292 => 148,  287 => 147,  284 => 146,  278 => 142,  272 => 139,  266 => 135,  257 => 128,  248 => 125,  242 => 124,  239 => 123,  236 => 122,  232 => 121,  187 => 94,  147 => 58,  143 => 48,  83 => 27,  247 => 89,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 48,  225 => 41,  222 => 40,  217 => 29,  203 => 85,  199 => 83,  184 => 62,  180 => 61,  172 => 59,  168 => 55,  164 => 69,  160 => 68,  144 => 64,  140 => 47,  136 => 62,  119 => 39,  106 => 35,  100 => 33,  85 => 28,  76 => 29,  68 => 27,  56 => 24,  209 => 100,  205 => 82,  196 => 63,  192 => 78,  189 => 77,  178 => 71,  176 => 72,  165 => 54,  161 => 61,  152 => 66,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 61,  127 => 43,  123 => 49,  109 => 36,  93 => 37,  90 => 32,  54 => 17,  133 => 52,  124 => 59,  111 => 38,  80 => 26,  60 => 26,  52 => 16,  72 => 28,  64 => 27,  53 => 13,  34 => 6,  26 => 5,  42 => 10,  97 => 38,  95 => 43,  88 => 29,  78 => 26,  71 => 14,  40 => 11,  224 => 96,  215 => 90,  211 => 91,  204 => 84,  200 => 97,  195 => 80,  193 => 79,  190 => 95,  188 => 75,  185 => 60,  179 => 72,  177 => 71,  171 => 56,  162 => 63,  158 => 61,  156 => 70,  153 => 47,  146 => 55,  142 => 57,  137 => 51,  126 => 62,  120 => 39,  117 => 45,  103 => 39,  74 => 28,  47 => 14,  32 => 11,  22 => 3,  25 => 4,  23 => 3,  17 => 1,  92 => 27,  86 => 35,  79 => 31,  29 => 6,  24 => 4,  19 => 2,  69 => 24,  63 => 26,  58 => 24,  49 => 11,  43 => 11,  37 => 8,  20 => 2,  139 => 56,  131 => 48,  128 => 60,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 30,  82 => 34,  77 => 25,  75 => 25,  57 => 15,  50 => 15,  46 => 10,  44 => 14,  39 => 9,  33 => 8,  30 => 4,  27 => 3,  135 => 64,  129 => 44,  122 => 41,  116 => 42,  113 => 55,  108 => 40,  104 => 34,  102 => 37,  94 => 31,  89 => 36,  87 => 32,  84 => 28,  81 => 26,  73 => 30,  70 => 23,  67 => 28,  62 => 24,  59 => 25,  55 => 14,  51 => 13,  48 => 15,  41 => 10,  38 => 10,  35 => 7,  31 => 7,  28 => 3,);
    }
}
