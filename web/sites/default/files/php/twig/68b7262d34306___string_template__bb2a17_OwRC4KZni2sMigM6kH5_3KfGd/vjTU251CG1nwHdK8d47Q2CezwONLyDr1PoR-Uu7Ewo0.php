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

/* __string_template__bb2a178ab58e514511be9abae6d47254 */
class __TwigTemplate_252318ea32ab36ec2a58910281c7f5e4 extends Template
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
        yield "<div class=\"block-filter-text-source\">";
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("label", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "label");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "label");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("label", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "label");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "label");
            }
        }
        yield "</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["label"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "__string_template__bb2a178ab58e514511be9abae6d47254";
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
        return array (  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "__string_template__bb2a178ab58e514511be9abae6d47254", "");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 1];
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
