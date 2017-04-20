

CREATE OR REPLACE VIEW employe_equipe_vue
AS 
SELECT  equipe.equipe_id, equipe_nom, equipe_entreprise,
 employe.employe_id, employe_nom,employe_prenom
FROM employe INNER JOIN equipe
ON employe.equipe_id = equipe.equipe_id ;
