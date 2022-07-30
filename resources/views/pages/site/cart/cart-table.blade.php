<table class="cart__table cart-table">
    <thead class="cart-table__head">
        <tr class="cart-table__row">
            <th class="cart-table__column cart-table__column--image">
                {{-- Image --}}
                الصورة
            </th>
            <th class="cart-table__column cart-table__column--product">
                {{-- Product --}}
                المنتج
            </th>
            <th class="cart-table__column cart-table__column--price">
                {{-- Price --}}
                السعر
            </th>
            <th class="cart-table__column cart-table__column--quantity">
                {{-- Quantity --}}
                الكمية
            </th>
            <th class="cart-table__column cart-table__column--total">
                {{-- Total --}}
                المجموع
            </th>
            <th class="cart-table__column cart-table__column--remove"></th>
        </tr>
    </thead>
    <tbody class="cart-table__body">
        <tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image">
                <div class="product-image">
                    <a href="" class="product-image__body">
                        <img class="product-image__img" src="{{asset('images/pro.jpg')}}" alt="">
                    </a>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--product">
                <a href="" class="cart-table__product-name">اسم المنتج</a>
                <ul class="cart-table__options">
                    <li>Color: Yellow</li>
                    <li>Material: Aluminium</li>
                </ul>
            </td>
            <td class="cart-table__column cart-table__column--price" data-title="Price">$699.00</td>
            <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                <div class="input-number">
                    <input class="form-control input-number__input" type="number" min="1" value="2">
                    <div class="input-number__add"></div>
                    <div class="input-number__sub"></div>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--total" data-title="Total">$1,398.00</td>
            <td class="cart-table__column cart-table__column--remove">
                <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                    <svg width="12px" height="12px">
                        <use xlink:href="images/sprite.svg#cross-12"></use>
                    </svg>
                </button>
            </td>
        </tr>
        <tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image">
                <div class="product-image">
                    <a href="" class="product-image__body">
                        <img class="product-image__img" src="{{asset('images/pro.jpg')}}" alt="">
                    </a>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--product">
                <a href="" class="cart-table__product-name">اسم المنتج</a>
            </td>
            <td class="cart-table__column cart-table__column--price" data-title="Price">$849.00</td>
            <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                <div class="input-number">
                    <input class="form-control input-number__input" type="number" min="1" value="1">
                    <div class="input-number__add"></div>
                    <div class="input-number__sub"></div>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--total" data-title="Total">$849.00</td>
            <td class="cart-table__column cart-table__column--remove">
                <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                    <svg width="12px" height="12px">
                        <use xlink:href="images/sprite.svg#cross-12"></use>
                    </svg>
                </button>
            </td>
        </tr>
        <tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image">
                <div class="product-image">
                    <a href="" class="product-image__body">
                        <img class="product-image__img" src="{{asset('images/pro.jpg')}}" alt="">
                    </a>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--product">
                <a href="" class="cart-table__product-name">اسم المنتج</a>
                <ul class="cart-table__options">
                    <li>Color: True Red</li>
                </ul>
            </td>
            <td class="cart-table__column cart-table__column--price" data-title="Price">$1,210.00</td>
            <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                <div class="input-number">
                    <input class="form-control input-number__input" type="number" min="1" value="3">
                    <div class="input-number__add"></div>
                    <div class="input-number__sub"></div>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--total" data-title="Total">$3,630.00</td>
            <td class="cart-table__column cart-table__column--remove">
                <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                    <svg width="12px" height="12px">
                        <use xlink:href="images/sprite.svg#cross-12"></use>
                    </svg>
                </button>
            </td>
        </tr>
    </tbody>
</table>