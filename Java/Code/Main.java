import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        int n = 0;
        Scanner scan = new Scanner(System.in);
        System.out.println("+===============================+");
        System.out.println("|    Welcome To Niph Petshop    |");
        System.out.println("+===============================+");
        System.out.print("Berapa Data yang ingin dimasukan: ");

        try {
            n = scan.nextInt();
        } catch (Exception e) {
            System.out.println("The input is not an integer!");
        }

        Petshop[] datashop = new Petshop[n+1];
        int pilihan = 0, menu = 0, data = 0;
        while (menu == 0) {
            System.out.println("");
            System.out.println("+==============+");
            System.out.println("| 1 | Show     |");
            System.out.println("| 2 | Add      |");
            System.out.println("| 3 | Change   |");
            System.out.println("| 4 | Delete   |");
            System.out.println("| 5 | Search   |");
            System.out.println("| 0 | Exit     |");
            System.out.println("+==============+");
            System.out.print("Pilih Command : ");

            try {
                pilihan = scan.nextInt();
                if (pilihan > 5) {
                    System.out.println("Tidak ada inputan (" + pilihan + ")!");
                }
            } catch (Exception e) {
                System.out.println("The input is not an integer!");
            }
            
            switch (pilihan) {
                case 1:
                    System.out.println("");
                    System.out.println("+===============================+");
                    if (datashop[0] != null) {
                        for (int i = 0; i < data; i++) {
                            System.out.println("+-------------------------------+");
                            System.out.println("ID             : " + datashop[i].getID());
                            System.out.println("Nama Produk    : " + datashop[i].getnamaProduk());
                            System.out.println("Kategori       : " + datashop[i].getkategori());
                            System.out.println("Harga          : " + datashop[i].getharga());
                            System.out.println("+-------------------------------+");
                            }
                        } else {
                            System.out.println("Data Kosong! Silahkan diisi.");
                        }
                    System.out.println("+===============================+");
                    break;
                
                case 2:
                    String ID = "", namaProduk = "", kategori = "";
                    int harga = 0, loop = 0, fail = 0;
                    while (loop == 0) {
                        System.out.println("");
                        System.out.print("ID ('end' untuk mengakhiri): "); ID = scan.next();
                        if (ID.equals("end")) {
                            loop = 1;
                        } else {
                            if (data >= n) {
                                System.out.println("+===============================+");
                                System.out.println("Data sudah Penuh!");
                                System.out.println("+===============================+");
                                fail = 1;
                                loop = 1;
                            } else {
                                data = 0;
                                if (datashop[data] != null) {
                                    fail = 0;
                                    while ((fail == 0) && (datashop[data] != null)) {
                                        if ((datashop[data].getID().equals(ID))) {
                                            System.out.println("+===============================+");
                                            System.out.println("ID (" + ID + ") ini telah digunakan");
                                            System.out.println("+===============================+");
                                            fail = 1;
                                        }
                                        data++;
                                    }
                                    if (fail == 0) {
                                        System.out.print("Nama : "); namaProduk = scan.next();
                                        System.out.print("Kategori : "); kategori = scan.next();
                                        System.out.print("Harga : ");
                                        try {
                                            harga = scan.nextInt();
                                        } catch (Exception e) {
                                            System.out.println("The input is not an integer!");
                                        }
                                        datashop[data] = new Petshop(ID, namaProduk, kategori, harga);
                                        data++;
                                    }
                                } else {
                                    System.out.print("Nama : "); namaProduk = scan.next();
                                    System.out.print("Kategori : "); kategori = scan.next();
                                    System.out.print("Harga : ");
                                    try {
                                        harga = scan.nextInt();
                                    } catch (Exception e) {
                                        System.out.println("The input is not an integer!");
                                    }
                                    datashop[data] = new Petshop(ID, namaProduk, kategori, harga);
                                    data++;
                                }
                            }
                        }
                    } if ((fail == 0) && (namaProduk != "")) {
                        System.out.println("+===============================+");
                        System.out.println("Data has been added");
                        System.out.println("+===============================+");
                    }
                    break;
                
                case 3:
                    String newID = "", newnamaProduk = "", newkategori = "", cariID = "";
                    int newharga = 0;
                    System.out.println("");
                    if (data == 0) {
                        System.out.println("+===============================+");
                        System.out.println("Data Masih Kosong! Silahkan diisi.");
                        System.out.println("+===============================+");
                    } else {
                        System.out.print("Pilih ID data yang ingin diubah: "); cariID = scan.next();
                        int i = 0;
                        int dapat = 0;
                        fail = 0;
                        while ((dapat == 0) && (i < data)) {
                            if (datashop[i].getID().equals(cariID)) {
                                System.out.print("ID : "); newID = scan.next();
                                if (newID.equals(cariID)) {
                                    System.out.print("Nama : "); newnamaProduk = scan.next();
                                    System.out.print("Kategori : "); newkategori = scan.next();
                                    System.out.print("Harga : ");
                                    try {
                                        newharga = scan.nextInt();
                                    } catch (Exception e) {
                                        System.out.println("The input is not an integer!");
                                    }
                                    datashop[i] = new Petshop(newID, newnamaProduk, newkategori, newharga);
                                    dapat = 1;
                                } else {
                                    int cari = 0;
                                    while ((cari < data) && (fail == 0)) {
                                        if (datashop[cari].getID().equals(newID)) {
                                            System.out.println("+===============================+");
                                            System.out.println("ID (" + newID + ") ini telah digunakan");
                                            System.out.println("+===============================+");
                                            dapat = 1;
                                            fail = 1;
                                        }
                                        cari++;
                                    }
                                    if (fail == 0) {
                                        System.out.print("Nama : "); newnamaProduk = scan.next();
                                        System.out.print("Kategori : "); newkategori = scan.next();
                                        System.out.print("Harga : ");
                                        try {
                                            newharga = scan.nextInt();
                                        } catch (Exception e) {
                                            System.out.println("The input is not an integer!");
                                        }
                                        datashop[i] = new Petshop(newID, newnamaProduk, newkategori, newharga);
                                        dapat = 1;
                                    }
                                }
                            } else {
                                i++;
                            }
                        }
                        if (dapat == 0) {
                            if (fail == 0) {
                                System.out.println("+===============================+");
                                System.out.println("Produk dengan ID (" + cariID + ") tidak ditemukan!");
                                System.out.println("+===============================+");
                            }
                        } else {
                            if (fail == 0) {
                                System.out.println("+===============================+");
                                System.out.println("Data has been changed");
                                System.out.println("+===============================+");
                            }
                        }
                    }
                    break;
                
                case 4:
                    cariID = "";
                    System.out.println("");
                    if (data == 0) {
                        System.out.println("+===============================+");
                        System.out.println("Data Masih Kosong! Silahkan diisi.");
                        System.out.println("+===============================+");
                    } else {
                        System.out.print("Pilih ID data yang ingin dihapus: "); cariID = scan.next();
                        int cari = 0;
                        int ketemu = 0;
                        while ((datashop[cari] != null)) {
                            if (datashop[cari].getID().equals(cariID)) {
                                if ((datashop[cari+1] != null)) {
                                    int geser = cari+1;
                                    while ((datashop[geser] != null)) {
                                        datashop[geser-1] = datashop[geser];
                                        geser++;
                                    }
                                    datashop[geser-1] = null;
                                } else {
                                    datashop[cari] = null;
                                }
                                data = data - 1;
                                ketemu = 1;
                            } else {
                                cari++;
                            }
                        }
                        if (ketemu == 0) {
                            System.out.println("+===============================+");
                            System.out.println("Produk dengan ID (" + cariID + ") tidak ditemukan!");
                            System.out.println("+===============================+");
                        } else {
                            System.out.println("+===============================+");
                            System.out.println("Data has been deleted");
                            System.out.println("+===============================+");
                        }  
                    }
                    break;

                case 5:
                    cariID = "";
                    System.out.println("");
                    if (data == 0) {
                        System.out.println("+===============================+");
                        System.out.println("Data Masih Kosong! Silahkan diisi.");
                        System.out.println("+===============================+");
                    } else {
                        System.out.print("Pilih ID data yang ingin dicari: "); cariID = scan.next();
                        int cari = 0, ketemu = 0;
                        while ((ketemu == 0) && (datashop[cari] != null)) {
                            if (datashop[cari].getID().equals(cariID)) {
                                System.out.println("+===============================+");
                                System.out.println("+-------------------------------+");
                                System.out.println("ID             : " + datashop[cari].getID());
                                System.out.println("Nama Produk    : " + datashop[cari].getnamaProduk());
                                System.out.println("Kategori       : " + datashop[cari].getkategori());
                                System.out.println("Harga          : " + datashop[cari].getharga());
                                System.out.println("+-------------------------------+");
                                System.out.println("+===============================+");
                                ketemu = 1;
                            } else {
                                cari++;
                            }
                        }
                        if (ketemu == 0) {
                            System.out.println("+===============================+");
                            System.out.println("Produk dengan ID (" + cariID + ") tidak ditemukan!");
                            System.out.println("+===============================+");
                        } else {
                            System.out.println("+===============================+");
                            System.out.println("Data has been found");
                            System.out.println("+===============================+");
                        }  
                    }
                    break;

                case 0:
                    System.out.println("");
                    System.out.println("+===============================+");
                    System.out.println("Thank You. Have A Nice Day Dawg!");
                    System.out.println("+===============================+");
                    menu = 1;
                    break;
            }
        }
    }
}