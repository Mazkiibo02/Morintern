-- FIX DB MORINTERN - MERGE LOCAL + FRIEND, HAPUS DUPLIKAT, TAMBAH FK/ENUM
-- BASE: LOCAL DB, ENUM: PENDING/DITERIMA/DITOLAK/PESERTA, HAPUS CALON_PESERTAS/KONTEN/PENILAIAN_MAGANG
-- TAMBAH KELOMPOK_ID & FK MUTUAL

USE morintern;

-- 1. HAPUS DUPLIKAT TABLE (IF EXISTS, AMAN)
DROP TABLE IF EXISTS calon_pesertas;
DROP TABLE IF EXISTS konten;
DROP TABLE IF EXISTS penilaian_magang;  -- HAPUS, GANTI PAKAI PENILAIAN_FINAL (RENAME DARI PENILAIAN)
DROP TABLE IF EXISTS penilaian;  -- HAPUS, GANTI PAKAI PENILAIAN_DETAIL (RENAME DARI PENILAIAN)

-- 2. RENAME & FIX PENILAIAN TABLE (INDIVIDUAL → DETAIL)
RENAME TABLE penilaian TO penilaian_detail;
ALTER TABLE penilaian_detail ADD COLUMN IF NOT EXISTS peserta_id bigint unsigned AFTER id;
ALTER TABLE penilaian_detail ADD FOREIGN KEY (peserta_id) REFERENCES pesertas(id) ON DELETE CASCADE;

-- 3. RENAME PENILAIAN_MAGANG TO PENILAIAN_FINAL (AGGREGATED)
RENAME TABLE penilaian_magang TO penilaian_final;
ALTER TABLE penilaian_final ADD COLUMN IF NOT EXISTS peserta_id bigint unsigned AFTER id;
ALTER TABLE penilaian_final ADD FOREIGN KEY (peserta_id) REFERENCES pesertas(id) ON DELETE CASCADE;

-- 4. STANDARISASI ENUM STATUS DI PESERTA_CALON (PENDING/DITERIMA/DITOLAK/PESERTA)
ALTER TABLE peserta_calon MODIFY COLUMN status ENUM('pending', 'diterima', 'ditolak', 'peserta') DEFAULT 'pending';

-- 5. TAMBAH KOLOM KELOMPOK_ID DI PESERTA_CALON & ANGGOTAS (MUTUAL FK)
ALTER TABLE peserta_calon ADD COLUMN IF NOT EXISTS kelompok_id bigint unsigned NULL AFTER spesialisasi_id;
ALTER TABLE peserta_calon ADD INDEX idx_kelompok_id (kelompok_id);
ALTER TABLE peserta_calon ADD FOREIGN KEY (kelompok_id) REFERENCES peserta_calon(id) ON DELETE SET NULL;  -- SELF FK UNTUK GROUP LEADER

ALTER TABLE anggotas ADD COLUMN IF NOT EXISTS kelompok_id bigint unsigned NULL AFTER ketua_id;
ALTER TABLE anggotas ADD INDEX idx_kelompok_id (kelompok_id);
ALTER TABLE anggotas ADD FOREIGN KEY (kelompok_id) REFERENCES peserta_calon(id) ON DELETE CASCADE;  -- FK TO CALON FOR GROUP MEMBERS

-- 6. TAMBAH FK YANG HILANG (KEAMANAN & INTEGRITY)
ALTER TABLE users ADD FOREIGN KEY (role_id) REFERENCES role(id) ON DELETE SET NULL;
ALTER TABLE users ADD FOREIGN KEY (requested_role_id) REFERENCES role(id) ON DELETE SET NULL;
ALTER TABLE pesertas ADD FOREIGN KEY (status_id) REFERENCES status(id) ON DELETE SET NULL;
ALTER TABLE peserta_calon ADD FOREIGN KEY (universitas_id) REFERENCES universitas(id) ON DELETE SET NULL;  -- ASUMSI UNIVERSITAS TABLE ADA, KALAU NGGK SKIP
ALTER TABLE peserta_calon ADD FOREIGN KEY (jurusan_id) REFERENCES jurusan(id) ON DELETE SET NULL;
ALTER TABLE pesertas ADD FOREIGN KEY (perusahaan_id) REFERENCES perusahaan(id) ON DELETE SET NULL;
ALTER TABLE anggotas ADD FOREIGN KEY (spesialisasi_id) REFERENCES spesialisasi(id) ON DELETE SET NULL;
ALTER TABLE postingan_magangs ADD FOREIGN KEY (spesialisasi_id) REFERENCES spesialisasi(id) ON DELETE SET NULL;  -- KALAU ADA, KALAU NGGK SKIP

-- 7. FIX TYPO TABLE NAME (JIK A ADA SPESIALISASIS → SPESIALISASI)
RENAME TABLE IF EXISTS spesialisasis TO spesialisasi;

-- 8. TAMBAH INDEX UNTUK PERFORM A (QUERY CEPAT DI ADMIN/LANDING)
ALTER TABLE peserta_calon ADD INDEX idx_status (status);
ALTER TABLE peserta_calon ADD INDEX idx_kelompok (kelompok_id);
ALTER TABLE pesertas ADD INDEX idx_status (status);
ALTER TABLE postingan_magangs ADD INDEX idx_kuota (kuota);
ALTER TABLE users ADD INDEX idx_email (email);

-- 9. UPDATE SAMPLE DATA ENUM (MIGRATE LAMA TO BARU)
UPDATE peserta_calon SET status = 'pending' WHERE status = 'baru' OR status = 'applied';
UPDATE peserta_calon SET status = 'diterima' WHERE status = 'accepted';
UPDATE peserta_calon SET status = 'ditolak' WHERE status = 'rejected';
UPDATE peserta_calon SET status = 'peserta' WHERE status = 'diseleksi';  -- UNTUK ACTIVE

-- 10. VERIFIKASI (RUN IN TINKER NANTI)
-- SHOW TABLES; DESCRIBE peserta_calon; SELECT COUNT(*) FROM peserta_calon;