<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }
}
