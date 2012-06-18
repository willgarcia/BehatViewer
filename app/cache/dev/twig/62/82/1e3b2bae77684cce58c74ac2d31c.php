<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_62821e3b2bae77684cce58c74ac2d31c extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" style=\"display: none\"></div>
<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        var wdt, xhr;
        wdt = document.getElementById('sfwdt";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "');
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(state) {
            if (4 === xhr.readyState && 200 === xhr.status && -1 !== xhr.responseText.indexOf('sf-toolbarreset')) {
                wdt.innerHTML = xhr.responseText;
                wdt.style.display = 'block';
            }
        };
        xhr.send('');
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  25 => 5,  69 => 24,  48 => 15,  44 => 14,  40 => 13,  17 => 1,  247 => 89,  244 => 88,  240 => 54,  237 => 53,  234 => 52,  229 => 48,  225 => 41,  222 => 40,  217 => 29,  211 => 91,  209 => 88,  203 => 85,  199 => 83,  188 => 75,  184 => 74,  180 => 73,  176 => 72,  172 => 71,  168 => 70,  164 => 69,  160 => 68,  156 => 67,  152 => 66,  148 => 65,  144 => 64,  140 => 63,  136 => 62,  132 => 61,  128 => 60,  124 => 59,  119 => 58,  117 => 57,  113 => 55,  111 => 52,  106 => 49,  104 => 48,  100 => 46,  95 => 43,  93 => 40,  91 => 39,  85 => 35,  78 => 30,  76 => 29,  72 => 28,  68 => 27,  64 => 26,  60 => 18,  56 => 17,  52 => 16,  38 => 12,  27 => 9,  22 => 1,  29 => 5,  26 => 3,);
    }
}
