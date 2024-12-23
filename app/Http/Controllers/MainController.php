<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Vaucher;
use App\Models\VaucherTreeIncome;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function __construct() 
    {
        
    }

    public function index()
    {
        
        if(Auth::check() && Auth::id()!=1)
        {
            return redirect('home');
        }else{
            return redirect('boshqaruv');
        }

    }
    public function home()
    {
        $staff = User::where('id', Auth::id())->firstOrFail();
        $selfPartners = User::where('offerer_id', $staff->id)->get();
        $vaucher = Vaucher::where('id', $staff->vaucher_id)->firstOrFail();
        $allVaucher = Vaucher::get();
        $vaucherDetails = VaucherTreeIncome::all();
        
        return view('home', compact('staff', 'vaucher', 'allVaucher', 'selfPartners', 'vaucherDetails'));
    }

    public function selfPartners()
    {
        $staff = User::where('id', Auth::id())->firstOrFail();
        $selfPartners = User::where('offerer_id', $staff->id)->with('Vaucher')->get();
        $vauchers = Vaucher::all();
        $vaucherDetail = VaucherTreeIncome::all();

        return view('self-partners', compact('staff', 'selfPartners','vauchers','vaucherDetail'));
    }

    public function partnersTree()
    {
        $staff = User::where('id', Auth::id())->firstOrFail();
        $partner = User::find($staff->id);
        $partners = $partner->descendants()->withDepth()->get();
      
        return view('partners', compact('staff', 'partners', 'partner'));
    }

    public function aboutMe()
    {
        $staff = User::where('id', Auth::id())->firstOrFail();
        $countSelfPartners = User::where('offerer_id', $staff->id)->count();
        $countPartners = $staff->descendants()->count();
        $vaucher = Vaucher::where('id', $staff->vaucher_id)->firstOrFail();
        $vaucherDetail = VaucherTreeIncome::where('vaucher_id', $vaucher->id)->get();
        
        return view('about', compact('staff', 'vaucher','vaucherDetail','countPartners','countSelfPartners'));
    }

    
}
