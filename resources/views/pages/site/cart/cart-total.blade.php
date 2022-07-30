<div class="row justify-content-end pt-5">
    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{-- Cart Totals --}}
                    محصله العربة
                </h3>
                <table class="cart__totals">
                    <thead class="cart__totals-header">
                        <tr>
                            <th>
                                {{-- Subtotal --}}
                                المجموع الفرعي
                            </th>
                            <td>$5,877.00</td>
                        </tr>
                    </thead>
                    <tbody class="cart__totals-body">
                        <tr>
                            <th>
                                {{-- Shipping --}}
                                التوصيل
                            </th>
                            <td>
                                $25.00
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{-- Tax --}}
                                ضريبة
                            </th>
                            <td>
                                $0.00
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="cart__totals-footer">
                        <tr>
                            <th>
                                {{-- Total --}}
                                المجموع
                            </th>
                            <td>$5,902.00</td>
                        </tr>
                    </tfoot>
                </table>
                <a class="btn btn-primary btn-xl btn-block cart__checkout-button" 
                    href="checkout.html">
                    {{-- Proceed to checkout --}}
                    اكمل لتسجيل الشراء
                </a>
            </div>
        </div>
    </div>
</div>