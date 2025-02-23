from Petshop import Petshop

print("+(******************************)+")
print("|    Welcome To Niph Petshop     |")
print("|       a Program by Nipqt       |")
print("+_______________________________)+")
n = int(input("Berapa Data yang ingin dimasukan: "))

datashop_list = []
menu, data = 0, 0

while menu == 0:
    print("")
    print("+----------------------------+")
    print("| 1 -> Show                  |")
    print("| 2 -> Add                   |")
    print("| 3 -> Change                |")
    print("| 4 -> Delete                |")
    print("| 5 -> Search                |")
    print("| 0 -> Exit                  |")
    print("+----------------------------+")
    pilihan = int(input("Pilih Command : "))

    if (pilihan != 0) and (pilihan > 5):
        print("Tidak ada pilihan tersebut")
    else :
        if pilihan == 1:
            print("")
            print("+====================================+")
            if len(datashop_list) == 0:
                print("|       Error : Data tidak ada       |")
            else:
                for datashop in datashop_list:
                    print("+-------------------------------+")
                    print("ID             : ", datashop.getID())
                    print("Nama Produk    : ", datashop.getnamaProduk())
                    print("Kategori       : ", datashop.getkategori())
                    print("Harga          : ", datashop.getharga())
                    print("+-------------------------------+")
            print("+====================================+")

        elif pilihan == 2:
            loop, fail = 0,0
            while loop == 0:
                id = input("ID ('end' untuk mengakhiri): ")
                if id == "end":
                    loop = 1
                else :
                    if data >= n:
                        print("+======================================+")
                        print("|       Error : Data sudah penuh       |")
                        print("+======================================+")
                        loop = 1
                        fail = 1
                    else:
                        count = 0
                        if len(datashop_list) > 0 :
                            fail = 0
                            while (fail == 0) and (count < data) :
                                if datashop_list[count].getID() == id:
                                    print("+============================================+")
                                    print("|       Error : ID ini telah digunakan       |")
                                    print("+============================================+")  
                                    fail = 1
                                count += 1
                            if fail == 0:
                                namaProduk = input("Nama Produk : ")
                                kategori = input("Kategori : ")
                                harga = int(input("Harga : "))
                                datashop_list.append(Petshop(id, namaProduk, kategori, harga))
                                data += 1
                        else:
                            namaProduk = input("Nama Produk : ")
                            kategori = input("Kategori : ")
                            harga = int(input("Harga : "))
                            datashop_list.append(Petshop(id, namaProduk, kategori, harga))
                            data += 1
            if (fail == 0) and (namaProduk != None):
                print("+=================================+")
                print("|       Data has been Added       |")
                print("+=================================+")

        elif pilihan == 3:
            print("")
            if data == 0:
                print("+====================================+")
                print("|       Error : Data belum ada       |")
                print("+====================================+")
            else:
                searchID = input("Pilih ID data yang ingin diubah: ")
                i, dapat, fail = 0, 0, 0
                while (dapat == 0) and (i < data):
                    if datashop_list[i].getID() == searchID:
                        id = input("ID: ")
                        if id == searchID:
                            namaProduk = input("Nama Produk : ")
                            kategori = input("Kategori : ")
                            harga = int(input("Harga : "))
                            datashop_list[i] = Petshop(id, namaProduk, kategori, harga)
                            dapat = 1
                        else :
                            cari = 0
                            while (cari < data) and (fail == 0):
                                if datashop_list[cari].getID() == id:
                                    print("+============================================+")
                                    print("|       Error : ID ini telah digunakan       |")
                                    print("+============================================+")  
                                    dapat = 1
                                    fail = 1
                                cari += 1
                            if fail == 0:
                                namaProduk = input("Nama Produk : ")
                                kategori = input("Kategori : ")
                                harga = int(input("Harga : "))
                                datashop_list[i] = Petshop(id, namaProduk, kategori, harga)
                                dapat = 1
                    else:
                        i += 1
                if dapat == 0:
                    if fail == 0:
                        print("+========================================+")
                        print("|       Error : ID tidak ditemukan       |")
                        print("+========================================+")
                else:
                    if fail == 0:
                        print("+===================================+")
                        print("|       Data has been changed       |")
                        print("+===================================+")

        elif pilihan == 4:
            print("")
            if data == 0:
                print("+====================================+")
                print("|       Error : Data belum ada       |")
                print("+====================================+")
            else:
                searchID = input("Pilih ID data yang ingin dihapus: ")
                cari, ketemu = 0,0
                while (ketemu == 0) and (cari < data) :
                    if datashop_list[cari].getID() == searchID:
                        del datashop_list[cari]
                        data -= 1
                        ketemu = 1
                    else :
                        cari += 1
                if ketemu == 0:
                    print("+========================================+")
                    print("|       Error : ID tidak ditemukan       |")
                    print("+========================================+")
                else:
                    print("+===================================+")
                    print("|       Data has been deleted       |")
                    print("+===================================+")

        elif pilihan == 5:
            print("")
            if data == 0:
                print("+====================================+")
                print("|       Error : Data belum ada       |")
                print("+====================================+")
            else:
                searchID = input("Pilih ID data yang ingin dicari: ")
                cari, ketemu = 0,0
                while (ketemu == 0) and (cari < data) :
                    if datashop_list[cari].getID() == searchID:
                        print("+====================================+")
                        print("ID             : ", datashop_list[cari].getID())
                        print("Nama Produk    : ", datashop_list[cari].getnamaProduk())
                        print("Kategori       : ", datashop_list[cari].getkategori())
                        print("Harga          : ", datashop_list[cari].getharga())
                        print("+====================================+")
                        ketemu = 1
                    else :
                        cari += 1
                if ketemu == 0:
                    print("+========================================+")
                    print("|       Error : ID tidak ditemukan       |")
                    print("+========================================+")
                else:
                    print("")
                    print("+=================================+")
                    print("|       Data has been found       |")
                    print("+=================================+")

        elif pilihan == 0:
            print("")
            print("+================================+")
            print("|Thank You. Have A Nice Day Dawg!|")
            print("+================================+")
            menu = 1