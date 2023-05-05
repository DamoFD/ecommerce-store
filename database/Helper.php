<?php

// Helper class
class Helper {
    public static function validate_input_text($textValue) {
        if (!empty($textValue)) {
            $trim_text = trim($textValue);
            // Remove illegal characters
            $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_SPECIAL_CHARS);
            return $sanitize_str;
        }
        return '';
    }

    public static function validate_input_email($emailValue) {
        if (!empty($emailValue)) {
            $trim_text = trim($emailValue);
            // Remove illegal characters
            $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
            return $sanitize_str;
        }
        return '';
    }
}

?>