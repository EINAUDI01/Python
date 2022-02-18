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
while n != 1:
    n = conjecture(n)
    liste.append(n)

print(liste)
