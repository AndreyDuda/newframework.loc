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

/* layout/default.html.twig */
class __TwigTemplate_04808e8f78ff6f0d078ddbf01f091b9f41c95844f883fc580d11166cd5f387fe extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'meta' => [$this, 'block_meta'],
            'breadcrumbs' => [$this, 'block_breadcrumbs'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - App</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    ";
        // line 8
        $this->displayBlock('meta', $context, $blocks);
        // line 9
        echo "    <link rel=\"stylesheet\" href=\"/build";
        echo twig_escape_filter($this->env, $this->extensions['Stormiix\Twig\Extension\MixExtension']->getVersionedFilePath("/css/app.css"), "html", null, true);
        echo "\" />
</head>
<body class=\"app\">
<header class=\"app-header\">
    <nav class=\"navbar navbar-expand-sm navbar-dark fixed-top\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Framework\Template\Twig\Extension\RouteExtension']->generatePath("home"), "html", null, true);
        echo "\">
                Application
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarContent\" aria-controls=\"navbarContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarContent\">
                <ul class=\"navbar-nav ml-auto\">
                    <li><a class=\"nav-link\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Framework\Template\Twig\Extension\RouteExtension']->generatePath("blog"), "html", null, true);
        echo "\"><i class=\"fa fa-book\"></i> Blog</a></li>
                    <li><a class=\"nav-link\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Framework\Template\Twig\Extension\RouteExtension']->generatePath("about"), "html", null, true);
        echo "\"><i class=\"fa fa-book\"></i> About</a></li>
                    <li><a class=\"nav-link\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Framework\Template\Twig\Extension\RouteExtension']->generatePath("cabinet"), "html", null, true);
        echo "\"><i class=\"fa fa-user\"></i> Cabinet</a></li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<div class=\"app-content\">
    <main class=\"container\">
        ";
        // line 36
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 37
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 38
        echo "    </main>
</div>

<footer class=\"app-footer\">
    <div class=\"container\">
        <div class=\"border-top pt-3\">
            <p>&copy; ";
        // line 44
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_converter($this->env), "Y"), "html", null, true);
        echo " - My App</p>
        </div>
    </div>
</footer>

<script src=\"/build";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Stormiix\Twig\Extension\MixExtension']->getVersionedFilePath("/js/app.js"), "html", null, true);
        echo "\"></script>
</body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 8
    public function block_meta($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 36
    public function block_breadcrumbs($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 37,  138 => 36,  132 => 8,  126 => 6,  119 => 49,  111 => 44,  103 => 38,  100 => 37,  98 => 36,  85 => 26,  81 => 25,  77 => 24,  65 => 15,  55 => 9,  53 => 8,  48 => 6,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout/default.html.twig", "/var/www/templates/layout/default.html.twig");
    }
}
