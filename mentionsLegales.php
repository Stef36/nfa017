<!DOCTYPE html>
<html lang="fr" >
<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" href="mes-repos.ico" >
        <link rel="icon" type="image/x-icon" href="img/photos/favicon.ico">
        <title>Information du personnel</title>
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
        <!--<link href="./css/calendar.css" rel="stylesheet" type="text/css" />-->
    </head>
        <title>Poser mes repos en ligne</title>

            <h1>Mentions légales - Poser mes repos en ligne</h1>
            <br><br>
        </header>
        <hr/>
<!-- ===================== MENU ===================== -->
        <?php include("includes/menu.php"); ?>
        
        <hr/>
        <SECTION>
            <br>
            <h2>
                <div> Coordonnées de l'éditeur :</div>
            </h2>
            <br>
            <ul>
<!--========================= Description des mentions légales =================================-->
                <h2>
                    <li>Dénomination sociale de la société : SAS poser ces congés</li>
                    <li>Adresse postale : Rue du cinoche 36999 Trifoully les oies</li>
                    <li>Numéro de téléphone : 02 54 22 33 44</li>
                    <li>Email de contact 2 : dominique.dufour.auditeur@lecnam.net</li>
                    <li>Email de contact 1 : stephane.laruelle.auditeur@lecnam.net</li>
                    <li>N° de RCS : Paris 439 035 326 00098</li>
                    <li>N° de SIRET : 439 035 326 00098</li>
                    <li>Capital de la société : 1€</li>
                    <li>TVA intracommunautaire : FR 254 390 365 27</li>
                    <li>Directeur Ressources Humaine : Dominique DUFOUR</li>
                    <li>Responsable des équipes : Stéphane LARUELLE </li>
                    
                    <br>
                    Hébergeur :  <br>
                    Développeurs Web : <br>
                    DUFOUR Dominique <br>
                    LARUELLE Stéphane <br>
                    
                </h2>
            </ul>
            <br>
            <br>
            <br>
            <h2> Commentaires : <br>
                Ce site a été développé avec l'aide de Notepad++, GitHub & Gimp qui nous a permis de développer de façon graphique ce site. <br><br><br>
            </h2>

        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
<!--===================================== Copyright ==========================================-->
            <p>© Poser mes repos en ligne 2017 - All Rights Reserved.</p>
            <script type="text/javascript">
                {
                    var derniereModif=document.lastModified;
                    var dateModif = new Date(derniereModif);
                    var jour = dateModif.getDate();
                    var mois=dateModif.getMonth()+1;
                    var annee=dateModif.getFullYear();
                    var heures=dateModif.getHours();
                    var minutes=dateModif.getMinutes();
                    document.write("Mise à jour le ");
                    document.write(jour+"/"+mois+"/"+annee+" à "+heures+":"+minutes);
                }
                </script><br>
        </footer>
    </body>
</html>