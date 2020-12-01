// User 
  getData();



  function getData() {
    $("#idSisikjari").show();
    $("#Tunggu").hide();
    $("#ok").hide();
    $("#gif").hide();
    $("#Tap").hide();
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlUsers/getData',
      dataType : 'JSON',
      success: function(data) {
        var baris = '';
        var no=1;
        for (var i = 0; i < data.length; i++) {
          if (data[i].data_sidik_jari != null) {
          baris += '<tr>'+
                          '<td>'+ no++ +'</td>' +
                          '<td>'+ data[i].name +'</td>' +
                          '<td>'+ data[i].username +'</td>' +
                          '<td>'+ data[i].name_device +'</td>' +
                          '<td>'+ data[i].data_sidik_jari +'</td>' +
                          '<td><a href="#editUser" data-toggle="modal" onclick="dataEdit('+data[i].idx+')" data-target="#editUser" class="btn btn-lg"><i style="color: black;" class="fa fa-pencil-square-o"></i></a><a onclick="hapusUser('+data[i].idx+')" class="btn btn-lg"><i style="color: red;" class="fa fa-trash-o"></i></a></td>' +
                    '</tr>';
        }else{
          baris += '<tr>'+
                          '<td>'+ no++ +'</td>' +
                          '<td>'+ data[i].name +'</td>' +
                          '<td>'+ data[i].username +'</td>' +
                          '<td>'+ data[i].name_device +'</td>' +
                          '<td><a href="#" data-toggle="modal" data-target="#modalDaftar" onclick="daftarID('+data[i].idx+')" class="btn btn btn-success btn-sm">Daftar</a></td>' +
                          '<td><a href="#editUser" data-toggle="modal" onclick="dataEdit('+data[i].idx+')" data-target="#editUser" class="btn btn-lg"><i style="color: black;" class="fa fa-pencil-square-o"></i></a><a onclick="hapusUser('+data[i].idx+')" class="btn btn-lg"><i style="color: red;" class="fa fa-trash-o"></i></a></td>' +
                    '</tr>';
        }
      }
        $('#dataUser').html(baris); 
      }
    });

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlDevice/getData',
      dataType : 'JSON',
      success: function(data) {
        var baris = '';
        var no=1;
        for (var i = 0; i < data.length; i++) {
          baris += '<option value="'+ data[i].idx +'">'+
                    data[i].name_device +
                   '</option>';
                          
        }
        $('#deviceData, #deviceDataEdite').html(baris);
      }
    });
  }


// creat data
  $('#formUser').submit(function() {
    
    var name = $('#name').val();
    var username = $('#usrname').val();
    var password = $('#Password').val();
    var id_device = $('.deviceIdx').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlUsers/tambahData',
      dataType: 'JSON',
      data : {name:name, username:username, password:password, id_device:id_device},
      success : function(data) {
        $('#name').val("");
        $('#usrname').val("");
        $('#Password').val("");
        $('#tambahUser').modal('hide');
        var masage = 'Berhasil menabah data.!';
        notifSuccess(masage);
        getData();
      }
    });
    return false;
  });


// edite data
  $('#formEditUser').submit(function() {
    
    var name = $('#nameEdite').val();
    var username = $('#usrnameEdite').val();
    var password = $('#PasswordEdite').val();
    var id_device = $('#deviceDataEdite').val();
    var idx      = $('#idx').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlUsers/prosesEdite/'+idx,
      dataType: 'JSON',
      data : {name:name, username:username, password:password, id_device:id_device },
      success : function(data) {
        
      $('#editUser').modal('hide');
       var masage = 'Berhasil merubah data.!';
       notifSuccess(masage);
      getData();
      }
    });
    return false;
  });

  var myValueGlobal = '';
  // Proses daftar
  $('#formDaftar').submit(function() {
    
    var id_finger = $('#inputDaftar').val();
    var id_device = $('#deviceKey').val();
    var idx      = $('#idxDaftar').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlUsers/prosesDaftar',
      dataType: 'JSON',
      data : {id_finger:id_finger, id_device:id_device, idx:idx},
      success : function(data) {
       if (data.status == 0) {
        notifError(data.massage);
       }else if (data.status == 1) {
        $("#idSisikjari").hide();
        $("#Tap").hide();
        $("#ok").hide();
        $("#Tunggu").show();
        $("#gif").show();
        myValueGlobal = id_device;
        cekBalasMikrokontroller();
        notifInfo(data.massage);
       }
     
      }
    });
    return false;
  });


var myAssets;
var myAssets2;
var myAssets3;

function cekBalasMikrokontroller() {
  myAssets = setInterval(cekBalas, 3000);
}

function cekBalasMikrokontroller2() {
  myAssets2 = setInterval(cekBalas2, 3000);
}

function cekBalasMikrokontroller3() {
  myAssets3 = setTimeout(cekBalas3, 2000);
}

function cekBalas() {

   $.ajax({
    type: 'POST',
    data: {id_sidikJari:myValueGlobal},
    url: base_url()+'CtrlUsers/cekBalas',
    dataType: 'JSON',
    success: function (data) {

    if (data.status == 1) {
    
      $("#idSisikjari").hide();
        $("#Tunggu").hide();
        $("#ok").hide();
         $("#Tap").show();
         $("#gif").show();
      notifInfo(data.massage);
     clearInterval(myAssets);
     cekBalasMikrokontroller2();
    
    }

    }
  });
}

function cekBalas2() {

   $.ajax({
    type: 'POST',
    data: {id_sidikJari:myValueGlobal},
    url: base_url()+'CtrlUsers/cekBalas2',
    dataType: 'JSON',
    success: function (data) {

    if (data.status == 1) {
    
      $("#idSisikjari").hide();
        $("#Tap").hide();
        $("#ok").show();
        $("#Tunggu").hide();
        $("#gif").hide();
      notifSuccess(data.massage);
     clearInterval(myAssets2);
     cekBalasMikrokontroller3();
    
    }

    }
  });
}

function cekBalas3() {

$('#modalDaftar').modal('hide');

$('#idxDaftar').val("");
$('#deviceKey').val("");
$('#nameEDaftar').val("");
$('#deviceDaftar').val("");
$('#inputDaftar').val("");

getData();
   
}



  function dataEdit(idx) {
 
  $.ajax({
    type: 'POST',
    data: 'id='+idx,
    url: base_url()+'CtrlUsers/getID',
    dataType: 'JSON',
    success: function (data) {
     $('[name="nameEdite"]').val(data[0].name);
     $('[name="usrnameEdite"]').val(data[0].username);
     $('[name="idx"]').val(data[0].idx);
    }
  });
}


function hapusUser(idx) {
  var tanya = confirm('Data yang di hapus tidak akan bisa dikembalikan.!');

  if (tanya) {
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlUsers/deletUser/'+idx,
      dataType :'JSON',
      success : function(data){
        var masage = 'Berhasil Menghapus data.!';
        notifSuccess(masage);
        getData();
      }
    });
  }
}

function daftarID(idx) {
  $.ajax({
    type: 'POST',
    data: 'id='+idx,
    url: base_url()+'CtrlUsers/getById',
    dataType: 'JSON',
    success: function (data) {
     $('[name="nameDaftar"]').val(data[0].name);
     $('[name="deviceDaftar"]').val(data[0].name_device);
     $('[name="idxDaftar"]').val(data[0].idx);
     $('[name="deviceKey"]').val(data[0].device_key);
    }
  });
}

// End User


// User Device
  getDataDevice();




  function getDataDevice() {
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlDevice/getData',
      dataType : 'JSON',
      success: function(data) {
        var baris = '';
        var no=1;
        for (var i = 0; i < data.length; i++) {
          baris += '<tr>'+
                          '<td>'+ no++ +'</td>' +
                          '<td>'+ data[i].name_device +'</td>' +
                          '<td>'+ data[i].device_key +'</td>' +
                          '<td>'+ data[i].status_door +'</td>' +
                          '<td>'+ data[i].device_status +'</td>' +
                          '<td><a href="#editUser" data-toggle="modal" onclick="dataDivaceEdit('+data[i].idx+')" data-target="#editUser" class="btn btn-lg"><i style="color: black;" class="fa fa-pencil-square-o"></i></a><a onclick="hapusDevice('+data[i].idx+')" class="btn btn-lg"><i style="color: red;" class="fa fa-trash-o"></i></a></td>' +
                    '</tr>';
        }
        $('#dataDevice').html(baris);
      }
    });
  }


// creat data
  $('#formDevice').submit(function() {
    
    var nameDivace = $('#nameDivace').val();
    var device_key = $('#device_key').val();
    var status_door = $('#status_door').val();
    var device_status = $('#deviceStatus').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlDevice/tambahData',
      dataType: 'JSON',
      data : {nameDivace:nameDivace, device_key:device_key, status_door:status_door, device_status:device_status},
      success : function(data) {
        $('#nameDivace').val("");
        $('#status_door').val("");
        $('#status_door').val("");
        $('#deviceStatus').val("");
        $('#tambahUser').modal('hide');
        var masage = 'Berhasil menabah data.!';
        notifSuccess(masage);
        getDataDevice();
      }
    });
    return false;
  });


// edite data
  $('#formEditDevice').submit(function() {
    
    var nameEditeDivace = $('#nameEditeDivace').val();
    var device_keyEdite = $('#device_keyEdite').val();
    var status_door = $('#status_doorEdite').val();
    var deviceStatusEdite = $('#deviceStatusEdite').val();
    var idx      = $('#idx').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlDevice/prosesEdite/'+idx,
      dataType: 'JSON',
      data : {nameDivace:nameEditeDivace, device_key:device_keyEdite, status_door:status_door, device_status:deviceStatusEdite},
      success : function(data) {
        
       $('#nameEditeDivace').val("");
       $('#device_keyEdite').val("");
       $('#status_doorEdite').val("");
       $('#deviceStatusEdite').val("");
       $('#idx').val("");

      $('#editUser').modal('hide');
       var masage = 'Berhasil merubah data.!';
       notifSuccess(masage);
       getDataDevice();
      }
    });
    return false;
  });






  function dataDivaceEdit(idx) {
  $.ajax({
    type: 'POST',
    data: 'id='+idx,
    url: base_url()+'CtrlDevice/getID',
    dataType: 'JSON',
    success: function (data) {
     $('[name="nameDivace"]').val(data[0].name_device);
     $('[name="device_key"]').val(data[0].device_key);
     $('[name="status_door"]').val(data[0].status_door);
     $('[name="deviceStatusEdite"]').val(data[0].device_status);
     $('[name="idx"]').val(data[0].idx);
    }
  });
}


function hapusDevice(idx) {
  var tanya = confirm('Data yang di hapus tidak akan bisa dikembalikan.!');

  if (tanya) {
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlDevice/deletDevice/'+idx,
      dataType :'JSON',
      success : function(data){
        var masage = 'Berhasil Menghapus data.!';
        notifSuccess(masage);
        getDataDevice();
      }
    });
  }
}

function randomString() {
   var length = 5;
   var result           = '';
   var characters       = '0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

$("#tambahDevice").click(function(){
  var data = randomString();
  $('#device_key').val('DC-'+data);
});
// End Device



// Admin
  getDataAdmin();



  function getDataAdmin() {
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlAdministrator/getData',
      dataType : 'JSON',
      success: function(data) {
        var baris = '';
        var no=1;
        for (var i = 0; i < data.length; i++) {
          baris += '<tr>'+
                          '<td>'+ no++ +'</td>' +
                          '<td>'+ data[i].name +'</td>' +
                          '<td>'+ data[i].username +'</td>' +
                          '<td>'+ data[i].password +'</td>' +
                          '<td><a href="#editUser" data-toggle="modal" onclick="dataEditAdmin('+data[i].idx+')" data-target="#editUser" class="btn btn-lg"><i style="color: black;" class="fa fa-pencil-square-o"></i></a><a onclick="hapusAdmin('+data[i].idx+')" class="btn btn-lg"><i style="color: red;" class="fa fa-trash-o"></i></a></td>' +
                    '</tr>';
        }
        $('#dataAdmin').html(baris);
      }
    });
  }


// creat data
  $('#formAdmin').submit(function() {
    
    var name = $('#nameAdmin').val();
    var username = $('#username').val();
    var password = $('#password').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlAdministrator/tambahData',
      dataType: 'JSON',
      data : {name:name, username:username, password:password},
      success : function(data) {
        $('#nameAdmin').val("");
        $('#username').val("");
        $('#password').val("");
        $('#tambahUser').modal('hide');
        var masage = 'Berhasil menabah data.!';
        notifSuccess(masage);
        getDataAdmin();
      }
    });
    return false;
  });


// edite data
  $('#formEditAdmin').submit(function() {
    
    var name = $('#nameAdminEdite').val();
    var username = $('#usernameEdite').val();
    var password = $('#passwordEditAdmin').val();
    var idx      = $('#idx').val();

    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlAdministrator/prosesEdite/'+idx,
      dataType: 'JSON',
      data : {name:name, username:username, password:password},
      success : function(data) {

      $('#nameAdminEdite').val("");
        $('#usernameEdite').val("");
        $('#passwordEditAdmin').val("");
        $('#idx').val("");
        
      $('#editUser').modal('hide');
       var masage = 'Berhasil merubah data.!';
       notifSuccess(masage);
      getDataAdmin();
      }
    });
    return false;
  });






  function dataEditAdmin(idx) {
  $.ajax({
    type: 'POST',
    data: 'id='+idx,
    url: base_url()+'CtrlAdministrator/getID',
    dataType: 'JSON',
    success: function (data) {
     $('[name="nameAdmin"]').val(data[0].name);
     $('[name="username"]').val(data[0].username);
     $('[name="idx"]').val(data[0].idx);
    }
  });
}


function hapusAdmin(idx) {
  var tanya = confirm('Data yang di hapus tidak akan bisa dikembalikan.!');

  if (tanya) {
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlAdministrator/deletDevice/'+idx,
      dataType :'JSON',
      success : function(data){
        var masage = 'Berhasil Menghapus data.!';
        notifSuccess(masage);
        getDataAdmin();
      }
    });
  }
}

// End Admin


// Ricord
 getDataRicord();



  function getDataRicord() {
    $.ajax({
      type : 'POST',
      url  : base_url()+'CtrlRecord/getData',
      dataType : 'JSON',
      success: function(data) {
        var baris = '';
        var no=1;
        for (var i = 0; i < data.length; i++) {
          baris += '<tr>'+
                          '<td>'+ no++ +'</td>' +
                          '<td>'+ data[i].name_device +'</td>' +
                          '<td>'+ data[i].setatus_door_taping +'</td>' +
                          '<td>'+ data[i].name +'</td>' +
                          '<td>'+ data[i].tap_time +'</td>' +
                        +
                    '</tr>';
        }
        $('#dataRicord').html(baris);
      }
    });
  }

// End Ricord