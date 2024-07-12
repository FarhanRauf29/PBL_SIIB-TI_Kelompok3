@extends('template.fulltemplate')

@section('main')
    <h1>Pengajuan Peminjaman</h1>
    <a href="#">Buat Pengajuan Baru</a>
    <ul>
        @foreach($pengajuan as $item)
            <li>
                <a href="{{ route('pengajuan.show', $item) }}">{{ $item->alasan }}</a> - {{ $item->status }}
            </li>
        @endforeach
    </ul>
@endsection
<tr class="nk-tb-item odd"><td class="nk-tb-col">
    <div class="custom-control custom-control-sm custom-checkbox notext">
        <input type="checkbox" name="check_row[]" class="custom-control-input row-checkbox" id="id_1" value="1">
        <label class="custom-control-label" for="id_1"></label>
    </div></td><td class="nk-tb-col">1</td><td class="nk-tb-col">Konsumable</td><td class="nk-tb-col-tools nk-tb-col">
        <ul class="nk-tb-actions gx-1">
            <li class="nk-tb-action-hidden">
                <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '1', 'category', 'detail')" data-tooltip="tooltip" data-bs-placement="top" aria-label="Detail" data-bs-original-title="Detail">
                    <em class="icon ni ni-zoom-in"></em>
                </a>
            </li>
            <li>
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"> <em class="icon ni ni-more-h"></em> </a>
                    <div class="dropdown-menu dropdown-menu-end" style="">
                        <ul class="link-list-opt no-bdr">
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '1', 'category', 'update')">
                                    <em class="icon ni ni-edit"></em> <span> Ubah </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '1', 'category', 'delete')">
                                    <em class="icon ni ni-trash"></em> <span> Hapus </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '1', 'category', 'detail')">
                                    <em class="icon ni ni-zoom-in"></em> <span> Detail </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul></td></tr>
