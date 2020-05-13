<?php

    class func_image
    {
        // check Size Image
        public function checkSize($size,$min,$max)
        {   
            $flag = false;
            if($size > $min && $size < $max )
            {
                $flag = true;
            }
            return $flag;
        }
        public function checkExtention($filename,$arrExtension)
        {         
            $exten = pathinfo($filename,PATHINFO_EXTENSION) ;
            $flag = false;
            if(in_array(strtolower($exten),$arrExtension)== true) $flag = true;
        }
        

    }


?>