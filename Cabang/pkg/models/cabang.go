package models

import (
	"github.com/Gilberd-dev/cabang/pkg/config"
	"github.com/jinzhu/gorm"
)

// Deklarasi variabel global untuk objek database.
var db *gorm.DB

// Definisi struktur data Cabang.
type Cabang struct {
	gorm.Model              // Struktur data yang diperlukan oleh GORM untuk model.
	KodeCabang       string `json:"kode_cabang" gorm:"column:kode_cabang"`
	NamaCabang       string `json:"nama_cabang" gorm:"column:nama_cabang"`
	Alamat           string `json:"alamat" gorm:"column:alamat"`
	NamaKepalaCabang string `json:"nama_kepala_cabang" gorm:"column:nama_kepala_cabang"`
	KodeRegional     string `json:"kode_regional" gorm:"column:kode_regional"`
}

// Fungsi init akan dipanggil saat package models di-import.
// Fungsi ini digunakan untuk melakukan koneksi ke database dan melakukan migrasi struktur data.
func init() {
	config.Connect()          // Menginisialisasi koneksi ke database.
	db = config.GetDB()       // Mendapatkan objek database yang telah terkoneksi.
	db.AutoMigrate(&Cabang{}) // Melakukan migrasi struktur data Cabang ke dalam database.
}

// Fungsi untuk membuat Cabang baru.
func (b *Cabang) CreateCabang() *Cabang {
	db.NewRecord(b) // Memulai pencatatan transaksi baru.
	db.Create(&b)   // Membuat data Cabang baru di database.
	return b
}

// Fungsi untuk mendapatkan daftar semua Cabangs.
func GetAllCabangs() []Cabang {
	var Cabangs []Cabang
	db.Find(&Cabangs) // Mendapatkan semua data Cabangs dari database.
	return Cabangs
}

func GetCabangById(id int64) (*Cabang, *gorm.DB) {
	var getCabang Cabang
	db := db.Where("id = ?", id).Find(&getCabang) // Mengambil data mahasiswa berdasarkan NIM.
	return &getCabang, db
}

// Fungsi untuk menghapus Cabang berdasarkan kode Cabang.
func DeleteCabangById(id int64) error {
	// Mengatur nilai deleted_at untuk menandai soft-delete
	if err := db.Where("id = ?", id).Delete(&Cabang{}).Error; err != nil {
		return err
	}
	return nil
}
