<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout/columns.html.twig */
class __TwigTemplate_49832d40b6e272d7308dc10850bb8fef75485d18637b304c63d2f8f2ead46521 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'main' => [$this, 'block_main'],
            'sidebar' => [$this, 'block_sidebar'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/default.html.twig", "layout/columns.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"row\">
        <div class=\"col-md-9\">
            ";
        // line 6
        $this->displayBlock('main', $context, $blocks);
        // line 7
        echo "        </div>
        <div class=\"col-md-3\">
            ";
        // line 9
        $this->displayBlock('sidebar', $context, $blocks);
        // line 17
        echo "        </div>
    </div>
";
    }

    // line 6
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 9
    public function block_sidebar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "                <div class=\"card mb-3\">
                    <div class=\"card-header\">Site</div>
                    <div class=\"card-body\">
                        Site navigation
                    </div>
                </div>
            ";
    }

    public function getTemplateName()
    {
        return "layout/columns.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 10,  76 => 9,  70 => 6,  64 => 17,  62 => 9,  58 => 7,  56 => 6,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout/columns.html.twig", "/var/www/templates/layout/columns.html.twig");
    }
}
