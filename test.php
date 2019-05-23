<?php 

function escape($value) {
    $return = '';
    for($i = 0; $i < strlen($value); ++$i) {
        $char = $value[$i];
        $ord = ord($char);
        if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
            $return .= $char;
        else
            $return .= '\\x' . dechex($ord);
    }
    return $return;
}

$text = '<p><b><i><span class="" style="color: rgb(239, 69, 64);">Sed at auctor magna. Ut sollicitudin magna eu elit gravida, nec 
tristique justo finibus. Mauris aliquam urna at augue interdum, ut 
euismod erat tincidunt. Aenean et aliquam risus, sollicitudin ultricies 
urna. Nunc in dui vitae leo cursus ultricies vitae vitae risus. 
Suspendisse euismod pretium mi. Quisque vehicula, turpis nec mollis 
pellentesque, leo est blandit purus, vitae fermentum sem quam vel eros. 
Praesent facilisis velit vitae sapien pretium, eu finibus nibh gravida. 
Donec eu aliquet diam, ac commodo urna. Nullam euismod odio enim, eu 
hendrerit velit maximus imperdiet. Integer at sapien erat. Nulla gravida
 tempus dolor ut auctor. Mauris vel sodales urna. Mauris nec imperdiet 
leo, et feugiat enim.</span></i></b><br></p>';

echo escape($text);