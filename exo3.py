print("Entrez le premier nombre:")
a=int(input())
print("Entrez le second nombre:")
b=int(input())

#On détermine le plus petit des 2 nombres
if a < b:
    min = a
    max = b
else:
    min = b 
    max = a
    
#On va essayer de determiner la plus grand puissance du min
#Jusqu'à ce que cette puissance soit égale à 1 

#Je declare mes différentes variables
puissanceDeDeux = 1
listePuissanceDeDeux = []
listeValeur = []
val = max
valIntermediaire = max

#Boucles pour calculer les puissances de deux et les valeurs correspondantes
#Jusqu'à la dernière puissance de 2 inférieur à min
while puissanceDeDeux <= min: 
    listePuissanceDeDeux.append(puissanceDeDeux)
    listeValeur.append(val)
    puissanceDeDeux = puissanceDeDeux + puissanceDeDeux 
    val =  valIntermediaire + valIntermediaire
    valIntermediaire = val
    

#On va tranformer les deux listes qui contiennent les puissances et les valeurs 
#En dictionnaire
dict = dict(zip(listePuissanceDeDeux, listeValeur))

resultat = 0
for k, i in reversed(dict.items()):
    if k <= min:
        resultat = i + resultat
        min = min - k
print(resultat)               

 