def conjecture(a):
    if a % 2 == 0: 
        res = a // 2
    else: 
        res = (a * 3) + 1
    return res

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

nbr=len(liste)
print(nbr)
print(liste)
