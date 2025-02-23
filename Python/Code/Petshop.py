class Petshop:
    __ID = ""
    __namaProduk = ""
    __kategori = ""
    __harga = 0

    def __init__(self, ID, namaProduk, kategori, harga):
        self.__ID = ID
        self.__namaProduk = namaProduk
        self.__kategori = kategori
        self.__harga = harga

    def getID(self):
        return self.__ID
    
    def getnamaProduk(self):
        return self.__namaProduk
    
    def getkategori(self):
        return self.__kategori
    
    def getharga(self):
        return self.__harga