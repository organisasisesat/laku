@extends('layouts.main')

@section('container')
    <div class="flex flex-col gap-12">
        <div class="flex justify-center gap-24 text-3xl">
            <img src="baskom.svg" alt="" class="">
            <h1 class="my-auto font-bold w-52">Mau <span class="text-[#42BB73]">Nyuci</span>? Tapi <span
                    class="text-[#42BB73]">Gak Ada Waktu</span> Buat Nyuci?</h1>
        </div>
        <div class="flex justify-center">
            <p class="text-xl w-[88%]">Serahin aja ke kita buat dicuci dan kamu bisa <span class="font-bold">lanjut ngerjain
                    tugasmu atau beraktivitas</span> di luar rumah tanpa khawatir cucian menumpuk di rumah, kos atau di
                kontrakan.</p>
        </div>
        <div class="flex justify-center gap-24 text-3xl">
            <img src="ipad.svg" alt="" class="">
            <a href="user/order" class="my-auto"><button class="my-auto bg-[#42BB73] rounded-[10px] h-14 w-80 text-lg">Pesan sekarang</button></a>
        </div>
        <div class="flex flex-col gap-4">
        <div class="flex justify-center">
            <h1 class="text-3xl font-bold">Apa Sih Kelebihan Kami?</h1>
        </div>
        <ul class="flex justify-center gap-24">
            <li><img src="duit.svg" alt=""></li>
            <li><img src="kartu.svg" alt=""></li>
            <li><img src="jam.svg" alt=""></li>
          </ul>
        </div>
    </div>
@endsection

@section('profile')
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
