@extends('admin_Layout')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết thống kê sản phẩm
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light text-center">
                <thead>
                    <tr>
                        <th style="text-align:center;">Tên sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtl_prod as $detail_prod)
                    <tr>
                        <td>
                            {{$detail_prod->product_name}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<br>

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Ngày bán</th>
                        <th>Số lượng bán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtl_sold_prod as $detail_sold_prod)
                    <tr>
                        <td>
                            {{ \Carbon\Carbon::parse($detail_sold_prod->created_at)->format('d/m/Y')}}
                        </td>
                        <td>{{$detail_sold_prod->product_quantity}} sản phẩm</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
