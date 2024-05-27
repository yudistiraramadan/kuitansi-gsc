<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- <br> --}}

    <a href="{{ route('create.user') }}">
        <button class="btn btn-primary mb-2">Tambah</button>
    </a>&nbsp;&nbsp;
    <a href="#">
        <button class="btn btn-success mb-2">Excel</button>
    </a>

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="tb-kuitansi">
            <thead>
                <tr>
                    <th scope="col" style="text-align:left;">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">WhatsApp</th>
                    <th style="text-align: center;" scope="col">Hak Akses</th>
                    <th style="text-align: center;" style="width:10%" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($users as $user)
                    <tr>
                        <td style="text-align: left;">{{ $no++ }}.</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->phone }}</td>
                        <td style="text-align:center;">
                            @if ($user->role_id == 1)
                                <span class="badge text-bg-primary">manajemen</span>
                            @elseif ($user->role_id == 2)
                                <span class="badge text-bg-success">petugas</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex" style="justify-content: center; align-items:center;">
                                <a data-toggle="tooltip" data-placement="top" title="Edit"
                                    href="{{ route('edit.user', $user->id) }}" data-original-title="Edit">
                                    <svg width="21" height="21" ;viewbox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 3.26645L17.5333 0.799784C17.3213 0.597635 17.0396 0.484863 16.7467 0.484863C16.4537 0.484863 16.172 0.597635 15.96 0.799784L13.7667 2.99978H1.99999C1.64637 2.99978 1.30723 3.14026 1.05718 3.39031C0.807132 3.64036 0.666656 3.9795 0.666656 4.33312V18.9998C0.666656 19.3534 0.807132 19.6925 1.05718 19.9426C1.30723 20.1926 1.64637 20.3331 1.99999 20.3331H16.6667C17.0203 20.3331 17.3594 20.1926 17.6095 19.9426C17.8595 19.6925 18 19.3534 18 18.9998V6.83978L20 4.83978C20.2084 4.63104 20.3255 4.34811 20.3255 4.05312C20.3255 3.75813 20.2084 3.47519 20 3.26645ZM10.5533 12.4198L7.75999 13.0398L8.42666 10.2731L14.7933 3.89312L16.9467 6.04645L10.5533 12.4198ZM17.6667 5.28645L15.5133 3.13312L16.7467 1.89978L18.9 4.05312L17.6667 5.28645Z"
                                            fill="#FFC94A"></path>
                                    </svg>
                                </a>&nbsp;&nbsp;
                                <a href="javascript:void(0)" data-id="{{ $user->id }}" class="delete-kuitansi"
                                    name="delete" data-toggle="tooltip" data-placement="top" title="Hapus"
                                    data-id="4" data-original-title="Hapus"><svg width="22" height="22"
                                        viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.25 3.50004V1.24854C7.25 1.04962 7.32902 0.858857 7.46967 0.718205C7.61032 0.577553 7.80109 0.498535 8 0.498535H14C14.1989 0.498535 14.3897 0.577553 14.5303 0.718205C14.671 0.858857 14.75 1.04962 14.75 1.24854V3.50004H20.75C20.9489 3.50004 21.1397 3.57905 21.2803 3.71971C21.421 3.86036 21.5 4.05112 21.5 4.25004C21.5 4.44895 21.421 4.63971 21.2803 4.78036C21.1397 4.92102 20.9489 5.00004 20.75 5.00004H1.25C1.05109 5.00004 0.860322 4.92102 0.71967 4.78036C0.579018 4.63971 0.5 4.44895 0.5 4.25004C0.5 4.05112 0.579018 3.86036 0.71967 3.71971C0.860322 3.57905 1.05109 3.50004 1.25 3.50004H7.25ZM8.75 3.50004H13.25V2.00004H8.75V3.50004ZM3.5 21.5C3.30109 21.5 3.11032 21.421 2.96967 21.2804C2.82902 21.1397 2.75 20.9489 2.75 20.75V5.00004H19.25V20.75C19.25 20.9489 19.171 21.1397 19.0303 21.2804C18.8897 21.421 18.6989 21.5 18.5 21.5H3.5ZM8.75 17C8.94891 17 9.13968 16.921 9.28033 16.7804C9.42098 16.6397 9.5 16.4489 9.5 16.25V8.75004C9.5 8.55112 9.42098 8.36036 9.28033 8.21971C9.13968 8.07905 8.94891 8.00004 8.75 8.00004C8.55109 8.00004 8.36032 8.07905 8.21967 8.21971C8.07902 8.36036 8 8.55112 8 8.75004V16.25C8 16.4489 8.07902 16.6397 8.21967 16.7804C8.36032 16.921 8.55109 17 8.75 17ZM13.25 17C13.4489 17 13.6397 16.921 13.7803 16.7804C13.921 16.6397 14 16.4489 14 16.25V8.75004C14 8.55112 13.921 8.36036 13.7803 8.21971C13.6397 8.07905 13.4489 8.00004 13.25 8.00004C13.0511 8.00004 12.8603 8.07905 12.7197 8.21971C12.579 8.36036 12.5 8.55112 12.5 8.75004V16.25C12.5 16.4489 12.579 16.6397 12.7197 16.7804C12.8603 16.921 13.0511 17 13.25 17Z"
                                            fill="#FF6868">
                                        </path>
                                    </svg>
                                </a>&nbsp;&nbsp;
                                {{-- <a href="#" data-id="" class="print-kuitansi" name="print"
                                    data-toggle="tooltip" data-placement="top" title="Print" data-id="4"
                                    data-original-title="Print">
                                    <svg width="22" height="22" fill="#03AED2"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#03AED2">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M19,12h3v8a2,2,0,0,1-2,2H19ZM17,4V22H4a2,2,0,0,1-2-2V4A2,2,0,0,1,4,2H15A2,2,0,0,1,17,4ZM10,16H5v2h5Zm4-5H5v2h9Zm0-5H5V8h9Z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>&nbsp;&nbsp; --}}
                                <a href="#" data-id="" class="print-kuitansi" name="print"
                                    data-toggle="tooltip" data-placement="top" title="Detail" data-id="4"
                                    data-original-title="Detail">
                                    <svg fill="#03AED2" height="22px" width="22px" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 472.615 472.615" xml:space="preserve" stroke="#03AED2">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <circle cx="236.308" cy="117.504" r="111.537"></circle>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M369,246.306c-1.759-1.195-5.297-3.493-5.297-3.493c-28.511,39.583-74.993,65.402-127.395,65.402 c-52.407,0-98.894-25.825-127.404-65.416c0,0-2.974,1.947-4.451,2.942C41.444,288.182,0,360.187,0,441.87v24.779h472.615V441.87 C472.615,360.549,431.538,288.822,369,246.306z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>&nbsp;&nbsp;
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main>

<script>
    let table = new DataTable('#tb-kuitansi');
</script>

<script src="{{ asset('asset_offline/js/sweealert2.js') }}"></script>
@if (Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: '{{ Session::get('success') }}'
        });
    </script>
@endif

{{-- <script>
    $(document).on('click', '.delete-kuitansi', function() {
        id = $(this).data('id');
        Swal.fire({
            title: 'Hapus Kuitansi?',
            text: "Apakah anda yakin ingin menghapus kuitansi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#54ca68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya Hapus',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    async: true,
                    type: 'POST',
                    url: '/kuitansi/delete/id',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $('#ok_button').text('Hapus Kuitansi');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            location.reload();
                        }, 3000);

                        window.setTimeout(function() {}, 1000);
                        Swal.fire(
                            'Dihapus!',
                            'Kuitansi berhasil dihapus.',
                            'success'
                        )
                    }
                })
            }
        });
    });
</script> --}}
