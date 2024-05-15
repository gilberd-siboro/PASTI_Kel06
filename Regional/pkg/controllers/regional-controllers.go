package controllers

import (
	"encoding/json"
	"fmt"
	"net/http"
	"strconv"

	"github.com/Gilberd-dev/regional/pkg/models"
	"github.com/Gilberd-dev/regional/pkg/utils"
	"github.com/gorilla/mux"
)

var NewRegional models.Regional

func GetRegional(w http.ResponseWriter, r *http.Request) {
	// Memanggil fungsi GetAllRegionals dari package models.
	newRegionals := models.GetAllRegionals()
	// Mengonversi daftar regional menjadi format JSON.
	res, _ := json.Marshal(newRegionals)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func GetRegionalById(w http.ResponseWriter, r *http.Request) {
	// Mendapatkan variabel dari path URL menggunakan Gorilla Mux.
	vars := mux.Vars(r)
	RegionalId := vars["id"]
	// Mengonversi ID regional menjadi tipe data int64.
	IDRegional, err := strconv.ParseInt(RegionalId, 0, 0)
	if err != nil {
		fmt.Println("error while parsing") // Menampilkan pesan kesalahan jika terjadi kesalahan parsing.
	}
	// Memanggil fungsi GetRegionalById dari package models untuk mendapatkan detail regional berdasarkan ID.
	regionalDetails, _ := models.GetRegionalById(IDRegional)
	// Mengonversi detail regional menjadi format JSON.
	res, _ := json.Marshal(regionalDetails)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kodeatan regional baru menjadi format OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func CreateRegional(w http.ResponseWriter, r *http.Request) {
	// Membuat objek Regional baru.
	CreateRegional := &models.Regional{}
	// Parsing body request menjadi objek Regional.
	utils.ParseBody(r, CreateRegional)
	// Memanggil fungsi CreateRegional dari package models untuk membuat regional baru.
	b := CreateRegional.CreateRegional()
	// Mengonversi hasil pembu JSON.
	res, _ := json.Marshal(b)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func DeleteRegional(w http.ResponseWriter, r *http.Request) {
	// Mendapatkan variabel dari path URL menggunakan Gorilla Mux.
	vars := mux.Vars(r)
	RegionalId := vars["id"]
	// Mengonversi ID regional menjadi tipe data int64.
	IDRegional, err := strconv.ParseInt(RegionalId, 10, 64)
	if err != nil {
		fmt.Println("error while parsing") // Menampilkan pesan kesalahan jika terjadi kesalahan parsing.
	}
	// Memanggil fungsi DeleteRegional dari package models untuk menghapus regional berdasarkan ID.
	Regional := models.DeleteRegionalById(IDRegional)
	// Mengonversi hasil penghapusan regional menjadi format JSON.
	res, _ := json.Marshal(Regional)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func UpdateRegional(w http.ResponseWriter, r *http.Request) {
	// Membuat objek updateRegional baru.
	var updateRegional = &models.Regional{}
	// Parsing body request menjadi objek Regional.
	utils.ParseBody(r, updateRegional)
	// Mendapatkan variabel dari path URL menggunakan Gorilla Mux.
	vars := mux.Vars(r)
	RegionalId := vars["id"]
	// Mengonversi ID regional menjadi tipe data int64.
	IDRegional, err := strconv.ParseInt(RegionalId, 10, 64)
	if err != nil {
		fmt.Println("error while parsing") // Menampilkan pesan kesalahan jika terjadi kesalahan parsing.
	}
	// Memanggil fungsi GetRegionalById dari package models untuk mendapatkan detail regional berdasarkan ID.
	regionalDetails, db := models.GetRegionalById(IDRegional)

	// Memperbarui informasi regional sesuai dengan data yang diberikan dalam body request.
	if updateRegional.KodeRegional != "" {
		regionalDetails.KodeRegional = updateRegional.KodeRegional
	}
	if updateRegional.NamaRegional != "" {
		regionalDetails.NamaRegional = updateRegional.NamaRegional
	}
	if updateRegional.Alamat != "" {
		regionalDetails.Alamat = updateRegional.Alamat
	}
	if updateRegional.NamaKepalaRegional != "" {
		regionalDetails.NamaKepalaRegional = updateRegional.NamaKepalaRegional
	}

	// Menyimpan perubahan informasi regional ke dalam database.
	db.Save(&regionalDetails)
	// Mengonversi detail regional yang telah diperbarui menjadi format JSON.
	res, _ := json.Marshal(regionalDetails)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}
