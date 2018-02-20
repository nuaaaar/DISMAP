@extends('layouts/dashboard')

@section('title', 'Maps')

@section('style')

  <style>

    #map{
      width: 100%;
      height: 500px;
      background: rgb(99, 99, 99);
    }

  </style>

@endsection

@section('maps', 'active')

@section('content')

  <div class="showback">

    <section class="panel">

      <header class="panel-heading">
        <h3 class="text-center">DISKOMINFO MAP</h3>
      </header>

      <div class="panel-body">
        <div id="map"></div>
      </div>

      <div class="panel-body" id="dataDetailMap" style="display: none;">

        <div class="row">
          <label class="col-md-3 col-xs-6 control-label">Pengelola <span class="pull-right">:</span></label>
          <label class="col-md-9 col-xs-6">
            <span name="view_pengelola" id="view_pengelola"></span>
          </label>
        </div>

        <div class="row">
          <label class="col-md-3 col-xs-6 control-label">No. Register <span class="pull-right">:</span></label>
          <label class="col-md-9 col-xs-6">
            <span name="view_noreg" id="view_noreg"></span>
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

    </section>

  </div>

@endsection

@section('script')

  <script src="{{ asset('js/dismap.js') }}"></script>

@endsection
