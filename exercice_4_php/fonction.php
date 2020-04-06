<?php

function correcteur_espace($texte){
    $correction_espace=preg_replace('#[ ]+#',' ',$texte);
    $correction_apostrophe=preg_replace('#([ ]+\' | \'[ ])#','\'',$correction_espace);
    $correction_virgule=preg_replace('#([ ]+,)#',',',$correction_apostrophe);
    $correction_point_virgule=preg_replace('#([ ]+;)#',';',$correction_virgule);
    $correction_point=preg_replace('#([ ]+\.)#','.',$correction_point_virgule);
    $correction_point=preg_replace('#([0-9]+\.) | (\,[0-9]+)#','([0-9]+\.) |(\,[0-9])',$correction_point_virgule);
    
    return $correction_point;
}



function recuperateur_phrases(string $texte){
    
    preg_match_all('#[a-z]([^.!?]|([.][0-9]))*[.?!]#i' ,$texte,$phrases);
    return $phrases;
}
