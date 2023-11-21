<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemilik Apotek | Kasir</title>
    @vite('resources/css/app.css')

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/e87c4faa10.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1fc4ea1c6a.js" crossorigin="anonymous"></script>

    {{-- DATATABLES --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
</head>

<body class="font-Inter relative">
    @include('pemilik.components.sidebar')
    <main class="p-10 font-Inter bg-plat min-h-[100vh] h-full" id="mainContent">
        @include('pemilik.components.navbar')


        <div class="flex flex-col gap-8 mt-10">
            <p class="text-3xl font-bold">Pesanan Pending</p>

            <div class="bg-white rounded-lg p-4 shadow-md overflow-x-auto">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Invoice</th>
                            <th>Nama Pengambil</th>
                            <th>Metode Pembayaran</th>
                            <th>Infomasi Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Detail Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 20; $i++) <tr>
                            <td>{{$i + 1}}</td>
                            <td>
                                <span class="font-bold">INV-1234{{$i}}</span>
                            </td>
                            <td>Nama Penerima {{$i + 1}}</td>
                            <td>BCA</td>
                            <td>
                                <button onclick="showPaymentSS()" target="_blank"
                                    class="underline">Screenshot123.jpg</button>
                                <div class="absolute w-full h-full top-0 left-0 flex justify-center pt-28 items-start backdrop-brightness-[.25] z-10 hidden"
                                    id="ModalBuktiPembayaran">
                                    <div class="bg-white rounded-xl shadow-md">
                                        <div
                                            class="bg-mainColor text-white font-semibold px-10 py-4 rounded-t-xl flex justify-between">
                                            namaFile.jpg
                                            <button onclick="showPaymentSS()">
                                                <i class="fa-solid fa-xmark fa-xl" style="color: white"></i>
                                            </button>
                                        </div>
                                        <img src="{{ asset('img/obat1.jpg') }}" alt=""
                                            class="h-[60vh] w-fit relative p-4">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="font-bold opacity-60">Menunggu Pengambilan</p>
                            </td>
                            <td>
                                <button
                                    class="border-2 border-secondaryColor rounded-md hover:bg-transparent hover:text-secondaryColor font-bold px-4 py-1 bg-secondaryColor text-white duration-300 transition-colors ease-in-out"
                                    type="button" onclick="toggleDetail()">Lihat</button>

                                {{-- MODAL DETAIL PESANAN PENDING START --}}
                                <div class="absolute w-full h-full top-0 left-0 flex justify-center items-center backdrop-brightness-75 z-10 hidden"
                                    id="detailModal">
                                    <div
                                        class="w-[70%] h-fit max-h-full bg-white rounded-md shadow-md p-8 flex flex-col gap-6 overflow-auto">
                                        <div class="">
                                            <button onclick="toggleDetail()" type="button"
                                                class="bg-mainColor py-1 px-4 text-white font-semibold rounded-md">
                                                <i class="fa-solid fa-arrow-left"></i>
                                                Kembali
                                            </button>
                                        </div>

                                        <div class="px-8 py-2 w-[100%] flex justify-between">
                                            <div class="overflow-y-auto h-72 w-[70%]">
                                                <table class="w-full h-full overflow-scroll">
                                                    <tr
                                                        class="border-2 border-b-mainColor border-transparent text-mainColor font-bold w-[100%]">
                                                        <td class="w-[10%] pb-2 text-center">No</td>
                                                        <td class="w-[50%] pb-2">Nama</td>
                                                        <td class="w-[20%] pb-2 text-center">Jumlah</td>
                                                        <td class="w-[20%] pb-2">Resep Dokter</td>
                                                    </tr>
                                                    @for ($j = 1; $j <= 50; $j++) <tr>
                                                        <td class="py-2 text-center">{{$j}}</td>
                                                        <td class="py-2">Paracetamol 200 kg</td>
                                                        <td class="py-2 text-center">4</td>
                                                        <td class="py-2">Perlu</td>
                                                        </tr>
                                                        @endfor
                                                </table>
                                            </div>

                                            <div class="w-[25%]">
                                                <div>
                                                    <table class="w-full">
                                                        <tr
                                                            class="border-2 border-b-mainColor border-transparent text-mainColor font-bold w-[100%]">
                                                            <td class="pb-2">File Resep Dokter</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 flex gap-2 items-center">
                                                                <i class="fa-solid fa-image"></i>
                                                                <a href="/cashier/img"
                                                                    target="_blank">resepDokter.jpg</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-8 w-[100%]">
                                            <p
                                                class="text-mainColor font-bold py-2 border-2 border-b-mainColor border-transparent">
                                                Catatan</p>
                                            <p class="py-4">Obat A dan C digabung di satu tempat, Obat B dan D dibuang.
                                            </p>
                                        </div>

                                        {{-- JIKA STATUS REFUND --}}
                                        <div class="px-8 w-[100%]">
                                            <p
                                                class="text-mainColor font-bold py-2 border-2 border-b-mainColor border-transparent">
                                                Upload Bukti Refund</p>

                                            <div class="md:flex w-1/2 items-center">
                                                <div class="me-3">
                                                    <input type="file" id="file2" class="invisible" accept="image/*" onchange="showFile(this)">
                                                    <button id="file" onclick="document.getElementById('file2').click(); return false;" class="p-2 w-full border rounded-xl shadow">
                                                        <div class="flex items-center gap-2">
                                                            <i class="fa-solid fa-arrow-up-from-bracket p-2 px-2.5 rounded-full bg-mainColor w-fit ms-2" style="color: white;"></i>
                                                            <p class="text-mediumGrey">Upload gambar</p>
                                                        </div   >
                                                    </button>
                                                    <p class="text-xs text-mediumRed mt-2">*Maks 2MB</p>
                                                </div>
                                                <div class="w-full h-full m-2 border-2 flex justify-center">
                                                    <img src="" alt="" id="uploadedFile" class="max-w-full max-h-full">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-end w-full">
                                            <form action="">
                                                <button
                                                    class="bg-green-600 text-white font-bold py-2 px-4 rounded-md shadow-md">Tandai
                                                    Selesai</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- MODAL DETAIL PESANAN PENDING END --}}
                            </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- DATATABLES SCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>

    <script>
        const toggleDetail = () => {
            const modal = document.getElementById('detailModal');

            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden')
                document.body.classList.add('h-fit')
            } else {
                modal.classList.add('hidden')
                document.body.classList.remove('h-fit')
            }
        }

        const showPaymentSS = () => {
            const modalBukti = document.getElementById('ModalBuktiPembayaran');

            if (modalBukti.classList.contains('hidden')) {
                modalBukti.classList.remove('hidden')
                document.body.classList.add('h-fit')
            } else {
                modalBukti.classList.add('hidden')
                document.body.classList.remove('h-fit')
            }
        }

        function showFile(input) {
        const getFile = document.getElementById('uploadedFile');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = (e) => {
                getFile.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>