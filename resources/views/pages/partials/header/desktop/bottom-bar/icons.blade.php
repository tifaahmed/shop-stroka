<div class="nav-panel__indicators">
    


 










    <div class="indicator">
        <a href="compare.php" class="indicator__button">
            <span class="indicator__area">
                <svg width="20px" height="20px">
                    <use xlink:href="images/sprite.svg#compare-16"></use>
                </svg>
                <span class="indicator__value">0</span>
            </span>
        </a>
    </div>

    <div class="indicator">
        <a href="wish_list.php" class="indicator__button">
            <span class="indicator__area">
                <svg width="20px" height="20px">
                    <use xlink:href="images/sprite.svg#heart-20"></use>
                </svg>
                <span class="indicator__value">0</span>
            </span>
        </a>
    </div>

    <div class="indicator indicator--trigger--click">
        <a href="{{asset(Request::segment(1).'/cart/'.$cart_details->url)}}" 
            class="indicator__button">
            <span class="indicator__area">
                <svg width="20px" height="20px">
                    <use xlink:href="{{asset('images/sprite.svg#cart-20')}}"></use>
                </svg>
                <span class="indicator__value">3</span>
            </span>
        </a>
        <div class="indicator__dropdown">
            <!-- .dropcart -->
            <div class="dropcart dropcart--style--dropdown">
                <div class="dropcart__body">
                    <div class="dropcart__products-list">
                        <!--  -->
                        <div class="dropcart__product">
                            <div class="product-image dropcart__product-image">
                                <a href="product_details.php" class="product-image__body">
                                    <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="dropcart__product-info">
                                <div class="dropcart__product-name"><a href="product_details.php">Electric Planer Brandix KL370090G 300 Watts</a></div>
                                <ul class="dropcart__product-options">
                                    <li>Color: Yellow</li>
                                    <li>Material: Aluminium</li>
                                </ul>
                                <div class="dropcart__product-meta">
                                    <span class="dropcart__product-quantity">2</span> ×
                                    <span class="dropcart__product-price">$699.00</span>
                                </div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                <svg width="10px" height="10px">
                                    <use xlink:href="images/sprite.svg#cross-10"></use>
                                </svg>
                            </button>
                        </div>
                        <!--  -->
                    </div>
                    <div class="dropcart__totals">
                        <table>
                            <tr>
                                <th>Subtotal</th>
                                <td>$5,877.00</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>$25.00 ~ $25.00</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>$5,902.00</td>
                            </tr>
                        </table>
                    </div>
                    <div class="dropcart__buttons">
                        <a class="btn btn-secondary" href="cart.php">View Cart</a>
                        <a class="btn btn-primary" href="checkout.php">Checkout</a>
                    </div>
                </div>
            </div>
            <!-- .dropcart / end -->
        </div>
    </div>
    <div class="indicator indicator--trigger--click">
        <a href="account-login.html" class="indicator__button">
            <span class="indicator__area">
                <svg width="20px" height="20px">
                    <use xlink:href="images/sprite.svg#person-20"></use>
                </svg>
            </span>
        </a>
        <div class="indicator__dropdown">
            <div class="account-menu">
                <form class="account-menu__form">
                    <div class="account-menu__form-title">Log In to Your Account</div>
                    <div class="form-group">
                        <label for="header-signin-email" class="sr-only">Email address</label>
                        <input id="header-signin-email" type="email" class="form-control form-control-sm" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="header-signin-password" class="sr-only">Password</label>
                        <div class="account-menu__form-forgot">
                            <input id="header-signin-password" type="password" class="form-control form-control-sm" placeholder="Password">
                            <a href="" class="account-menu__form-forgot-link">Forgot?</a>
                        </div>
                    </div>
                    <div class="form-group account-menu__form-button">
                        <button type="submit" class="btn btn-primary btn-sm">Login</button>
                    </div>
                    <div class="account-menu__form-link"><a href="account-login.html">Create An Account</a></div>
                </form>
                <div class="account-menu__divider"></div>
                <a href="acount_dashpord.php" class="account-menu__user">
                    <div class="account-menu__user-avatar">
                        <img src="images/avatars/avatar-3.jpg" alt="">
                    </div>
                    <div class="account-menu__user-info">
                        <div class="account-menu__user-name">Helena Garcia</div>
                        <div class="account-menu__user-email">stroyka@example.com</div>
                    </div>
                </a>
                <div class="account-menu__divider"></div>
                <ul class="account-menu__links">
                    <li><a href="account-profile.html">Edit Profile</a></li>
                    <li><a href="account-orders.html">Order History</a></li>
                    <li><a href="account-addresses.html">Addresses</a></li>
                    <li><a href="account-password.html">Password</a></li>
                </ul>
                <div class="account-menu__divider"></div>
                <ul class="account-menu__links">
                    <li><a href="account-login.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>