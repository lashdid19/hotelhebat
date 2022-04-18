@component('receptionist.layout')
    @slot('title')
        Respsionis - Check In
    @endslot
    @slot('main')
        <div class="w-full bg-white shadow rounded p-5">
            <h2 class="text-2xl font-semibold mb-5">Resepsionis</h2>
            <h1 class="text-4xl text-green-500 font-semibold">Selamat datang {{session()->get('username')}}!</h1>
            @if (count($guests) >= 1)
            <div class="w-full flex justify-between mt-5">
                <div class="flex space-x-3">
                    <form action="/receptionist/order/asc">
                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold p-2 rounded">Urut - Check In Terawal</button>
                    </form>
                    <form action="/receptionist/order/desc">
                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold p-2 rounded">Urut - Check In Terakhir</button>
                    </form>
                </div>
                <form class="flex space-x-3" action="/receptionist/search">
                    <input class="w-full border @error('empty') border-red-500 @enderror p-2 rounded outline-none" name="name" type="text" placeholder="Nama Pemesan" value="@if(!empty($name)){{$name}}@endif"/>
                    <button class="bg-green-500 hover:bg-green-600 text-white font-semibold p-2 rounded">Cari</button>
                </form>     
            </div>
            <table class="w-full border table-auto mt-5">
                <tr class="border font-semibold">
                    <td class="border p-2">Nama Pemesan</td>
                    <td class="border p-2">Nama Tamu</td>
                    <td class="border p-2">Check In</td>
                    <td class="border p-2">Check Out</td>
                    <td class="border p-2">Jumlah Kamar</td>
                    <td class="border p-2">Tipe Kamar</td>
                    <td class="border p-2">Action</td>
                </tr>
                @foreach ($guests as $guest)
                    <tr class="border-b">
                        <td class="p-2">{{$guest->name}}</td>
                        <td class="p-2">{{$guest->guest_name}}</td>
                        <td class="p-2">{{$guest->check_in}}</td>
                        <td class="p-2">{{$guest->check_out}}</td>
                        <td class="p-2">{{$guest->room_total}}</td>
                        <td class="p-2">{{$guest->room_type}}</td>
                        <td class="flex p-2 items-center space-x-3">
                            <a href="/receptionist/check-in/{{$guest->id}}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded">Check In</a>
                            <a href="/receptionist/detail/{{$guest->id}}" class="text-blue-500 hover:underline font-semibold">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            @else
            <p class="text-gray-500 text-2xl font-semibold mt-5">Tidak Ada Data</p>
            @endif
        </div>
    @endslot
@endcomponent
