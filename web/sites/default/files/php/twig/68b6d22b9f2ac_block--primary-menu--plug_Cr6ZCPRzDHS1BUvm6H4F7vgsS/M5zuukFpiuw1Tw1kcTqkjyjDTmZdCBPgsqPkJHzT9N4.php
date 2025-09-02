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

/* core/themes/olivero/templates/block/block--primary-menu--plugin-id--search-form-block.html.twig */
class __TwigTemplate_49fb025d59b9f227c0b6c427c8049263 extends Template
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
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 32
        $context["classes"] = ["block", "block-search-narrow"];
        // line 37
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 37), "html", null, true);
        yield ">
  ";
        // line 38
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("title_prefix", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "title_prefix");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "title_prefix");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("title_prefix", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "title_prefix");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "title_prefix");
            }
        }
        yield "
  ";
        // line 39
        if ((($tmp = ($context["label"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "    <h2";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_attributes"] ?? null), "html", null, true);
            yield ">";
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
            yield "</h2>
  ";
        }
        // line 42
        yield "  ";
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("title_suffix", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "title_suffix");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "title_suffix");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("title_suffix", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "title_suffix");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "title_suffix");
            }
        }
        yield "
  ";
        // line 43
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 48
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title_prefix", "label", "title_attributes", "title_suffix", "content_attributes", "content"]);        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 44
        yield "    <div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["content"], "method", false, false, true, 44), "html", null, true);
        yield ">
      ";
        // line 45
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("content", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "content");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "content");
            }
        }
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
        if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
            if (array_key_exists("xb_slot_ids", $context) && in_array("content", $context["xb_slot_ids"], TRUE)) {
                yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "content");
            } else {
                yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "content");
            }
        }
        yield "
    </div>
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/olivero/templates/block/block--primary-menu--plugin-id--search-form-block.html.twig";
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
        return array (  134 => 45,  129 => 44,  122 => 43,  115 => 48,  113 => 43,  94 => 42,  72 => 40,  70 => 39,  52 => 38,  47 => 37,  45 => 32,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/olivero/templates/block/block--primary-menu--plugin-id--search-form-block.html.twig", "/var/www/html/web/core/themes/olivero/templates/block/block--primary-menu--plugin-id--search-form-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 32, "if" => 39, "block" => 43];
        static $filters = ["escape" => 37];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
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
