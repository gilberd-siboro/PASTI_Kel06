package routes

import (
	"github.com/Gilberd-dev/regional/pkg/controllers"
	"github.com/gorilla/mux"
)


// Fungsi ini menerima objek router dari Gorilla Mux untuk mendaftarkan rutenya.
var RegionalRoutes = func(router *mux.Router) {
	// Menyambungkan rute HTTP POST untuk membuat mahasiswa baru ke fungsi CreateRegional dari package controllers.
	router.HandleFunc("/regional/", controllers.CreateRegional).Methods("POST")
	// Menyambungkan rute HTTP GET untuk mendapatkan daftar semua mahasiswa ke fungsi GetRegional dari package controllers.
	router.HandleFunc("/regional/", controllers.GetRegional).Methods("GET")
	// Menyambungkan rute HTTP GET untuk mendapatkan detail mahasiswa berdasarkan ID ke fungsi GetRegionalById dari package controllers.
	router.HandleFunc("/regional/{id}", controllers.GetRegionalById).Methods("GET")
	// Menyambungkan rute HTTP PUT untuk memperbarui informasi mahasiswa berdasarkan ID ke fungsi UpdateRegional dari package controllers.
	router.HandleFunc("/regional/{id}", controllers.UpdateRegional).Methods("PUT")
	// Menyambungkan rute HTTP DELETE untuk menghapus mahasiswa berdasarkan ID ke fungsi DeleteRegional dari package controllers.
	router.HandleFunc("/regional/{id}", controllers.DeleteRegional).Methods("DELETE")
}
