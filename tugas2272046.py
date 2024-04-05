def main():
    N = int(input('s'))
    localtime1 = time.asctime(time.localtime(time.time()))
    fdata=open("filep.txt","w")

    for x in range (2,N+1,1):
        JmlFaktor = 2
        for i in range (2,(x//2)+1,1):
            if (x % i) == 0 :
                JmlFaktor = JmlFaktor+1
        if JmlFaktor == 2:
            print ('Prima = ',x)
            data = str(x)+"\n"
            fdata.write(data)
        fdata.close()
    
    localtime2 = time.asctime(time.localtime(time.time()))
    print ("Jam Mulai:",localtime1)
    print ("Jam Selesai:",localtime2)
    Tunggu = input()
if __name__ == '__main__':
    import time
    main()