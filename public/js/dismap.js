$("#dataDetailMap").hide();

$(window).on("load", function(){

  var balikpapan = {
    latitude: -1.237927,
    longitude: 116.852853
  }

  var map = new GMaps({
    div: "#map",
    lat: balikpapan.latitude,
    lng: balikpapan.longitude,
    zoom: 12
  });

  $.ajax({
    method: "GET",
    url: "/admin/do/ajax/get/maps",
  }).done(function(res){
    console.log(res);

    for (var i = 0; i < res.length; i++) {

      if (res[i].status_kunjungan == "sudah dikunjungi") {

        var icons = {
          url: window.location.origin + "/img/hijau.png", // url
          scaledSize: new google.maps.Size(24, 24), // scaled sizenya
          origin: new google.maps.Point(0, 0), // originnya
          anchor: new google.maps.Point(12, 24), // anchor / Rumus = point(size dibagi 2, ngikut size)
        };

        var marker = map.addMarker({
          lat: res[i].lat,
          lng: res[i].lng,
          title: String(res[i].id),
          icon: icons,
          click: function(e) {

            NProgress.start(); // Buat mulai loadingnya

            $.ajax({
              method: "GET",
              url: "/admin/do/ajax/get/maps/detail/" + e.title
            }).done(function(res){

              $("#dataDetailMap").show();

              var site = res.site.split(" / ");

              $('#view_pengelola').text(res.pengelola);
              $('#view_siteid').text(site[0]);
              $('#view_sitename').text(site[1]);
              $('#view_jenismenara').text(res.jenis_menara);
              $('#view_lokasimenara').text(res.lokasi_menara);
              $('#view_luaslokasi').text(res.luas_lokasi);
              $('#view_statuslokasi').text(res.status_lokasi);
              $('#view_latitude').text(res.lat);
              $('#view_longitude').text(res.lng);
              $('#view_tinggimenara').text(res.tinggi_menara);
              $('#view_statuskunjungan').text(res.status_kunjungan);
              $('#view_keterangan').text(res.keterangan);

              NProgress.done(); // Buat kill loadingnya

            });

          }
        });

      } else if (res[i].status_kunjungan == "belum dikunjungi") {

        var icons = {
          url: window.location.origin + "/img/merah.png", // url
          scaledSize: new google.maps.Size(24, 24), // scaled sizenya
          origin: new google.maps.Point(0, 0), // originnya
          anchor: new google.maps.Point(12, 24), // anchor / Rumus = point(size dibagi 2, ngikut size)
        };

        var marker = map.addMarker({
          lat: res[i].lat,
          lng: res[i].lng,
          title: String(res[i].id),
          icon: icons,
          click: function(e) {

            NProgress.start();

            $.ajax({
              method: "GET",
              url: "/admin/do/ajax/get/maps/detail/" + e.title
            }).done(function(res){

              $("#dataDetailMap").show();

              var site = res.site.split(" / ");

              $('#view_pengelola').text(res.pengelola);
              $('#view_siteid').text(site[0]);
              $('#view_sitename').text(site[1]);
              $('#view_jenismenara').text(res.jenis_menara);
              $('#view_lokasimenara').text(res.lokasi_menara);
              $('#view_luaslokasi').text(res.luas_lokasi);
              $('#view_statuslokasi').text(res.status_lokasi);
              $('#view_latitude').text(res.lat);
              $('#view_longitude').text(res.lng);
              $('#view_tinggimenara').text(res.tinggi_menara);
              $('#view_statuskunjungan').text(res.status_kunjungan);
              $('#view_keterangan').text(res.keterangan);

              NProgress.done();

            });

          }
        });

      }

    };

  });

});
