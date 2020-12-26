<?php

require __DIR__ . '/vendor/autoload.php';

use VStelmakh\UrlHighlight\UrlHighlight;

class ClickableLinkExtension extends Minz_Extension
{
    public function init()
    {
        $this->registerHook('entry_before_display', array($this, 'makeClickableLinks'));
    }

    function makeClickableLinks($entry)
    {
        $converter = new UrlHighlight();
        $content = $converter->highlightUrls($entry->content());
        $entry->_content($content);
        return $entry;
    }
}