<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Mbps; // Import the Mbps model

class WebsiteController extends Controller
{
    public function index()
    {
        // Mengambil semua data layanan dari database
        $services = Service::all();
        
        // Mengambil semua data Mbps dari database
        $mbps = Mbps::all();

        // Mengirimkan data layanan dan Mbps ke view 'website'
        return view('website', compact('services', 'mbps'));
    }
}
