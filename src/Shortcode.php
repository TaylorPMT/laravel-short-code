<?php


namespace Taylorpmt\ShortCode;


use Taylorpmt\ShortCode\Compilers\ShortcodeCompiler;

class Shortcode
{
    /**
     * Shortcode compiler
     *
     * @var ShortcodeCompiler
     */
    protected $compiler;

    /**
     * Constructor
     *
     * @param ShortcodeCompiler $compiler
     */
    public function __construct(ShortcodeCompiler $compiler)
    {
        $this->compiler = $compiler;
    }

    /**
     * Register a new shortcode
     *
     * @param string $name
     * @param callable|string $callback
     *
     * @return Shortcode
     */
    public function register($name, $callback)
    {
        $this->compiler->add($name, $callback);

        return $this;
    }

    /**
     * Enable the laravel-shortcodes
     *
     * @return Shortcode
     */
    public function enable()
    {
        $this->compiler->enable();

        return $this;
    }

    /**
     * Disable the laravel-shortcodes
     *
     * @return Shortcode
     */
    public function disable()
    {
        $this->compiler->disable();

        return $this;
    }

    /**
     * Compile the given string
     *
     * @param string $value
     *
     * @return string
     */
    public function compile($value)
    {
        // Always enable when we call the compile method directly
        $this->enable();

        // return compiled contents
        return $this->compiler->compile($value);
    }

    /**
     * Remove all shortcode tags from the given content.
     *
     * @param string $value
     *
     * @return string
     */
    public function strip($value)
    {
        return $this->compiler->strip($value);
    }
}
