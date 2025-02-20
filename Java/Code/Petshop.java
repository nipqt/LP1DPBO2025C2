public class Petshop {
    private String ID;
    private String namaProduk;
    private String kategori;
    private int harga;

    public Petshop(){}
    
    public Petshop(String ID, String namaProduk, String kategori, int harga) {
        this.ID = ID;
        this.namaProduk = namaProduk;
        this.kategori = kategori;
        this.harga = harga;
    }

    public String getID() {
        return this.ID;
    }

    public String getnamaProduk() {
        return this.namaProduk;
    }

    public String getkategori() {
        return this.kategori;
    }

    public int getharga() {
        return this.harga;
    }
    
}