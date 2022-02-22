def PuissanceDeDeux(min):
    i = 0
    #Pour determiner la plus grande puissance de 2
    while i <= min:
        j = i 
        i = i * 2 
    return j

liste=[]
puiss=0

print("Entrez le premier nombre : ")
a=int(input())
print(a)
print("Entrez le second nombre : ")
b=int(input())
print(b)

if a < b: 
    min = a
else:
    min = b 
    
puiss = PuissanceDeDeux(min)
liste.append(puiss)

while(puiss != 1):
    min = min - puiss
    PuissanceDeDeux(min)
    liste.append(puiss)
    
print(liste)

 