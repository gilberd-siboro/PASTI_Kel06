package routes

import (
	"github.com/Gilberd-dev/cabang/pkg/controllers"
	"github.com/gorilla/mux"
)

// Fungsi RegistercabangsRoutes mendaftarkan semua rute yang terkait dengan entitas mahasiswa.
// Fungsi ini menerima objek router dari Gorilla Mux untuk mendaftarkan rutenya.
var CabangRoutes = func(router *mux.Router) {
	// Menyambungkan rute HTTP POST untuk membuat mahasiswa baru ke fungsi Createcabang dari package controllers.
	router.HandleFunc("/cabang/", controllers.CreateCabang).Methods("POST")
	// Menyambungkan rute HTTP GET untuk mendapatkan daftar semua mahasiswa ke fungsi Getcabang dari package controllers.
	router.HandleFunc("/cabang/", controllers.GetCabang).Methods("GET")
	// Menyambungkan rute HTTP GET untuk mendapatkan detail mahasiswa berdasarkan ID ke fungsi GetcabangById dari package controllers.
	router.HandleFunc("/cabang/{id}", controllers.GetCabangById).Methods("GET")
	// Menyambungkan rute HTTP PUT untuk memperbarui informasi mahasiswa berdasarkan ID ke fungsi Updatecabang dari package controllers.
	router.HandleFunc("/cabang/{id}", controllers.UpdateCabang).Methods("PUT")
	// Menyambungkan rute HTTP DELETE untuk menghapus mahasiswa berdasarkan ID ke fungsi Deletecabang dari package controllers.
	router.HandleFunc("/cabang/{id}", controllers.DeleteCabang).Methods("DELETE")
}
