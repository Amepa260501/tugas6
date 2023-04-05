@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <h1 class="mb-3">Tambah Data Gudang</h1>
        <form class="form-horizontal">
            @csrf
            <?php date_default_timezone_set('Asia/Jakarta'); ?>

            <div class="form-group">
                <label class="control-label">Tanggal Datang</label>
                <div class="mt-2 mb-3">
                    <input type="date" id="tanggal" name="Tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Nama Supplier</label>
                        <div class="">
                            <input type="text" id="namasupplier" name="namasupplier" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Telepon</label>
                        <div class="">
                            <input type="text" id="telepon" name="telepon" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label class=" control-label">Alamat</label>
                        <div class="">
                            <input type="text" id="alamat" name="alamat" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <div class="">
                            <input type="text" id="keterangan" name="keterangan" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <form>
                <!-- Modal -->
                <div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $bar)
                                        <tr>
                                            <td>{{ $bar->kode }}</td>
                                            <td>{{ $bar->nama }}</td>
                                            <td>{{ $bar->satuan }}</td>
                                            <td>{{ $bar->hrg_jual }}</td>
                                            <td>
                                                <button class="btn btn-info" data-dismiss="modal" id="btn-pilih">Pilih</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $barang->links() }}
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <div class="row mb-2">
                    <h4 class="mb-2 mt-2">Pilih Barang</h4>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" id="kode" name="kode" class="form-control" value="<?php if (isset($_GET['kode'])) {echo $_GET['kode'];} ?>" required readonly data-bs-toggle="modal" data-bs-target="#MyModal">
                        </div>
                    </div>
    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?php if (isset($_GET['nama'])) {echo $_GET['nama'];} ?>" required readonly>
                        </div>
                    </div>
    
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" id="satuan" name="satuan" class="form-control" value="<?php if (isset($_GET['satuan'])) {echo $_GET['satuan'];} ?>"required readonly>
                        </div>
                    </div>
    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control" value="<?php if (isset($_GET['harga'])) {echo $_GET['harga'];} ?>" required readonly>
                        </div>
                    </div>
    
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" class="form-control" value="0" required>
                        </div>
                    </div>
    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" id="total" name="total" class="form-control" required readonly>
                        </div>
                    </div>
    
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label> </label>
                            <br>
                            <button type="submit" id="add" class="btn btn-success btn-block add-btn">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <table id="myTableIsi" class="table table-bordered data-table">
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Action</th>
            </thead>

            <tbody>

            </tbody>
        </table>

        <div class="row">
            <div class="col-sm-9">
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Grand Total</label>
                    <input type="text" value="0" id="grandtotal" name="grandtotal" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-success px-4 save-btn">Save</button>
            </div>
            <div class="col-sm-1">
                <a href="{{ url('gudang/tabel') }}" class="btn btn-danger px-4 cancel-btn">Cancel</a>
            </div>
        </div>
    </div>


        {{-- Script --}}
        <script>
            $("#myTable").on("click", "#btn-pilih", function() {
                let currentRow = $(this).closest("tr");
                let kode1 = currentRow.find("td:eq(0)").html();
                let nama1 = currentRow.find("td:eq(1)").html();
                let satuan1 = currentRow.find("td:eq(2)").html();
                let harga1 = currentRow.find("td:eq(3)").html();
                $('#MyModal').modal('hide');

                $("#kode").val(kode1);
                $("#nama").val(nama1);
                $("#satuan").val(satuan1);
                $("#harga").val(harga1);
            });

            $("#jumlah").change(function() {
                let harga = $("#harga").val();
                let jumlah = $("#jumlah").val();
                $("#total").val(harga * jumlah);
            });

            $("#add").click(function(e) {
                e.preventDefault();
                if ($("input[name='jumlah']").val() > 0) {
                    let kode = $("input[name='kode']").val();
                    let nama = $("input[name='nama']").val();
                    let satuan = $("input[name='satuan']").val();
                    let jumlah = $("input[name='jumlah']").val();
                    let harga = $("input[name='harga']").val();
                    let total = $("input[name='total']").val();

                    $(".data-table tbody").append("<tr data-kode='" + kode + "' data-nama='" + nama + "' data-satuan='" + satuan + "' data-jumlah='" + jumlah + "' data-harga='" + harga + "' data-total='" + total + "'><td>" + kode + "</td><td>" + nama + "</td><td>" + satuan + "</td><td>" + jumlah + "</td><td>" + harga + "</td><td>" + total + "</td><td><button class='btn btn-danger btn-xs btn-delete'>Delete</button></td></tr>");

                    $("input[name='kode']").val('');
                    $("input[name='nama']").val('');
                    $("input[name='satuan']").val('');
                    $("input[name='jumlah']").val('');
                    $("input[name='harga']").val('');
                    $("input[name='total']").val('');
                }
                perhitunganColumn(5);
            });

            function perhitunganColumn(index) {
                let total = 0;
                $('table tr').each(function() {
                    let value = parseInt($('td', this).eq(index).text());
                    if (!isNaN(value)) {
                        total += value;
                    }
                });
                $("#grandtotal").val(total);
            }

            $("body").on("click", ".btn-delete", function() {
                $(this).parents("tr").remove();
                perhitunganColumn(5);
            });
            $("body").on("click", ".save-btn", function() {
                saveColumn();
            });

            function saveColumn() {
                let kodetr = '<?php echo date('Ymd') . date('His'); ?>';
                let tanggal = $("#tanggal").val();
                let namasupplier = $("#namasupplier").val();
                let telepon = $("#telepon").val();
                let alamat = $("#alamat").val();
                let keterangan = $("#keterangan").val();
                let grandtotal = $("#grandtotal").val();

                // console.log(kodetr);
                // console.log(tanggal);
                // console.log(namasupplier);
                // console.log(telepon);
                // console.log(alamat);
                // console.log(keterangan);
                // console.log(grandtotal);
                // console.log("-----------");

                // $.get('http://localhost:8080/kuliah/PWL/pertemuan/tambahGudang?kodetr='+kodetr+'&tanggal='+tanggal+'&namasupplier='+namasupplier+'&telepon='+telepon+'&alamat='+alamat+'&keterangan='+keterangan+'&grandtotal='+grandtotal,function(){ });
                
                $.get('http://localhost:8080/kuliah/PWL/pertemuan/tambahGudang/'+kodetr+'/'+tanggal+'/'+namasupplier+'/'+telepon+'/'+alamat+'/'+keterangan+'/'+grandtotal,function(){ });
                
                console.log('http://localhost:8080/kuliah/PWL/pertemuan/tambahGudang/'+kodetr+'/'+tanggal+'/'+namasupplier+'/'+telepon+'/'+alamat+'/'+keterangan+'/'+grandtotal);
                
                $('#myTableIsi tr').each(function() {
                    let kode = $('td', this).eq(0).text();
                    let nama = $('td', this).eq(1).text();
                    let satuan = $('td', this).eq(2).text();
                    let jumlah = $('td', this).eq(3).text();
                    let harga = $('td', this).eq(4).text();

                    if (kode != "") {
                        // console.log(kodetr);
                        // console.log(kode);
                        // console.log(nama);
                        // console.log(satuan);
                        // console.log(harga);
                        // console.log(jumlah);

                        // $.get('http://localhost:8080/kuliah/PWL/pertemuan/tambahGudangDetail?kodetr='+kodetr+'&satuan='+satuan+'&harga='+harga+'&jumlah='+jumlah+'&nama='+nama+'&kode='+kode,function(){ });

                        $.get('http://localhost:8080/kuliah/PWL/pertemuan/tambahGudangDetail/'+kodetr+'/'+kode+'/'+harga+'/'+jumlah,function(){ });

                        console.log('http://localhost:8080/kuliah/PWL/pertemuan/tambahGudangDetail/'+kodetr+'/'+kode+'/'+harga+'/'+jumlah);

                        window.location="http://localhost:8080/kuliah/PWL/pertemuan/tambahGudang";
                    }
                });
            }
        </script>
    @endsection
