<?php

/* molinaseguridadBundle:Default:login.html.twig */
class __TwigTemplate_97949f480dfd70050fac338d7eba6d0b571f9ec884c5259ebe7df2f184dbd2f5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>LOGIN!</title>
    </head>
    <body>
        ";
        // line 8
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 9
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
        ";
        }
        // line 11
        echo "        <form action=\"";
        echo $this->env->getExtension('routing')->getPath("check_path");
        echo "\" method=\"post\"
              <p>usuario<input type=\"text\" name=\"_username\" /></p>
            <p>contrasena <input type=\"text\" name=\"_password\" /></p>
            <p><input type=\"submit\" value=\"enviar\" /></p>
        </form>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "molinaseguridadBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 11,  30 => 9,  28 => 8,  19 => 1,);
    }
}
