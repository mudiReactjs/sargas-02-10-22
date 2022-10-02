@extends('layout.general')
@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="main-page" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-4" style="float: left">Master Transaksi Operasional</h3>
            <a class="btn btn-warning" href="{{route('mto.home')}}" style="float: right">Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="tables table-responsive">
                <div class="bs-example widget-shadow" data-example-id="bordered-table">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger fade in">
                            <a href="#" class="close text-dark" data-dismiss="alert">&times;</a>
                            <strong>Error!</strong> {{$error}}.
                        </div>
                        @endforeach
                    @endif
                    <table id='datatables' class="table table-bordered table-responsive" >

                            {{-- <tr>
                                <th colspan="7" class="text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gridSystemModal" id='tambah'>Tambah</button>
                                </th>
                            </tr> --}}
                            <thead>
                                <th>Id</th>
                                <th>Master Operasional Id</th>
                                <th>Total Price</th>
                                <th>Diskripsi</th>
                                <th>Bukti Bayar</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                            @foreach ($data['data'] as $result)
                            <tr>
                                <td>{{$result['id']}}</td>
                                <td>{{$result['master_transaksi_operasional_id']}}</td>
                                <td>{{$result['price_total']}}</td>
                                <td>{{$result['description']}}</td>
                                <td>{{$result['bukti_bayar']}}</td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm btnSelect" id="tambah">Detail</button>
                                </td>
                            </tr>
                            @endforeach
                           </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Master --}}
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Detail Transaksi Operasional</h4>
            </div>
            <form action="{{route('mto.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="mb-3">id</label>
                        <input type="text" name="code" id="id" class="form-control" placeholder="Code">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Master Transaksi Operasional Id</label>
                        <input type="text" name="name" id="master_transaksi_operasional_id" class="form-control" placeholder="Nama Master Transaksi Operasional">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Total Bayar</label>
                        <input type="text" name="name" id="price_total" class="form-control" placeholder="Nama Master Transaksi Operasional">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Diskripsi</label>
                        <input type="text" name="name" id="description" class="form-control" placeholder="Nama Master Transaksi Operasional">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3">Bukti Bayar</label>
                        <input type="text" name="name" id="bukti_bayar" class="form-control" placeholder="Nama Master Transaksi Operasional">
                    </div>
                    <table id='datatables' class="table table-bordered table-responsive" >

                        {{-- <tr>
                            <th colspan="7" class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gridSystemModal" id='tambah'>Tambah</button>
                            </th>
                        </tr> --}}
                        <thead>
                            <th>Id</th>
                            <th>Master Operasional Id</th>
                            <th>Total Price</th>
                            <th>Diskripsi</th>
                            <th>Bukti Bayar</th>
                            <th>Action percoban</th>

                        </thead>
                        <tbody>
                        @foreach ($data['data'] as $result)
                        <tr>
                            <td>{{$result['id']}}</td>
                            <td>{{$result['master_transaksi_operasional_id']}}</td>
                            <td>{{$result['price_total']}}</td>
                            <td>{{$result['description']}}</td>
                            <td>{{$result['bukti_bayar']}}</td>
                            <td class="text-center">
                                <button class="btn btn-success btn-sm btnSelect" id="tambah">Detail</button>
                            </td>
                        </tr>
                        @endforeach
                       </tbody>
                 </table>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endsection
@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $("#datatables").on('click','.btnSelect',function(){
         // get the current row
         var currentRow=$(this).closest("tr");

         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var col4=currentRow.find("td:eq(3)").text(); // get current row 3rd TD
         var col5=currentRow.find("td:eq(4)").text(); // get current row 3rd TD
         // var data=col1+"\n"+col2+"\n"+col3+"\n"+col4+"\n"+col5;
          // alert(data);
          $('#TambahModal').modal('show');
          $('#id').val(col1);
          $('#master_transaksi_operasional_id').val(col2);
          $('#price_total').val(col3);
          $('#description').val(col4);
          $('#bukti_bayar').val(col5);
    });

        // $('#tambah').on('click',function(){
        //    $('#TambahModal').modal('show');
        // });
        $('#datatables').DataTable(
            {
                responsive: true
            }
        );

        // $('#tambah').on('click',function(){
        //     var nilai=$('#datatable tr:last th:eq(0)').html();
        //     var nomer=parseInt(nilai.substr(2,3))+1;
        //     $('#codetambahmaster').val('MT'+'0'.repeat(nilai.length-3)+nomer);
        // });
    });
    function coba(id){


        $('#master_transaksi_operasional_id').val(id);
    }
</script>
@endsection
