<?php

namespace App\Http\Controllers;

use ArPHP\I18N\Arabic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArController extends Controller
{
    public function sentimentAnalysis()
    {
        $Arabic = new Arabic();

        $reviews = array(
            'الخدمة كانت بطيئة',
            'الإطلالة رائعة والطعام لذيذ',
            'التبريد لا يعمل والواي فاي ضعيفة',
            'النظافة مميزة وموظفي الاستقبال متعاونين',
            'جاءت القطعة مكسورة والعلبة مفتوحة',
            'المنتج مطابق للمواصفات والتسليم سريع'
        );

        foreach ($reviews as $review) {
            $sentiments =  $Arabic->arSentiment($review);
        }

        return view('sentiment')->with('sentiments', $sentiments);
    }

    public function translate()
    {
        $Arabic = new Arabic();

        $words = array('hello', 'how are you');

        foreach ($words as $word) {
            $arabicWords = $Arabic->en2ar($word);
        }

        return view('translate');
    }
}
