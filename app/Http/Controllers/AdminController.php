<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Category;
=======
use App\Models\category;
>>>>>>> e33371aac0339829471c30a947bd816f84886294
use App\Models\User;
use App\Models\vendor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('pointakses/admin/index');
    }

<<<<<<< HEAD
    public function data_pengguna() {
        $users = User::all();

        return view('pointakses/admin/data_pengguna', compact('users'));
=======
    function data_pengguna() {
        $users = User::all();

        return view('pointakses/admin/data_pengguna', compact('users'));
    }

    function data_vendor() {
        $vendors = Vendor::all();

        return view('pointakses/admin/vendor', compact('vendors'));
    }

    function data_kategori() {
        $categories = category::all();

        return view('pointakses/admin/kategori', compact('categories'));
>>>>>>> e33371aac0339829471c30a947bd816f84886294
    }

    function data_vendor() {
        $vendors = Vendor::all();

        return view('pointakses/admin/vendor', compact('vendors'));
    }

    function data_kategori() {
        $categories = category::all();

        return view('pointakses/admin/kategori', compact('categories'));
    }

}