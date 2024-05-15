package controllers

import (
	"encoding/json"
	"fmt"
	"net/http"
	"strconv"

	"github.com/Gilberd-dev/cabang/pkg/models"
	"github.com/Gilberd-dev/cabang/pkg/utils"
	"github.com/gorilla/mux"
)

var NewCabang models.Cabang

func GetCabang(w http.ResponseWriter, r *http.Request) {
	// Memanggil fungsi GetAllCabangs dari package models.
	newCabangs := models.GetAllCabangs() // Ambil hanya elemen pertama dari slice
	// Mengonversi Cabang menjadi format JSON.
	res, err := json.Marshal(newCabangs)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func GetCabangById(w http.ResponseWriter, r *http.Request) {
	// Mendapatkan variabel dari path URL menggunakan Gorilla Mux.
	vars := mux.Vars(r)
	CabangId := vars["id"]
	// Mengonversi ID Cabang menjadi tipe data int64.
	IDCabang, err := strconv.ParseInt(CabangId, 0, 0)
	if err != nil {
		fmt.Println("error while parsing") // Menampilkan pesan kesalahan jika terjadi kesalahan parsing.
	}
	// Memanggil fungsi GetCabangById dari package models untuk mendapatkan detail Cabang berdasarkan ID.
	CabangDetails, _ := models.GetCabangById(IDCabang)
	// Mengonversi detail Cabang menjadi format JSON.
	res, _ := json.Marshal(CabangDetails)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func CreateCabang(w http.ResponseWriter, r *http.Request) {
	// Membuat objek Cabang baru.
	CreateCabang := &models.Cabang{}
	// Parsing body request menjadi objek Cabang.
	utils.ParseBody(r, CreateCabang)
	// Memanggil fungsi CreateCabang dari package models untuk membuat Cabang baru.
	b := CreateCabang.CreateCabang()
	// Mengonversi hasil pembuatan Cabang baru menjadi format JSON.
	res, _ := json.Marshal(b)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func DeleteCabang(w http.ResponseWriter, r *http.Request) {
	// Mendapatkan variabel dari path URL menggunakan Gorilla Mux.
	vars := mux.Vars(r)
	CabangId := vars["id"]
	// Mengonversi ID Cabang menjadi tipe data int64.
	IDCabang, err := strconv.ParseInt(CabangId, 10, 64)
	if err != nil {
		fmt.Println("error while parsing") // Menampilkan pesan kesalahan jika terjadi kesalahan parsing.
	}
	// Memanggil fungsi DeleteCabang dari package models untuk menghapus Cabang berdasarkan ID.
	Cabang := models.DeleteCabangById(IDCabang)
	// Mengonversi hasil penghapusan Cabang menjadi format JSON.
	res, _ := json.Marshal(Cabang)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}

func UpdateCabang(w http.ResponseWriter, r *http.Request) {
	// Membuat objek updateCabang baru.
	var updateCabang = &models.Cabang{}
	// Parsing body request menjadi objek Cabang.
	utils.ParseBody(r, updateCabang)
	// Mendapatkan variabel dari path URL menggunakan Gorilla Mux.
	vars := mux.Vars(r)
	CabangId := vars["id"]
	// Mengonversi ID Cabang menjadi tipe data int64.
	IDCabang, err := strconv.ParseInt(CabangId, 10, 64)
	if err != nil {
		fmt.Println("error while parsing") // Menampilkan pesan kesalahan jika terjadi kesalahan parsing.
	}
	// Memanggil fungsi GetCabangById dari package models untuk mendapatkan detail Cabang berdasarkan ID.
	cabangDetails, db := models.GetCabangById(IDCabang)

	// Memperbarui informasi Cabang sesuai dengan data yang diberikan dalam body request.
	if updateCabang.KodeCabang != "" {
		cabangDetails.KodeCabang = updateCabang.KodeCabang
	}
	if updateCabang.NamaCabang != "" {
		cabangDetails.NamaCabang = updateCabang.NamaCabang
	}
	if updateCabang.Alamat != "" {
		cabangDetails.Alamat = updateCabang.Alamat
	}
	if updateCabang.NamaKepalaCabang != "" {
		cabangDetails.NamaKepalaCabang = updateCabang.NamaKepalaCabang
	}

	// Menyimpan perubahan informasi Cabang ke dalam database.
	db.Save(&cabangDetails)
	// Mengonversi detail Cabang yang telah diperbarui menjadi format JSON.
	res, _ := json.Marshal(cabangDetails)
	// Menetapkan header Content-Type sebagai application/json.
	w.Header().Set("Content-Type", "application/json")
	// Mengirimkan status kode OK (200) ke client.
	w.WriteHeader(http.StatusOK)
	// Mengirimkan respon JSON ke client.
	w.Write(res)
}
