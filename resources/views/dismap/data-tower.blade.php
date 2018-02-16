@extends('layouts/dashboard')

@section('title', 'Data Tower')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.css"/>
@endsection

@section('content')
    <div class="showback">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="text-center">Data Tower</h3>
            </header>
            @if (session()->has('status'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification </strong> {{ session('status') }}
                </div>
            @endif
            <div class="panel-body">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
                <div style="margin-top: 10px;">
                    <table class="table" id="myTable" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="2">No</th>
                                <th data-priority="2">DATA PENGELOLA MENARA TELEKOMUNIKASI</th>
                                <th data-priority="1">SITE ID / SITE NAME</th>
                                <th data-priority="2">JENIS MENARA</th>
                                <th data-priority="3">LOKASI MENARA</th>
                                <th data-priority="2">LUAS LOKASI</th>
                                <th data-priority="2">STATUS LOKASI</th>
                                <th data-priority="2">KOORDINAT</th>
                                <th data-priority="2">TINGGI MENARA</th>
                                <th data-priority="2">STATUS KUNJUNGAN</th>
                                <th data-priority="2">KETERANGAN</th>
                                <th data-priority="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tower as $item)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $item->pengelola }}</td>
                                <td>{{ $item->site }}</td>
                                <td class="text-capitalize">{{ $item->jenis_menara }}</td>
                                <td>{{ $item->lokasi_menara }}</td>
                                <td>{{ $item->luas_lokasi }}</td>
                                <td class="text-capitalize">{{ $item->status_lokasi }}</td>
                                <td>{{ "Latitude : " .$item->lat. " Longitude : " .$item->lng }}</td>
                                <td>{{ $item->tinggi_menara }}</td>
                                <td class="text-capitalize">{{ $item->status_kunjungan }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button><input type="hidden" value="{{ $item->id }}">
                                    <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button><input type="hidden" value="{{ $item->id }}">
                                    <a href="#"><button class="btn btn-danger"><i class="fa fa-exclamation-triangle"></button></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="addModalLabel">Tambah data</h4>
                </div>
                <form class="form-horizontal" action="/dismap/data-tower/add" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengelola <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="add_pengelola" id="add_pengelola">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Site ID <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="add_siteid" id="add_siteid">
                            </div>
                            <label class="col-sm-3 control-label">Site Name <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="add_sitename" id="add_sitename">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Menara <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="add_jenismenara" id="add_jenismenara">
                                    <option value="green field">Green Field</option>
                                    <option value="roof top">Roof Top</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lokasi Menara <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="add_lokasimenara" id="add_lokasimenara" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Luas Lokasi <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="add_luaslokasi" id="add_luaslokasi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Lokasi <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="add_statuslokasi" id="add_statuslokasi">
                                    <option value="milik sendiri">Milik Sendiri</option>
                                    <option value="sewa gedung">Sewa Gedung</option>
                                    <option value="sewa lahan">Sewa Lahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Latitude <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="add_latitude" id="add_latitude">
                            </div>
                            <label class="col-sm-3 control-label">Longitude <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="add_longitude" id="add_longitude">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tinggi Menara <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="add_tinggimenara" id="add_tinggimenara">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Kunjungan <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="add_statuskunjungan" id="add_statuskunjungan">
                                    <option value="belum dikunjungi">Belum Dikunjungi</option>
                                    <option value="sudah dikunjungi">Sudah Dikunjungi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="add_keterangan" id="add_keterangan" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="add_data">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>      				    
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.js"></script>
    <script>
        $('#myTable').DataTable({
            responsive: true,
        });
    </script>    
@endsection