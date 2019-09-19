<?php

function decir ($algo) {
  echo $algo(),"<p>";
}

decir(function(){
  return "Esto es algo";
});


$colorCoche = 'rojo';

$mostrarColor = function() use ($colorCoche) {
    $colorCoche = 'azul';
    echo $colorCoche,"<p>";
};

$mostrarColor();
echo $colorCoche; // Mostrará rojo
?>