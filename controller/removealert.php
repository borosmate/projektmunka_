<?php

            
                $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $key = "alert";
                
                $filteredURL = preg_replace('~(\?|&)'.$key.'=[^&]*~', '$1', $url);
                header('Location: '.$filteredURL);
            
        
        ?>