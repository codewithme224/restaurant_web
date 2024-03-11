<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use App\Models\Category;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    //
    function index() : View
    {
        $sectionTitles = $this->getSectionTitle();

        $sliders = Slider::where('status', 1)->get();

        $whyChooseUs = WhyChooseUs::where('status', 1)->get();

        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();

        return view('frontend.home.index',
            compact('sliders',
                    'sectionTitles',
                    'whyChooseUs',
                    'categories'
                ));

    }


    public function getSectionTitle() : Collection
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
        ];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $titles;
    }


    function showProduct( string $slug) : View
    {
        // $product = Product::where('slug', $slug)->first();
        return view('frontend.pages.product-view');
    }

}
