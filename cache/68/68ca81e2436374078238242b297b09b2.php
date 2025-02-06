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
        $this->parent = $this->loadTemplate("front/base.html.twig", "front/home.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Welcome to Our Blog";
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
        yield "<!-- Hero Section -->
<section class=\"relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24\">
    <div class=\"container mx-auto px-4\">
        <div class=\"max-w-3xl mx-auto text-center\">
            <h1 class=\"text-4xl md:text-5xl font-bold mb-6\">Welcome to Our Blog Platform</h1>
            <p class=\"text-xl mb-8\">Discover amazing stories, insights, and knowledge shared by our community.</p>
            <a href=\"/articles\" class=\"inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors\">
                Explore Articles
            </a>
        </div>
    </div>
    <!-- Decorative Elements -->
    <div class=\"absolute bottom-0 left-0 right-0\">
        <svg class=\"w-full h-20 fill-current text-white\" viewBox=\"0 0 1200 120\" preserveAspectRatio=\"none\">
            <path d=\"M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z\"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class=\"py-20 bg-white\">
    <div class=\"container mx-auto px-4\">
        <div class=\"grid grid-cols-1 md:grid-cols-3 gap-8\">
            <!-- Feature 1 -->
            <div class=\"text-center p-6\">
                <div class=\"w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4\">
                    <svg class=\"w-8 h-8 text-blue-600\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 6v6m0 0v6m0-6h6m-6 0H6\"></path>
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Create Content</h3>
                <p class=\"text-gray-600\">Share your thoughts and ideas with our growing community.</p>
            </div>
            <!-- Feature 2 -->
            <div class=\"text-center p-6\">
                <div class=\"w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4\">
                    <svg class=\"w-8 h-8 text-blue-600\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z\"></path>
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Engage</h3>
                <p class=\"text-gray-600\">Connect with other writers and readers in meaningful discussions.</p>
            </div>
            <!-- Feature 3 -->
            <div class=\"text-center p-6\">
                <div class=\"w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4\">
                    <svg class=\"w-8 h-8 text-blue-600\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13 10V3L4 14h7v7l9-11h-7z\"></path>
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Grow</h3>
                <p class=\"text-gray-600\">Learn and expand your knowledge through diverse perspectives.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class=\"py-20 bg-gray-50\">
    <div class=\"container mx-auto px-4\">
        <div class=\"max-w-3xl mx-auto\">
            <div class=\"text-center mb-12\">
                <h2 class=\"text-3xl font-bold mb-4\">About Us</h2>
                <div class=\"w-20 h-1 bg-blue-600 mx-auto\"></div>
            </div>
            <div class=\"prose prose-lg mx-auto\">
                <p class=\"mb-6\">
                    Welcome to our vibrant blog community! We're passionate about creating a space where ideas flourish and knowledge is shared freely. Our platform brings together writers, thinkers, and readers from all walks of life.
                </p>
                <p class=\"mb-6\">
                    Our mission is to provide a platform that empowers voices, encourages meaningful discussions, and facilitates the exchange of ideas. Whether you're here to learn, share, or connect, we're glad to have you as part of our community.
                </p>
                <p>
                    Join us in building a collaborative space where stories come alive and perspectives broaden. Together, we're creating more than just a blog – we're building a community of lifelong learners and passionate creators.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class=\"py-20 bg-white\">
    <div class=\"container mx-auto px-4\">
        <div class=\"max-w-3xl mx-auto text-center\">
            <h2 class=\"text-3xl font-bold mb-8\">Get In Touch</h2>
            <p class=\"text-xl text-gray-600 mb-8\">Have questions or suggestions? We'd love to hear from you!</p>
            <a href=\"mailto:contact@example.com\" class=\"inline-block bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors\">
                Contact Us
            </a>
        </div>
    </div>
</section>
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
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"front/base.html.twig\" %}

{% block title %}Welcome to Our Blog{% endblock %}

{% block content %}
<!-- Hero Section -->
<section class=\"relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24\">
    <div class=\"container mx-auto px-4\">
        <div class=\"max-w-3xl mx-auto text-center\">
            <h1 class=\"text-4xl md:text-5xl font-bold mb-6\">Welcome to Our Blog Platform</h1>
            <p class=\"text-xl mb-8\">Discover amazing stories, insights, and knowledge shared by our community.</p>
            <a href=\"/articles\" class=\"inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors\">
                Explore Articles
            </a>
        </div>
    </div>
    <!-- Decorative Elements -->
    <div class=\"absolute bottom-0 left-0 right-0\">
        <svg class=\"w-full h-20 fill-current text-white\" viewBox=\"0 0 1200 120\" preserveAspectRatio=\"none\">
            <path d=\"M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z\"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class=\"py-20 bg-white\">
    <div class=\"container mx-auto px-4\">
        <div class=\"grid grid-cols-1 md:grid-cols-3 gap-8\">
            <!-- Feature 1 -->
            <div class=\"text-center p-6\">
                <div class=\"w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4\">
                    <svg class=\"w-8 h-8 text-blue-600\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 6v6m0 0v6m0-6h6m-6 0H6\"></path>
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Create Content</h3>
                <p class=\"text-gray-600\">Share your thoughts and ideas with our growing community.</p>
            </div>
            <!-- Feature 2 -->
            <div class=\"text-center p-6\">
                <div class=\"w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4\">
                    <svg class=\"w-8 h-8 text-blue-600\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z\"></path>
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Engage</h3>
                <p class=\"text-gray-600\">Connect with other writers and readers in meaningful discussions.</p>
            </div>
            <!-- Feature 3 -->
            <div class=\"text-center p-6\">
                <div class=\"w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4\">
                    <svg class=\"w-8 h-8 text-blue-600\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13 10V3L4 14h7v7l9-11h-7z\"></path>
                    </svg>
                </div>
                <h3 class=\"text-xl font-semibold mb-2\">Grow</h3>
                <p class=\"text-gray-600\">Learn and expand your knowledge through diverse perspectives.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class=\"py-20 bg-gray-50\">
    <div class=\"container mx-auto px-4\">
        <div class=\"max-w-3xl mx-auto\">
            <div class=\"text-center mb-12\">
                <h2 class=\"text-3xl font-bold mb-4\">About Us</h2>
                <div class=\"w-20 h-1 bg-blue-600 mx-auto\"></div>
            </div>
            <div class=\"prose prose-lg mx-auto\">
                <p class=\"mb-6\">
                    Welcome to our vibrant blog community! We're passionate about creating a space where ideas flourish and knowledge is shared freely. Our platform brings together writers, thinkers, and readers from all walks of life.
                </p>
                <p class=\"mb-6\">
                    Our mission is to provide a platform that empowers voices, encourages meaningful discussions, and facilitates the exchange of ideas. Whether you're here to learn, share, or connect, we're glad to have you as part of our community.
                </p>
                <p>
                    Join us in building a collaborative space where stories come alive and perspectives broaden. Together, we're creating more than just a blog – we're building a community of lifelong learners and passionate creators.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class=\"py-20 bg-white\">
    <div class=\"container mx-auto px-4\">
        <div class=\"max-w-3xl mx-auto text-center\">
            <h2 class=\"text-3xl font-bold mb-8\">Get In Touch</h2>
            <p class=\"text-xl text-gray-600 mb-8\">Have questions or suggestions? We'd love to hear from you!</p>
            <a href=\"mailto:contact@example.com\" class=\"inline-block bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors\">
                Contact Us
            </a>
        </div>
    </div>
</section>
{% endblock %}", "front/home.twig", "C:\\laragon\\www\\anouar_elbarry_projet_mvc-_php\\app\\views\\front\\home.twig");
    }
}
