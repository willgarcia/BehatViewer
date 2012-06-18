<?php
namespace jubianchi\BehatViewerBundle\Markdown;

use Knp\Bundle\MarkdownBundle\Parser\Preset\Max;

class MarkdownParser extends Max
{
    protected function _doHeaders_callback_setext($matches)
    {
        if ($matches[3] == '-' && preg_match('{^- }', $matches[1]))
            return $matches[0];
        $level = $matches[3]{0} == '=' ? 1 : 2;
        $attr = $this->_doHeaders_attr($id = & $matches[2]);

        if($level == 1) {
          $block = "<h$level$attr class=\"page-header\">".$this->runSpanGamut($matches[1])."</h$level>";
        } else {
          $block = "<h$level$attr>".$this->runSpanGamut($matches[1])."</h$level>";
        }

        return "\n".$this->hashBlock($block)."\n\n";
    }

    protected function _doHeaders_callback_atx($matches)
    {
        $level = strlen($matches[1]);
        $attr = $this->_doHeaders_attr($id = & $matches[3]);

        if($level == 1) {
            $attr .= ' class="page-header"';
        }

        $block = "<h$level$attr>".$this->runSpanGamut($matches[2])."</h$level>";

        return "\n".$this->hashBlock($block)."\n\n";
    }

    protected function _doFencedCodeBlocks_callback($matches)
    {
        $codeblock = $matches[2];
        $codeblock = htmlspecialchars($codeblock, ENT_NOQUOTES);
        $codeblock = preg_replace_callback('/^\n+/', array(&$this, '_doFencedCodeBlocks_newlines'), $codeblock);
        $codeblock = "<pre class=\"prettyprint linenums\"><code>$codeblock</code></pre>";

        return "\n\n".$this->hashBlock($codeblock)."\n\n";
    }
}
?>
