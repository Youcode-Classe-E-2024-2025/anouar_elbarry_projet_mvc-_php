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

/* front/article.twig */
class __TwigTemplate_5d4a04aaf3bf7c4a3e91f145cccc282a extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "front/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("front/base.html.twig", "front/article.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Articles";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<div class=\"container mx-auto px-4 py-8\">
    <h1 class=\"text-3xl font-bold mb-8 text-gray-800\">Articles</h1>
    
    ";
        // line 9
        if (Twig\Extension\CoreExtension::testEmpty(($context["articles"] ?? null))) {
            // line 10
            yield "        <div class=\"bg-gray-100 rounded-lg p-6 text-center\">
            <p class=\"text-gray-600\">No articles found.</p>
        </div>
    ";
        } else {
            // line 14
            yield "        <div class=\"grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6\">
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["articles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 16
                yield "                <article class=\"bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:transform hover:scale-105\">
                    ";
                // line 17
                if (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 17)) {
                    // line 18
                    yield "                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 18), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 18), "html", null, true);
                    yield "\" class=\"w-full h-48 object-cover\">
                    ";
                }
                // line 20
                yield "                    
                    <div class=\"p-6\">
                        <h2 class=\"text-xl font-semibold mb-2 text-gray-800\">
                            <a href=\"/article/";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 23), "html", null, true);
                yield "\" class=\"hover:text-blue-600 transition-colors duration-200\">
                                ";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 24), "html", null, true);
                yield "
                            </a>
                        </h2>
                        
                        <p class=\"text-gray-600 mb-4 line-clamp-3\">
                            ";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "content", [], "any", false, false, false, 29)), 0, 150), "html", null, true);
                yield "...
                        </p>
                        
                        <div class=\"flex items-center justify-between text-sm text-gray-500\">
                            <span>
                                <i class=\"far fa-calendar-alt mr-1\"></i>
                                ";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "created_at", [], "any", false, false, false, 35), "F j, Y"), "html", null, true);
                yield "
                            </span>
                            <a href=\"/article/";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 37), "html", null, true);
                yield "\" class=\"text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200\">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['article'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "        </div>
        
        ";
            // line 46
            if ((($context["totalPages"] ?? null) > 1)) {
                // line 47
                yield "            <div class=\"mt-8 flex justify-center\">
                <nav class=\"inline-flex rounded-md shadow\">
                    ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["totalPages"] ?? null)));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 50
                    yield "                        <a href=\"?page=";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "\" 
                           class=\"px-3 py-2 ";
                    // line 51
                    if ((($context["currentPage"] ?? null) == $context["i"])) {
                        yield "bg-blue-600 text-white";
                    } else {
                        yield "bg-white text-gray-700 hover:bg-gray-50";
                    }
                    yield " text-sm font-medium border ";
                    if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 51)) {
                        yield "border-r-0";
                    }
                    // line 52
                    yield "                                  ";
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 52)) {
                        yield "rounded-l-md";
                    }
                    // line 53
                    yield "                                  ";
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 53)) {
                        yield "rounded-r-md";
                    }
                    yield "\">
                            ";
                    // line 54
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "
                        </a>
                    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                yield "                </nav>
            </div>
        ";
            }
            // line 60
            yield "    ";
        }
        // line 61
        yield "</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front/article.twig";
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
        return array (  226 => 61,  223 => 60,  218 => 57,  201 => 54,  194 => 53,  189 => 52,  179 => 51,  174 => 50,  157 => 49,  153 => 47,  151 => 46,  147 => 44,  134 => 37,  129 => 35,  120 => 29,  112 => 24,  108 => 23,  103 => 20,  95 => 18,  93 => 17,  90 => 16,  86 => 15,  83 => 14,  77 => 10,  75 => 9,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"front/base.html.twig\" %}

{% block title %}Articles{% endblock %}

{% block content %}
<div class=\"container mx-auto px-4 py-8\">
    <h1 class=\"text-3xl font-bold mb-8 text-gray-800\">Articles</h1>
    
    {% if articles is empty %}
        <div class=\"bg-gray-100 rounded-lg p-6 text-center\">
            <p class=\"text-gray-600\">No articles found.</p>
        </div>
    {% else %}
        <div class=\"grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6\">
            {% for article in articles %}
                <article class=\"bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:transform hover:scale-105\">
                    {% if article.image %}
                        <img src=\"{{ article.image }}\" alt=\"{{ article.title }}\" class=\"w-full h-48 object-cover\">
                    {% endif %}
                    
                    <div class=\"p-6\">
                        <h2 class=\"text-xl font-semibold mb-2 text-gray-800\">
                            <a href=\"/article/{{ article.id }}\" class=\"hover:text-blue-600 transition-colors duration-200\">
                                {{ article.title }}
                            </a>
                        </h2>
                        
                        <p class=\"text-gray-600 mb-4 line-clamp-3\">
                            {{ article.content|striptags|slice(0, 150) }}...
                        </p>
                        
                        <div class=\"flex items-center justify-between text-sm text-gray-500\">
                            <span>
                                <i class=\"far fa-calendar-alt mr-1\"></i>
                                {{ article.created_at|date(\"F j, Y\") }}
                            </span>
                            <a href=\"/article/{{ article.id }}\" class=\"text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200\">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
            {% endfor %}
        </div>
        
        {% if totalPages > 1 %}
            <div class=\"mt-8 flex justify-center\">
                <nav class=\"inline-flex rounded-md shadow\">
                    {% for i in 1..totalPages %}
                        <a href=\"?page={{ i }}\" 
                           class=\"px-3 py-2 {% if currentPage == i %}bg-blue-600 text-white{% else %}bg-white text-gray-700 hover:bg-gray-50{% endif %} text-sm font-medium border {% if not loop.last %}border-r-0{% endif %}
                                  {% if loop.first %}rounded-l-md{% endif %}
                                  {% if loop.last %}rounded-r-md{% endif %}\">
                            {{ i }}
                        </a>
                    {% endfor %}
                </nav>
            </div>
        {% endif %}
    {% endif %}
</div>
{% endblock %}", "front/article.twig", "C:\\laragon\\www\\anouar_elbarry_projet_mvc-_php\\app\\views\\front\\article.twig");
    }
}
