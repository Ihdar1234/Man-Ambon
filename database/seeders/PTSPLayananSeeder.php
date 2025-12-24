<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PTSPLayananSeeder extends Seeder
{
    public function run()
    {
        $layanans = [
            // ======================= Akademik =======================
            [
                'nama' => 'Surat Keterangan Aktif',
                'kategori' => 'akademik',
                'fields' => json_encode([
                    ['name'=>'nis','label'=>'NIS Siswa','type'=>'text','required'=>true],
                    ['name'=>'semester','label'=>'Semester','type'=>'number','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Legalisir Ijazah',
                'kategori' => 'akademik',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'file_ijazah','label'=>'Upload Ijazah','type'=>'file','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Surat Keterangan Lulus',
                'kategori' => 'akademik',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'tahun_lulus','label'=>'Tahun Lulus','type'=>'number','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],

            // ======================= Kesiswaan =======================
            [
                'nama' => 'Surat Izin Tidak Masuk',
                'kategori' => 'kesiswaan',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'tanggal_izin','label'=>'Tanggal Izin','type'=>'date','required'=>true],
                    ['name'=>'alasan','label'=>'Alasan','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Pindah Masuk / Keluar',
                'kategori' => 'kesiswaan',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'alasan','label'=>'Alasan Pindah','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Beasiswa',
                'kategori' => 'kesiswaan',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'semester','label'=>'Semester','type'=>'number','required'=>true],
                    ['name'=>'file_rapor','label'=>'Upload Rapor','type'=>'file','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],

            // ======================= Umum =======================
            [
                'nama' => 'Peminjaman Ruangan',
                'kategori' => 'umum',
                'fields' => json_encode([
                    ['name'=>'nama_pengaju','label'=>'Nama Pengaju','type'=>'text','required'=>true],
                    ['name'=>'tanggal_mulai','label'=>'Tanggal Mulai','type'=>'date','required'=>true],
                    ['name'=>'tanggal_selesai','label'=>'Tanggal Selesai','type'=>'date','required'=>true],
                    ['name'=>'keperluan','label'=>'Keperluan','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Proposal Kegiatan',
                'kategori' => 'umum',
                'fields' => json_encode([
                    ['name'=>'nama_kegiatan','label'=>'Nama Kegiatan','type'=>'text','required'=>true],
                    ['name'=>'deskripsi','label'=>'Deskripsi Kegiatan','type'=>'textarea','required'=>true],
                    ['name'=>'file_proposal','label'=>'Upload Proposal','type'=>'file','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],

            // ======================= Kepegawaian =======================
            [
                'nama' => 'Surat Tugas',
                'kategori' => 'kepegawaian',
                'fields' => json_encode([
                    ['name'=>'nama_guru','label'=>'Nama Guru','type'=>'text','required'=>true],
                    ['name'=>'tanggal_mulai','label'=>'Tanggal Mulai','type'=>'date','required'=>true],
                    ['name'=>'tanggal_selesai','label'=>'Tanggal Selesai','type'=>'date','required'=>true],
                    ['name'=>'keterangan','label'=>'Keterangan','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Cuti Guru',
                'kategori' => 'kepegawaian',
                'fields' => json_encode([
                    ['name'=>'nama_guru','label'=>'Nama Guru','type'=>'text','required'=>true],
                    ['name'=>'tanggal_mulai','label'=>'Tanggal Mulai','type'=>'date','required'=>true],
                    ['name'=>'tanggal_selesai','label'=>'Tanggal Selesai','type'=>'date','required'=>true],
                    ['name'=>'alasan','label'=>'Alasan Cuti','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],

            // ======================= Masyarakat =======================
            [
                'nama' => 'Pengaduan Masyarakat',
                'kategori' => 'masyarakat',
                'fields' => json_encode([
                    ['name'=>'nama','label'=>'Nama Pengadu','type'=>'text','required'=>true],
                    ['name'=>'email','label'=>'Email','type'=>'text','required'=>true],
                    ['name'=>'judul','label'=>'Judul Pengaduan','type'=>'text','required'=>true],
                    ['name'=>'deskripsi','label'=>'Deskripsi Pengaduan','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Surat Keterangan Anak Bersekolah',
                'kategori' => 'masyarakat',
                'fields' => json_encode([
                    ['name'=>'nama_anak','label'=>'Nama Anak','type'=>'text','required'=>true],
                    ['name'=>'kelas','label'=>'Kelas','type'=>'text','required'=>true],
                    ['name'=>'nama_ortu','label'=>'Nama Orang Tua','type'=>'text','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],

            // ======================= Keuangan =======================
            [
                'nama' => 'Slip Pembayaran SPP',
                'kategori' => 'keuangan',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'kelas','label'=>'Kelas','type'=>'text','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Keringanan Pembayaran',
                'kategori' => 'keuangan',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'kelas','label'=>'Kelas','type'=>'text','required'=>true],
                    ['name'=>'alasan','label'=>'Alasan Keringanan','type'=>'textarea','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
            [
                'nama' => 'Tunggakan SPP',
                'kategori' => 'keuangan',
                'fields' => json_encode([
                    ['name'=>'nama_siswa','label'=>'Nama Siswa','type'=>'text','required'=>true],
                    ['name'=>'jumlah_tunggakan','label'=>'Jumlah Tunggakan','type'=>'number','required'=>true],
                ]),
                'created_at'=>now(), 'updated_at'=>now(),
            ],
        ];

        DB::table('layanans')->insert($layanans);
    }
}
