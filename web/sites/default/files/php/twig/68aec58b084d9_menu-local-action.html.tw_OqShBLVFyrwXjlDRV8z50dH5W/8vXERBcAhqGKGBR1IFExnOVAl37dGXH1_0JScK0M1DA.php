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

/* core/modules/system/templates/menu-local-action.html.twig */
class __TwigTemplate_a13e4e36aea0694c6dabd6fe81f40588 extends Template
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
        // line 15
        yield "<li";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
        yield ">";
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("link", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "link");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "link");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("link", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "link");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "link");
            }
        }
        yield "</li>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "link"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/system/templates/menu-local-action.html.twig";
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
        return array (  44 => 15,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/system/templates/menu-local-action.html.twig", "/var/www/html/web/core/modules/system/templates/menu-local-action.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 15];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
