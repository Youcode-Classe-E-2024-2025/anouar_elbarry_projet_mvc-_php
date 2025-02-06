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

/* front/base.html.twig */
class __TwigTemplate_ce0333d577a7ad626ec09bf57dffd4d7 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    
    <!-- Tailwind CSS -->
    <script src=\"https://cdn.tailwindcss.com\"></script>
    
    ";
        // line 11
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 12
        yield "</head>
<body class=\"min-h-screen flex flex-col bg-gray-50\">
    <!-- Navigation -->
    <nav class=\"bg-white shadow-lg\">
        <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8\">
            <div class=\"flex justify-between h-16\">
                <div class=\"flex\">
                    <div class=\"flex-shrink-0 flex items-center\">
                        <a href=\"/\" class=\"font-bold text-xl text-gray-800\">Blog MVC</a>
                    </div>
                    <div class=\"hidden sm:ml-6 sm:flex sm:space-x-8\">
                        <a href=\"/\" class=\"inline-flex items-center px-1 pt-1 text-gray-900 hover:text-gray-500\">
                            Home
                        </a>
                        <a href=\"/articles\" class=\"inline-flex items-center px-1 pt-1 text-gray-900 hover:text-gray-500\">
                            Articles
                        </a>
                    </div>
                </div>
                <div class=\"hidden sm:ml-6 sm:flex sm:items-center\">
                    ";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "isLoggedIn", [], "method", false, false, false, 32)) {
            // line 33
            yield "                        <div class=\"ml-3 relative group\">
                            <button type=\"button\" class=\"flex text-sm rounded-full focus:outline-none\">
                                <span class=\"text-gray-700\">";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "user", [], "any", false, false, false, 35), "name", [], "any", false, false, false, 35), "html", null, true);
            yield "</span>
                                <svg class=\"ml-2 h-5 w-5 text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 20 20\" fill=\"currentColor\">
                                    <path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\" clip-rule=\"evenodd\" />
                                </svg>
                            </button>
                            <div class=\"hidden group-hover:block absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5\">
                                <a href=\"/dashboard\" class=\"block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100\">Dashboard</a>
                                <a href=\"/logout\" class=\"block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100\">Logout</a>
                            </div>
                        </div>
                    ";
        } else {
            // line 46
            yield "                        <div class=\"flex space-x-4\">
                            <a href=\"/login\" class=\"text-gray-900 hover:text-gray-500 px-3 py-2\">
                                Login
                            </a>
                            <a href=\"/register\" class=\"bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md\">
                                Register
                            </a>
                        </div>
                    ";
        }
        // line 55
        yield "                </div>
                <!-- Mobile menu button -->
                <div class=\"flex items-center sm:hidden\">
                    <button type=\"button\" class=\"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none\" aria-controls=\"mobile-menu\" aria-expanded=\"false\">
                        <svg class=\"h-6 w-6\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M4 6h16M4 12h16M4 18h16\" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class=\"sm:hidden\" id=\"mobile-menu\">
            <div class=\"pt-2 pb-3 space-y-1\">
                <a href=\"/\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Home</a>
                <a href=\"/articles\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Articles</a>
                ";
        // line 73
        yield "                    <a href=\"/login\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Login</a>
                    <a href=\"/register\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Register</a>
                ";
        // line 76
        yield "            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class=\"flex-grow\">
        ";
        // line 82
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 83
        yield "    </main>

    <!-- Footer -->
    <footer class=\"bg-white\">
        <div class=\"max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8\">
            <div class=\"grid grid-cols-1 md:grid-cols-2 gap-8\">
                <div>
                    <h5 class=\"text-lg font-semibold text-gray-900\">Blog MVC</h5>
                    <p class=\"mt-2 text-gray-600\">A simple blog built with PHP MVC architecture.</p>
                </div>
                <div class=\"text-right\">
                    <p class=\"text-gray-600\">&copy; ";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Blog MVC. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- AlpineJS for dropdown functionality -->
    <script src=\"https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js\"></script>
    
    ";
        // line 103
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 104
        yield "
    <script>
        // Mobile menu toggle
        document.querySelector('[aria-controls=\"mobile-menu\"]').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Blog MVC";
        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 82
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 103
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front/base.html.twig";
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
        return array (  223 => 103,  213 => 82,  203 => 11,  192 => 6,  176 => 104,  174 => 103,  162 => 94,  149 => 83,  147 => 82,  139 => 76,  135 => 73,  116 => 55,  105 => 46,  91 => 35,  87 => 33,  85 => 32,  63 => 12,  61 => 11,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Blog MVC{% endblock %}</title>
    
    <!-- Tailwind CSS -->
    <script src=\"https://cdn.tailwindcss.com\"></script>
    
    {% block stylesheets %}{% endblock %}
</head>
<body class=\"min-h-screen flex flex-col bg-gray-50\">
    <!-- Navigation -->
    <nav class=\"bg-white shadow-lg\">
        <div class=\"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8\">
            <div class=\"flex justify-between h-16\">
                <div class=\"flex\">
                    <div class=\"flex-shrink-0 flex items-center\">
                        <a href=\"/\" class=\"font-bold text-xl text-gray-800\">Blog MVC</a>
                    </div>
                    <div class=\"hidden sm:ml-6 sm:flex sm:space-x-8\">
                        <a href=\"/\" class=\"inline-flex items-center px-1 pt-1 text-gray-900 hover:text-gray-500\">
                            Home
                        </a>
                        <a href=\"/articles\" class=\"inline-flex items-center px-1 pt-1 text-gray-900 hover:text-gray-500\">
                            Articles
                        </a>
                    </div>
                </div>
                <div class=\"hidden sm:ml-6 sm:flex sm:items-center\">
                    {% if auth.isLoggedIn() %}
                        <div class=\"ml-3 relative group\">
                            <button type=\"button\" class=\"flex text-sm rounded-full focus:outline-none\">
                                <span class=\"text-gray-700\">{{ auth.user.name }}</span>
                                <svg class=\"ml-2 h-5 w-5 text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 20 20\" fill=\"currentColor\">
                                    <path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\" clip-rule=\"evenodd\" />
                                </svg>
                            </button>
                            <div class=\"hidden group-hover:block absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5\">
                                <a href=\"/dashboard\" class=\"block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100\">Dashboard</a>
                                <a href=\"/logout\" class=\"block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100\">Logout</a>
                            </div>
                        </div>
                    {% else %}
                        <div class=\"flex space-x-4\">
                            <a href=\"/login\" class=\"text-gray-900 hover:text-gray-500 px-3 py-2\">
                                Login
                            </a>
                            <a href=\"/register\" class=\"bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md\">
                                Register
                            </a>
                        </div>
                    {% endif %}
                </div>
                <!-- Mobile menu button -->
                <div class=\"flex items-center sm:hidden\">
                    <button type=\"button\" class=\"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none\" aria-controls=\"mobile-menu\" aria-expanded=\"false\">
                        <svg class=\"h-6 w-6\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M4 6h16M4 12h16M4 18h16\" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class=\"sm:hidden\" id=\"mobile-menu\">
            <div class=\"pt-2 pb-3 space-y-1\">
                <a href=\"/\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Home</a>
                <a href=\"/articles\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Articles</a>
                {# {% if not auth.isLoggedIn() %} #}
                    <a href=\"/login\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Login</a>
                    <a href=\"/register\" class=\"block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50\">Register</a>
                {# {% endif %} #}
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class=\"flex-grow\">
        {% block content %}{% endblock %}
    </main>

    <!-- Footer -->
    <footer class=\"bg-white\">
        <div class=\"max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8\">
            <div class=\"grid grid-cols-1 md:grid-cols-2 gap-8\">
                <div>
                    <h5 class=\"text-lg font-semibold text-gray-900\">Blog MVC</h5>
                    <p class=\"mt-2 text-gray-600\">A simple blog built with PHP MVC architecture.</p>
                </div>
                <div class=\"text-right\">
                    <p class=\"text-gray-600\">&copy; {{ \"now\"|date(\"Y\") }} Blog MVC. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- AlpineJS for dropdown functionality -->
    <script src=\"https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js\"></script>
    
    {% block javascripts %}{% endblock %}

    <script>
        // Mobile menu toggle
        document.querySelector('[aria-controls=\"mobile-menu\"]').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>", "front/base.html.twig", "C:\\laragon\\www\\anouar_elbarry_projet_mvc-_php\\app\\views\\front\\base.html.twig");
    }
}
