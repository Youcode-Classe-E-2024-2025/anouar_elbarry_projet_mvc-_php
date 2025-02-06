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

/* front/articleDetails.twig */
class __TwigTemplate_8743d9d830203bb237120735a056ea28 extends Template
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
        $this->parent = $this->loadTemplate("front/base.html.twig", "front/articleDetails.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Article Details";
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
    <!-- Article Header -->
    <div class=\"max-w-4xl mx-auto\">
        <div class=\"mb-8\">
            <!-- Breadcrumb -->
            <nav class=\"flex mb-6 text-gray-600 text-sm\">
                <a href=\"/\" class=\"hover:text-blue-600\">Home</a>
                <span class=\"mx-2\">/</span>
                <a href=\"/articles\" class=\"hover:text-blue-600\">Articles</a>
                <span class=\"mx-2\">/</span>
                <span class=\"text-gray-400\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "title", [], "any", false, false, false, 16), "html", null, true);
        yield "</span>
            </nav>

            <!-- Article Title -->
            <h1 class=\"text-4xl font-bold text-gray-900 mb-4\">
               ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "title", [], "any", false, false, false, 21), "html", null, true);
        yield "
            </h1>

            <!-- Article Meta -->
            <div class=\"flex items-center text-gray-600 text-sm mb-8\">
                <span class=\"flex items-center\">
                    <i class=\"far fa-calendar-alt mr-2\"></i>
                  ";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "created_at", [], "any", false, false, false, 28), "html", null, true);
        yield "
                </span>
                <span class=\"mx-4\">•</span>
                <span class=\"flex items-center\">
                    <i class=\"far fa-clock mr-2\"></i>
                    5 min read
                </span>
            </div>
        </div>

        <!-- Featured Image -->
        <div class=\"mb-8 rounded-lg overflow-hidden shadow-lg\">
            <img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTah0nVO5ESjopFqpvWoEzgfcq4z2q85WwOOg&s\" alt=\"imge\" class=\"w-full h-[400px] object-cover\">
        </div>

        <!-- Article Content -->
        <article class=\"prose prose-lg max-w-none mb-12\">
            <!-- Content will go here -->
            <p class=\"text-gray-700 leading-relaxed mb-6\">
               ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "content", [], "any", false, false, false, 47), "html", null, true);
        yield "
            </p>
        </article>
        <!-- Author Section -->
        <div class=\"bg-gray-50 rounded-xl p-8 mb-12\">
            <div class=\"flex items-center\">
                <div class=\"flex-shrink-0\">
                    <img class=\"h-14 w-14 rounded-full\" src=\"https://ui-avatars.com/api/?name=";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "username", [], "any", false, false, false, 54), "html", null, true);
        yield "\" alt=\"Author avatar\">
                </div>
                <div class=\"ml-4\">
                    <h3 class=\"text-lg font-semibold text-gray-900\">";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "username", [], "any", false, false, false, 57), "html", null, true);
        yield "</h3>
                    <p class=\"text-gray-600\">Author bio or description goes here. This is a brief introduction about the author.</p>
                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front/articleDetails.twig";
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
        return array (  138 => 57,  132 => 54,  122 => 47,  100 => 28,  90 => 21,  82 => 16,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"front/base.html.twig\" %}

{% block title %}Article Details{% endblock %}

{% block content %}
<div class=\"container mx-auto px-4 py-8\">
    <!-- Article Header -->
    <div class=\"max-w-4xl mx-auto\">
        <div class=\"mb-8\">
            <!-- Breadcrumb -->
            <nav class=\"flex mb-6 text-gray-600 text-sm\">
                <a href=\"/\" class=\"hover:text-blue-600\">Home</a>
                <span class=\"mx-2\">/</span>
                <a href=\"/articles\" class=\"hover:text-blue-600\">Articles</a>
                <span class=\"mx-2\">/</span>
                <span class=\"text-gray-400\">{{article.title}}</span>
            </nav>

            <!-- Article Title -->
            <h1 class=\"text-4xl font-bold text-gray-900 mb-4\">
               {{article.title}}
            </h1>

            <!-- Article Meta -->
            <div class=\"flex items-center text-gray-600 text-sm mb-8\">
                <span class=\"flex items-center\">
                    <i class=\"far fa-calendar-alt mr-2\"></i>
                  {{article.created_at}}
                </span>
                <span class=\"mx-4\">•</span>
                <span class=\"flex items-center\">
                    <i class=\"far fa-clock mr-2\"></i>
                    5 min read
                </span>
            </div>
        </div>

        <!-- Featured Image -->
        <div class=\"mb-8 rounded-lg overflow-hidden shadow-lg\">
            <img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTah0nVO5ESjopFqpvWoEzgfcq4z2q85WwOOg&s\" alt=\"imge\" class=\"w-full h-[400px] object-cover\">
        </div>

        <!-- Article Content -->
        <article class=\"prose prose-lg max-w-none mb-12\">
            <!-- Content will go here -->
            <p class=\"text-gray-700 leading-relaxed mb-6\">
               {{article.content}}
            </p>
        </article>
        <!-- Author Section -->
        <div class=\"bg-gray-50 rounded-xl p-8 mb-12\">
            <div class=\"flex items-center\">
                <div class=\"flex-shrink-0\">
                    <img class=\"h-14 w-14 rounded-full\" src=\"https://ui-avatars.com/api/?name={{article.username}}\" alt=\"Author avatar\">
                </div>
                <div class=\"ml-4\">
                    <h3 class=\"text-lg font-semibold text-gray-900\">{{article.username}}</h3>
                    <p class=\"text-gray-600\">Author bio or description goes here. This is a brief introduction about the author.</p>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "front/articleDetails.twig", "C:\\laragon\\www\\anouar_elbarry_projet_mvc-_php\\app\\views\\front\\articleDetails.twig");
    }
}
