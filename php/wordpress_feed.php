<?php


    setlocale(LC_TIME,"es_MX.UTF-8");
    $doc = new DOMDocument();
    $doc->load('https://sociedatblog.wordpress.com/feed/');
    $items = $doc->getElementsByTagName('item');
    $num_articulos = 1;
    $max_articulos = 10;

    $pre = '<div class="wow bounceIn" data-animation-delay="4.8s">
                    <div class="row ">
                        <div class="col-md-3 blog-entry">';
    $mid =  '           </div>
                        <div class="col-md-9">';
    $post = '       </div> 
                </div>
            </div>';


    foreach($items as $item) {

        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        $description = $item->getElementsByTagName('description')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        $category = $item->getElementsByTagName('category')->item(0)->nodeValue;
        $image = $item->getElementsByTagName('encoded')->item(0)->nodeValue;
        $date = $item->getElementsByTagName('pubDate')->item(0)->nodeValue;

        echo $pre;
        echo '<img class="img-circle" '.findImageUrl(findImageTag($image)).'>';
        echo $mid;
        echo '<h2 class="section-heading animated" data-animation="bounceInUp">'.$title.'</h2>';
        echo '<h4 class="section-heading animated" data-animation="bounceInUp">'.$category.'</h4>';
        echo '<hr class="solid">';
        echo '<p class="section-heading animated" data-animation="bounceInUp">'.$description.'<br><a href="'.$link.'">Continuar leyendo</a>';
        echo '<br>'.strftime('%A %d de %B del %Y', strtotime($date)).'</p><br>';
        echo $post;
        $num_articulos++;
        if($num_articulos > $max_articulos) {
            echo '<div class="wow bounceIn" data-animation-delay="4.8s">
                    <a href="https://sociedatblog.wordpress.com/" target="_blank"><h4 class="text-center green"><span>Ver más publicaciones...</span></h4></a>
                </div>';
            break;
        } 
    }

    function findImageTag($text, $offset=0) {
        $pattern = '/<img(.*?)(src=(")(.*?).(bmp|gif|jpeg|jpg|png)(.*?)("))(.*?)>/i';
        if(preg_match_all($pattern, $text, $matches_out)){
            return $matches_out[0][0];
        }                                   
        return 0;
    }

    function findImageUrl($text) {
        $pattern = '/(src=(")(.*?).(bmp|gif|jpeg|jpg|png)(.*?)("))/i';
        if(preg_match_all($pattern, $text, $matches_out)){
            return $matches_out[0][0];
        }
        return 0;
    }

?>