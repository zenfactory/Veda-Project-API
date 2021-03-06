<?php
    require_once("includes/htmlpurifier/library/HTMLPurifier.auto.php");
    $HTML_Allowed_Elms = 'section,p,ul,ol,li,span,div,h2,h3,h4,h5,h6,h7,table,tbody,tr,td,th,blockquote,br,i,b,u';
    $HTML_Allowed_Classes = 'ilo,infoBox,citation';
    
    $purifierConfig = HTMLPurifier_Config::createDefault();

    $purifierConfig->set('Attr.EnableID', true);
    $purifierConfig->set('Attr.AllowedClasses', $HTML_Allowed_Classes);
    $purifierConfig->set('CSS.AllowedProperties', '');
    $purifierConfig->set('Attr.IDBlacklistRegexp','/^(?!(ilo|citation)[0-9]+)/');
    $purifierConfig->set('Core.Encoding', 'UTF-8'); // replace with your encoding
    $purifierConfig->set('HTML.Doctype', 'XHTML 1.0 Transitional'); // replace with your doctype

    $purifierConfig->set('HTML.AllowedElements', $HTML_Allowed_Elms);
    $def = $purifierConfig->getHTMLDefinition(true);
    $def->addAttribute('div','data-ilotype','Text');
    $def->addAttribute('div','data-infoboxtype','Text');
    $def->addAttribute('span','data-ilotype','Text');
    $htmlSection = $def->addElement(
                                    'section',
                                    'Block',
                                    'Flow',
                                    'Common'
                                    );
    $htmlSection = $def->addElement(
                                    'h7',
                                    'Block',
                                    'Inline',
                                    'Common'
                                    );

    $purifier = new HTMLPurifier($purifierConfig);