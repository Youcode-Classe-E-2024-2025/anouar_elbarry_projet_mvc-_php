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

/* front/home.twig */
class __TwigTemplate_55692dc499f109b1c945dbd6e63fde97 extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "

";
        // line 3
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    <div class=\"container mt-5\">
        <header class=\"text-center mb-5\">
            <h1>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</h1>
            <p class=\"lead\">";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["description"] ?? null), "html", null, true);
        yield "</p>
        </header>

        <div class=\"row\">
            ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["articles"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 12
            yield "                <div class=\"col-md-4 mb-4\">
                    <div class=\"card h-100\">
                        ";
            // line 14
            if (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 14)) {
                // line 15
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 15), "html", null, true);
                yield "\" class=\"card-img-top\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 15), "html", null, true);
                yield "\">
                        ";
            }
            // line 17
            yield "                        <div class=\"card-body\">
                            <h5 class=\"card-title\">";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 18), "html", null, true);
            yield "</h5>
                            <p class=\"card-text\">";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "content", [], "any", false, false, false, 19), 0, 150), "html", null, true);
            yield "...</p>
                            <a href=\"#\" class=\"btn btn-primary\">Read More</a>
                        </div>
                        <div class=\"card-footer text-muted\">
                            Published on ";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "created_at", [], "any", false, false, false, 23), "F j, Y"), "html", null, true);
            yield "
                        </div>
                    </div>
                </div>
            ";
            $context['_iterated'] = true;
        }
        // line 31
        if (!$context['_iterated']) {
            // line 28
            yield "                <div class=\"col-12 text-center\">
                    <p>No articles found.</p>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['article'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        yield "        </div>
    </div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front/home.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  126 => 32,  117 => 28,  115 => 31,  106 => 23,  99 => 19,  95 => 18,  92 => 17,  84 => 15,  82 => 14,  78 => 12,  73 => 11,  66 => 7,  62 => 6,  58 => 4,  47 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("

{% block content %}
    <div class=\"container mt-5\">
        <header class=\"text-center mb-5\">
            <h1>{{ title }}</h1>
            <p class=\"lead\">{{ description }}</p>
        </header>

        <div class=\"row\">
            {% for article in articles %}
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card h-100\">
                        {% if article.image %}
                            <img src=\"{{ article.image }}\" class=\"card-img-top\" alt=\"{{ article.title }}\">
                        {% endif %}
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{{ article.title }}</h5>
                            <p class=\"card-text\">{{ article.content|slice(0, 150) }}...</p>
                            <a href=\"#\" class=\"btn btn-primary\">Read More</a>
                        </div>
                        <div class=\"card-footer text-muted\">
                            Published on {{ article.created_at|date('F j, Y') }}
                        </div>
                    </div>
                </div>
            {% else %}
                <div class=\"col-12 text-center\">
                    <p>No articles found.</p>
                </div>
            {% endfor %}
        </div>
    </div>
{% endblock %}", "front/home.twig", "C:\\laragon\\www\\anouar_elbarry_projet_mvc-_php\\app\\views\\front\\home.twig");
    }
}
