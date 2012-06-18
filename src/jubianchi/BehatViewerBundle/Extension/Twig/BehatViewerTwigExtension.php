<?php
namespace jubianchi\BehatViewerBundle\Extension\Twig;



/**
 *
 */
class BehatViewerTwigExtension extends \Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'behat_viewer_ext';
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'slugify' => new \Twig_Filter_Method($this, 'slugify'),
            'clean' => new \Twig_Filter_Method($this, 'clean'),
            'basename' => new \Twig_Filter_Function('basename'),
            'ceil' => new \Twig_Filter_Function('ceil'),
            'dump' => new \Twig_Filter_Function('var_dump'),
            'round' => new \Twig_Filter_Method($this, 'round'),
            'iconv' => new \Twig_Filter_Method($this, 'iconv'),
            'count' => new \Twig_Filter_Function('count'),
            'nl2br' => new \Twig_Filter_Function('nl2br'),
        );
    }

    /**
     * @param float $value
     * @param int   $dec
     *
     * @return float
     */
    public function round($value, $dec = 1)
    {
        return round((float)$value, $dec);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = $this->iconv($text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        return $text;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function clean($text)
    {
        $text = str_replace(array('?P'), '', $text);
        $text = preg_replace('/[^\s\w]+/u', '', $text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        $text = $this->iconv($text);
        $text = strtolower($text);
        $text = preg_replace('/[^-\w\s]+/', '', $text);

        return $text;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function iconv($text)
    {
        if(function_exists('iconv'))
        {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        return $text;
    }
}
