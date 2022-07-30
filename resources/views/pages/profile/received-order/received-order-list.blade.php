@extends('pages.profile.received-order.received-order-index')

@section('address-title')
    list
@endsection

@section('received-order-content') 
 

<div class="card">
    <div class="card-header">
        <h5>Order History</h5>
    </div>
    <div class="card-divider"></div>
    <div class="card-table">
        <div class="table-responsive-sm">
            <table>
                <thead>
                    <tr>
                        <th>
                            {{-- Order --}}
                            الكود
                        </th>
                        <th>
                            {{-- Date --}}
                            التاريخ
                        </th>
                        <th>
                            {{-- Status --}}
                            الحاله
                        </th>
                        <th>
                            {{-- Total --}}
                            المجموع
                        </th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/6321/show')}}">#8132</a></td>
                        <td>02 April, 2019</td>
                        <td>Pending</td>
                        <td>$2,719.00 for 5 item(s)</td>
                        <td>
                            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/received-order')}}" 
                                class="btn btn-lx btn-danger">
                                الغاء الطلب
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/6321/show')}}">#7592</a></td>
                        <td>28 March, 2019</td>
                        <td>Pending</td>
                        <td>$374.00 for 3 item(s)</td>
                        <td>
                            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/received-order')}}" 
                                class="btn btn-lx btn-warnning">
                                الغاء الطلب
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/6321/show')}}">#7192</a></td>
                        <td>15 March, 2019</td>
                        <td>Shipped</td>
                        <td>$791.00 for 4 item(s)</td>
                    </tr>
                    <tr>
                        <td><a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/6321/show')}}">#6321</a></td>
                        <td>28 February, 2019</td>
                        <td>Completed</td>
                        <td>$57.00 for 1 item(s)</td>
                    </tr>
                    <tr>
                        <td><a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/6321/show')}}">#6001</a></td>
                        <td>21 February, 2019</td>
                        <td>Completed</td>
                        <td>$252.00 for 2 item(s)</td>
                    </tr>
                    <tr>
                        <td><a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/6321/show')}}">#4120</a></td>
                        <td>11 December, 2018</td>
                        <td>Completed</td>
                        <td>$3,978.00 for 7 item(s)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-divider"></div>
    <div class="card-footer">
        @include('pages.component.paginator')
    </div>


</div>


@endsection
