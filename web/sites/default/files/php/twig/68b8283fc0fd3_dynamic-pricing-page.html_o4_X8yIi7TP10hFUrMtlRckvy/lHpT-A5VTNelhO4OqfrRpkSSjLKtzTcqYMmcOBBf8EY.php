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

/* modules/custom/dynamic_pricing/templates/dynamic-pricing-page.html.twig */
class __TwigTemplate_2e02299d16ebf9ce5d17a8efb8788d4b extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("dynamic_pricing/pricing_assets"), "html", null, true);
        yield "


<div class=\"pricing-container\">
\t<h2 class=\"title\">Dynamic Day Ahead Pricing</h2>

\t<div class=\"tables-wrapper\">
\t\t<div class=\"table-item\">
\t\t\t<h3 class=\"subtitle\">Today</h3>
\t\t\t<p class=\"muted\">";
        // line 10
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["today_date_display"] ?? null), "F j, Y"), "html", null, true);
        yield "</p>

\t\t\t<table class=\"pricing-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th colspan=\"3\"></th>
\t\t\t\t\t\t<th colspan=\"3\" class=\"highlight\">Total Prices (\$/KWh)</th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"highlight\">Hour</th>
\t\t\t\t\t\t<th class=\"highlight\">CAISO Price</th>
\t\t\t\t\t\t<th class=\"highlight\">GCC Adder</th>
\t\t\t\t\t\t<th class=\"highlight\">Small</th>
\t\t\t\t\t\t<th class=\"highlight\">Medium</th>
\t\t\t\t\t\t<th class=\"highlight\">Large</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["today_data"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 30
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "time", [], "any", false, false, true, 30), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "caiso_dep", [], "any", false, false, true, 31), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 32
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "gcc_adder", [], "any", false, false, true, 32), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 33
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "small", [], "any", false, false, true, 33), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 34
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "medium", [], "any", false, false, true, 34), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "large", [], "any", false, false, true, 35), "html", null, true);
            yield "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        // line 37
        if (!$context['_iterated']) {
            // line 38
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"6\">No pricing data available for today.</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        yield "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>


\t\t<div class=\"table-item\">
\t\t\t<h3 class=\"subtitle\">Tomorrow</h3>
\t\t\t<p class=\"muted\">";
        // line 49
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["tomorrow_date_display"] ?? null), "F j, Y"), "html", null, true);
        yield "</p>

\t\t\t<table class=\"pricing-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th colspan=\"3\"></th>
\t\t\t\t\t\t<th colspan=\"3\" class=\"highlight\">Total Prices (\$/KWh)</th>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"highlight\">Hour</th>
\t\t\t\t\t\t<th class=\"highlight\">CAISO Price</th>
\t\t\t\t\t\t<th class=\"highlight\">GCC Adder</th>
\t\t\t\t\t\t<th class=\"highlight\">Small</th>
\t\t\t\t\t\t<th class=\"highlight\">Medium</th>
\t\t\t\t\t\t<th class=\"highlight\">Large</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tomorrow_data"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 68
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 69
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "time", [], "any", false, false, true, 69), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 70
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "caiso_dep", [], "any", false, false, true, 70), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 71
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "gcc_adder", [], "any", false, false, true, 71), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 72
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "small", [], "any", false, false, true, 72), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 73
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "medium", [], "any", false, false, true, 73), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 74
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "large", [], "any", false, false, true, 74), "html", null, true);
            yield "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        // line 76
        if (!$context['_iterated']) {
            // line 77
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"6\">No pricing data available for tomorrow.</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        yield "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
</div>
<div style=\"clear:both;\">&nbsp;</div>
<p class=\"p-bottom\">
\t<div class=\"builder-element-inner\">
\t\t<div class=\"builder-element-inside\">
\t\t\t<div class=\"builder-element-children-wrapper\">
\t\t\t\t<div class=\"builder-element-inside-inner\">
\t\t\t\t\t<h2 aria-level=\"2\" role=\"heading\">Rate Details&nbsp;</h2>
\t\t\t\t\t<p>Export pricing in the Dynamic Export Rate Pilot is based on the CAISO day-ahead hourly price and includes an added Generation Capacity Component during event hours.</p>
\t\t\t\t\t<ul role=\"list\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<strong>CAISO Day-Ahead Hourly Price:</strong>
\t\t\t\t\t\t\tThe CAISO day-ahead market hourly prices will be published daily by 6 p.m. on a dedicated page of sdge.com. If the CAISO day-ahead hourly prices are not published by SDG&amp;E by 5 p.m. for the day-ahead market, the prior day’s CAISO day-ahead hourly prices will be the effective CAISO day-ahead hourly prices. CAISO market data posted or corrected after 5pm will not be used for Dynamic Export Rate Pilot calculations and after-the-fact rate adjustments will not be made.</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<ul role=\"list\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<strong>Generation Capacity Component (GCC):</strong>&nbsp;The GCC is an adder based on marginal generation capacity costs only and is applied to the top 150 system peak hours.</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</p></div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["today_date_display", "today_data", "tomorrow_date_display", "tomorrow_data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/dynamic_pricing/templates/dynamic-pricing-page.html.twig";
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
        return array (  199 => 81,  190 => 77,  188 => 76,  181 => 74,  177 => 73,  173 => 72,  169 => 71,  165 => 70,  161 => 69,  158 => 68,  153 => 67,  132 => 49,  123 => 42,  114 => 38,  112 => 37,  105 => 35,  101 => 34,  97 => 33,  93 => 32,  89 => 31,  85 => 30,  82 => 29,  77 => 28,  56 => 10,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/dynamic_pricing/templates/dynamic-pricing-page.html.twig", "/var/www/html/web/modules/custom/dynamic_pricing/templates/dynamic-pricing-page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 28];
        static $filters = ["escape" => 1, "date" => 10];
        static $functions = ["attach_library" => 1];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'date'],
                ['attach_library'],
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
