<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experience')->insert([
            'enterprise' => 'Vodafone Polynésie', 
            'enterprise_website' => 'https://www.vodafone.pf', 
            'type' => 'job', 
            'experience_title' => 'Technicien d\'études et développement', 
            'start_date' => '2021-11-01', 
            'end_date' => null,
            'description' => '
            - Développement de plusieurs roues de la fortune numériques“Roue Vodafone”<br>
            - Développement d\'un module de connexion réutilisable<br>
            ', 
        ]);
        DB::table('experience')->insert([
            'enterprise' => 'Vodafone Polynésie', 
            'enterprise_website' => 'https://www.vodafone.pf', 
            'type' => 'job', 
            'experience_title' => 'Analyste développeur Junior', 
            'start_date' => '2020-11-01', 
            'end_date' => '2021-11-01',
            'description' => '
            - Maintenance de la plateforme de jeux<br>
            - Développement de plusieurs roues de la fortune numériques“Roue Vodafone”<br>
            - Développement de plusieurs formulaires éphémères<br>
            - Participation au renouvellement du Self-care client et du site web de l’entreprise<br>
            ', 
        ]);
        DB::table('experience')->insert([
            'enterprise' => 'Vodafone Polynésie', 
            'enterprise_website' => 'https://www.vodafone.pf', 
            'type' => 'internship', 
            'experience_title' => 'Stagiaire analyste développeur informatique', 
            'start_date' => '2020-07-01', 
            'end_date' => '2020-08-31',
            'description' => '
            - Correction et intégration de trois jeux multijoueurs sur laplateforme de jeux de Vodafone.<br>
            - Environnement :
            <ul>
                <li>Git, GitHub, SonarQube,</li>
            </ul>
            ' 
        ]);
        DB::table('experience')->insert([
            'enterprise' => 'Vodafone Polynésie', 
            'enterprise_website' => 'https://www.vodafone.pf', 
            'type' => 'internship', 
            'experience_title' => 'Stagiaire analyste développeur informatique', 
            'start_date' => '2020-04-01', 
            'end_date' => '2020-05-20',
            'description' => '
            - Adaptation d\'un jeu en multijoueur (application Web)<br>
            - Environnement :
            <ul>
                <li>PHP, MariaDB, Apache</li>
                <li>Git, GitHub, SonarQube,</li>
            </ul>
            ' 
        ]);
        DB::table('experience')->insert([
            'enterprise' => 'Vini Vini Mareyage', 
            'enterprise_website' => '', 
            'type' => 'internship', 
            'experience_title' => 'Stagiaire informaticien', 
            'start_date' => '2019-12-22', 
            'end_date' => '2020-01-07',
            'description' => '
            Développement d\'un module ajoutant les conditions de ventes dans les modèles de factures et de bons de commandes
            ' 
        ]);
        DB::table('experience')->insert([
            'enterprise' => 'Vini Vini Mareyage', 
            'enterprise_website' => '', 
            'type' => 'internship', 
            'experience_title' => 'Stagiaire informaticien', 
            'start_date' => '2019-06-01', 
            'end_date' => '2019-08-25',
            'description' => '
            - Développement d\'un module de liaison entre les véhicules et les employés via l\'ERP de l\'entreprise.<br>
            - Remaniement de la base de données Excel contenant le registre des employés pour ajouter des liaisons pour faciliter la gestion des données.
            ' 
        ]);
    }
}
