<?php
/**
 * BYT3LAB Theme - Custom Post Types
 * Enregistrement des types de contenu pour les Projets, Solutions et Membres de l'équipe.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'byt3lab_register_custom_post_types');

function byt3lab_register_custom_post_types() {
    // 1. Projets Réalisés (Portfolio)
    $project_labels = [
        'name'                  => _x('Projets Réalisés', 'Post Type General Name', 'byt3lab_wordpress_theme'),
        'singular_name'         => _x('Projet Réalisé', 'Post Type Singular Name', 'byt3lab_wordpress_theme'),
        'menu_name'             => __('Projets Réalisés', 'byt3lab_wordpress_theme'),
        'all_items'             => __('Tous les Projets', 'byt3lab_wordpress_theme'),
        'add_new_item'          => __('Ajouter un Projet', 'byt3lab_wordpress_theme'),
        'add_new'               => __('Nouveau Projet', 'byt3lab_wordpress_theme'),
        'edit_item'             => __('Modifier le Projet', 'byt3lab_wordpress_theme'),
        'update_item'           => __('Mettre à jour le Projet', 'byt3lab_wordpress_theme'),
        'view_item'             => __('Voir le Projet', 'byt3lab_wordpress_theme'),
        'search_items'          => __('Rechercher un Projet', 'byt3lab_wordpress_theme'),
        'not_found'             => __('Aucun projet trouvé', 'byt3lab_wordpress_theme'),
        'not_found_in_trash'    => __('Aucun projet dans la corbeille', 'byt3lab_wordpress_theme'),
    ];
    register_post_type('byt3lab_project', [
        'label'                 => __('Projet Réalisé', 'byt3lab_wordpress_theme'),
        'description'           => __('Portfolio des projets réalisés par BYT3lab', 'byt3lab_wordpress_theme'),
        'labels'                => $project_labels,
        'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'realisations', 'with_front' => true],
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    ]);

    // 2. Solutions Logicielles (Progiciels & Produits SaaS)
    $solution_labels = [
        'name'                  => _x('Solutions Logicielles', 'Post Type General Name', 'byt3lab_wordpress_theme'),
        'singular_name'         => _x('Solution', 'Post Type Singular Name', 'byt3lab_wordpress_theme'),
        'menu_name'             => __('Solutions Logicielles', 'byt3lab_wordpress_theme'),
        'all_items'             => __('Toutes les Solutions', 'byt3lab_wordpress_theme'),
        'add_new_item'          => __('Ajouter une Solution', 'byt3lab_wordpress_theme'),
        'add_new'               => __('Nouvelle Solution', 'byt3lab_wordpress_theme'),
        'edit_item'             => __('Modifier la Solution', 'byt3lab_wordpress_theme'),
        'update_item'           => __('Mettre à jour la Solution', 'byt3lab_wordpress_theme'),
        'view_item'             => __('Voir la Solution', 'byt3lab_wordpress_theme'),
        'search_items'          => __('Rechercher une Solution', 'byt3lab_wordpress_theme'),
        'not_found'             => __('Aucune solution trouvée', 'byt3lab_wordpress_theme'),
        'not_found_in_trash'    => __('Aucune solution dans la corbeille', 'byt3lab_wordpress_theme'),
    ];
    register_post_type('byt3lab_solution', [
        'label'                 => __('Solution Logicielles', 'byt3lab_wordpress_theme'),
        'description'           => __('Progiciels et plateformes développés par BYT3lab', 'byt3lab_wordpress_theme'),
        'labels'                => $solution_labels,
        'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-cloud',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'solutions', 'with_front' => true],
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    ]);

    // 3. Membres de l'Équipe
    $team_labels = [
        'name'                  => _x('Membres de l\'Équipe', 'Post Type General Name', 'byt3lab_wordpress_theme'),
        'singular_name'         => _x('Membre de l\'Équipe', 'Post Type Singular Name', 'byt3lab_wordpress_theme'),
        'menu_name'             => __('Équipe', 'byt3lab_wordpress_theme'),
        'all_items'             => __('Tous les Membres', 'byt3lab_wordpress_theme'),
        'add_new_item'          => __('Ajouter un Membre', 'byt3lab_wordpress_theme'),
        'add_new'               => __('Nouveau Membre', 'byt3lab_wordpress_theme'),
        'edit_item'             => __('Modifier le Membre', 'byt3lab_wordpress_theme'),
        'update_item'           => __('Mettre à jour le Membre', 'byt3lab_wordpress_theme'),
        'view_item'             => __('Voir le Membre', 'byt3lab_wordpress_theme'),
        'search_items'          => __('Rechercher un Membre', 'byt3lab_wordpress_theme'),
        'not_found'             => __('Aucun membre trouvé', 'byt3lab_wordpress_theme'),
        'not_found_in_trash'    => __('Aucun membre dans la corbeille', 'byt3lab_wordpress_theme'),
    ];
    register_post_type('byt3lab_team', [
        'label'                 => __('Membre de l\'Équipe', 'byt3lab_wordpress_theme'),
        'description'           => __('Présentation des ingénieurs et collaborateurs BYT3lab', 'byt3lab_wordpress_theme'),
        'labels'                => $team_labels,
        'supports'              => ['title', 'editor', 'thumbnail', 'page-attributes'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'byt3lab_team', 'with_front' => true],
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    ]);

    // 4. Services & Ingénierie
    $service_labels = [
        'name'                  => _x('Services', 'Post Type General Name', 'byt3lab_wordpress_theme'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'byt3lab_wordpress_theme'),
        'menu_name'             => __('Services', 'byt3lab_wordpress_theme'),
        'all_items'             => __('Tous les Services', 'byt3lab_wordpress_theme'),
        'add_new_item'          => __('Ajouter un Service', 'byt3lab_wordpress_theme'),
        'add_new'               => __('Nouveau Service', 'byt3lab_wordpress_theme'),
        'edit_item'             => __('Modifier le Service', 'byt3lab_wordpress_theme'),
        'update_item'           => __('Mettre à jour le Service', 'byt3lab_wordpress_theme'),
        'view_item'             => __('Voir le Service', 'byt3lab_wordpress_theme'),
        'search_items'          => __('Rechercher un Service', 'byt3lab_wordpress_theme'),
        'not_found'             => __('Aucun service trouvé', 'byt3lab_wordpress_theme'),
        'not_found_in_trash'    => __('Aucun service dans la corbeille', 'byt3lab_wordpress_theme'),
    ];
    register_post_type('byt3lab_service', [
        'label'                 => __('Service', 'byt3lab_wordpress_theme'),
        'description'           => __('Offres de services et expertises techniques BYT3lab', 'byt3lab_wordpress_theme'),
        'labels'                => $service_labels,
        'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-hammer',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'byt3lab_service', 'with_front' => true],
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    ]);

    // 5. Taxonomie : Filiales & Départements pour les Services
    $branch_labels = [
        'name'              => _x('Filiales & Départements', 'taxonomy general name', 'byt3lab_wordpress_theme'),
        'singular_name'     => _x('Filiale / Département', 'taxonomy singular name', 'byt3lab_wordpress_theme'),
        'search_items'      => __('Rechercher une Filiale', 'byt3lab_wordpress_theme'),
        'all_items'         => __('Toutes les Filiales', 'byt3lab_wordpress_theme'),
        'parent_item'       => __('Filiale Parente', 'byt3lab_wordpress_theme'),
        'parent_item_colon' => __('Filiale Parente :', 'byt3lab_wordpress_theme'),
        'edit_item'         => __('Modifier la Filiale', 'byt3lab_wordpress_theme'),
        'update_item'       => __('Mettre à jour la Filiale', 'byt3lab_wordpress_theme'),
        'add_new_item'      => __('Ajouter une Filiale / Département', 'byt3lab_wordpress_theme'),
        'new_item_name'     => __('Nom de la Nouvelle Filiale', 'byt3lab_wordpress_theme'),
        'menu_name'         => __('Filiales & Départements', 'byt3lab_wordpress_theme'),
    ];
    register_taxonomy('byt3lab_service_branch', ['byt3lab_service'], [
        'hierarchical'      => true,
        'labels'            => $branch_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'filiale-service'],
        'show_in_rest'      => true,
    ]);

    // 6. Postes & Recrutement (Carrières / Offres d'Emploi)
    $job_labels = [
        'name'                  => _x('Offres d\'Emploi', 'Post Type General Name', 'byt3lab_wordpress_theme'),
        'singular_name'         => _x('Offre d\'Emploi', 'Post Type Singular Name', 'byt3lab_wordpress_theme'),
        'menu_name'             => __('Offres d\'Emploi', 'byt3lab_wordpress_theme'),
        'all_items'             => __('Toutes les Offres', 'byt3lab_wordpress_theme'),
        'add_new_item'          => __('Publier une Offre d\'Emploi', 'byt3lab_wordpress_theme'),
        'add_new'               => __('Nouvelle Offre', 'byt3lab_wordpress_theme'),
        'edit_item'             => __('Modifier l\'Offre', 'byt3lab_wordpress_theme'),
        'update_item'           => __('Mettre à jour l\'Offre', 'byt3lab_wordpress_theme'),
        'view_item'             => __('Voir l\'Offre', 'byt3lab_wordpress_theme'),
        'search_items'          => __('Rechercher une Offre', 'byt3lab_wordpress_theme'),
        'not_found'             => __('Aucune offre trouvée', 'byt3lab_wordpress_theme'),
        'not_found_in_trash'    => __('Aucune offre dans la corbeille', 'byt3lab_wordpress_theme'),
    ];
    register_post_type('byt3lab_job', [
        'label'                 => __('Offre d\'Emploi', 'byt3lab_wordpress_theme'),
        'description'           => __('Offres d\'emploi et opportunités de carrière chez BYT3LAB', 'byt3lab_wordpress_theme'),
        'labels'                => $job_labels,
        'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'carriere', 'with_front' => true],
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    ]);

    // 7. Messages de Contact & Demandes de Devis (Interne / Admin)
    $message_labels = [
        'name'                  => _x('Messages & Demandes', 'Post Type General Name', 'byt3lab_wordpress_theme'),
        'singular_name'         => _x('Message Reçu', 'Post Type Singular Name', 'byt3lab_wordpress_theme'),
        'menu_name'             => __('Messages Reçus', 'byt3lab_wordpress_theme'),
        'all_items'             => __('Tous les Messages', 'byt3lab_wordpress_theme'),
        'add_new_item'          => __('Ajouter un Message', 'byt3lab_wordpress_theme'),
        'add_new'               => __('Nouveau Message', 'byt3lab_wordpress_theme'),
        'edit_item'             => __('Consulter le Message', 'byt3lab_wordpress_theme'),
        'update_item'           => __('Mettre à jour le Message', 'byt3lab_wordpress_theme'),
        'view_item'             => __('Voir le Message', 'byt3lab_wordpress_theme'),
        'search_items'          => __('Rechercher un Message', 'byt3lab_wordpress_theme'),
        'not_found'             => __('Aucun message trouvé', 'byt3lab_wordpress_theme'),
        'not_found_in_trash'    => __('Aucun message dans la corbeille', 'byt3lab_wordpress_theme'),
    ];
    register_post_type('byt3lab_message', [
        'label'                 => __('Message Reçu', 'byt3lab_wordpress_theme'),
        'description'           => __('Messages et demandes envoyés depuis le formulaire de contact', 'byt3lab_wordpress_theme'),
        'labels'                => $message_labels,
        'supports'              => ['title', 'editor'],
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_icon'             => 'dashicons-email-alt',
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    ]);

    // Initialisation des filiales par défaut si nécessaire
    byt3lab_seed_default_service_branches();

    // Initialisation des solutions phares par défaut
    byt3lab_seed_default_solutions();

    // Initialisation des projets réalisés par défaut
    byt3lab_seed_default_projects();

    // Initialisation des offres d'emploi par défaut
    byt3lab_seed_default_jobs();

    // Règles de réécriture explicites pour les réalisations / portfolio
    add_rewrite_rule('^realisations/([^/]+)/?$', 'index.php?byt3lab_project=$matches[1]', 'top');
    add_rewrite_rule('^index\.php/realisations/([^/]+)/?$', 'index.php?byt3lab_project=$matches[1]', 'top');
    add_rewrite_rule('^realisation/([^/]+)/?$', 'index.php?byt3lab_project=$matches[1]', 'top');
    add_rewrite_rule('^index\.php/realisation/([^/]+)/?$', 'index.php?byt3lab_project=$matches[1]', 'top');

    // Règles de réécriture explicites pour les solutions
    add_rewrite_rule('^solutions/([^/]+)/?$', 'index.php?byt3lab_solution=$matches[1]', 'top');
    add_rewrite_rule('^index\.php/solutions/([^/]+)/?$', 'index.php?byt3lab_solution=$matches[1]', 'top');

    // Règles de réécriture explicites pour les carrières / offres d'emploi
    add_rewrite_rule('^carriere/([^/]+)/?$', 'index.php?byt3lab_job=$matches[1]', 'top');
    add_rewrite_rule('^index\.php/carriere/([^/]+)/?$', 'index.php?byt3lab_job=$matches[1]', 'top');
    add_rewrite_rule('^carrieres/([^/]+)/?$', 'index.php?byt3lab_job=$matches[1]', 'top');
    add_rewrite_rule('^index\.php/carrieres/([^/]+)/?$', 'index.php?byt3lab_job=$matches[1]', 'top');
}

/**
 * Création automatique des termes par défaut de la taxonomie Filiales & Départements
 */
function byt3lab_seed_default_service_branches() {
    $seeded = get_option('byt3lab_service_branches_seeded_v1');
    if ($seeded === 'done') {
        return;
    }

    $default_branches = [
        'Byt3lab Tech' => 'Ingénierie logicielle, cloud, ERP, DevOps et cybersécurité',
        'Ngrafix'      => 'Design de marque, UI/UX, création de contenu et média',
        'Conseil & Stratégie' => 'Accompagnement, transformation digitale et audits techniques'
    ];

    foreach ($default_branches as $branch_name => $desc) {
        if (!term_exists($branch_name, 'byt3lab_service_branch')) {
            wp_insert_term($branch_name, 'byt3lab_service_branch', [
                'description' => $desc,
                'slug'        => sanitize_title($branch_name),
            ]);
        }
    }

    update_option('byt3lab_service_branches_seeded_v1', 'done');
}

/**
 * Création automatique des 4 solutions logicielles phares si la table est vide
 */
function byt3lab_seed_default_solutions() {
    $seeded = get_option('byt3lab_solutions_seeded_v2');
    if ($seeded === 'done') {
        return;
    }

    $existing = get_posts(['post_type' => 'byt3lab_solution', 'numberposts' => 1, 'post_status' => 'any']);
    if (empty($existing)) {
        $defaults = [
            [
                'title'       => 'Melodi ERP',
                'slug'        => 'melodi-erp',
                'badge'       => 'PROGICIEL MODULAIRE & AUTO-HÉBERGÉ',
                'image'       => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200',
                'content'     => 'Melodi ERP est un progiciel de gestion d\'entreprise de nouvelle génération, conçu pour offrir une souveraineté numérique totale. Il intègre des modules métiers indispensables : facturation, point de vente (POS), comptabilité automatisée, gestion d\'inventaire multi-dépôts et CRM, le tout déployable sur vos propres serveurs sécurisés.',
                'features'    => "Gestion de Commerce & POS : Facturation en temps réel, caisse tactile et gestion d'inventaire multi-entrepôts\nArchitecture Auto-Hébergée & Modulaire : Vos données restent chez vous, sans dépendance vis-à-vis d'éditeurs tiers\nComptabilité & Trésorerie : Écritures automatisées, rapprochement bancaire et rapports conformes OHADA\nMulti-Utilisateurs & Permissions : Contrôle strict des habilitations par profil et journal d'audit temps réel",
                'url'         => 'https://melodi.byt3lab.com',
                'button_text' => 'Découvrir Melodi ERP',
            ],
            [
                'title'       => 'SUKU School System',
                'slug'        => 'suku',
                'badge'       => 'GESTION SCOLAIRE & ACADÉMIQUE',
                'image'       => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1200',
                'content'     => 'SUKU est un système de gestion scolaire tout-en-un conçu pour les écoles primaires, collèges, lycées, instituts et universités. De l\'inscription des apprenants jusqu\'à la génération des bulletins numériques et le recouvrement des frais scolaires, SUKU fluidifie la vie de votre communauté éducative.',
                'features'    => "Inscriptions & Scolarité : Dossiers élèves dématérialisés et suivi rigoureux des paiements échelonnés\nBulletins & Notes Numériques : Saisie ergonomique pour les enseignants et calcul automatique des moyennes\nEspace Parents & Apprenants : Consultation sécurisée des notes, présences, devoirs et plannings en direct\nEmplois du Temps & Examens : Planification intelligente des salles et des sessions d'examens",
                'url'         => 'https://melodi.byt3lab.com/store/suku',
                'button_text' => 'Découvrir SUKU',
            ],
            [
                'title'       => 'Melodi POS & Retail',
                'slug'        => 'melodi-pos',
                'badge'       => 'POINT DE VENTE & COMMERCE',
                'image'       => 'https://images.unsplash.com/photo-1556742049-0a67c5574f73?q=80&w=1200',
                'content'     => 'Solution de caisse enregistreuse tactile connectée à haute résilience opérationnelle. Conçue pour les boutiques, supermarchés, restaurants et grossistes, Melodi POS garantit une continuité d\'encaissement sans faille, même en cas de coupure de connexion internet.',
                'features'    => "Mode Hors-ligne Autonome : Continuez à encaisser vos clients avec synchronisation automatique au rétablissement réseau\nScan Codes-barres & Tickets : Compatible avec imprimantes thermiques, tiroirs-caisses et douchettes laser\nValorisation de Stocks en Direct : Alertes de rupture et valorisation automatisée (FIFO/PMP)\nClôtures de Caisse & Z journalier : Rapprochement instantané entre fonds de caisse théorique et réel",
                'url'         => 'https://melodi.byt3lab.com',
                'button_text' => 'Explorer Melodi POS',
            ],
            [
                'title'       => 'Byt3 Cloud & Sovereign Data',
                'slug'        => 'byt3-cloud',
                'badge'       => 'INFRASTRUCTURE & CLOUD PRIVÉ',
                'image'       => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200',
                'content'     => 'Infrastructure cloud privée et sécurisée garantissant l\'hébergement souverain de vos applications métiers critiques. Nous mettons en place des environnements isolés, hautement résilients et conformes aux réglementations sur la protection des données.',
                'features'    => "Cluster Kubernetes Dédié : Déploiement conteneurisé scalable avec redondance automatique\nSauvegardes Quotidiennes Chiffrées : Données sauvegardées et chiffrées de bout en bout sur des nœuds géographiquement séparés\nMonitoring Proactif 24/7 : Surveillance temps réel de la latence, des ressources et détection d'anomalies\nSouveraineté des Données : Maîtrise absolue de la localisation de vos bases de données sans tiers indiscret",
                'url'         => home_url('/contact/'),
                'button_text' => 'Contacter l\'Équipe Cloud',
            ]
        ];

        foreach ($defaults as $item) {
            $new_id = wp_insert_post([
                'post_title'   => $item['title'],
                'post_name'    => $item['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'byt3lab_solution',
                'post_content' => $item['content'],
            ]);
            if ($new_id && !is_wp_error($new_id)) {
                update_post_meta($new_id, '_byt3lab_solution_badge', $item['badge']);
                update_post_meta($new_id, '_byt3lab_solution_image', $item['image']);
                update_post_meta($new_id, '_byt3lab_solution_features', $item['features']);
                update_post_meta($new_id, '_byt3lab_solution_url', $item['url']);
                update_post_meta($new_id, '_byt3lab_solution_button_text', $item['button_text']);
            }
        }
    }

    update_option('byt3lab_solutions_seeded_v2', 'done');
}

/**
 * Création automatique des 4 projets réalisés par défaut si la table est vide
 */
function byt3lab_seed_default_projects() {
    $seeded = get_option('byt3lab_projects_seeded_v1');
    if ($seeded === 'done') {
        return;
    }

    $existing = get_posts(['post_type' => 'byt3lab_project', 'numberposts' => 1, 'post_status' => 'any']);
    if (empty($existing)) {
        $defaults = [
            [
                'title'       => 'SUKU - Plateforme E-Learning Sécurisée',
                'slug'        => 'suku',
                'category'    => 'EDTECH',
                'stack'       => 'Laravel / Vue.js / MySQL / Redis / Docker',
                'impact'      => '+15,000 étudiants actifs, temps de chargement inférieur à 800ms, continuité garantie.',
                'url'         => home_url('/contact/'),
                'image'       => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800',
                'content'     => '<p>Conception et déploiement d\'une infrastructure d\'apprentissage en ligne de niveau universitaire, capable de gérer des flux vidéo interactifs et des examens surveillés en temps réel.</p><p>Le projet a nécessité une refonte complète de la gestion des sessions utilisateur, la mise en place d\'un cache distribué Redis et une architecture conteneurisée garantissant une montée en charge fluide lors des sessions d\'examens massives.</p>',
            ],
            [
                'title'       => 'Njangui - Système de Tontines & Micro-Finance',
                'slug'        => 'njangui',
                'category'    => 'FINTECH',
                'stack'       => 'Flutter / Node.js / PostgreSQL / Blockchain Audit',
                'impact'      => 'Plus de 250M FCFA de flux sécurisés mensuels avec traçabilité cryptographique absolue.',
                'url'         => home_url('/contact/'),
                'image'       => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800',
                'content'     => '<p>Digitalisation complète des tontines traditionnelles et des micro-crédits communautaires avec notifications automatisées par SMS/WhatsApp et journalisation infalsifiable.</p><p>L\'application permet aux membres et gestionnaires de visualiser l\'état des cotisations en temps réel, de valider les tirages via signatures multipartites et de prévenir les impayés grâce à des algorithmes de scoring communautaire.</p>',
            ],
            [
                'title'       => 'Audit & Hardening - Réseau Bancaire Régional',
                'slug'        => 'audit-microfinance',
                'category'    => 'CYBERSÉCURITÉ',
                'stack'       => 'Nessus / Kali Linux / WireGuard / SIEM Wazuh',
                'impact'      => 'Correction de 14 vulnérabilités critiques et conformité ISO/IEC 27001 obtenue sans interruption de service.',
                'url'         => home_url('/contact/'),
                'image'       => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=800',
                'content'     => '<p>Mission d\'audit d\'intrusion (pentest) complet, analyse des vulnérabilités de l\'infrastructure cœur de réseau et mise en place d\'une politique de sécurité zéro-trust.</p><p>Nos experts en cybersécurité ont opéré des simulations d\'attaques internes et externes, renforcé la segmentation réseau, et déployé une sonde de détection d\'intrusion proactive Wazuh interconnectée au SOC.</p>',
            ],
            [
                'title'       => 'Melodi ERP - Déploiement Industriel',
                'slug'        => 'melodi-erp-realisation',
                'category'    => 'LOGICIEL ERP',
                'stack'       => 'Symfony / React / PostgreSQL / REST API',
                'impact'      => 'Réduction de 40% des erreurs d\'inventaire et automatisation complète de la comptabilité analytique.',
                'url'         => home_url('/contact/'),
                'image'       => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800',
                'content'     => '<p>Intégration et personnalisation de notre progiciel Melodi ERP pour un groupe industriel multi-sites disposant de 5 entrepôts régionaux et de 12 points de distribution.</p><p>Mise en place de passerelles temps réel avec les balances électroniques, synchronisation des stocks hors-ligne et reporting financier automatisé pour le comité de direction.</p>',
            ],
        ];

        foreach ($defaults as $item) {
            $new_id = wp_insert_post([
                'post_title'   => $item['title'],
                'post_name'    => $item['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'byt3lab_project',
                'post_content' => $item['content'],
            ]);

            if ($new_id && !is_wp_error($new_id)) {
                update_post_meta($new_id, '_byt3lab_project_category', $item['category']);
                update_post_meta($new_id, '_byt3lab_project_stack', $item['stack']);
                update_post_meta($new_id, '_byt3lab_project_impact', $item['impact']);
                update_post_meta($new_id, '_byt3lab_project_url', $item['url']);
                update_post_meta($new_id, '_byt3lab_project_image', $item['image']);
            }
        }
    }

    update_option('byt3lab_projects_seeded_v1', 'done');
}

/**
 * Création automatique des offres d'emploi par défaut si la table est vide
 */
function byt3lab_seed_default_jobs() {
    $seeded = get_option('byt3lab_jobs_seeded_v2');
    if ($seeded === 'done') {
        return;
    }

    $existing = get_posts(['post_type' => 'byt3lab_job', 'numberposts' => 1, 'post_status' => 'any']);
    if (empty($existing)) {
        $default_jobs = [
            [
                'title'       => 'Ingénieur(e) Logiciel Full-Stack Senior',
                'slug'        => 'ingenieur-fullstack-senior',
                'dept'        => 'Byt3lab Tech',
                'contract'    => 'CDI - Temps Plein',
                'location'    => 'Douala, Cameroun / Hybride',
                'experience'  => 'Senior (4 à 6+ ans)',
                'salary'      => 'Selon profil & compétences + Primes de projets',
                'status'      => 'active',
                'deadline'    => 'Recrutement continu',
                'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=Candidature%20-%20Ing%C3%A9nieur%20Full-Stack%20Senior',
                'content'     => "BYT3LAB recrute un(e) Ingénieur(e) Logiciel Full-Stack Senior passionné(e) par la conception d'architectures logicielles modulaires, scalables et souveraines. Vous interviendrez directement sur le développement de nos progiciels d'entreprise (notamment Melodi ERP et SUKU) ainsi que sur des plateformes critiques pour nos clients corporatifs.",
                'missions'    => "Concevoir et développer des API RESTful performantes et sécurisées sous Node.js / NestJS ou Python FastAPI\nDévelopper des interfaces utilisateur réactives, modulaires et fluides avec Next.js / TypeScript et TailwindCSS\nParticiper aux choix d'architecture micro-services et au déploiement conteneurisé (Docker / Kubernetes)\nOptimiser les requêtes SQL et la modélisation sur PostgreSQL et Redis\nEncadrer les développeurs juniors et réaliser les revues de code rigoureuses",
                'requirements'=> "Diplôme Bac+4/5 en Génie Logiciel, Informatique ou expérience équivalente démontrée\nMinimum 4 ans d'expérience prouvée en production sur Node.js/TypeScript et frameworks modernes frontend\nMaîtrise approfondie des bases de données relationnelles (PostgreSQL) et de l'optimisation des performances\nFamiliarité avec Git, CI/CD, tests automatisés et environnement Linux\nEsprit d'équipe, rigueur analytique et culture de la souveraineté numérique",
            ],
            [
                'title'       => 'Product & UI/UX Designer',
                'slug'        => 'product-ui-ux-designer',
                'dept'        => 'Ngrafix Studio',
                'contract'    => 'CDI - Temps Plein',
                'location'    => 'Douala / Hybride ou Remote',
                'experience'  => 'Confirmé (3+ ans)',
                'salary'      => 'Compétitif + Équipement graphique fourni',
                'status'      => 'active',
                'deadline'    => 'Recrutement continu',
                'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=Candidature%20-%20Product%20UI-UX%20Designer',
                'content'     => "Au sein de Ngrafix Studio, filiale design & média de BYT3LAB, vous serez le chef d'orchestre de l'expérience utilisateur et de l'identité visuelle de nos applications web, mobiles et progiciels. Vous travaillerez main dans la main avec les chefs de projet et développeurs.",
                'missions'    => "Concevoir les wireframes, parcours utilisateurs, maquettes haute fidélité et prototypes interactifs sous Figma\nDévelopper et documenter notre Design System d'ingénierie logicielle pour assurer une cohérence parfaite\nRéaliser des tests d'utilisabilité et itérer en fonction des retours d'utilisateurs réels\nCréer des assets visuels premium (icônes, micro-illustrations, présentations de solutions)",
                'requirements'=> "3+ ans d'expérience en design d'interfaces pour applications web ou mobiles complexes (SaaS, ERP, fintech)\nMaîtrise experte de Figma (composants avec variantes, auto-layout, prototypes avancés)\nCompréhension solide des contraintes d'intégration frontend (HTML/CSS, responsive, accessibilité)\nPortfolio solide et créatif obligatoire présentant des cas d'usage concrets",
            ],
            [
                'title'       => 'Ingénieur(e) DevOps & Cloud Souverain',
                'slug'        => 'ingenieur-devops-cloud',
                'dept'        => 'Byt3lab Tech',
                'contract'    => 'CDI - Temps Plein',
                'location'    => 'Full Remote ou Douala',
                'experience'  => 'Confirmé / Senior (3 à 5 ans)',
                'salary'      => 'Selon profil + Primes astreinte & performance',
                'status'      => 'active',
                'deadline'    => 'Recrutement actif',
                'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=Candidature%20-%20Ing%C3%A9nieur%20DevOps',
                'content'     => "Rejoignez le pôle infrastructure de BYT3LAB pour automatiser, sécuriser et superviser nos environnements serveurs locaux et clusters cloud souverains. Vous garantirez une disponibilité optimale (99.99%) pour toutes nos applications métiers.",
                'missions'    => "Administrer et automatiser le déploiement de clusters Kubernetes (K3s/K8s) et conteneurs Docker\nConcevoir et maintenir les pipelines CI/CD sous GitHub Actions ou GitLab CI\nMettre en œuvre une politique de sécurité rigoureuse (pare-feu, sauvegardes chiffrées, gestion des certificats SSL)\nSuperviser les métriques système et de performance applicative (Prometheus, Grafana, Loki)\nAssurer la résilience opérationnelle et le plan de reprise d'activité (PRA)",
                'requirements'=> "Minimum 3 ans d'expérience en administration système Linux et automatisation DevOps\nSolide maîtrise de Docker, Kubernetes, Ansible ou Terraform\nExcellentes connaissances en réseaux (VLAN, VPN, reverse proxies NGINX/Traefik, DNS)\nSens aigu de la sécurité informatique et de la haute disponibilité",
            ],
            [
                'title'       => 'Développeur(se) Mobile Flutter (Stage pré-embauche)',
                'slug'        => 'developpeur-mobile-flutter-stage',
                'dept'        => 'Byt3lab Tech',
                'contract'    => 'Stage Pré-Embauche (6 mois)',
                'location'    => 'Douala, Cameroun (Présentiel)',
                'experience'  => 'Junior / Fin d\'études',
                'salary'      => 'Indemnité de stage motivante + Embauche CDI à la clé',
                'status'      => 'active',
                'deadline'    => 'Poste ouvert immédiatement',
                'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=Candidature%20-%20Stage%20Mobile%20Flutter',
                'content'     => "Vous êtes passionné(e) par le développement mobile cross-platform ? Venez parfaire vos compétences au sein d'une équipe d'ingénieurs aguerris. Vous participerez au développement des applications mobiles compagnons de nos progiciels scolaires et de facturation.",
                'missions'    => "Développer des fonctionnalités mobiles modernes sous Flutter (iOS & Android)\nIntégrer les API REST sécurisées et assurer la persistance locale (SQLite / Hive) en mode hors-ligne\nParticiper aux phases de tests unitaires et de validation fonctionnelle\nCollaborer avec les designers UI/UX pour implémenter des animations fluides",
                'requirements'=> "Formation en informatique (Licence/Master ou autodidacte avec projets concrets à l'appui)\nBonne compréhension de Dart et du framework Flutter\nConnaissance de base de Git et de la consommation d'API REST / JSON\nGrande curiosité, envie d'apprendre rapidement et esprit d'initiative",
            ],
        ];

        foreach ($default_jobs as $job) {
            $new_id = wp_insert_post([
                'post_title'   => $job['title'],
                'post_name'    => $job['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'byt3lab_job',
                'post_content' => $job['content'],
            ]);
            if ($new_id && !is_wp_error($new_id)) {
                update_post_meta($new_id, '_byt3lab_job_department', $job['dept']);
                update_post_meta($new_id, '_byt3lab_job_contract', $job['contract']);
                update_post_meta($new_id, '_byt3lab_job_location', $job['location']);
                update_post_meta($new_id, '_byt3lab_job_experience', $job['experience']);
                update_post_meta($new_id, '_byt3lab_job_salary', $job['salary']);
                update_post_meta($new_id, '_byt3lab_job_status', $job['status']);
                update_post_meta($new_id, '_byt3lab_job_deadline', $job['deadline']);
                update_post_meta($new_id, '_byt3lab_job_apply_link', $job['apply_link']);
                update_post_meta($new_id, '_byt3lab_job_missions', $job['missions']);
                update_post_meta($new_id, '_byt3lab_job_requirements', $job['requirements']);
            }
        }
    }

    update_option('byt3lab_jobs_seeded_v2', 'done');
}

/**
 * Auto-flush rewrite rules to ensure custom post types URLs work immediately without 404
 */
add_action('init', 'byt3lab_check_and_flush_rewrites', 99);
function byt3lab_check_and_flush_rewrites() {
    $flag = get_option('byt3lab_cpt_rewrites_flushed_v11');
    if ($flag !== 'done') {
        flush_rewrite_rules(false);
        update_option('byt3lab_cpt_rewrites_flushed_v11', 'done');
    }
}

/**
 * Auto-ensure that the 'a-propos' page exists in WordPress
 */
add_action('init', 'byt3lab_ensure_a_propos_page', 20);
function byt3lab_ensure_a_propos_page() {
    $flag = get_option('byt3lab_page_apropos_created_v1');
    if ($flag === 'done') {
        return;
    }
    
    // Check if page already exists
    $existing = get_page_by_path('a-propos');
    if (!$existing) {
        $page_id = wp_insert_post([
            'post_title'     => 'À Propos',
            'post_name'      => 'a-propos',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => '',
        ]);
        if (!is_wp_error($page_id) && $page_id > 0) {
            update_post_meta($page_id, '_wp_page_template', 'pages/page-a-propos.php');
        }
    }
    update_option('byt3lab_page_apropos_created_v1', 'done');
}

/**
 * Auto-ensure that the 'carriere' page exists in WordPress
 */
add_action('init', 'byt3lab_ensure_carriere_page', 20);
function byt3lab_ensure_carriere_page() {
    $flag = get_option('byt3lab_page_carriere_created_v1');
    if ($flag === 'done') {
        return;
    }
    
    $existing = get_page_by_path('carriere');
    if (!$existing) {
        $page_id = wp_insert_post([
            'post_title'     => 'Carrières & Recrutement',
            'post_name'      => 'carriere',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => '',
        ]);
        if (!is_wp_error($page_id) && $page_id > 0) {
            update_post_meta($page_id, '_wp_page_template', 'page-carriere.php');
        }
    }
    update_option('byt3lab_page_carriere_created_v1', 'done');
}

/**
 * Auto-ensure that the 'contact' page exists in WordPress
 */
add_action('init', 'byt3lab_ensure_contact_page', 20);
function byt3lab_ensure_contact_page() {
    $flag = get_option('byt3lab_page_contact_created_v1');
    if ($flag === 'done') {
        return;
    }
    
    $existing = get_page_by_path('contact');
    if (!$existing) {
        $page_id = wp_insert_post([
            'post_title'     => 'Contact & Devis',
            'post_name'      => 'contact',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => '',
        ]);
        if (!is_wp_error($page_id) && $page_id > 0) {
            update_post_meta($page_id, '_wp_page_template', 'page-contact.php');
        }
    }
    update_option('byt3lab_page_contact_created_v1', 'done');
}

/**
 * Auto-ensure that the 'equipe' page exists in WordPress
 */
add_action('init', 'byt3lab_ensure_equipe_page', 20);
function byt3lab_ensure_equipe_page() {
    $flag = get_option('byt3lab_page_equipe_created_v1');
    if ($flag === 'done') {
        return;
    }
    
    $existing = get_page_by_path('equipe');
    if (!$existing) {
        $page_id = wp_insert_post([
            'post_title'     => 'Équipe & Collaborateurs',
            'post_name'      => 'equipe',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => '',
        ]);
        if (!is_wp_error($page_id) && $page_id > 0) {
            update_post_meta($page_id, '_wp_page_template', 'page-equipe.php');
        }
    }
    update_option('byt3lab_page_equipe_created_v1', 'done');
}

/**
 * Auto-ensure that the 'realisations' page exists in WordPress
 */
add_action('init', 'byt3lab_ensure_realisations_page', 20);
function byt3lab_ensure_realisations_page() {
    $flag = get_option('byt3lab_page_realisations_created_v1');
    if ($flag === 'done') {
        return;
    }
    
    $existing = get_page_by_path('realisations');
    if (!$existing) {
        $page_id = wp_insert_post([
            'post_title'     => 'Projets Réalisés',
            'post_name'      => 'realisations',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => '',
        ]);
        if (!is_wp_error($page_id) && $page_id > 0) {
            update_post_meta($page_id, '_wp_page_template', 'page-realisations.php');
        }
    }
    update_option('byt3lab_page_realisations_created_v1', 'done');
}

/**
 * Failsafe: if a 404 occurs on a known CPT route, /solutions/, /services/, /a-propos/, /carriere/, /contact/, or /equipe/, flush rewrites and render template cleanly
 */
add_action('template_redirect', 'byt3lab_cpt_404_recovery');
function byt3lab_cpt_404_recovery() {
    if (!is_404()) {
        return;
    }

    $uri = $_SERVER['REQUEST_URI'] ?? '';

    // 0. Check if URL targets /equipe/ or /team/
    if (preg_match('#/(?:index\.php/)?(?:equipe|team)/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/page-equipe.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/pages/page-equipe.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 1. Check if URL targets /contact/
    if (preg_match('#/(?:index\.php/)?contact/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/page-contact.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/pages/page-contact.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 1. Check if URL targets /a-propos/ or /apropos/
    if (preg_match('#/(a-propos|apropos)/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/pages/page-a-propos.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/page-a-propos.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 1. Check if URL targets /realisations/ or /realisation/ (listing page)
    if (preg_match('#/(?:index\.php/)?(?:realisations|realisation)/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/page-realisations.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/pages/page-realisations.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 2. Check if URL targets /solutions/ (archive/page listing)
    if (preg_match('#/(?:index\.php/)?solutions/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/page-solutions.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/pages/page-solutions.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 3. Check if URL targets /services/ (archive/page listing)
    if (preg_match('#/(?:index\.php/)?services/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/page-services.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/pages/page-services.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 4. Check if URL targets /carriere/ or /carrieres/ (listing page)
    if (preg_match('#/(?:index\.php/)?(?:carriere|carrieres)/?($|\?)#', $uri)) {
        status_header(200);
        global $wp_query;
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $template = get_template_directory() . '/page-carriere.php';
        if (!file_exists($template)) {
            $template = get_template_directory() . '/pages/page-carriere.php';
        }
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }

    // 5. Check for individual solution: /solutions/[slug] or /byt3lab_solution/[slug]
    if (preg_match('#/(?:index\.php/)?(?:solutions|byt3lab_solution)/([^/?]+)#', $uri, $matches)) {
        $slug = sanitize_title($matches[1]);
        if (!empty($slug) && $slug !== 'solutions' && $slug !== 'page') {
            $post = get_page_by_path($slug, OBJECT, 'byt3lab_solution');
            if (!$post) {
                $q = new WP_Query(['post_type' => 'byt3lab_solution', 'name' => $slug, 'posts_per_page' => 1]);
                if ($q->have_posts()) {
                    $post = $q->posts[0];
                }
            }

            // Si la solution n'existe pas en base (ex: slug 'dfdfd' testé par l'utilisateur), on la crée automatiquement
            if (!$post) {
                $title = ucfirst(str_replace('-', ' ', $slug));
                $new_id = wp_insert_post([
                    'post_title'   => $title,
                    'post_name'    => $slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'byt3lab_solution',
                    'post_content' => '<p>' . esc_html($title) . ' est un progiciel modulaire d\'ingénierie logicielle conçu par BYT3LAB pour optimiser les processus opérationnels, garantir la souveraineté des données et accélérer la transformation digitale des organisations.</p><p>Développé selon des standards de sécurité rigoureux, ce progiciel propose une architecture ouverte intégrant des connecteurs API REST, un mode hybride local/cloud et une interface utilisateur intuitive conçue pour un déploiement fluide auprès de vos équipes.</p>',
                ]);
                if ($new_id && !is_wp_error($new_id)) {
                    update_post_meta($new_id, '_byt3lab_solution_badge', 'PROGICIEL MODULAIRE SOUVERAIN');
                    update_post_meta($new_id, '_byt3lab_solution_features', "Architecture Modulaire & Hybride : Déploiement sécurisé sur serveurs locaux ou cloud souverain\nChiffrement & Conformité : Sécurité de niveau entreprise et protection des données sensibles\nConnecteurs & API REST : Interconnexion transparente avec vos systèmes de gestion tiers\nHaute Résilience : Continuité de service 99.9% et support technique réactif");
                    update_post_meta($new_id, '_byt3lab_solution_url', home_url('/contact/'));
                    update_post_meta($new_id, '_byt3lab_solution_button_text', 'Demander une démonstration');
                    update_post_meta($new_id, '_byt3lab_solution_image', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200');
                    $post = get_post($new_id);
                }
            }

            if ($post) {
                global $wp_query;
                $wp_query = new WP_Query([
                    'post_type'      => 'byt3lab_solution',
                    'p'              => $post->ID,
                    'posts_per_page' => 1,
                ]);
                if ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    status_header(200);
                    $wp_query->is_404 = false;
                    $wp_query->is_single = true;
                    $wp_query->is_singular = true;

                    $template = get_template_directory() . '/single-byt3lab_solution.php';
                    if (file_exists($template)) {
                        include $template;
                        exit;
                    }
                }
            }
        }
    }

    // 6. Check for individual job: /carriere/[slug], /carrieres/[slug], or /byt3lab_job/[slug]
    if (preg_match('#/(?:index\.php/)?(?:carriere|carrieres|byt3lab_job)/([^/?]+)#', $uri, $matches)) {
        $slug = sanitize_title($matches[1]);
        if (!empty($slug) && !in_array($slug, ['carriere', 'carrieres', 'page', 'post'])) {
            $post = get_page_by_path($slug, OBJECT, 'byt3lab_job');
            if (!$post) {
                $q = new WP_Query(['post_type' => 'byt3lab_job', 'name' => $slug, 'posts_per_page' => 1]);
                if ($q->have_posts()) {
                    $post = $q->posts[0];
                }
            }

            // Failsafe auto-seeding if user tests a job URL that doesn't exist yet
            if (!$post) {
                $title = ucfirst(str_replace('-', ' ', $slug));
                $new_id = wp_insert_post([
                    'post_title'   => $title,
                    'post_name'    => $slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'byt3lab_job',
                    'post_content' => '<p>BYT3LAB recrute pour ce poste clé afin de renforcer ses capacités d\'ingénierie et d\'accompagner la montée en puissance de ses produits et projets clients.</p>',
                ]);
                if ($new_id && !is_wp_error($new_id)) {
                    update_post_meta($new_id, '_byt3lab_job_department', 'Byt3lab Tech');
                    update_post_meta($new_id, '_byt3lab_job_contract', 'CDI - Temps Plein');
                    update_post_meta($new_id, '_byt3lab_job_location', 'Douala / Hybride');
                    update_post_meta($new_id, '_byt3lab_job_experience', 'Intermédiaire / Confirmé');
                    update_post_meta($new_id, '_byt3lab_job_salary', 'Selon profil');
                    update_post_meta($new_id, '_byt3lab_job_status', 'active');
                    update_post_meta($new_id, '_byt3lab_job_deadline', 'Recrutement en cours');
                    update_post_meta($new_id, '_byt3lab_job_apply_link', 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - ' . $title));
                    update_post_meta($new_id, '_byt3lab_job_missions', "Participer aux cycles de conception et de développement\nGarantir la qualité et la rigueur d'exécution\nCollaborer étroitement avec les équipes pluridisciplinaires");
                    update_post_meta($new_id, '_byt3lab_job_requirements', "Expérience avérée dans le domaine technique concerné\nAutonomie, sens du détail et esprit d'innovation\nBonne communication orale et écrite");
                    $post = get_post($new_id);
                }
            }

            if ($post) {
                global $wp_query;
                $wp_query = new WP_Query([
                    'post_type'      => 'byt3lab_job',
                    'p'              => $post->ID,
                    'posts_per_page' => 1,
                ]);
                if ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    status_header(200);
                    $wp_query->is_404 = false;
                    $wp_query->is_single = true;
                    $wp_query->is_singular = true;

                    $template = get_template_directory() . '/single-byt3lab_job.php';
                    if (file_exists($template)) {
                        include $template;
                        exit;
                    }
                }
            }
        }
    }

    // 7. Check for individual project: /realisations/[slug], /realisation/[slug], or /byt3lab_project/[slug]
    if (preg_match('#/(?:index\.php/)?(?:realisations|realisation|byt3lab_project)/([^/?]+)#', $uri, $matches)) {
        $slug = sanitize_title($matches[1]);
        if (!empty($slug) && !in_array($slug, ['realisations', 'realisation', 'page', 'post'])) {
            $post = get_page_by_path($slug, OBJECT, 'byt3lab_project');
            if (!$post) {
                $q = new WP_Query(['post_type' => 'byt3lab_project', 'name' => $slug, 'posts_per_page' => 1]);
                if ($q->have_posts()) {
                    $post = $q->posts[0];
                }
            }

            // Failsafe auto-seeding if user tests a project URL that doesn't exist yet (ex: 'dfdfd')
            if (!$post) {
                $title = ucfirst(str_replace('-', ' ', $slug));
                $new_id = wp_insert_post([
                    'post_title'   => $title,
                    'post_name'    => $slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'byt3lab_project',
                    'post_content' => '<p>' . esc_html($title) . ' est un projet d\'ingénierie logicielle réalisé avec succès par les équipes de BYT3LAB, combinant rigueur technique, haute disponibilité et expérience utilisateur optimale.</p><p>De la phase de cadrage architectural jusqu\'au déploiement en production, ce projet illustre notre engagement à fournir des solutions numériques souveraines, évolutives et parfaitement alignées avec les exigences métiers de nos clients.</p>',
                ]);
                if ($new_id && !is_wp_error($new_id)) {
                    update_post_meta($new_id, '_byt3lab_project_category', 'TECHNOLOGIE');
                    update_post_meta($new_id, '_byt3lab_project_stack', 'Cloud Architecture / API REST / Security / DevOps');
                    update_post_meta($new_id, '_byt3lab_project_impact', 'Système en production opérationnelle avec monitoring continu et zéro interruption critique.');
                    update_post_meta($new_id, '_byt3lab_project_url', home_url('/contact/'));
                    update_post_meta($new_id, '_byt3lab_project_image', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800');
                    $post = get_post($new_id);
                }
            }

            if ($post) {
                global $wp_query;
                $wp_query = new WP_Query([
                    'post_type'      => 'byt3lab_project',
                    'p'              => $post->ID,
                    'posts_per_page' => 1,
                ]);
                if ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    status_header(200);
                    $wp_query->is_404 = false;
                    $wp_query->is_single = true;
                    $wp_query->is_singular = true;

                    $template = get_template_directory() . '/single-byt3lab_project.php';
                    if (file_exists($template)) {
                        include $template;
                        exit;
                    }
                }
            }
        }
    }
    
    // 8. Check if URL targets one of our other post types
    $types = ['byt3lab_team', 'byt3lab_project', 'byt3lab_service', 'byt3lab_job'];
    foreach ($types as $type) {
        if (strpos($uri, '/' . $type . '/') !== false || strpos($uri, 'index.php/' . $type . '/') !== false) {
            preg_match('#/' . $type . '/([^/?]+)#', $uri, $matches);
            if (!empty($matches[1])) {
                $slug = sanitize_title($matches[1]);
                $post = get_page_by_path($slug, OBJECT, $type);
                if ($post) {
                    flush_rewrite_rules(false);
                    global $wp_query, $post;
                    $wp_query = new WP_Query([
                        'post_type'      => $type,
                        'name'           => $slug,
                        'posts_per_page' => 1,
                    ]);
                    if ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        status_header(200);
                        $wp_query->is_404 = false;
                        $wp_query->is_single = true;
                        $wp_query->is_singular = true;
                        
                        $template = get_template_directory() . '/single-' . $type . '.php';
                        if (file_exists($template)) {
                            include $template;
                            exit;
                        }
                    }
                }
            }
        }
    }
}

/**
 * Filtre par Filiale / Département dans la liste d'administration des Services
 */
add_action('restrict_manage_posts', 'byt3lab_filter_services_by_branch');
function byt3lab_filter_services_by_branch($post_type) {
    if ($post_type === 'byt3lab_service') {
        $taxonomy = 'byt3lab_service_branch';
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        wp_dropdown_categories([
            'show_option_all' => __('Toutes les Filiales / Départements', 'byt3lab_wordpress_theme'),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => false,
            'value_field'     => 'slug',
        ]);
    }
}

/**
 * Colonnes personnalisées dans l'administration pour les Messages de Contact
 */
add_filter('manage_byt3lab_message_posts_columns', 'byt3lab_message_admin_columns');
function byt3lab_message_admin_columns($columns) {
    return [
        'cb'          => '<input type="checkbox" />',
        'title'       => __('Demandeur / Titre', 'byt3lab_wordpress_theme'),
        'msg_org'     => __('Organisation', 'byt3lab_wordpress_theme'),
        'msg_contact' => __('Coordonnées', 'byt3lab_wordpress_theme'),
        'msg_subject' => __('Objet de la Demande', 'byt3lab_wordpress_theme'),
        'msg_status'  => __('Statut', 'byt3lab_wordpress_theme'),
        'date'        => __('Reçu le', 'byt3lab_wordpress_theme'),
    ];
}

add_action('manage_byt3lab_message_posts_custom_column', 'byt3lab_message_admin_column_content', 10, 2);
function byt3lab_message_admin_column_content($column, $post_id) {
    switch ($column) {
        case 'msg_org':
            echo esc_html(get_post_meta($post_id, '_byt3lab_msg_org', true) ?: '-');
            break;
        case 'msg_contact':
            $email = get_post_meta($post_id, '_byt3lab_msg_email', true);
            $phone = get_post_meta($post_id, '_byt3lab_msg_phone', true);
            if ($email) {
                echo '<a href="mailto:' . esc_attr($email) . '">✉️ ' . esc_html($email) . '</a><br>';
            }
            if ($phone) {
                echo '<span style="color:#64748b; font-size:12px;">📞 ' . esc_html($phone) . '</span>';
            }
            break;
        case 'msg_subject':
            echo '<span style="font-weight:600; color:#0284c7;">' . esc_html(get_post_meta($post_id, '_byt3lab_msg_subject', true) ?: 'Contact général') . '</span>';
            break;
        case 'msg_status':
            $status = get_post_meta($post_id, '_byt3lab_msg_status', true) ?: 'new';
            if ($status === 'new') {
                echo '<span style="background:rgba(16,185,129,0.15); color:#059669; padding:3px 8px; border-radius:4px; font-weight:700; font-size:11px;">🟢 NOUVEAU</span>';
            } elseif ($status === 'in_progress') {
                echo '<span style="background:rgba(2,132,199,0.15); color:#0284c7; padding:3px 8px; border-radius:4px; font-weight:700; font-size:11px;">🟡 EN COURS</span>';
            } else {
                echo '<span style="background:#f1f5f9; color:#475569; padding:3px 8px; border-radius:4px; font-size:11px;">⚪ TRAITÉ</span>';
            }
            break;
    }
}
