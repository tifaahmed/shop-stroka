@extends('pages.profile.address.address-index')

@section('address-title')
    add 
@endsection

@section('address-content') 

<div class="card">
    <div class="card-header">
        <h5>add Address</h5>
    </div>
    <div class="card-divider"></div>
    <div class="card-body">
        <div class="row no-gutters">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="checkout-first-name">First Name</label>
                        <input type="text" class="form-control" id="checkout-first-name" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="checkout-last-name">Last Name</label>
                        <input type="text" class="form-control" id="checkout-last-name" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="checkout-country">
                        المحافظه
                    </label>
                    <select id="checkout-country" class="form-control form-control-select2">
                        <option>United States</option>
                        <option>Russia</option>
                        <option>Italy</option>
                        <option>France</option>
                        <option>Ukraine</option>
                        <option>Germany</option>
                        <option>Australia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="checkout-country">
                        المدينة
                    </label>
                    <select id="checkout-country" class="form-control form-control-select2">
                        <option>United States</option>
                        <option>Russia</option>
                        <option>Italy</option>
                        <option>France</option>
                        <option>Ukraine</option>
                        <option>Germany</option>
                        <option>Australia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="checkout-street-address">
                        Street Address
                        اسم الشارع
                    </label>
                    <input type="text" class="form-control" id="checkout-street-address" placeholder="Street Address">
                </div>
                <div class="form-group">
                    <label for="checkout-address">
                        {{-- Apartment, suite, unit etc.  --}}
                        رقم العمارة/ الدور / رقم الشقه 
                        <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="checkout-address">
                </div>
                <div class="form-group">
                    <label for="checkout-address">
                        علامة مميزة
                        <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="checkout-address">
                </div>
                {{-- <div class="form-group">
                    <label for="checkout-postcode">Postcode / ZIP</label>
                    <input type="text" class="form-control" id="checkout-postcode">
                </div> --}}
                <div class="form-row">
                    {{-- <div class="form-group col-md-6">
                        <label for="checkout-email">Email address</label>
                        <input type="email" class="form-control" id="checkout-email" placeholder="Email address">
                    </div> --}}
                    <div class="form-group col-md-6">
                        <label for="checkout-phone">
                            {{-- Phone --}}
                            الهاتف
                        </label>
                        <input type="text" class="form-control" id="checkout-phone" placeholder="Phone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="checkout-phone">
                            {{-- Phone --}}
                            هاتف ثانى
                            <span class="text-muted">(Optional)</span></label>
                        </label>
                        <input type="text" class="form-control" id="checkout-phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group mt-3 mb-0">
                    <button class="btn btn-primary">
                        {{-- Save --}}
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
