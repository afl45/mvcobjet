<?php 

require_once "vendor/autoload.php";

use mvcobjet\Controllers\ActorController;
use mvcobjet\Controllers\GenreController;
use mvcobjet\Controllers\RealisateurController;
use mvcobjet\Controllers\MovieController;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__. '/src/views');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

//$ac = new ActorController();
$ac = new ActorController($twig);
$gc = new GenreController($twig);
$rc = new RealisateurController($twig);
$mc = new MovieController($twig);

$base  = dirname($_SERVER['PHP_SELF']);

if(ltrim($base, '/')){ 
   $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$route = new \Klein\Klein();

$route->respond('GET','/', function() {
    echo "coucou bienvenue au cinéma :)"; 
});

$route->respond('GET','/acteurs', function() use($ac) {
    $ac->listeActeurs();
   //$la = $ac->listeActeurs();
   //echo "<pre>";
   //print_r($la);
   //echo "</pre>";
   //require_once __DIR__.'/src/Views/actors.php';
});

$route->respond('GET', '/acteur/[:id]', function($req,$res) use($ac) {
    $ac->getOneActor($req->id);
    //require_once __DIR__.'/src/Views/actor.php';   
});

$route->respond('GET', '/genres', function() use($gc) {
    $gc->listeGenres();
    //require_once __DIR__.'/src/Views/genres.php';
});

$route->respond('GET', '/genre/[:id]', function($req,$res) use($gc) {
    $gc->getOneGenre($req->id);
    //require_once __DIR__.'/src/Views/genre.php';
});

$route->respond('GET', '/realisateurs', function() use($rc) {
    $rc->listeRealisateurs();
    //require_once __DIR__.'/src/Views/realisateurs.php';
});

$route->respond('GET', '/realisateur/[:id]', function($req,$res) use($rc) {
    $rc->getOneRealisateur($req->id);
    //require_once __DIR__.'/src/Views/realisateur.php';
});

$route->respond('GET', '/movie/[:id]', function($req,$res) use($mc) {
    $mc->getOneMovie($req->id);
    //require_once __DIR__.'/src/Views/realisateur.php';
});

$route->dispatch();

?>