@extends('layouts.layout')
@section('content')
<div class="main-wrapper">
    <x-header/>
    <x-leftbar />
    <div class="page-wrapper">
        <div class="content mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Shaxsiy hamkorlar</h4> 
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="activity">
                        <div class="activity-box">
                            <ul class="activity-list">
                                @foreach($selfPartners as $item)
                                <li class="activity-list_li">
                                    <div class="activity-user">
                                        <a data-toggle="tooltip" class="avatar"> <img alt="Lesley Grauer" src="{{ asset('assets/img/user.jpeg') }}" class="img-fluid rounded-circle"> </a>
                                    </div>
                                    <div class="activity-content">
                                        <div class="timeline-content">{{ $item->name }} | <span class="text-secondary">{{ $item['vaucher']->name }}</span><span class="time">{{ \Carbon\Carbon::parse($item->start_job_date)->format('d.m.Y') }}</span> </div>
                                    </div> 
                                    
                                </li>
                                @endforeach
                            </ul>
                            @if($selfPartners->isEmpty())
                                <p class="text-secondary">Sizda shaxsiy hamkorlar mavjud emas...</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection