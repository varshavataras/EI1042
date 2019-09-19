<?php

/*esto es un comentario 
que termina aqui*/

//Esto es otro comentario de sólo una linea


//constante
const PI=2.1416;

//Variables
$a=2;
$b=2;
echo "Hola Mundo\n<p/>";
echo $c;
$c=$a+$b;
$d=$a.$b;
echo $d;
echo "$c";
echo '$c';
echo PI*3;

//Funciones

function concatenar($a)
{

$a="bienvenida/o";
echo $a;
echo "\nFIN\n</p>";
}
  
concatenar("  oo ");
print_r("\n concatenar </p>\n");

$lista=array(1,2,3,4,5);

for ($i=0;$i<$lista.length;$i++)
 echo $lista[$i];

$lista=array();
$lista[]=1;
print_r($lista);
print_r("\n Listas r\n </p>");
//diccionarios

$grants=array('read'=>'1','write'=>'2');
echo $grants['read'],"\n";
print_r ($grants);  //muestra listas
var_dump ($grants);  //muestra tipos complejos
foreach($grants as $val => $n)
{echo $val,"-",$n,"\n";}

print_r("\n Diccionarios </p>\n");
        
if ($a=='hola') echo "1";
else echo "2";
$a="3";
switch ( $a){
case "1":echo "1";break;
case "2":echo "2";break;
default:echo "3";break;
}	

print_r("\n Sentencias </p>\n");

print_r("\n Variables Cookies</p>\n");
print_r ($_COOKIE);
print_r("\n Variables Globales</p>\n");
print_r ($GLOBALS);
print_r("\n Variables var_dump Server</p>\n");
print_r ($_SERVER);
?>
