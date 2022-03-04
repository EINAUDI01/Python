def conjecture(a):
    if a % 2 == 0: 
        res = a // 2
    else: 
        res = (a * 3) + 1
    return res

#lecture du fichier resultat.txt
with open("resultat.txt", 'r') as filin:
    lignes = filin.readlines()
    for ligne in lignes:
        print(ligne)
        
#Ici on récupère l'entrée de l'utilisateur
print("Entrez un nombre : ")
a = int(input())
#On ajoute a dans la liste
liste = []
liste.append(a)
#si l'entier est pair
n = conjecture(a)
liste.append(n)
#Je m'arrete à 1 car la suite va se répéter en 3 cycles 
#apres avoir atteint le chiffre 1
while n != 1:
    n = conjecture(n)
    liste.append(n)

#Ici on écrit le résultat dans un fichier
with open("resultat.txt", "w") as filout:
    filout.write(f"{liste}\n")

