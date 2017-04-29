

CREATE OR REPLACE VIEW employe_equipe_vue
AS 
SELECT  equipe.equipe_id, equipe_nom, equipe_entreprise,
 employe.employe_id, employe_nom,employe_prenom
FROM employe INNER JOIN equipe
ON employe.equipe_id = equipe.equipe_id ;

SELECT disposer_quantite,  disposer.type_conge_id , employe_id
                                FROM disposer JOIN type_conge 
                                ON disposer.type_conge_id = type_conge.type_conge_id
                                WHERE disposer.employe_id = 1
