<?php

class HtmlBuilder 
{
    public static function buildInput($type, $name, $title, $placeholder, $value, $class, $style = '', $options, $radioOptions = array(), $selectOptions = array()) 
    {
        $result = '';
        if (isset($value[$name])) {
          $value = $value[$name]; 
        } else {
            $value = isset($_POST[$name]) ? $_POST[$name] : '';
        }
        if ($type == 'text' || $type == 'number' || $type == 'email') {
            $result = '<div>
                        <label>'.$title.'</label>
                        <input id="'.$name.'" class="'.$class.'" type="'.$type.'" name="'.$name.'" placeholder="'.$placeholder.'" value="'.$value.'" '.(!empty($style)?'style="'.$style.'"':'').' '.$options.' />
                        <span></span>
                       </div>';    
        } else if ($type == 'textarea') {
            $result = '<div>
                        <label>'.$title.'</label>
                        <textarea id="'.$name.'" class="'.$class.'" type="text" name="'.$name.'" placeholder="'.$placeholder.'" '.$options.'>'.$value.'</textarea>
                        <span></span>
                       </div>';    
        } else if ($type == 'radio') {
            $result = '<div>
                        <label>'.$title.'</label>';
            foreach ($radioOptions as $radioOption) {
                $result .= '<label>
                                <input type="radio" id="'.$name.'" name="'.$name.'" 
                                       value="'.$radioOption.'" 
                                       class="'.$class.'" 
                                       '.(($value == $radioOption)?'checked':'').'      
                                       '.$options.' /> 
                                <span>'. showDaSauNu($radioOption) .'</span></label>';
            }
            $result .= '<span></span>
                       </div>';
        } else if ($type == 'select') {
            $result .= '<div>
                <label>'.$title.'</label>
                  <select name="'.$name.'" class="'.$class.'" style="'.$style.'" '.$options.'>';
            foreach ($selectOptions as $key => $value) {
                $result .= '<option value="'.$key.'">'.$value.'</option>';    
            }
            $result .= '</select>
                    </div>';
        }
        return $result;  
    }    
}