def PuissanceDeDeux(min):
    i = 1
    j = 1
    puiss = 2
    liste=[]
    #Pour determiner la plus grande puissance de 2
    while (puiss != 1):
        while i <= min:
            j = i 
            i = i * 2
        puiss = j
        liste.append(j)
        min = min - puiss   
    return liste

listePuissance=[]
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
    
listePuissance = PuissanceDeDeux(min)

print(listePuissance)

 