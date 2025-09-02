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

/* core/themes/olivero/templates/views/views-view--frontpage.html.twig */
class __TwigTemplate_6e43b02ad64a86bfb020eee9712b3d88 extends Template
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
        // line 35
        yield "
";
        // line 37
        $context["classes"] = ["view", ("view-" . \Drupal\Component\Utility\Html::getClass(        // line 39
($context["id"] ?? null))), ("view-id-" .         // line 40
($context["id"] ?? null)), ("view-display-id-" .         // line 41
($context["display_id"] ?? null)), "grid-full", "layout--pass--content-narrow", (((($tmp =         // line 44
($context["dom_id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("js-view-dom-id-" . ($context["dom_id"] ?? null))) : (""))];
        // line 47
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 47), "html", null, true);
        yield ">
  ";
        // line 48
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
        // line 49
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 50
            yield "    ";
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("title", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "title");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "title");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("title", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "title");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "title");
                }
            }
            yield "
  ";
        }
        // line 52
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
        // line 53
        if ((($tmp = ($context["header"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 54
            yield "    <div class=\"view-header\">
      ";
            // line 55
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("header", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "header");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "header");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("header", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "header");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "header");
                }
            }
            yield "
    </div>
  ";
        }
        // line 58
        yield "  ";
        if ((($tmp = ($context["exposed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "    <div class=\"view-filters\">
      ";
            // line 60
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("exposed", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "exposed");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "exposed");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["exposed"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("exposed", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "exposed");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "exposed");
                }
            }
            yield "
    </div>
  ";
        }
        // line 63
        yield "  ";
        if ((($tmp = ($context["attachment_before"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 64
            yield "    <div class=\"attachment attachment-before\">
      ";
            // line 65
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("attachment_before", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "attachment_before");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "attachment_before");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_before"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("attachment_before", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "attachment_before");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "attachment_before");
                }
            }
            yield "
    </div>
  ";
        }
        // line 68
        yield "
  ";
        // line 69
        if ((($tmp = ($context["rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 70
            yield "    <div class=\"view-content\">
      ";
            // line 71
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("rows", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "rows");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "rows");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("rows", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "rows");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "rows");
                }
            }
            yield "
    </div>
  ";
        } elseif ((($tmp =         // line 73
($context["empty"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 74
            yield "    ";
            yield from $this->load("@olivero/includes/get-started.html.twig", 74)->unwrap()->yield($context);
            // line 75
            yield "  ";
        }
        // line 76
        yield "
  ";
        // line 77
        if ((($tmp = ($context["pager"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 78
            yield "    ";
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("pager", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "pager");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "pager");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("pager", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "pager");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "pager");
                }
            }
            yield "
  ";
        }
        // line 80
        yield "  ";
        if ((($tmp = ($context["attachment_after"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 81
            yield "    <div class=\"attachment attachment-after\">
      ";
            // line 82
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("attachment_after", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "attachment_after");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "attachment_after");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_after"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("attachment_after", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "attachment_after");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "attachment_after");
                }
            }
            yield "
    </div>
  ";
        }
        // line 85
        yield "  ";
        if ((($tmp = ($context["more"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 86
            yield "    ";
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
            yield "
  ";
        }
        // line 88
        yield "  ";
        if ((($tmp = ($context["footer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 89
            yield "    <div class=\"view-footer\">
      ";
            // line 90
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("footer", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "start", $context["xb_uuid"], "footer");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "start", $context["xb_uuid"], "footer");
                }
            }
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true);
            if ((isset($context["xb_is_preview"]) && $context["xb_is_preview"]) && array_key_exists("xb_uuid", $context)) {
                if (array_key_exists("xb_slot_ids", $context) && in_array("footer", $context["xb_slot_ids"], TRUE)) {
                    yield \sprintf('<!-- xb-slot-%s-%s/%s -->', "end", $context["xb_uuid"], "footer");
                } else {
                    yield \sprintf('<!-- xb-prop-%s-%s/%s -->', "end", $context["xb_uuid"], "footer");
                }
            }
            yield "
    </div>
  ";
        }
        // line 93
        yield "
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["id", "display_id", "dom_id", "attributes", "title_prefix", "title", "title_suffix", "header", "exposed", "attachment_before", "rows", "empty", "pager", "attachment_after", "more", "footer"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/olivero/templates/views/views-view--frontpage.html.twig";
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
        return array (  329 => 93,  309 => 90,  306 => 89,  303 => 88,  283 => 86,  280 => 85,  260 => 82,  257 => 81,  254 => 80,  234 => 78,  232 => 77,  229 => 76,  226 => 75,  223 => 74,  221 => 73,  202 => 71,  199 => 70,  197 => 69,  194 => 68,  174 => 65,  171 => 64,  168 => 63,  148 => 60,  145 => 59,  142 => 58,  122 => 55,  119 => 54,  117 => 53,  98 => 52,  78 => 50,  76 => 49,  58 => 48,  53 => 47,  51 => 44,  50 => 41,  49 => 40,  48 => 39,  47 => 37,  44 => 35,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/olivero/templates/views/views-view--frontpage.html.twig", "/var/www/html/web/core/themes/olivero/templates/views/views-view--frontpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 37, "if" => 49, "include" => 74];
        static $filters = ["clean_class" => 39, "escape" => 47];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include'],
                ['clean_class', 'escape'],
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
