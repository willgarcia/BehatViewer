<?php

/* BehatViewerBundle:Config:index.html.twig */
class __TwigTemplate_993be50e9d291321c8d8122e09508a8a extends Twig_Template
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
        Project configuration
    </h1>

    ";
        // line 9
        if ((!$this->getAttribute($this->getContext($context, "project"), "id"))) {
            // line 10
            echo "    <div class=\"alert alert-block alert-info\">
        <h4 class=\"alert-heading\">No project configured</h4>

        <p>Before using Behat Viewer, you should configure your project.</p>
    </div>
    ";
        }
        // line 16
        echo "
    <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("behatviewer.config"), "html", null, true);
        echo "\" id=\"configuration\">
        <fieldset>
            <!--
\t\t\t\t<div class=\"alert alert-block alert-danger\">
\t\t\t\t\t<h4>Errors</h4>
\t\t\t\t\t";
        // line 22
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
\t\t\t\t</div>
\t\t\t\t-->

            <div class=\"span6\">
                <div class=\"control-group\">
                    <label for=\"Project_name\" class=\"control-label\">Project name</label>

                    <div class=\"controls\">
                        ";
        // line 31
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "name"), array("attr" => array("class" => "input-xlarge", "placeholder" => "My Project")));
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"Project_slug\" class=\"control-label\">Identifier</label>

                    <div class=\"controls\">
                        ";
        // line 39
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "slug"), array("attr" => array("class" => "input-xlarge", "placeholder" => "my-project")));
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"Project_base_url\" class=\"control-label\">Base URL</label>

                    <div class=\"controls\">
                        ";
        // line 47
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "base_url"), array("attr" => array("class" => "input-xlarge", "placeholder" => "http://myproject/app_test.php")));
        // line 48
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"Project_root_path\" class=\"control-label\">Root path</label>

                    <div class=\"controls\">
                        ";
        // line 56
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "root_path"), array("attr" => array("class" => "input-xlarge", "placeholder" => "/my/project")));
        // line 57
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"Project_output_path\" class=\"control-label\">Output path</label>

                    <div class=\"controls\">
                        ";
        // line 65
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "output_path"), array("attr" => array("class" => "input-xlarge", "placeholder" => "/my/project")));
        // line 66
        echo "
                    </div>
                </div>

                <div class=\"control-group\">
                    <label for=\"Project_test_command\" class=\"control-label\">Test command</label>

                    <div class=\"controls\">
                        ";
        // line 74
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "test_command"), array("attr" => array("class" => "input-xlarge", "placeholder" => "app/console --env=test behat @AcmeBundle")));
        // line 75
        echo "
                    </div>
                </div>

                ";
        // line 79
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
            </div>
        </fieldset>

        <div class=\"form-actions\">
            <input class=\"btn btn-primary\" type=\"submit\" value=\"Save changes\"/>
            <input class=\"btn\" type=\"reset\" value=\"Cancel\"/>
        </div>
    </form>
</div>
";
    }

    // line 91
    public function block_javascript($context, array $blocks = array())
    {
        // line 92
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/behatviewer/js/behat-viewer/controller/config.js"), "html", null, true);
        echo "\"></script>
<script>
    behat.application.setController(behat.config);
</script>
    ";
    }

    public function getTemplateName()
    {
        return "BehatViewerBundle:Config:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 70,  206 => 67,  194 => 62,  155 => 51,  173 => 56,  170 => 55,  270 => 104,  259 => 102,  255 => 101,  214 => 83,  166 => 54,  149 => 60,  110 => 37,  101 => 26,  21 => 3,  201 => 65,  198 => 64,  191 => 69,  186 => 67,  183 => 59,  174 => 63,  169 => 55,  130 => 75,  61 => 21,  151 => 91,  175 => 70,  159 => 52,  150 => 35,  138 => 46,  98 => 32,  207 => 69,  202 => 79,  182 => 59,  157 => 52,  154 => 92,  118 => 66,  112 => 27,  66 => 21,  45 => 13,  36 => 9,  292 => 148,  287 => 147,  284 => 146,  278 => 142,  272 => 139,  266 => 135,  257 => 128,  248 => 125,  242 => 124,  239 => 123,  236 => 93,  232 => 92,  187 => 42,  147 => 58,  143 => 51,  83 => 21,  247 => 95,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 48,  225 => 41,  222 => 40,  217 => 84,  203 => 66,  199 => 78,  184 => 59,  180 => 58,  172 => 59,  168 => 55,  164 => 66,  160 => 68,  144 => 31,  140 => 47,  136 => 79,  119 => 35,  106 => 57,  100 => 33,  85 => 24,  76 => 29,  68 => 27,  56 => 18,  209 => 75,  205 => 82,  196 => 63,  192 => 78,  189 => 62,  178 => 71,  176 => 72,  165 => 38,  161 => 61,  152 => 50,  148 => 40,  145 => 48,  141 => 47,  134 => 49,  132 => 36,  127 => 43,  123 => 49,  109 => 39,  93 => 37,  90 => 32,  54 => 17,  133 => 30,  124 => 43,  111 => 34,  80 => 26,  60 => 26,  52 => 16,  72 => 25,  64 => 20,  53 => 13,  34 => 6,  26 => 4,  42 => 10,  97 => 33,  95 => 31,  88 => 23,  78 => 24,  71 => 23,  40 => 11,  224 => 86,  215 => 90,  211 => 82,  204 => 84,  200 => 97,  195 => 80,  193 => 79,  190 => 75,  188 => 68,  185 => 60,  179 => 72,  177 => 71,  171 => 62,  162 => 63,  158 => 61,  156 => 51,  153 => 47,  146 => 59,  142 => 47,  137 => 51,  126 => 40,  120 => 40,  117 => 40,  103 => 39,  74 => 26,  47 => 16,  32 => 7,  22 => 3,  25 => 3,  23 => 3,  17 => 1,  92 => 47,  86 => 28,  79 => 26,  29 => 6,  24 => 3,  19 => 2,  69 => 24,  63 => 21,  58 => 22,  49 => 15,  43 => 12,  37 => 9,  20 => 2,  139 => 50,  131 => 48,  128 => 74,  125 => 42,  121 => 43,  115 => 39,  107 => 35,  99 => 34,  96 => 25,  91 => 30,  82 => 27,  77 => 31,  75 => 24,  57 => 19,  50 => 17,  46 => 15,  44 => 13,  39 => 10,  33 => 8,  30 => 4,  27 => 3,  135 => 64,  129 => 41,  122 => 41,  116 => 65,  113 => 37,  108 => 29,  104 => 56,  102 => 35,  94 => 48,  89 => 29,  87 => 25,  84 => 33,  81 => 39,  73 => 24,  70 => 31,  67 => 23,  62 => 19,  59 => 19,  55 => 14,  51 => 18,  48 => 16,  41 => 12,  38 => 9,  35 => 8,  31 => 7,  28 => 6,);
    }
}
