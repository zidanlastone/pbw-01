TODO

1. Membuat fitur simpan data pegawai
   1. mencatat tanggal bergabung pegawai
   2. mencatat data diri pegawai
   3. divisi pegawai
   4. jabatan pegawai
2. Membuat Fitur Presensi Kehadiran Pegawai
   1. Mencatat Tanggal dan jumlah Jam lembur yang dilakukan pegawai
   2. Membuat Fitur Shift
   3. Menghitung total lembur yang dilakukan pegawai
   <!-- 3. Membuat Fitur Tunjangan Pegawai -->
3. Membuat Fitur Bonus persentase
4. Membuat Fitur Kalkulasi Keseluruhan
5. Membuat fitur upload gambar

### CRUD Pegawai:

```json
{
	"user_id": 1,
	"nama": "Zidan",
	"email": "zidanlastone01@gmail.com",
	"no_hp": "083892091230",
	"alamat": "Kp. Kabandungan",
	"tempat_lahir": "Bogor",
	"tanggal_lahir": "2001-06-24",
	"jenis_kelamin": "L",
	"status_pernikahan": "Belum Menikah",
	"tanggal_gabung": "2022-01-01",
	"divisi": "Sales",
	"jabatan": "Manager",
	"gaji": 4800000,
	"status_bekerja": "BEKERJA" // "KARYAWAN|KONTRAK|BERHENTI"
}
```

### CRUD Presensi:

```json
{
	"pegawai_id": 1,
	"status_presensi": "MASUK", // "MASUK|PULANG|MASUKLEMBUR|PULANGLEMBUR"
	"tanggal": "2023-06-01",
	"jam": "07:00",
	"bukti": "https://image"
}
```

<!-- ### CRUD Tunjangan:

```json
{
	"pegawai_id": 1,
	"nama_tunjangan": "Biaya Transport",
	"persentase": "3",
	"jabatan": "Divisi"
}
``` -->
