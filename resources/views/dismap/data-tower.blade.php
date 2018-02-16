@extends('layouts/dashboard')

@section('title', 'Data Tower')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.css"/>
@endsection

@section('data', 'active')

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
            @elseif (session()->has('destroy'))
                <div class="alert alert-danger">
                    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification </strong> {{ session('destroy') }}
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
                                <th data-priority="2">LOKASI MENARA</th>
                                <th data-priority="2">LUAS LOKASI</th>
                                <th data-priority="2">STATUS LOKASI</th>
                                <th data-priority="2">KOORDINAT</th>
                                <th data-priority="2">TINGGI MENARA</th>
                                <th data-priority="2">STATUS KUNJUNGAN</th>
                                <th data-priority="2">KETERANGAN</th>
                                <th data-priority="3">Action</th>
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
                                <td>{{ "Latitude : " .$item->lat. " Longitude : " .$item->lng}}</td>
                                <td>{{ $item->tinggi_menara }}</td>
                                <td class="text-capitalize">{{ $item->status_kunjungan }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary editButton" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button><input type="hidden" value="{{ $item->id }}">
                                    <button type="button" class="btn btn-success viewButton" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye"></i></button><input type="hidden" value="{{ $item->id }}">
                                    <button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-exclamation-triangle"></i></button><input type="hidden" value="{{ $item->id }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!--  Modal  -->

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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="editModalLabel">Edit data</h4>
                </div>
                <form class="form-horizontal" id="editForm" action="" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengelola <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="edit_pengelola" id="edit_pengelola">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Site ID <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="edit_siteid" id="edit_siteid">
                            </div>
                            <label class="col-sm-3 control-label">Site Name <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="edit_sitename" id="edit_sitename">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Menara <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="edit_jenismenara" id="edit_jenismenara">
                                    <option value="green field">Green Field</option>
                                    <option value="roof top">Roof Top</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lokasi Menara <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="edit_lokasimenara" id="edit_lokasimenara" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Luas Lokasi <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="edit_luaslokasi" id="edit_luaslokasi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Lokasi <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="edit_statuslokasi" id="edit_statuslokasi">
                                    <option value="milik sendiri">Milik Sendiri</option>
                                    <option value="sewa gedung">Sewa Gedung</option>
                                    <option value="sewa lahan">Sewa Lahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Latitude <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="edit_latitude" id="edit_latitude">
                            </div>
                            <label class="col-sm-3 control-label">Longitude <span class="pull-right">:</span></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="edit_longitude" id="edit_longitude">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tinggi Menara <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="edit_tinggimenara" id="edit_tinggimenara">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Kunjungan <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="edit_statuskunjungan" id="edit_statuskunjungan">
                                    <option value="belum dikunjungi">Belum Dikunjungi</option>
                                    <option value="sudah dikunjungi">Sudah Dikunjungi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan <span class="pull-right">:</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="edit_keterangan" id="edit_keterangan" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="edit_data">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="viewModalLabel">View data</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Pengelola <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_pengelola" id="view_pengelola"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3  col-xs-6 control-label">Site ID <span class="pull-right">:</span></label>
                        <label class="col-md-9  col-xs-6">
                            <span name="view_siteid" id="view_siteid"></span>
                        </label>
                        <label class="col-md-3  col-xs-6 control-label">Site Name <span class="pull-right">:</span></label>
                        <label class="col-md-9  col-xs-6">
                            <span name="view_sitename" id="view_sitename"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Jenis Menara <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span class="text-capitalize" name="view_jenismenara" id="view_jenismenara"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Lokasi Menara <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_lokasimenara" id="view_lokasimenara"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Luas Lokasi <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_luaslokasi" id="view_luaslokasi"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Status Lokasi <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span class="text-capitalize" name="view_statuslokasi" id="view_statuslokasi"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Latitude <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_latitude" id="view_latitude">
                        </label>
                        <label class="col-md-3 col-xs-6 control-label">Longitude <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_longitude" id="view_longitude"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Tinggi Menara <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_tinggimenara" id="view_tinggimenara"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Status Kunjungan <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span class="text-capitalize" name="view_statuskunjungan" id="view_statuskunjungan"></span>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-xs-6 control-label">Keterangan <span class="pull-right">:</span></label>
                        <label class="col-md-9 col-xs-6">
                            <span name="view_keterangan" id="view_keterangan"></span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="deleteModalLabel">View data</h4>
                </div>
                <div class="modal-body">
                    <h5>Apakah anda yakin ingin menghapus data ini ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a class="btn btn-danger" href="" id="delete_data">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.js"></script>
    <script>
        $('#myTable').DataTable({
            responsive: true,
            columnDefs: [ 
                {
                targets: [4, 7],
                render: function ( data, type, row ) {
                    return data.substr( 0, 20 )+ '...';
                }
            }],
        });
        
        $(document).on('click', '.editButton', function(){
            var id = $(this).next().val();
            $.ajax({
                method : 'GET',
                url    : '/dismap/data-tower/edit/' + id,
            }).done(function(data){
                var site = data.site.split(" / ");
                $('#editForm').attr('action', '/dismap/data-tower/edit/' + id);
                
                $('#edit_pengelola').val(data.pengelola);
                $('#edit_siteid').val(site[0]);
                $('#edit_sitename').val(site[1]);
                $('#edit_jenismenara option[value="' + data.jenis_menara + '"]').attr("selected",true);
                $('#edit_lokasimenara').text(data.lokasi_menara);
                $('#edit_luaslokasi').val(data.luas_lokasi);
                $('#edit_statuslokasi option[value="' + data.status_lokasi + '"]').attr("selected",true);
                $('#edit_latitude').val(data.lat);
                $('#edit_longitude').val(data.lng);
                $('#edit_tinggimenara').val(data.tinggi_menara);
                $('#edit_statuskunjungan option[value="' + data.status_kunjungan + '"]').attr("selected",true);
                $('#edit_keterangan').text(data.keterangan);
            })     
        })

        $(document).on('click', '.viewButton', function(){
            var id = $(this).next().val();
            $.ajax({
                method : 'GET',
                url    : '/dismap/data-tower/view/' + id,
            }).done(function(data){
                var site = data.site.split(" / ");

                $('#view_pengelola').text(data.pengelola);
                $('#view_siteid').text(site[0]);
                $('#view_sitename').text(site[1]);
                $('#view_jenismenara').text(data.jenis_menara);
                $('#view_lokasimenara').text(data.lokasi_menara);
                $('#view_luaslokasi').text(data.luas_lokasi);
                $('#view_statuslokasi').text(data.status_lokasi);
                $('#view_latitude').text(data.lat);
                $('#view_longitude').text(data.lng);
                $('#view_tinggimenara').text(data.tinggi_menara);
                $('#view_statuskunjungan').text(data.status_kunjungan);
                $('#view_keterangan').text(data.keterangan);
            })     
        })

        $(document).on('click', '.deleteButton', function(){
            var id = $(this).next().val();

            $('#delete_data').attr('href', '/dismap/data-tower/delete/' + id);
        })
    </script>    
@endsection