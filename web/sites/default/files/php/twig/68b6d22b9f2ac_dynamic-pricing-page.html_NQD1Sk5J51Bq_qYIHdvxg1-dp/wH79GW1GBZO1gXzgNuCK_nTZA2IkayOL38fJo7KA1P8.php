<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/custom/dynamicpricing/templates/dynamic-pricing-page.html.twig */
class __TwigTemplate_c2362646b3e1cf04be58cf6b76891a53 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "

";
        // line 5
        yield "<nav class=\"navbar navbar-expand-lg navbar-light bg-light w-100\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"#\">SDGE Pricing</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
      <ul class=\"navbar-nav\">
        <li class=\"nav-item\">
          <a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Home</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"#\">Pricing Plans</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"#\">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class=\"container-fluid dynamic-pricing-container fs-6\">  ";
        // line 28
        yield "  <h2 class=\"text-center mb-4\">Dynamic Day Ahead Pricing</h2>

  <div class=\"row\">

    ";
        // line 33
        yield "    ";
        // line 34
        yield "    <div class=\"col-sm-12 col-md-6 mb-4\">
      <h3 class=\"text-start fs-5 mb-0 me-2\">Today</h3>
      <p class=\"text-start text-muted mb-1\">";
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["today_date_display"] ?? null), "F j, Y"), "html", null, true);
        yield "</p>

      <div class=\"table-responsive\">
        ";
        // line 40
        yield "        <table class=\"table table-hover table-bordered table-striped text-center fs-6\">
          <thead>
            <tr class=\"table-secondary\">
                <th scope=\"col\" colspan=\"3\" class=\"text-center p-1\"></th> ";
        // line 44
        yield "                <th scope=\"col\" colspan=\"3\" class=\"text-center bg-secondary p-1\">Total Prices (\$/KWh)</th>
            </tr>
            <tr class=\" bg secondary\">
              ";
        // line 48
        yield "              <th scope=\"col\" class=\"p-1 \">Hour</th>
              <th scope=\"col\" class=\"p-1\">CAISO Price</th>
              <th scope=\"col\" class=\"p-1\">GCC Adder</th>
              <th scope=\"col\" class=\"p-1\">Small</th>
              <th scope=\"col\" class=\"p-1\">Medium</th>
              <th scope=\"col\" class=\"p-1\">Large</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["today_data"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 58
            yield "              <tr>
                <td class=\"p-1\">";
            // line 59
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "time", [], "any", false, false, true, 59), "html", null, true);
            yield "</td> ";
            // line 60
            yield "                <td class=\"p-1\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "caiso_dep", [], "any", false, false, true, 60), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 61
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "gcc_adder", [], "any", false, false, true, 61), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 62
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "small", [], "any", false, false, true, 62), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 63
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "medium", [], "any", false, false, true, 63), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "large", [], "any", false, false, true, 64), "html", null, true);
            yield "</td>
              </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 66
        if (!$context['_iterated']) {
            // line 67
            yield "              <tr><td colspan=\"6\">No pricing data available for today.</td></tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        yield "          </tbody>
        </table>
      </div>
    </div>

    ";
        // line 75
        yield "    <div class=\"col-sm-12 col-md-6 mb-4\">
      <h3 class=\"text-start fs-5 mb-0 me-2\">Tomorrow</h3>
      <p class=\"text-start text-muted mb-1\">";
        // line 77
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["tomorrow_date_display"] ?? null), "F j, Y"), "html", null, true);
        yield "</p>

      <div class=\"table-responsive\">
        <table class=\"table table-hover table-bordered table-striped text-center fs-6\">
          <thead>
             <tr class=\"table-secondary\">
                <th scope=\"col\" colspan=\"3\" class=\"text-center p-1\"></th>
                <th scope=\"col\" colspan=\"3\" class=\"text-center bg-secondary p-1\">Total Prices (\$/KWh)</th>
            </tr>
            <tr class=\"table-secondary\">
              <th scope=\"col\" class=\"p-1\">Hour</th>
              <th scope=\"col\" class=\"p-1\">CAISO Price</th>
              <th scope=\"col\" class=\"p-1\">GCC Adder</th>
              <th scope=\"col\" class=\"p-1\">Small</th>
              <th scope=\"col\" class=\"p-1\">Medium</th>
              <th scope=\"col\" class=\"p-1\">Large</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tomorrow_data"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 97
            yield "              <tr>
                <td class=\"p-1\">";
            // line 98
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "time", [], "any", false, false, true, 98), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 99
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "caiso_dep", [], "any", false, false, true, 99), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 100
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "gcc_adder", [], "any", false, false, true, 100), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 101
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "small", [], "any", false, false, true, 101), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 102
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "medium", [], "any", false, false, true, 102), "html", null, true);
            yield "</td>
                <td class=\"p-1\">";
            // line 103
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "large", [], "any", false, false, true, 103), "html", null, true);
            yield "</td>
              </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 105
        if (!$context['_iterated']) {
            // line 106
            yield "              <tr><td colspan=\"6\">No pricing data available for tomorrow.</td></tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        yield "          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["today_date_display", "today_data", "tomorrow_date_display", "tomorrow_data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/dynamicpricing/templates/dynamic-pricing-page.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  232 => 108,  225 => 106,  223 => 105,  216 => 103,  212 => 102,  208 => 101,  204 => 100,  200 => 99,  196 => 98,  193 => 97,  188 => 96,  166 => 77,  162 => 75,  155 => 69,  148 => 67,  146 => 66,  139 => 64,  135 => 63,  131 => 62,  127 => 61,  122 => 60,  119 => 59,  116 => 58,  111 => 57,  100 => 48,  95 => 44,  90 => 40,  84 => 36,  80 => 34,  78 => 33,  72 => 28,  48 => 5,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/dynamicpricing/templates/dynamic-pricing-page.html.twig", "/var/www/html/web/modules/custom/dynamicpricing/templates/dynamic-pricing-page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 57];
        static $filters = ["escape" => 36, "date" => 36];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'date'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
