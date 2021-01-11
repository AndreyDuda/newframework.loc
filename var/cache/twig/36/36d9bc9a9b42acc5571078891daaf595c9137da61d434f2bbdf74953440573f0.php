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

/* app/about.html.twig */
class __TwigTemplate_336623205079137fd5e97c41218627e71f9dd7127d73bbaa0204127642562c47 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'meta' => [$this, 'block_meta'],
            'breadcrumbs' => [$this, 'block_breadcrumbs'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/columns.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/columns.html.twig", "app/about.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "About Page title";
    }

    // line 5
    public function block_meta($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <meta name=\"description\" content=\"About Page description\" />
";
    }

    // line 9
    public function block_breadcrumbs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "    <ul class=\"breadcrumb\">
        <li class=\"breadcrumb-item\"><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Framework\Template\Twig\Extension\RouteExtension']->generatePath("home"), "html", null, true);
        echo "\">Home</a></li>
        <li class=\"breadcrumb-item active\">About</li>
    </ul>
";
    }

    // line 16
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 17
        echo "    <h1>About the site</h1>
";
    }

    public function getTemplateName()
    {
        return "app/about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 17,  80 => 16,  72 => 11,  69 => 10,  65 => 9,  60 => 6,  56 => 5,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "app/about.html.twig", "/var/www/templates/app/about.html.twig");
    }
}
