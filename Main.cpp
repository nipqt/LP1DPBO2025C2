#include <iostream>
#include <string>
#include "Petshop.cpp"

using namespace std;

int main ()
{
    int n; //deklarasi inputan
    cout << "Welcome To Niph Petshop" << '\n';
    cout << "Berapa Data yang ingin dimasukan: "; cin >> n; //masukan untuk inputan sebanyak n
    Petshop datashop[n+1]; //Pengalokasian Array Of Object sebanyak n
    int pilihan; //untuk pilihan menu
    int menu = 0; //inisiasi looping dalam menu
    int data = 0; //untuk hitungan masukan
    while (menu == 0) { //loop program
    cout << "1 | Show" << '\n';
    cout << "2 | Add" << '\n';
    cout << "3 | Change" << '\n';
    cout << "4 | Delete" << '\n';
    cout << "5 | Search" << '\n';
    cout << "0 | Exit" << '\n';
    cout << "Pilih Command : "; 
    cin >> pilihan; //pilihan menu
        switch (pilihan) {
            case 1: //Proses Show
            {
                if (datashop[0].getID().empty()) { //Jika tidak ada isi data
                    cout << "Data Masih Kosong. Silahkan di isi." << '\n';
                } else { //Jika ada isi data
                    for (int i = 0; i < n; i++) { //looping untuk menampilkan isi data
                        if (!(datashop[i].getID().empty())) { //jika data ada isi
                            cout << "+----------------------------------+" << "\n";
                            cout << "ID             : " << datashop[i].getID() << "\n";
                            cout << "Nama Produk    : " << datashop[i].getnamaproduk() << "\n";
                            cout << "Kategori       : " << datashop[i].getkategori() << "\n";
                            cout << "Harga          : " << datashop[i].getharga() << "\n";
                            cout << "+----------------------------------+" << "\n";
                        }
                    }
                }
                cout << "\n";
                break;
            }
            case 2: //Proses Add
            {
                string ID; //deklarasi masukan ID
                string namaproduk; //deklarasi masukan nama produk
                string kategori; //deklarasi masukan kategori
                int harga; //deklarasi masukan harga
                int loop = 0; //inisiasi untuk loop masukan
                int fail = 0; //deklarasi jika ada fail
                while (loop == 0) { //loop inputan
                    cout << "ID ('end' untuk mengakhiri): "; cin >> ID; //masukan ID
                    if (ID == "end") { //Jika inputan 'end'
                        loop = 1; //proses masukan berakhir
                    } else { //jika inputan bukan 'end'
                        if (data >= n) { //Jika data penuh
                            cout << "Data sudah Penuh!" << "\n";
                            fail = 1; //terdapat fail
                            loop = 1; //proses masukan berakhir
                        } else { //Jika data belum penuh
                            data = 0;
                            while ((fail == 0) && (!(datashop[data].getID().empty()))) { //Loop pengecekan duplikasi ID
                                if (datashop[data].getID() == ID) { //Jika ada duplikasi
                                    cout << "ID (" << ID << ") ini sudah digunakan" << '\n';
                                    fail = 1; //terdapat fail
                                    loop = 1; //loop berakhir
                                } else {
                                    data++; //pencarian berlanjut
                                }
                            }
                            if (fail == 0) { //jika tidak terjadi fail
                                data = 0;
                                cout << "Nama : "; cin >> namaproduk; //input nama produk
                                cout << "Kategori : "; cin >> kategori; //input kategori
                                cout << "Harga : "; cin >> harga; //input harga
                                while (!(datashop[data].getID().empty())) { //Loop untuk mencari data terakhir
                                    data++;
                                }
                                datashop[data].setData(ID, namaproduk, kategori, harga); //Masukan ditaruh setelah data terakhir
                                data++;
                            }
                        }
                    }
                }
                if (fail == 0) { //Jika eksekusi tidak fail
                    cout << "Data has been added" << '\n';
                }
                cout << "\n";
                break;
            }
            case 3: //Proses Change
            {
                string gante; //deklarasi mencari data
                cout << "Pilih ID data yang ingin diubah: "; cin >> gante; //inputan mencari data berdasarkan ID

                string ID; //deklarasi masukan ID
                string namaproduk; //deklarasi masukan nama produk
                string kategori; //deklarasi masukan kategori
                int harga; //deklarasi masukan harga
                int ketemu = 0; //Marking untuk outputan
                int cari = 0; //Inisiasi loop mencari data
                int fail = 0; //Deklarasi fail
                while ((fail == 0) && (!(datashop[cari].getID().empty()))) { //Looping untuk pencarian data
                    if ((fail == 0) && ((datashop[cari].getID()) == gante)) { //Jika ID yang dicari sama
                        cout << "ID : "; cin >> ID; //Masukan ID baru
                        if (ID == gante) {
                            fail == 0;
                        } else {
                            data = 0;
                            while ((fail == 0) && (!(datashop[data].getID().empty()))) { //Loop pengecekan duplikasi ID
                                if (datashop[data].getID() == ID) { //Jika ada duplikasi
                                    cout << "ID (" << ID << ") ini sudah digunakan" << '\n';
                                    fail = 1; //terdapat fail
                                } else {
                                    data++; //pencarian berlanjut
                                }
                            }
                        }
                        if (fail == 0) {
                            cout << "Nama : "; cin >> namaproduk; //Masukan Nama baru
                            cout << "Kategori : "; cin >> kategori; //Masukan Kategori baru
                            cout << "Harga : "; cin >> harga; //Masukan Harga baru
                            datashop[cari].setData(ID, namaproduk, kategori, harga); //Ganti data lama dengan yang baru
                            ketemu = 1;
                        }
                    }
                    cari++;
                }
                if (fail == 0) {
                    if (ketemu == 0) { //Jika belum ketemu
                        cout << "Produk dengan ID (" + gante + ") tidak ditemukan!" << '\n';
                    } else { //Jika sudah ketemu
                        cout << "Data has been changed" << '\n';
                    }
                }
                cout << "\n";
                break;
            }
            case 4: //Proses Delete
            {
                string gante; //deklarasi mencari data
                cout << "Pilih ID data yang ingin didelete: "; cin >> gante; //inputan mencari data berdasarkan ID

                int ketemu = 0; //Marking untuk outputan
                int cari = 0; //Inisiasi loop mencari data
                while (!(datashop[cari].getID().empty())) { //Looping pencarian data
                    if ((datashop[cari].getID()) == gante) { //Jika ID yang dicari sama
                        if (!(datashop[cari+1].getID().empty())) { //Jika data setelahnya berisi
                            int geser = cari+1; //Inisiasi Loop untuk pengeseran data
                            while (!(datashop[geser].getID().empty())) { //Looping untuk pengeseran data
                                datashop[geser-1] = datashop[geser]; //Data di geser
                                geser++; //iterasi
                            }
                            datashop[geser-1].reset(); //Data terakhir di reset/hapus
                        } else { //Jika kosong
                            datashop[cari].reset(); //Data langsung di reset/hapus
                        }
                        data = data - 1; //masukan data berkurang
                        ketemu = 1; //data sudah ditemukan
                    } else {
                        cari++; //pencarian berlanjut
                    }
                }
                if (ketemu == 0) { //Jika belum ketemu
                    cout << "Produk dengan ID (" + gante + ") tidak ditemukan!" << '\n';
                } else { //Jika sudah ketemu
                    cout << "Data has been deleted" << '\n';
                }
                cout << "\n";
                break;
            }
            case 5: //Proses Search
            {
                string gante; //deklarasi mencari data
                cout << "Pilih ID data yang ingin dicari: "; cin >> gante; //inputan mencari data berdasarkan ID

                int ketemu = 0; //Marking untuk outputan
                int cari = 0; //Inisiasi loop mencari data
                while (!(datashop[cari].getID().empty())) { //Looping pencarian data
                    if ((datashop[cari].getID()) == gante) { //Jika ID yang dicari sama
                        cout << "+----------------------------------+" << "\n"; //tampilkan data yang dicari
                        cout << "ID             : " << datashop[cari].getID() << "\n";
                        cout << "Nama Produk    : " << datashop[cari].getnamaproduk() << "\n";
                        cout << "Kategori       : " << datashop[cari].getkategori() << "\n";
                        cout << "Harga          : " << datashop[cari].getharga() << "\n";
                        cout << "+----------------------------------+" << "\n";
                        ketemu = 1; //data sudah ditemukan
                    }
                    cari++; //pencarian berlanjut
                }
                if (ketemu == 0) { //Jika belum ketemu
                    cout << "Produk dengan ID (" + gante + ") tidak ditemukan!" << '\n';
                }
                cout << "\n";
                break;
            }
            case 0: //Proses Exit
            {
                cout << "Thank You. Have A Nice Day Dawg!" << '\n'; //Print exit
                menu = 1; //Program Exit
                break;
            }
        }
    }
    return 0;
}
