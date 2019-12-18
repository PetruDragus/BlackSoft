
    <div>
        <ul class="nav aside-nav">
            <li>
                <a href="/" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <div id="sidebar-text" class="sidebar-text"> Dashboard</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li class="header nav-small-cap">Fleet</li>
            <hr class="divider-type4">

            <li>
                <a href="{{ route('vehicles.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div id="sidebar-text" class="sidebar-text"> Vehicles</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/drivers" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="sidebar-text"> Drivers</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/cities" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="sidebar-text"> Cities</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li class="header nav-small-cap">CRM</li>
            <hr class="divider-type4">

            <li>
                <a href="/contacts" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-id-card-alt"></i>
                    </div>
                    <div class="sidebar-text"> Contacts</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/contact-form" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="far fa-address-book"></i>
                    </div>
                    <div class="sidebar-text"> Contact Form</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/opportunities" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-id-card-alt"></i>
                    </div>
                    <div class="sidebar-text"> Opportunities</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('customers.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="sidebar-text"> Customers</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('invoices.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="sidebar-text"> Invoices</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li class="header nav-small-cap">Recruitment</li>
            <hr class="divider-type4">

            <li>
                <a href="{{ route('jobs.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="sidebar-text"> Jobs Posted</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('applications.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-blender-phone"></i>
                    </div>
                    <div class="sidebar-text"> Jobs Applications</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li class="header nav-small-cap">Financial</li>
            <hr class="divider-type4">

            <li>
                <a href="{{ route('payments.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="sidebar-text"> Payments</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('coupons.index') }}" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-percent"></i>
                    </div>
                    <div class="sidebar-text"> Coupons List</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li class="header nav-small-cap">App</li>
            <hr class="divider-type4">

            <li>
                <a href="{{ route('bookings.index') }}" class="{{ (request()->segment(2) == 'bookings') ? 'active' : '' }}  sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="sidebar-text"> Trips Bookings</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/booking/cancelled" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="sidebar-text"> Cancelled Trips</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/flat-rates" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-route"></i>
                    </div>
                    <div class="sidebar-text"> Flat Rates</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="#reviews" class="sidebar-nav-link" data-toggle="collapse" data-parent="#reviews">
                    <div class="sidebar-icon">
                        <i class="far fa-star"></i>
                    </div>
                    <div class="sidebar-text"> Reviews</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
                <div class="collapse side-menu__collapsed" id="reviews">
                    <a href="{{ route('reviews.index') }}" class="list-group-item"><i class="fas fa-caret-right"></i> Vehicle Review </a>
                    <a href="{{ route('reviews.index') }}" class="list-group-item"><i class="fas fa-caret-right"></i> Chauffeur Review </a>
                </div>
            </li>

            <li>
                <a href="/users" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-universal-access"></i>
                    </div>
                    <div class="sidebar-text"> Manage Access</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <li>
                <a href="/settings" class="sidebar-nav-link">
                    <div class="sidebar-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="sidebar-text"> Settings</div>
                    <div class="sidebar-arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </a>
            </li>

            <hr>
            <hr class="divider-type4">

{{--            <li>--}}
{{--                <a href="/dispatch" class="sidebar-nav-link">--}}
{{--                    <div class="sidebar-icon">--}}
{{--                        <i class="fas fa-cogs"></i>--}}
{{--                    </div>--}}
{{--                    <div class="sidebar-text"> Dispatch</div>--}}
{{--                    <div class="sidebar-arrow">--}}
{{--                        <i class="fas fa-satellite-dish"></i>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>