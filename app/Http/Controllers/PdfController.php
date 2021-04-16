<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function file($id) {
        $projeto = Projeto::findOrFail($id);

        $pdf = PDF::loadview('pdfProjeto', compact('projeto'));

        return $pdf->stream('PdfProjeto.pdf');
    }
}
