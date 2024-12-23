@extends('layouts.layout')
@section('content')
<div class="main-wrapper">
    <x-header/>
    <x-leftbar />
    <div class="page-wrapper">
        <div class="content mt-5">
            <div class="row">
                <div class="col-sm-5 col-12">
                    <h4 class="page-title">Mening hisobim</h4>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h2 class="payslip-title text-center"><button type="button" class="btn btn-secondary">{{ $staff->name }}</button></h2>
                            
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <h5 class="mb-0"><strong>Statistika</strong></h5>
                                        </li>
                                        <li>Hamkorlar soni - <span>{{ $countPartners }}</span></li>
                                        <li>Shaxsiy hamkorlar soni - <span>{{ $countSelfPartners }}</span></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    
                                    <div>
                                        <h4 class="m-b-10"><strong>{{ $vaucher->name }}</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Tur paket ulushi</strong> <span class="float-right">{{ $vaucher->tur_packet_share }}%</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>AAA group mehmonxonalaridan ulush</strong> <span class="float-right">{{ $vaucher->hotel_share }}%</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cashback</strong> <span class="float-right">{{ $vaucher->cashback }}%</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Shaxsiy hamkor ulushi</strong> <span class="float-right"><?= $vaucher->personal_partner_share?'Mavjud':'Mavjud emas'?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Aksiyalar</strong> <span class="float-right"><?= $vaucher->promotion?'Mavjud':'Mavjud emas'?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Kattaroq vaucherga o’tish imkoni</strong> <span class="float-right"><?= $vaucher->level_up?'Shart asosida':'Mavjud emas'?></span></td>
                                                </tr>
                                                <tr class="<?= $vaucher->level_up? '' :'d-none'?>">
                                                    <td><p class="text-secondary"><?= $vaucher->level_up? $vaucher->level_up_detail :''?></p></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10 mobile-mt"><strong>Hamkor daraxtdan daromat</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php $pow = -1; ?>
                                                @foreach($vaucherDetail as $detail)

                                                    <?php $pow = $pow+2;?>
                                                        <tr>
                                                            <td class="d-flex justify-content-between"><strong style="flex:1">{{ $detail->level }}</strong> <span style="flex:1" class="text-center <?= $detail->level=='Qolgan barcha levellar uchun'?'d-none':''?>"><?= pow(2, $pow). '+' .pow(2, $pow)?></span> <span style="flex:1" class="text-right">{{ $detail->share }}%</span></td>
                                                        </tr>
                                                 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection