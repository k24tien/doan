<?php
class Captcha 
{
    var $img_width      =   300;
    var $img_height     =   50; 
         
    var $font_path      =   '/captcha-fonts'; // du?ng d?n dên thu m?c file text
    var $fonts          =   array();
    var $font_size      =   15;
     
    var $char_set       =   "ABCDEFGHJKLMNPQRSTUVWXYZ2345689";
    var $char_length    =   5;
     
    var $char_color     =   "#880000,#008800,#000088,#888800,#880088,#008888,#000000";
    var $char_colors    =   array();
     
    var $line_count     =   10;
    var $line_color     =   "#DD6666,#66DD66,#6666DD,#DDDD66,#DD66DD,#66DDDD,#666666";
    var $line_colors    =   array();
         
    var $bg_color       =   '#FFFFFF';
     
    // Kh?i t?o c?u hình, hàm này s? tr? v? mã code và hi?n th? hình
    function get_and_show_image( $override = array() ) 
        {
                // Override l?i thong s? config
        if( is_array( $override) )
        {
            foreach ( $override as  $key => $value) {
                                if( isset( $this->$key ))
                                        $this->$key = $value;
            }           
        }
                 
                // T?o danh sách colors thành m?t m?ng
        $this->line_colors = preg_split("/,\s*?/", $this->line_color );
        $this->char_colors = preg_split("/,\s*?/", $this->char_color );
         
                // L?y danh sách fonts trong folder du?c d?nh nghia trong bi?n font_path
        $this->fonts = $this->collect_files( $this->font_path, "ttf");
                 
                // Kh?i t?o hình ?nh
        $img = imagecreatetruecolor( $this->img_width, $this->img_height);
        imagefilledrectangle($img, 0, 0, $this->img_width - 1, $this->img_height - 1, $this->gd_color( $this->bg_color ));
         
                 
        // V? hình lung tung cho d?i nó tuoi mát
        for ($i = 0; $i < $this->line_count; $i++){
            imageline($img,
                rand(0, $this->img_width  - 1),
                rand(0, $this->img_height - 1),
                rand(0, $this->img_width  - 1),
                rand(0, $this->img_height - 1),
                $this->gd_color($this->line_colors[rand(0, count($this->line_colors) - 1)])
            );
                }    
        // V? code lên hình
        $code = "";
        $y = ($this->img_height / 2) + ( $this->font_size / 2);
         
        for ($i = 0; $i < $this->char_length ; $i++) 
                {
            $color = $this->gd_color( $this->char_colors[rand(0, count($this->char_colors) - 1)] );
            $angle = rand(-30, 30);
            $char = substr( $this->char_set, rand(0, strlen($this->char_set) - 1), 1);
             
            $sel_font = $this->fonts[rand(0, count($this->fonts) - 1)];   
                         
            $font = $this->font_path . "/" . $sel_font;
             
            $x = (intval(( $this->img_width / $this->char_length) * $i) + ( $this->font_size / 2));
            $code .= $char;
             
            imagettftext($img, $this->font_size, $angle, $x, $y, $color, $font, $char);
        }
         
                // Hi?n th? ?nh
                header('content-type: image/jpg');
                  
        ImageJPeg( $img);
                 
        return $code;
    }   
         
        // Chuy?n color
    function gd_color($html_color) {
        return preg_match('/^#?([\dA-F]{6})$/i', $html_color, $rgb)
          ? hexdec($rgb[1]) : false;
    }
 
        // L?y danh sách file theo ph?n m? r?ng (ext)
    function collect_files($dir, $ext) 
        {
        if (false !== ($dir = opendir($dir))) 
                {
            $files = array();
 
            while (false !== ($file = readdir($dir)))
                if (preg_match("/\\.$ext\$/i", $file))
                    $files[] = $file;
 
            return $files;
 
        }
                return false;
    }
}
?>