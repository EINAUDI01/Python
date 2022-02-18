from re import I

def sommePuissanceDeDeux(min, j):
    listeSommePuissance = []
    listeSommePuissance.append(min) 
    res = min - j
    listeSommePuissance.append(res)
    while res != 0:
        res = res - j
        listeSommePuissance.append(res)
    return listeSommePuissance


print("Entrez le premier nombre : ")
a=int(input())
print("Entrez le second nombre : ")
b=int(input())

i = 2
j=2
liste = []

#Pour determiner la plus grande puissance de 2
if a < b:
    while i < b:
        min = a
        j = i 
        i = i ** 2
else:
    while i < a:
        min = a
        j = i 
        i = i ** 2

    
liste = sommePuissanceDeDeux(min, j)
print(liste)  


 