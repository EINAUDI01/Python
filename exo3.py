def PuissanceDeDeux(min):
    i=0
    #Pour determiner la plus grande puissance de 2
    while i <= min:
        j = i 
        i = i ** 2
    return j

print("Entrez le premier nombre : ")
a=int(input())
print("Entrez le second nombre : ")
b=int(input())

liste = []

#Pour determiner la plus grande puissance de 2
if a < b:
    min = a
else:
    min = b

puissanceDeDeux = PuissanceDeDeux(min)
liste.append(puissanceDeDeux)

print(liste)

 


 