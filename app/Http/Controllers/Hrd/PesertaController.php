<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\PesertaCalon;

class PesertaController extends Controller
{
    public function index()
    {
        $calon = PesertaCalon::all();

        return view('hrd.calon.index', compact('calon'));
    }

    public function approve(Request $request, PesertaCalon $calon)
    {
        $this->authorize('approve', $calon);

        DB::transaction(function () use ($calon) {
            // Update status from 'pendaftar' to 'peserta'
            $calon->update(['status' => PesertaCalon::STATUS_PESERTA]);

            Log::info('HRD approved calon peserta', [
                'calon_id' => $calon->id,
                'email' => $calon->email,
                'new_status' => PesertaCalon::STATUS_PESERTA,
            ]);
        });

        $message = 'Peserta berhasil diterima sebagai Peserta Aktif.';
        return $request->wantsJson()
            ? response()->json(['success' => true, 'message' => $message])
            : back()->with('success', $message);
    }

    public function reject(Request $request, PesertaCalon $calon)
    {
        $this->authorize('reject', $calon);

        DB::transaction(function () use ($calon) {
            // Update status to 'ditolak' instead of deleting
            $calon->update(['status' => PesertaCalon::STATUS_DITOLAK]);

            Log::info('HRD rejected calon peserta', [
                'calon_id' => $calon->id,
                'email' => $calon->email,
                'new_status' => PesertaCalon::STATUS_DITOLAK,
            ]);
        });

        $message = 'Peserta ditolak.';
        return $request->wantsJson()
            ? response()->json(['success' => true, 'message' => $message])
            : back()->with('warning', $message);
    }
}
