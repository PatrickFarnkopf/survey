<?php

namespace Framework\Views\Patemp;


class Compiler
{
    private function __construct()
    { }

    public function build(Template $template, array $data = [])
    {
        $buffer = $template->getContent();

        if (strpos($buffer, '@SET_LAYOUT') !== false)
        {
            $layoutTemp = explode("SET_LAYOUT '", $buffer)[1];
            $layoutTemp = explode("';", $layoutTemp)[0];
            
            $layout = new Template();
            $layout->setFile(\Framework\Kernel::instance()->getApplicationRoot() . "/../App/Views/" . $layoutTemp . ".phtml");
            $layoutContent = $layout->getContent();

            $data = explode("\n", $buffer);
            $data[0] = "";

            $buffer = implode("\n", $data);
            $buffer = str_replace("@BODY_SECTION", $buffer, $layoutContent);
        }

        $temp = $buffer;
        preg_match_all('/\{{(.*?)\}}/', $temp, $logic);

        foreach ($logic[1] as $key => $value)
        {
            $tmp = trim($value);
            $mustEcho = false;

            if (strpos($tmp, " ") === false && strpos($tmp, "--") === false && strpos($tmp, "++") === false && strpos($tmp, "=") === false && $tmp[0] === "$" )
                $mustEcho = true;

            $buffer = str_replace($logic[0][$key], ($mustEcho ? "<?=" : '<?php ') . $value . ' ?>', $buffer);
        }

        return $buffer;
    }

    private static $instance;

    /**
     * @return Compiler
     */
    public static function instance()
    {
        if (Compiler::$instance == null)
        {
            Compiler::$instance = new Compiler();
        }

        return Compiler::$instance;
    }
}