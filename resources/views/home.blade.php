@extends('layouts.layout')
@section('content')
<div class="main-wrapper">
    <x-header/>
    <x-leftbar />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h3 class="page-title mt-3">{{ $staff->name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Asosiy sahifa</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">{{ $vaucher->name }}</h3>
                                    <h6 class="text-muted mt-3"><b>Sizning vaucher</b></h6> </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            @foreach($allVaucher as $item)
                <div class="col-md-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="card-title d-flex justify-content-between align-items-center">{{ $item->name }} <button type="button" class="btn btn-warning btn-sm batafsil">Batafsil</button></h4>
                        </div>
                        <div class="card-body">
                            <nav class="d-flex justify-content-between align-items-center"><b><p>Tur paket ulushi</p></b><p>{{ $item->tur_packet_share }}%</p></nav>
                            <nav class="d-flex justify-content-between align-items-center"><b><p>AAA group mehmonxonalaridan ulush</p></b><p>{{ $item->hotel_share }}%</p></nav>
                            <nav class="d-flex justify-content-between align-items-center"><b><p>Cashback</p></b><p>{{ $item->cashback }}%</p></nav>
                            <nav class="d-flex justify-content-between align-items-center"><b><p>Shaxsiy hamkor ulushi</p></b><p><?= $item->personal_partner_share?'Mavjud':'Mavjud emas'?> </p></nav>
                            <nav class="d-flex justify-content-between align-items-center"><b><p>Aksiyalar</p></b><p><?= $item->promotion?'Mavjud':'Mavjud emas'?></p></nav>
                            <nav class="d-flex justify-content-between align-items-center"><b><p>Kattaroq vaucherga o’tish imkoni</p></b><p><?= $item->level_up?'Shart asosida':'Mavjud emas'?></p></nav>
                            <p class="text-secondary"><?= $item->level_up? $item->level_up_detail :''?></p>

                        </div>
                        <table class="table table-bordered vaucher-levels" style="display: none;">
                            <tbody>
                                <?php $pow = -1; ?>
                                @foreach($vaucherDetails as $detail)
                                    @if($detail->vaucher_id == $item->id)
                                    <?php $pow = $pow+2;?>
                                        <tr>
                                            <td class="d-flex justify-content-between"><strong style="flex:1">{{ $detail->level }}</strong> <span style="flex:1" class="text-center <?= $detail->level=='Qolgan barcha levellar uchun'?'d-none':''?>"><?= pow(2, $pow). '+' .pow(2, $pow)?></span> <span style="flex:1" class="text-right">{{ $detail->share }}%</span></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection