<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
trait DescriptionHTMLTrait {

    private static function getDescriptionForm(Request $request, $key) {
        
        $content = $request->$key;
        $dom = new \DomDocument();
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
  
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
         }
  
         return $dom->saveHTML();
 
     }
}
