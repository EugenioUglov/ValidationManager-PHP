<?php
class ValidationManager {
    // Function check if the name field only contains letters, dashes, apostrophes and whitespaces.
    function is_name_valid($input_object) {
        // Required keys for $input_object are name.
       
        if (isset($input_object->name) == false) {
            throw new Exception('Error! In function is_name_valid($input_object), required keys for $input_object are name');
        }
        
        if (preg_match("/^[a-zA-Z-' ]*$/", $input_object->name)) {
            return true;
        }
        
        return false;
    }

    function is_email_valid($input_object) {
        // Required keys for $input_object are email.
       
        if (isset($input_object->email) == false) {
            throw new Exception('Error! In function is_email_valid($input_object), required keys for $input_object are email');
        }

        if (filter_var($input_object->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    function is_url_valid($input_object) {
        // Required keys for $input_object  are URL.
    
        if (isset($input_object->URL) == false) {
            throw new Exception('Error! In function is_url_valid($input_object), required keys for $input_object are URL');
        }

    
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $input_object->URL)) {
            return true;
        }

        return false;
    }
    
    function is_ip_valid($input_ip) {
        $ip_address = $input_ip;

        if (filter_var($ip_address, FILTER_VALIDATE_IP)) {
            return true;
        } else {
            return false;
        }
    }

    function get_secured_string($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_secured_string($input_object), required keys for $input_object are string_subject');
        }

        $validated_string = $input_object->string_subject;
        
        $validated_string = trim($validated_string);
        $validated_string = stripslashes($validated_string);
        $validated_string = htmlspecialchars($validated_string);

        return $validated_string;
    }
    
    function get_string_without_html_tags($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_string_without_html_tags($input_object), required keys for $input_object are string_subject');
        }
        
        return filter_var($input_object->string_subject, FILTER_SANITIZE_STRING);
    }
}
