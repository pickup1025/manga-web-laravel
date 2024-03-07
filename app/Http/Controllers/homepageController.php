<?php

namespace App\Http\Controllers;

use App\Models\Post;

// ต้องเปลี่ยนเป็น namespace ของ Model ของคุณ

class HomepageController extends Controller
{
    public function homepage()
    {
        $posts = Post::all(); // ดึงข้อมูลทั้งหมดจากตาราง posts

        return view('homepage', ['posts' => $posts]); // ส่งข้อมูลไปยัง Blade view
    }
}
