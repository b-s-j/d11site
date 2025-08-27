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

/* modules/contrib/webform/templates/webform-element-more.html.twig */
class __TwigTemplate_76afa854e993538530a09b0d58152ed9 extends Template
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
        // line 18
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("webform/webform.element.more"), "html", null, true);
        yield "
";
        // line 20
        $context["classes"] = ["js-webform-element-more", "webform-element-more"];
        // line 25
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 25), "html", null, true);
        yield ">
  <div class=\"webform-element-more--link\"><a role=\"button\" href=\"#";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 26), "html", null, true);
        yield "--content\">";
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("more_title", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "more_title");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "more_title");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["more_title"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("more_title", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "more_title");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "more_title");
            }
        }
        yield "</a></div>
  <div id=\"";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 27), "html", null, true);
        yield "--content\" class=\"webform-element-more--content\">";
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("more", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "more");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "more");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["more"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("more", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "more");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "more");
            }
        }
        yield "</div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "more_title", "more"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/webform/templates/webform-element-more.html.twig";
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
        return array (  75 => 27,  55 => 26,  50 => 25,  48 => 20,  44 => 18,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/webform/templates/webform-element-more.html.twig", "/var/www/html/web/modules/contrib/webform/templates/webform-element-more.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 20];
        static $filters = ["escape" => 18];
        static $functions = ["attach_library" => 18];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape'],
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
