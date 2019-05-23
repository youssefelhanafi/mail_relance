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

$text = '<p><div id=22lipsum22>da<p>da<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Vivamus auctor dapurus eget auctor pellentesque. Phasellus eros tortor, semper eu egestasda eget,
commodo sit amet augue. Pellentesque habitant morbi tristique dasenectus et netus et malesuada fames ac turpis egestas.
Mauris vitae darisus massa. Nullam eget nibh ultrices, scelerisque mi sed, gravida daenim. Integer suscipit nisl sed vulputate molestie.
Maecenas quis daullamcorper est. Interdum et malesuada fames ac ante ipsum primis in dafaucibus. Suspendisse sit amet libero ac nibh vestibulum laoreet.
Donec daat dui varius ligula finibus pellentesque. Cras sit amet arcu a arcu dafacilisis sagittis a quis erat. Proin at suscipit neque.
Nulla et porta danisl, quis ullamcorper mauris.da</b></p>da<p>da<i>Sed at auctor magna. Ut sollicitudin magna eu elit gravida,
nec datristique justo finibus. Mauris aliquam urna at augue interdum, ut daeuismod erat tincidunt. Aenean et aliquam risus,
sollicitudin ultricies daurna. Nunc in dui vitae leo cursus ultricies vitae vitae risus. daSuspendisse euismod pretium mi.
Quisque vehicula, turpis nec mollis dapellentesque, leo est blandit purus, vitae fermentum sem quam vel eros.
daPraesent facilisis velit vitae sapien pretium, eu finibus nibh gravida. daDonec eu aliquet diam, ac commodo urna.
Nullam euismod odio enim, eu dahendrerit velit maximus imperdiet. Integer at sapien erat. Nulla gravidada tempus dolor ut auctor.
Mauris vel sodales urna. Mauris nec imperdiet daleo, et feugiat enim.da</i></p><i>da</i><p><i>daSed maximus auctor massa viverra vestibulum. 
Cras tincidunt, augue at dalacinia lobortis, velit massa imperdiet turpis, sit amet sodales justo daeros sed odio. Morbi vel efficitur ante.
Nulla rhoncus bibendum daconvallis. Pellentesque habitant morbi tristique senectus et netus et damalesuada fames ac turpis egestas.
Integer orci arcu, euismod vel datristique quis, ullamcorper ac sapien. Pellentesque rhoncus, justo ac damattis dapibus, risus velit luctus ipsum,
in ultrices leo risus vitae daante. Vestibulum vel ipsum vel ligula scelerisque pulvinar. In hac dahabitasse platea dictumst.
Nulla in ipsum et velit pharetra pulvinar. daMorbi ac ante luctus, efficitur lacus quis, congue neque. Nulla dafringilla porta eros,
nec finibus velit malesuada in. Ut sed blandit daquam, quis sollicitudin eros. Pellentesque sed tortor vitae ante auctor daplacerat.
Proin non pulvinar tellus.da</i></p>da<p>daQuisque mauris ex, pharetra ut lacinia id, laoreet ut mi.
Vestibulum datempus quam et est tincidunt, a sodales libero sodales. Curabitur id dafelis elit.
Etiam maximus neque dui. Quisque sit amet tincidunt massa. daAenean congue iaculis erat at facilisis. Fusce quis neque sollicitudin,
datincidunt lorem at, commodo tortor. Nullam massa quam, tristique ac enimda vitae, vehicula sagittis libero.
Orci varius natoque penatibus et damagnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor dasit amet,
consectetur adipiscing elit. Curabitur bibendum eleifend dalectus eu elementum. Nulla venenatis mauris sit amet ligula ornare, 
nec damattis enim cursus. Quisque scelerisque vulputate vulputate. In eget daeuismod ipsum, quis sagittis arcu. Fusce at bibendum lacus.
Fusce eu datempus leo, et laoreet felis.da</p>da<p>da<b>Nam fringilla et quam vel tincidunt.
Vestibulum vitae scelerisque nulla,da sit amet accumsan augue. Vestibulum lacus justo, scelerisque ac mattis daquis,
pretium sit amet nibh. Pellentesque ornare, magna a porta lacinia,da nisi metus convallis justo, in dignissim justo velit ut turpis. 
Quisqueda ac accumsan tellus, ac consequat neque. Mauris efficitur, ligula vitae dadapibus ultrices, lacus dolor auctor mi,
et mollis ante dolor ut dui. Utda ac turpis velit. Ut ipsum metus, varius nec faucibus sit amet, gravida dasit amet felis.
Sed ac risus a nunc interdum ultrices. In et sagittis dadiam. Ut at hendrerit odio. Proin nec nulla nec tortor dictum egestas. 
daMaecenas elementum lacus leo, et efficitur neque ultrices nec. Vivamus datempus hendrerit leo et porttitor. Fusce varius vehicula varius.
da</b></p></div><br></p>';

echo escape(str_replace('da','',$text));
//echo escape($text);