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

/* app/register.html.twig */
class __TwigTemplate_e0277b1e1f3b7d13f42fcd0e2e2cae11b296114bd473ba87e3a4356cf24b72dc extends \Twig\Template
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
            'content' => [$this, 'block_content'],
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
        $this->parent = $this->loadTemplate("layout/default.html.twig", "app/register.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Create Task";
    }

    // line 3
    public function block_meta($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <meta name=\"description\" content=\"Blog Page description\" />
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 9
            echo "        <div class=\"alert alert-danger\" role=\"alert\">
            ";
            // line 10
            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "<form role=\"form\" method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Framework\Template\Twig\Extension\RouteExtension']->generatePath("registring"), "html", null, true);
        echo "\">
    <div class=\"form-group row\">
        <label for=\"example-text-input\" class=\"col-2 col-form-label\">username</label>
        <div class=\"col-10\">
            <input class=\"form-control\" type=\"text\" value=\"\" id=\"username\" name=\"name\">
        </div>
    </div>
    <div class=\"form-group row\">
        <label for=\"example-email-input\" class=\"col-2 col-form-label\" id=\"name\" name=\"email\">Email</label>
        <div class=\"col-10\">
            <input class=\"form-control\" type=\"email\" value=\"bootstrap@example.com\" id=\"example-email-input\">
        </div>
    </div>
    <div class=\"form-group row\">
        <label for=\"example-password-input\" class=\"col-2 col-form-label\" id=\"password\" name=\"password\">Password</label>
        <div class=\"col-10\">
            <input class=\"form-control\" type=\"password\" value=\"\" id=\"example-password-input\">
        </div>
    </div>
    <div class=\"form-group row\">
        <label for=\"example-password-input\" class=\"col-2 col-form-label\" id=\"confirm\" name=\"confirm\">Confirm Password</label>
        <div class=\"col-10\">
            <input class=\"form-control\" type=\"password\" value=\"\" id=\"example-password-input\">
        </div>
    </div>
    <div class=\"card-footer\">
        <button type=\"submit\" class=\"btn btn-primary\">Register</button>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "app/register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 13,  76 => 10,  73 => 9,  68 => 8,  64 => 7,  59 => 4,  55 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "app/register.html.twig", "/var/www/templates/app/register.html.twig");
    }
}
