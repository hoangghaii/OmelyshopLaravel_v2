@extends('admin_Layout')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thống kê sản phẩm
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng tồn kho</th>
                        <th>Số lượng đã bán</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{url('/view-detail-sta_product/')}}" class="active" ui-toggle-class="">
                                    <span class="fa fa-eye text-success text-active"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
