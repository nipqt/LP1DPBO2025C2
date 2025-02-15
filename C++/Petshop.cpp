#include <iostream>
#include <string>

using namespace std;

class Petshop
{
    //Private Properties
    private:
        string ID;
        string namaproduk;
        string kategori;
        int harga;

    //Public Methods
    public:

        //Constructor
        Petshop()
        {
        }

        //Accessor
        void reset() //Untuk reset isi object (guna untuk delete)
        {
            this->ID = "";
            this->namaproduk = "";
            this->kategori = "";
            this->harga = 0;
        }

        void setData(string ID, string namaproduk, string kategori, int harga) //Untuk isi object (guna untuk Add dan Change)
        {
            this->ID = ID;
            this->namaproduk = namaproduk;
            this->kategori = kategori;
            this->harga = harga;
        }

        string getID() //untuk mendapatkan ID dalam object
        {
            return this->ID;
        }

        string getnamaproduk() //untuk mendapatkan nama dalam object
        {
            return this->namaproduk;
        }

        string getkategori() //untuk mendapatkan kategori dalam object
        {
            return this->kategori;
        }

        int getharga() //untuk mendapatkan harga dalam object
        {
            return this->harga;
        }

        //Destructor
        ~Petshop()
        {
        }
};
