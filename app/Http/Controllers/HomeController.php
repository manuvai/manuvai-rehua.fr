<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', array(
            'skills' => $this->getSkills(),
            'conf' => $this->getConf(),
            'cursus' => $this->getCursus(),
            'projects' => $this->getProjects(),
            'experiences' => $this->getExperiences(),
        ));
    }

    private function getConf() {
        return array(
            'tel' => '+68989732227',
            'mailto' => 'manuvai.rehua@gmail.com',
            'linkedin' => array(
                'link' => 'https://twitter.com/ManuvaiRehua',
                'lib' => '/manuvai-rehua',
            ),
        );
    }

    private function getCursus() {
        return array(
            array(
                'title' => 'Licence Informatique BAC +3',
                'school' => 'Université de la Polynésie française',
                'address' => 'Polynésie française',
                'start_date' => '2017-09-01',
                'end_date' => '2020-08-31',
                'description' => '
                - Python, Java, PHP, SQL, Javascript (HTML/CSS), C<br>
                - MySQL, Oracle<br>
                - IDE: Spyder (Python), Eclipse (Java), Android Studio (Java)<br>',
            ),
            array(
                'title' => 'Baccalauréat scientifique',
                'school' => 'Lycée de Taaone',
                'address' => 'Pirae - Polynésie française',
                'start_date' => '2015-08-01',
                'end_date' => '2017-07-01',
                'description' => '',
            ),
        );
    }

    private function getSkills() {
        $elements = array(
            array(
                'imgSrc' => 'images/new-php-logo.svg',
                'title' => 'PHP',
            ),
            array(
                'imgSrc' => 'images/vue-icon.svg',
                'title' => 'VueJS',
            ),
            array(
                'imgSrc' => 'images/html-icon.svg',
                'imgStyle' => 'filter: invert(56%) sepia(81%) saturate(3784%) hue-rotate(345deg) brightness(98%) contrast(93%);',
                'title' => 'HTML',
            ),
            array(
                'imgSrc' => 'images/js-icon.svg',
                'imgStyle' => 'filter: invert(83%) sepia(77%) saturate(530%) hue-rotate(343deg) brightness(96%) contrast(103%);',
                'title' => 'Javascript',
            ),
            array(
                'imgSrc' => 'images/composer-icon.svg',
                'title' => 'Composer',
            ),
            array(
                'imgSrc' => 'images/mysql-icon.svg',
                'title' => 'MySQL',
            ),
            array(
                'imgSrc' => 'images/postgresql-icon.svg',
                'title' => 'PostgreSQL',
            ),
            array(
                'imgSrc' => 'images/oracle-icon.svg',
                'title' => 'Oracle',
            ),
            array(
                'imgSrc' => 'images/github-icon.svg',
                'title' => 'Github',
            ),
            array(
                'imgSrc' => 'images/java-icon.svg',
                'title' => 'Java',
            ),
        );

        return $elements;
    }

    private function getProjects() {
        $elements = array(
            array(
                'imgSrc' => 'images/laroue8ans.png',
                'title' => 'La Roue des KDOs',
            ),
            array(
                'imgSrc' => 'images/formulaire-vcrt.png',
                'title' => 'Formulaire d\'inscription à une course',
            ),
            array(
                'imgSrc' => 'images/jeux-vodafone-pf.png',
                'title' => 'Plateforme de jeux',
            ),
            array(
                'imgSrc' => 'images/morpion.png',
                'title' => 'Morpion multijoueur',
            ),
            array(
                'imgSrc' => 'images/vodafone-word-race.png',
                'title' => 'Le jeu du pendu',
            ),
            array(
                'imgSrc' => 'images/anime-list.gif',
                'title' => 'My Anime List',
            ),
        );

        return $elements;
    }

    private function getExperiences() {
        return Experience::all();
    }
}
