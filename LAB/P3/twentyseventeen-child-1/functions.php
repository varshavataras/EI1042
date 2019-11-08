<?php
add_filter("the_content", "mfp_Fix_Text_Spacing");
// Automatically correct double spaces from any post
function mfp_Fix_Text_Spacing($the_Post)
{
$the_New_Post = str_replace("motos", " MOTOS ", $the_Post);
return $the_New_Post;
}


    
?>
