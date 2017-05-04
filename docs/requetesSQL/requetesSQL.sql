

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


SELECT T.type_conge_id AS conge_type_id, C.conge_id, C.conge_datedebut, C.conge_quantite, C.conge_commentaire, C.conge_demande,
C.conge_consulte, C.conge_accorde, C.employe_id

FROM type_conge AS T LEFT JOIN
conge AS C 
ON T.type_conge_id = C.type_conge_id
