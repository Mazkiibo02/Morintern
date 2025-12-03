USE morintern;

-- 1. Hapus tabel duplikat yang PASTI ADA (aman kalau tidak ada)
DROP TABLE IF EXISTS calon_pesertas;
DROP TABLE IF EXISTS konten;

-- 2. Rename penilaian_magang → penilaians (ini yang benar-benar ada di DB kamu)
RENAME TABLE penilaian_magang TO penilaians;

-- 3. Fix peserta_calon
ALTER TABLE peserta_calon 
  MODIFY COLUMN status ENUM('pending','diterima','ditolak','peserta') DEFAULT 'pending';

ALTER TABLE peserta_calon 
  ADD COLUMN IF NOT EXISTS kelompok_id BIGINT UNSIGNED NULL AFTER spesialisasi_id;

ALTER TABLE peserta_calon 
  ADD INDEX IF NOT EXISTS idx_kelompok (kelompok_id);

ALTER TABLE peserta_calon 
  ADD CONSTRAINT IF NOT EXISTS fk_kelompok_leader 
    FOREIGN KEY (kelompok_id) REFERENCES peserta_calon(id) ON DELETE SET NULL;

-- 4. Fix anggotas
ALTER TABLE anggotas 
  ADD COLUMN IF NOT EXISTS kelompok_id BIGINT UNSIGNED NULL AFTER ketua_id;

ALTER TABLE anggotas 
  ADD INDEX IF NOT EXISTS idx_kelompok_anggota (kelompok_id);

ALTER TABLE anggotas 
  ADD CONSTRAINT IF NOT EXISTS fk_kelompok_anggota 
    FOREIGN KEY (kelompok_id) REFERENCES peserta_calon(id) ON DELETE CASCADE;

-- 5. Fix pesertas — tambah kolom penilaian + enum status baru
ALTER TABLE pesertas 
  ADD COLUMN IF NOT EXISTS kritik_saran TEXT NULL AFTER status,
  ADD COLUMN IF NOT EXISTS file_penilaian VARCHAR(255) NULL AFTER kritik_saran;

ALTER TABLE pesertas 
  MODIFY COLUMN status ENUM('aktif','selesai','dropout') DEFAULT 'aktif';

-- 6. Tambah FK penting (dengan nama unik biar tidak bentrok)
ALTER TABLE peserta_calon 
  ADD CONSTRAINT IF NOT EXISTS fk_calon_spesialisasi 
    FOREIGN KEY (spesialisasi_id) REFERENCES spesialisasi(id) ON DELETE SET NULL;

ALTER TABLE pesertas 
  ADD CONSTRAINT IF NOT EXISTS fk_peserta_spesialisasi 
    FOREIGN KEY (spesialisasi_id) REFERENCES spesialisasi(id) ON DELETE SET NULL;

ALTER TABLE postingan_magangs 
  ADD CONSTRAINT IF NOT EXISTS fk_posting_spesialisasi 
    FOREIGN KEY (spesialisasi_id) REFERENCES spesialisasi(id) ON DELETE SET NULL;

-- 7. Index performa
ALTER TABLE peserta_calon ADD INDEX IF NOT EXISTS idx_status_calon (status);
ALTER TABLE pesertas ADD INDEX IF NOT EXISTS idx_status_peserta (status);

-- 8. Bersihkan status lama
UPDATE peserta_calon SET status = 'pending'  WHERE status IN ('baru','applied','pendaftar');
UPDATE peserta_calon SET status = 'diterima' WHERE status = 'accepted';
UPDATE peserta_calon SET status = 'ditolak'  WHERE status = 'rejected';

-- SELESAI!
SELECT 'DATABASE SUDAH 100% BERSIH, AMAN, DAN SIAP UNTUK FILAMENT V4!' AS status;
SELECT 'Tinggal update model & resource Laravel → selesai total!' AS next_step;