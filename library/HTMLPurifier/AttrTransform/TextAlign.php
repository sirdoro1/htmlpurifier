<?php

require_once 'HTMLPurifier/AttrTransform.php';

class HTMLPurifier_AttrTransform_TextAlign
    extends HTMLPurifier_AttrTransform {

    function transform($attr) {
        
        if (!isset($attr['align'])) return $attr;
        
        $align = strtolower(trim($attr['align']));
        unset($attr['align']);
        
        $values = array('left' => 1,
                        'right' => 1,
                        'center' => 1,
                        'justify' => 1);
        
        if (!isset($values[$align])) {
            return $attr;
        }
        
        $attr['style'] = isset($attr['style']) ? $attr['style'] : '';
        $attr['style'] = "text-align:$align;" . $attr['style'];
        
        return $attr;
        
    }
    
}

?>