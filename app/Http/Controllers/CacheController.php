<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class CacheController extends Controller
{
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return response()->json(['message' => 'Cache cleared successfully']);
    }

    function storageLink() {
        Artisan::call('storage:link');
        return response()->json(['message' => 'Storage link created successfully']);
    }
}
