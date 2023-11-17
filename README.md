<h1>BRIEF SIMPLON - Application de gestion de projet AGILE (Exemple Trello)</h1>

<h4>Objectifs:</h4> 

<p>Une entreprise souhaite développer une application de gestion de projets Agile qui permet à ses équipes de travailler ensemble de manière efficace en suivant les principes de développement Agile. Le but est d’aider ses équipes à suivre la progression des actions, des fonctionnalités et des tâches à faire sur chaque projet de l’entreprise.L’entreprise souhaite s'inspirer de Trello ou de Jira.</p>

<p>Fonctionnalités:</p>

<p>
1-Les utilisateurs peuvent créer un nouveau projet, 
2- y ajouter des membres de l'équipe et 
3-définir une liste d’objectifs à atteindre. 
4 - Consulter les projets 
</p>


<h2>PARTIE CONCEPTION :</h2> 

<h4> Use Case </h4>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/d65f5b53-04c4-478b-8547-1cf6b11eb0d6)


<h4>MCD</h4>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/36d91208-a5e8-4129-82a3-cffeeee88acd)

<h4>Maquette : </h4>

<h3>Page d'accueil (1/5)</h3>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/bddc1635-5f12-4521-b880-fb408c2e5cc7)

<h3>Création d'un projet (2/5)</h3>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/65d6ec5b-42f4-46d3-b253-6487bac82f78)

<h3>Dashboard d'un projet (3/5)</h3>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/2bb0b27c-5223-4bbf-bc23-750231daae11)

<h3>Créer une tâche (4/5)</h3>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/779d99ca-338d-41c7-b2af-af449fbc312e)

<h3>Modifier une tâche (5/5)</h3>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/60ed9b8e-4e08-4fed-ae68-0e2d1863fd45)


<h4>Trello </h4>
<p>Lien vers le dashboard du projet : https://trello.com/invite/b/h9fSsjno/ATTIa0674fa4e6e41a55cd905c91221d6a7723D6D4AC/application-gestion-de-projet-agile</p>

![image](https://github.com/rider974/app_gestion_projets/assets/116554314/23e53be0-23df-465c-86b1-ead2505b3eec)

<h2>Installation Nécessaire!!!</h2>

<p>
  1 - Avoir une version de PHP >= 8.0 (lien pour télécharger la dernière version "Current Stable" de PHP https://www.php.net/downloads.php) 
</p>
<p>
  2- Installer Composer (lien d'installation : https://getcomposer.org/Composer-Setup.exe)
  Si ce lien ne marche pas veuillez aller vers la page d'installation : https://getcomposer.org/download/
</p>
<p>
  3 - Copier le code source du repo sur l'ordinateur (git clone https://github.com/rider974/app_gestion_projets.git)
</p>
<p> 4 - Configurer la base de données : 
Copier/Coller le script de base de données dans le dossier Conception/script_bdd.sql dans phpMyAdmin ou un serveur SGBD MySQL de votre choix</p>

<p>5 - Installer WAMPP/XAMPP/MAMPP ou un équivalent </p>


<h2>Pour lancer l'application</h2>
<p> 1- Lancer son wampp/xampp/mampp qui contient la base de données</p>
<p> 2 - Ouvrir un terminal de commande type cmder/PowerShell/terminal windows/MAC à la racine de la solution clonée</p>
<p> 3 - Taper la commande "symfony server:start"</p>
<p> 4 - Aller dans le navigateur à l'adresse "http://localhost:8000"</p>

