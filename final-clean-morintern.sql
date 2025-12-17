USE morintern;

-- 1. Hapus FK & tabel role
ALTER TABLE users DROP FOREIGN KEY users_requested_role_id_foreign;
ALTER TABLE users DROP KEY users_requested_role_id_foreign;
DROP TABLE IF EXISTS role;

-- 2. Tambah kolom kritik_saran (pisah)
ALTER TABLE pesertas ADD COLUMN IF NOT EXISTS kritik_saran TEXT NULL AFTER status;

-- 3. Tambah kolom file_penilaian (pisah)
ALTER TABLE pesertas ADD COLUMN IF NOT EXISTS file_penilaian VARCHAR(255) NULL AFTER kritik_saran;

-- 4. Tambah kolom kelompok_id di peserta_calon
ALTER TABLE peserta_calon ADD COLUMN IF NOT EXISTS kelompok_id BIGINT UNSIGNED NULL AFTER spesialisasi_id;

-- 5. Tambah index + constraint kelompok leader
ALTER TABLE peserta_calon ADD INDEX IF NOT EXISTS idx_kelompok (kelompok_id);
ALTER TABLE peserta_calon ADD CONSTRAINT IF NOT EXISTS fk_kelompok_leader 
  FOREIGN KEY (kelompok_id) REFERENCES peserta_calon(id) ON DELETE SET NULL;

-- 6. Tambah kelompok_id di anggotas
ALTER TABLE anggotas ADD COLUMN IF NOT EXISTS kelompok_id BIGINT UNSIGNED NULL AFTER ketua_id;

-- 7. Tambah constraint kelompok anggota
ALTER TABLE anggotas ADD CONSTRAINT IF NOT EXISTS fk_kelompok_anggota 
  FOREIGN KEY (kelompok_id) REFERENCES peserta_calon(id) ON DELETE CASCADE;

-- 8. Standarisasi enum status
ALTER TABLE peserta_calon 
  MODIFY COLUMN status ENUM('pending','diterima','ditolak','peserta') DEFAULT 'pending';

ALTER TABLE pesertas 
  MODIFY COLUMN status ENUM('aktif','selesai','dropout') DEFAULT 'aktif';

-- SELESAI TOTAL!
SELECT 'DATABASE 100% BERSIH — SEKARANG BENAR-BENAR KELAR!' AS status;
SELECT 'LANJUT UPDATE MODEL & FILAMENT RESOURCE!' AS next_step;