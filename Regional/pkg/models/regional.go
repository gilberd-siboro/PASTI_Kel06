package models

import (
	"github.com/Gilberd-dev/regional/pkg/config"
	"github.com/jinzhu/gorm"
)

// Deklarasi variabel global untuk objek database.
var db *gorm.DB

// Definisi struktur data Regional.
type Regional struct {
	gorm.Model                // Struktur data yang diperlukan oleh GORM untuk model.
	KodeRegional       string `json:"kode_regional" gorm:"column:kode_regional"`
	NamaRegional       string `json:"nama_regional" gorm:"column:nama_regional"`
	Alamat             string `json:"alamat" gorm:"column:alamat"`
	NamaKepalaRegional string `json:"nama_kepala_regional" gorm:"column:nama_kepala_regional"`
}

// Fungsi init akan dipanggil saat package models di-import.
// Fungsi ini digunakan untuk melakukan koneksi ke database dan melakukan migrasi struktur data.
func init() {
	config.Connect()            // Menginisialisasi koneksi ke database.
	db = config.GetDB()         // Mendapatkan objek database yang telah terkoneksi.
	db.AutoMigrate(&Regional{}) // Melakukan migrasi struktur data Regional ke dalam database.
}

// Fungsi untuk membuat regional baru.
func (b *Regional) CreateRegional() *Regional {
	db.NewRecord(b) // Memulai pencatatan transaksi baru.
	db.Create(&b)   // Membuat data regional baru di database.
	return b
}

// Fungsi untuk mendapatkan daftar semua regionals.
func GetAllRegionals() []Regional {
	var Regionals []Regional
	db.Find(&Regionals) // Mendapatkan semua data regionals dari database.
	return Regionals
}

func GetRegionalById(id int64) (*Regional, *gorm.DB) {
	var getRegional Regional
	db := db.Where("id = ?", id).Find(&getRegional) // Mengambil data regional berdasarkan id
	return &getRegional, db
}

// Fungsi untuk menghapus regional berdasarkan kode regional.
func DeleteRegionalById(id int64) error {
	// Mengatur nilai deleted_at untuk menandai soft-delete
	if err := db.Where("id = ?", id).Delete(&Regional{}).Error; err != nil {
		return err
	}
	return nil
}
